<?php

// Get a debug string of the variables
function debug(){
	ob_start();
	
	foreach(func_get_args() as $x){
		echo '<pre>' . print_r($x,true) . '</pre>';
	}
	
	return ob_get_clean();
}



// Get the base URL to the site
function url(){
	return 'http://localhost/mfgg/hyliandev';
}



// Get a view
function view($file,$vars){
	if(empty($file='./views/' . $file . '.php')) return false;
	
	foreach($vars as $_____key=>$_____value){
		$$_____key=$_____value;
	}
	
	ob_start();
	
	include $file;
	
	return ob_get_clean();
}

?>