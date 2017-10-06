<?php

// Base model class

class Model {
	public static function Create($data){}
	public static function Read($data){}
	public static function Update($data){}
	public static function Delete($data){}
}










// Sprites

class Sprites extends Model {
	public static function Read($data){
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