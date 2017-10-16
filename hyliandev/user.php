<?php

class User {
	public static $user = false;
	
	public static function Cookie(){
		return bin2hex(openssl_random_pseudo_bytes(16));
	}
	
	public static function GetUser(){
		if(self::$user){
			return self::$user;
		}
		
		if(!isset($_SESSION['uid'])){
			return false;
		}
		
		$user=Users::Read(['uid'=>$_SESSION['uid']]);
		
		if(!$user){
			return false;
		}
		
		self::$user=$user;
		
		self::UpdateLastActivity();
		
		return $user;
	}
	
	public static function Login($username,$password){
		$ret=[
			'attempts'=>false,
			'username'=>false,
			'password'=>false
		];
		
		// Check the number of attempts first
		$attempts=DB()->prepare("
			SELECT COUNT(*) AS count FROM " . setting('db_prefix') . "login_attempts AS l
			WHERE
			date > ?
			AND
			user_agent = ?
			AND
			ip = ?
			AND
			success = 0
			;
		");
		
		$attempts->execute([
			time() - setting('login_attempts_wait'),
			$_SERVER['HTTP_USER_AGENT'],
			$_SERVER['REMOTE_ADDR']
		]);
		
		$attempts=$attempts->fetch(PDO::FETCH_OBJ)->count;
		
		if($attempts <= setting('login_attempts_max')){
			$ret['attempts']=true;
			
			$q=DB()->prepare("SELECT password,uid FROM " . setting('db_prefix') . "users WHERE username=? LIMIT 1;");
			$q->execute([$username]);
			$user=$q->fetch(PDO::FETCH_OBJ);
			$_password=$user->password;
			
			if(!empty($_password)){
				$ret['username']=true;
				
				$login=false;
				
				if(User::PasswordMatch($password,$_password)){
					$login=true;
				}elseif(md5($password) == $_password){
					$login=true;
					
					$q=DB()->prepare("
						UPDATE " . setting('db_prefix') . "users
						
						SET password = ?
						
						WHERE uid = ?
						
						LIMIT 1
						;
					");
					
					$q->execute($data=[
						User::Password($password),
						$user->uid
					]);
				}
				
				if($login){
					$ret['password']=true;
					
					session_destroy();
					session_start();
					
					$_SESSION['uid']=$user->uid;
					
					self::UpdateLastActivity();
				}
			}
			
			// Record the login attempt
			$a=DB()->prepare("
				INSERT INTO " . setting('db_prefix') . "login_attempts
				( uid,date,user_agent,ip,success )
				VALUES
				( ?, ?, ?, ?, ? )
				;
			");
			
			$a->execute([
				empty($user->uid) ? 0 : $user->uid,
				time(),
				$_SERVER['HTTP_USER_AGENT'],
				$_SERVER['REMOTE_ADDR'],
				$login ? true : false
			]);
			// End record the login attempts
		}
		
		return $ret;
	}
	
	public static function Password($password){
		return password_hash($password, PASSWORD_BCRYPT);
	}
	
	public static function PasswordMatch($maybe,$real){
		return password_verify($maybe,$real);
	}
	
	public static function ShowUsername($user=0){
		if($user === 0){
			$user=self::$user;
		}
		
		if(!$user){
			return '???';
		}
		
		$username=$user->username;
		
		$username='<a href="' . url() . '/user/' . $user->uid . '-' . titleToSlug($username) . '">' . $username . '</a>';
		
		return $username;
	}
	
	public static function UpdateLastActivity(){
		if(!self::$user){
			return;
		}
		
		$q=DB()->prepare("
			UPDATE " . setting('db_prefix') . "users
			
			SET
			last_activity=?,
			last_ip=?
			
			WHERE
			uid=?
			;
		");
		
		$q->execute([
			time(),
			$_SERVER['REMOTE_ADDR'],
			self::$user->uid
		]);
	}
}

?>