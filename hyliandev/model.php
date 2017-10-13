<?php

// Base model class

class Model {
	public static function Create($data=[]){}
	public static function Read($data=[]){}
	public static function Update($data=[]){}
	public static function Delete($data=[]){}
	public static function NumberOfPages($data=[]){}
}










// Updates

class Updates extends Model {
	public static function Read($data=[]){
		if(!empty($nid=$data['nid'])){
			if(!is_numeric($nid)) return false;
			
			if($nid < 0) return false;
			
			$q=DB()->prepare("SELECT * FROM " . setting('db_prefix') . "news WHERE nid=? LIMIT 1;");
			
			$q->execute([$nid]);
			
			$q=$q->fetch(PDO::FETCH_OBJ);
			
			if(empty($q)){
				return false;
			}
			
			$q->user=Users::Read(['uid'=>$q->uid]);
			
			return $q;
		}
		
		if(empty($page=$data['page'])) $page=1;
		
		if(empty($limit=$data['limit'])) $limit=setting('limit_per_page');
		
		$q=DB()->prepare(
			$sql="SELECT
			u.*
			
			FROM " . setting('db_prefix') . "news AS u
			
			ORDER BY nid DESC
			
			LIMIT
			" . (($page - 1) * $limit) . ",
			$limit
			;"
		);
		
		$q->execute();
		
		$q=$q->fetchAll(PDO::FETCH_OBJ);
		
		foreach($q as $key=>$value){
			if(empty($value)){
				unset($q[$key]);
				continue;
			}
			
			$q[$key]->user=Users::Read(['uid'=>$q[$key]->uid]);
		}
		
		return $q;
	}
	
	public static function NumberOfPages($data=[]){
		if(empty($limit=$data['limit'])) $limit=setting('limit_per_page');
		
		$q=DB()->prepare(
			$sql="SELECT
			COUNT(*) AS count
			
			FROM " . setting('db_prefix') . "news AS u
			;"
		);
		
		$q->execute();
		
		return ceil($q->fetch(PDO::FETCH_OBJ)->count / $limit);
	}
}










// Users

class Users extends Model {
	public static function Create($data=[]){
		if(in_array(true,$errors=Users::CreateError($data))){
			return $errors;
		}
		
		$q=DB()->prepare("
			INSERT INTO " . setting('db_prefix') . "users
			
			(
				gid,
				username,
				password,
				email,
				skin,
				registered_ip,
				cookie,
				join_date
			)
			
			VALUES (
				5,
				?,
				?,
				?,
				2,
				?,
				?,
				?
			);
		");
		
		$ret=$q->execute([
			$data['username'],
			User::Password($data['password']),
			$data['email'],
			$_SERVER['REMOTE_ADDR'],
			User::Cookie(),
			time()
		]);
		
		return $ret;
	}
	
	public static function CreateError($data=[]){
		$error=[
			'username'=>false,
			'password'=>false,
			'email'=>false
		];
		
		// Username
		if(empty($data['username'])){
			$error['username']='Username was empty';
		}elseif(strlen($data['username']) < setting('username_min_length')){
			$error['username']='Username was too short; must be ' . setting('username_min_length') . ' or more characters';
		}elseif(strlen($data['username']) > setting('username_max_length')){
			$error['username']='Username was too long; must be ' . setting('username_max_length') . ' or less characters';
		}elseif(Users::Read(['username'=>$data['username']])){
			$error['username']='That username already exists';
		}
		
		// Password
		if(empty($data['password'])){
			$error['password']='Password was empty';
		}elseif(strlen($data['password']) < setting('password_min_length')){
			$error['password']='Password was too short; must be ' . setting('password_min_length') . ' or more characters';
		}elseif(strlen($data['password']) > setting('password_max_length')){
			$error['password']='Password was too long; must be ' . setting('password_max_length') . ' or less characters';
		}
		
		// Email
		if(empty($data['email'])){
			$error['email']='Email was empty';
		}elseif(!filter_var($data['email'], FILTER_VALIDATE_EMAIL)){
			$error['email']='Email was invalid';
		}elseif(Users::Read(['email'=>$data['email']])){
			$error['email']='An account with that email already exists';
		}
		
		return $error;
	}
	
	public static function Read($data=[]){
		$_sql=[];
		$values=[];
		foreach($data as $key=>$value){
			$values[]=$value;
			$_sql[]=$key . ' = ?';
		}
		
		$q=DB()->prepare(
			$sql="SELECT
			*
			FROM " . setting('db_prefix') . "users AS u
			
			WHERE
			" . implode(' AND ',$_sql) . "
			
			LIMIT 1
			;"
		);
		
		$q->execute($values);
		
		return $q->fetch(PDO::FETCH_OBJ);
	}
}










// Sprites

class Sprites extends Model {
	public static function Read($data=[]){
		if(!empty($rid=$data['rid'])){
			if(!is_numeric($rid)) return false;
			
			if($rid < 0) return false;
			
			$q=DB()->prepare("SELECT r.*, g.* FROM " . setting('db_prefix') . "res_gfx AS g LEFT JOIN " . setting('db_prefix') . "resources AS r ON r.eid=g.eid WHERE r.rid=? LIMIT 1;");
			
			$q->execute([$rid]);
			
			$q=$q->fetch(PDO::FETCH_OBJ);
			
			if(empty($q)){
				return false;
			}
			
			$q->user=Users::Read(['uid'=>$q->uid]);
			
			return $q;
		}
		
		if(empty($page=$data['page'])) $page=1;
		
		if(empty($limit=$data['limit'])) $limit=setting('limit_per_page');
		
		$q=DB()->prepare(
			$sql="SELECT
			r.*,
			g.*
			
			FROM " . setting('db_prefix') . "res_gfx AS g
			
			LEFT JOIN " . setting('db_prefix') . "resources AS r
			ON r.eid = g.eid
			
			WHERE
			r.rid > 0
			
			ORDER BY rid DESC
			
			LIMIT
			" . (($page - 1) * $limit) . ",
			$limit
			;"
		);
		
		$q->execute();
		
		$q=$q->fetchAll(PDO::FETCH_OBJ);
		
		foreach($q as $key=>$value){
			if(empty($value)){
				unset($q[$key]);
				continue;
			}
			
			$q[$key]->user=Users::Read(['uid'=>$q[$key]->uid]);
		}
		
		return $q;
	}
	
	public static function NumberOfPages($data=[]){
		if(empty($limit=$data['limit'])) $limit=setting('limit_per_page');
		
		$q=DB()->prepare(
			$sql="SELECT
			COUNT(*) AS count
			
			FROM " . setting('db_prefix') . "res_gfx AS g
			;"
		);
		
		$q->execute();
		
		return ceil($q->fetch(PDO::FETCH_OBJ)->count / $limit);
	}
}










// Comments

class Comments extends Model {
	public static function Read($data=[]){
		if(empty($type=$data['type']) || empty($rid=$data['rid'])) return [];
		
		if(empty($page=$data['page'])) $page=1;
		
		if(empty($limit=$data['limit'])) $limit=setting('limit_per_page');
		
		$q=DB()->prepare(
			$sql="SELECT
			c.*
			
			FROM " . setting('db_prefix') . "comments AS c
			
			WHERE
			type=?
			AND
			rid=?
			
			ORDER BY cid ASC
			
			LIMIT
			" . (($page - 1) * $limit) . ",
			$limit
			;"
		);
		
		$q->execute([
			$type,
			$rid
		]);
		
		$q=$q->fetchAll(PDO::FETCH_OBJ);
		
		foreach($q as $key=>$value){
			if(empty($value)){
				unset($q[$key]);
				continue;
			}
			
			$q[$key]->user=Users::Read(['uid'=>$q[$key]->uid]);
		}
		
		return $q;
	}
	
	public static function NumberOfPages($data=[]){
		if(empty($type=$data['type']) || empty($rid=$data['rid'])) return [];
		
		if(empty($limit=$data['limit'])) $limit=setting('limit_per_page');
		
		$q=DB()->prepare(
			$sql="SELECT
			COUNT(*) AS count
			
			FROM " . setting('db_prefix') . "comments AS c
			
			WHERE
			type=?
			AND
			rid=?
			
			;"
		);
		
		$q->execute([
			$type,
			$rid
		]);
		
		return ceil($q->fetch(PDO::FETCH_OBJ)->count / $limit);
	}
}










// Forums

class Forums extends Model {
	public static function Read($data=[]){
		if(!empty($fid=$data['fid'])){
			if(!is_numeric($fid)) return false;
			
			if($fid < 0) return false;
			
			$q=DB()->prepare("SELECT f.* FROM " . setting('db_prefix') . "forums AS f WHERE f.fid=? LIMIT 1;");
			
			$q->execute([$fid]);
			
			$q=$q->fetch(PDO::FETCH_OBJ);
			
			if(empty($q)){
				return false;
			}
			
			return $q;
		}
		
		if(empty($page=$data['page'])) $page=1;
		
		if(empty($limit=$data['limit'])) $limit=setting('limit_per_page');
		
		if(empty($pid=$data['pid'])) $pid=0;
		
		$q=DB()->prepare(
			$sql="SELECT
			f.*
			
			FROM " . setting('db_prefix') . "forums AS f
			
			WHERE
			pid=?
			
			ORDER BY order_place ASC
			
			LIMIT
			" . (($page - 1) * $limit) . ",
			$limit
			;"
		);
		
		$q->execute([
			$pid
		]);
		
		$q=$q->fetchAll(PDO::FETCH_OBJ);
		
		foreach($q as $key=>$value){
			if(empty($value)){
				unset($q[$key]);
				continue;
			}
			
			$q[$key]->user=Users::Read(['uid'=>$q[$key]->poster_uid]);
		}
		
		return $q;
	}
}










// Topics

class Topics extends Model {
	public static function Create($data=[]){
		if(empty($data['pid'])){
			return false;
		}
		
		if(in_array(true,$errors=Topics::CreateError($data))){
			return $errors;
		}
		
		$q=DB()->prepare($sql="
			INSERT INTO " . setting('db_prefix') . "topics
			
			(
				pid,
				title,
				date,
				poster_uid,
				last_post_date
			)
			
			VALUES (
				?,
				?,
				?,
				?,
				?
			);
		");
		
		$ret=$q->execute([
			$data['pid'],
			$data['title'],
			time(),
			User::GetUser()->uid,
			time()
		]);
		
		$GLOBALS['topic_id']=DB()->lastInsertId();
		
		Posts::Create([
			'message'=>$data['message'],
			'tid'=>$GLOBALS['topic_id']
		]);
		
		return $ret;
	}
	
	public static function CreateError($data=[]){
		$error=[
			'title'=>false,
			'message'=>false
		];
		
		// Title
		if(empty($data['title'])){
			$error['title']='Title was empty';
		}elseif($data['title'] == 'lol'){
			$error['title']='Title was lol';
		}
		
		// Message
		if(empty($data['message'])){
			$error['message']='Message was empty';
		}
		
		return $error;
	}
	
	public static function Read($data=[]){
		if(!empty($tid=$data['tid'])){
			if(!is_numeric($tid)) return false;
			
			if($tid < 0) return false;
			
			$q=DB()->prepare("SELECT t.* FROM " . setting('db_prefix') . "topics AS t WHERE t.tid=? LIMIT 1;");
			
			$q->execute([$tid]);
			
			$q=$q->fetch(PDO::FETCH_OBJ);
			
			if(empty($q)){
				return false;
			}
			
			return $q;
		}
		
		if(empty($page=$data['page'])) $page=1;
		
		if(empty($limit=$data['limit'])) $limit=setting('limit_per_page');
		
		if(empty($pid=$data['pid'])) $pid=0;
		
		$q=DB()->prepare(
			$sql="SELECT
			t.*
			
			FROM " . setting('db_prefix') . "topics AS t
			
			WHERE
			pid=?
			
			ORDER BY last_post_date DESC
			
			LIMIT
			" . (($page - 1) * $limit) . ",
			$limit
			;"
		);
		
		$q->execute([
			$pid
		]);
		
		$q=$q->fetchAll(PDO::FETCH_OBJ);
		
		foreach($q as $key=>$value){
			if(empty($value)){
				unset($q[$key]);
				continue;
			}
			
			$q[$key]->user=Users::Read(['uid'=>$q[$key]->poster_uid]);
		}
		
		return $q;
	}
	
	public static function NumberOfPages($data=[]){
		if(empty($limit=$data['limit'])) $limit=setting('limit_per_page');
		
		if(empty($pid=$data['pid'])) $pid=0;
		
		$q=DB()->prepare(
			$sql="SELECT
			COUNT(*) AS count
			
			FROM " . setting('db_prefix') . "topics AS t
			
			WHERE
			pid=?
			;"
		);
		
		$q->execute([
			$pid
		]);
		
		return ceil($q->fetch(PDO::FETCH_OBJ)->count / $limit);
	}
}










// Posts

class Posts extends Model {
	public static function Create($data=[]){
		if(empty($data['tid'])){
			return false;
		}
		
		if(in_array(true,$errors=Posts::CreateError($data))){
			return $errors;
		}
		
		$q=DB()->prepare($sql="
			INSERT INTO " . setting('db_prefix') . "posts
			
			(
				tid,
				message,
				date,
				poster_uid
			)
			
			VALUES (
				?,
				?,
				?,
				?
			);
		");
		
		$ret=$q->execute([
			$data['tid'],
			$data['message'],
			time(),
			User::GetUser()->uid
		]);
		
		return $ret;
	}
	
	public static function CreateError($data=[]){
		$error=[
			'message'=>false
		];
		
		// Message
		if(empty($data['message'])){
			$error['message']='Message was empty';
		}
		
		return $error;
	}
	
	public static function Read($data=[]){
		if(empty($page=$data['page'])) $page=1;
		
		if(empty($limit=$data['limit'])) $limit=setting('limit_per_page');
		
		if(empty($tid=$data['tid'])) $tid=0;
		
		$q=DB()->prepare(
			$sql="SELECT
			p.*
			
			FROM " . setting('db_prefix') . "posts AS p
			
			WHERE
			tid=?
			
			ORDER BY pid ASC
			
			LIMIT
			" . (($page - 1) * $limit) . ",
			$limit
			;"
		);
		
		$q->execute([
			$tid
		]);
		
		$q=$q->fetchAll(PDO::FETCH_OBJ);
		
		foreach($q as $key=>$value){
			if(empty($value)){
				unset($q[$key]);
				continue;
			}
			
			$q[$key]->user=Users::Read(['uid'=>$q[$key]->poster_uid]);
		}
		
		return $q;
	}
	
	public static function NumberOfPages($data=[]){
		if(empty($limit=$data['limit'])) $limit=setting('limit_per_page');
		
		if(empty($tid=$data['tid'])) $tid=0;
		
		$q=DB()->prepare(
			$sql="SELECT
			COUNT(*) AS count
			
			FROM " . setting('db_prefix') . "posts AS p
			
			WHERE
			tid=?
			;"
		);
		
		$q->execute([
			$tid
		]);
		
		return ceil($q->fetch(PDO::FETCH_OBJ)->count / $limit);
	}
}

?>