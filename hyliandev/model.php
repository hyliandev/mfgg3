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
			
			return $q->fetch(PDO::FETCH_OBJ);
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
		
		return $q->fetchAll(PDO::FETCH_OBJ);
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
	public static function Read($data=[]){
		if(empty($data['uid'])){
			return false;
		}
		
		$q=DB()->prepare(
			$sql="SELECT
			*
			FROM " . setting('db_prefix') . "users AS u
			
			WHERE
			uid=?
			
			LIMIT 1
			;"
		);
		
		$q->execute([
			$data['uid']
		]);
		
		return $q->fetch(PDO::FETCH_OBJ);
	}
}










// Sprites

class Sprites extends Model {
	public static function Read($data=[]){
		if(empty($page=$data['page'])) $page=1;
		
		if(empty($limit=$data['limit'])) $limit=setting('limit_per_page');
		
		$q=DB()->prepare(
			$sql="SELECT
			r.*,
			g.*
			
			FROM " . setting('db_prefix') . "res_gfx AS g
			
			LEFT JOIN " . setting('db_prefix') . "resources AS r
			ON r.eid = g.eid
			
			ORDER BY rid DESC
			
			LIMIT
			" . (($page - 1) * $limit) . ",
			$limit
			;"
		);
		
		$q->execute();
		
		return $q->fetchAll(PDO::FETCH_OBJ);
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
		
		return $q->fetchAll(PDO::FETCH_OBJ);
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

?>