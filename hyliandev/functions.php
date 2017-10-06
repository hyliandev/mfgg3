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

?>