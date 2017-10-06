<?php

// Require necessary files

foreach([
	'functions',
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