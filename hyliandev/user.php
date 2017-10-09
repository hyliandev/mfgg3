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
			
			if(md5($password) == $_password){
				$ret['password']=true;
				
				session_destroy();
				session_start();
				
				$_SESSION['uid']=$user->uid;
			}
		}
		
		return $ret;
	}
	
	public static function Password($password){
		return md5($password);
	}
	
	public static function ShowUsername($user){
		if(!$user){
			return '???';
		}
		
		$username=$user->username;
		
		$username='<a href="' . url() . '/user/' . $user->uid . '-' . titleToSlug($username) . '">' . $username . '</a>';
		
		return $username;
	}
}

?>