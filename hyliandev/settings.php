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
	// Database settings
	
	'db_host'=>'localhost',
	'db_name'=>'mfgg',
	'db_user'=>'root',
	'db_pass'=>'',
	'db_prefix'=>'tsms_',
	
	
	
	// Resource settings
	
	'limit_per_page'=>20,
	
	
	
	// Site settings
	
	'site_name'=>'Mario Fan Games Galaxy',
	'site_abbr'=>'MFGG',
	
	
	
	// Registration Form Settings
	
	'username_min_length'=>3,
	'username_max_length'=>32,
	
	'password_min_length'=>3,
	'password_max_length'=>72
];

?>