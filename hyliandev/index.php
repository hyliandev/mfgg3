<?php

// Error reporting

error_reporting(0);










// Require necessary files

foreach([
	'functions',
	'settings',
	'db',
	'model'
] as $file){
	require_once $file . '.php';
}










// Which file to view

if(empty($uri=$_GET['uri'])) $uri='index';

$path=explode('/',$uri);
$params=false;
$_file='';
$file=false;

foreach($path as $node){
	if($params === false){
		$_file .= $node;
		
		if(file_exists($file='./pages/' . $_file . '.php')){
			$params=[];
		}else{
			$file=false;
			$_file .= '/';
		}
	}else{
		$params[]=$node;
	}
}

if($file === false){
	$file='404error.php';
}










// Page content

ob_start();

include $file;

$yield=ob_get_clean();










// Require the template

require_once 'template.php';

?>