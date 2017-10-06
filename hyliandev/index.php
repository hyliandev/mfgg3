<?php

// Require necessary files

foreach([
	'settings',
	'db',
	'model'
] as $file){
	require_once $file . '.php';
}










// Page content

$yield='';










// Require the template

require_once 'template.php';

?>