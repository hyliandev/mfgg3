<?php

class User {
	public static function Login($username,$password){
		$ret=[
			'attempts'=>true,
			'username'=>false,
			'password'=>false
		];
		
		$q=DB()->prepare("SELECT password FROM " . setting('db_prefix') . "users WHERE username=? LIMIT 1;");
		$q->execute([$username]);
		$_password=$q->fetch(PDO::FETCH_OBJ)->password;
		
		if(!empty($_password)){
			$ret['username']=true;
			
			if(md5($password) == $_password){
				$ret['password']=true;
			}
		}
		
		return $ret;
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