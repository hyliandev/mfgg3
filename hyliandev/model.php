<?php

// Base model class

class Model {
	public static function Create($data=[]){}
	public static function Read($data=[]){}
	public static function Update($data=[]){}
	public static function Delete($data=[]){}
}










// Updates

class Updates extends Model {
	public static function Read($data=[]){
		$page=1;
		$limit=5;
		
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
		$page=1;
		$limit=5;
		
		$q=DB()->prepare(
			$sql="SELECT
			r.*,
			g.*
			
			FROM " . setting('db_prefix') . "res_gfx AS g
			
			LEFT JOIN " . setting('db_prefix') . "resources AS r
			ON r.eid = g.eid
			
			LIMIT
			" . (($page - 1) * $limit) . ",
			$limit
			;"
		);
		
		$q->execute();
		
		return $q->fetchAll(PDO::FETCH_OBJ);
	}
}

?>