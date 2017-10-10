<?php

// If the parameters are incompatible with what we're trying to do, exit

if(
	empty($params[0])
	||
	!in_array($params[0],['thumbnail','file'])
	||
	empty($params[1])
	||
	!is_numeric($params[1])
	||
	$params[1] < 0
){
	die('Invalid Parameters');
}





// Here we get the table for the content type we're working with

$q=DB()->prepare("SELECT type,eid FROM " . setting('db_prefix') . "resources WHERE rid = ?;");

$q->execute([
	$params[1]
]);

$type=$q->fetch(PDO::FETCH_OBJ);

$eid=$type->eid;

if(!$type=$type->type){
	die('There is no such resource');
}

$table=setting('db_prefix') . 'res_';

switch($type){
	case 1:
		$table .= 'gfx';
	break;
	
	case 2:
		$table .= 'games';
	break;
	
	case 4:
		$table .= 'howtos';
	break;
	
	case 5:
		$table .= 'sounds';
	break;
	
	case 6:
		$table .= 'misc';
	break;
	
	default:
		die('Invalid resource selected');
	break;
}

if($params[0] == 'thumbnail' && !in_array($type,[1,2])){
	die('This resource type does not have thumbnails');
}





// Here we run the query to get the file we're after

$q=DB()->prepare("
	SELECT
	" . $params[0] . "
	FROM
	" . $table . " AS s
	
	LEFT JOIN
	" .  setting('db_prefix') . "resources AS r
	ON r.eid = s.eid
	
	WHERE r.rid = ?
	
	LIMIT 1;
");

$q->execute([
	$params[1]
]);

$q=$q->fetch(PDO::FETCH_OBJ);





// Find the content

$file=setting($params[0] . '_directory') . '/' . $type . '/' . $q->$params[0];

if(!file_exists($file)){
	die('File not found');
}





// If we're downloading the file, add to the download counter

if($params[0] == 'file'){
	$q=DB()->query("
		UPDATE
		$table
		
		SET downloads = downloads + 1
		
		WHERE
		eid=$eid
		;
	");
}





// Offer the content

header('Content-type:' . mime_content_type($file));

die(file_get_contents($file));

?>