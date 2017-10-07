<?php

// Get a debug string of the variables
function debug(){
	ob_start();
	
	foreach(func_get_args() as $x){
		echo '<pre>' . print_r($x,true) . '</pre>';
	}
	
	return ob_get_clean();
}



// Title to slug
function titleToSlug($title){
	$title=preg_replace('/&(.)+;/U','',$title);
	$title=preg_replace('/[^a-zA-Z0-9 ]/','',$title);
	$title=str_replace(' ','-',$title);
	$title=strtolower($title);
	$title=substr($title,0,50);
	
	return $title;
}



// Unconvert from HTML
// Stolen directly from TCSMS lol
function unconvert ($data) {
	global $STD;
	
	$data = preg_replace("/<b>(.*?)<\/b>/is", "[b]\\1[/b]", $data);
	$data = preg_replace("/<u>(.*?)<\/u>/is", "[u]\\1[/u]", $data);
	$data = preg_replace("/<i>(.*?)<\/i>/is", "[i]\\1[/i]", $data);
	$data = preg_replace("/<s>(.*?)<\/s>/is", "[s]\\1[/s]", $data);
	$data = preg_replace("/<sup>(.*?)<\/sup>/is", "[sup]\\1[/sup]", $data);
	$data = preg_replace("/<sub>(.*?)<\/sub>/is", "[sub]\\1[/sub]", $data);
	
	// URLs
	$data = preg_replace("/<a\s+href=[\"\']mailto:(\S+?)[\"\']>\s*\\1\s*<\/a>/is", "[email]\\1[/email]", $data);
	$data = preg_replace("/<a\s+href=[\"\'](\S+?)[\"\']>\s*\\1\s*<\/a>/is", "[url]\\1[/url]", $data);
	$data = preg_replace("#<img src=[\"'](\S+?)['\"].+?".">#", "[img]\\1[/img]", $data);
	$data = preg_replace("/<a\s+href=[\"\'](\S+?)[\"\']>(.*?)<\/a>/is", "[url=\\1]\\2[/url]", $data);
	
	// Quotes
	$data = preg_replace("/<!--QuoteStart--><div class=\"quotetitle\">Quote<\/div><div class=\"quote\">/is", "[quote]", $data);
	$data = preg_replace_callback("/<!--QuoteStart--><div class=\"quotetitle\">Quote <span style='font-weight:normal'>\((.+?)\)<\/span><\/div><div class=\"quote\">/is", array(&$this, 'unconvert_quote'), $data);
	$data = preg_replace("/<\/div><!--QuoteEnd-->/i", "[/quote]", $data);
	
	// Line breaks
	$data = preg_replace("/<br\s*\/?>/i", "\n", $data);
	
	// Content Updates
	$data = preg_replace("/<!--s_recent-->[\\x00-\\xFF]*<!--e_recent-->/", "{%recent_updates%}", $data);
	
	return $data;
}



// Get the base URL to the site
function url(){
	return 'http://localhost/mfgg/hyliandev';
}



// Get a view
function view($_file,$vars){
	if(!file_exists($file='./views/' . $_file . '.php')){
		return '<div class="alert alert-danger">Could not find view <code>' . $_file . '</code></div>';
	}
	
	foreach($vars as $_____key=>$_____value){
		$$_____key=$_____value;
	}
	
	ob_start();
	
	include $file;
	
	return ob_get_clean();
}

?>