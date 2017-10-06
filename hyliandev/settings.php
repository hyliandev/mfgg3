<?php

function setting($key,$value=null){
	global $_SETTINGS;
	
	if(empty($key) || empty($_SETTINGS[$key])){
		return false;
	}
	
	if($value == null){
		return $_SETTINGS[$key];
	}
	
	$_SETTINGS[$key]=$value;
}

$_SETTINGS=[
	'db_host'=>'localhost',
	'db_name'=>'mfgg',
	'db_user'=>'root',
	'db_pass'=>'',
	'db_prefix'=>'tsms_',
	
	
	
	'limit_per_page'=>5
];

?>