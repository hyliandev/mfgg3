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
		
		return $user;
	}
	
	public static function Login($username,$password){
		$ret=[
			'attempts'=>true,
			'username'=>false,
			'password'=>false
		];
		
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
			}
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
}

?>