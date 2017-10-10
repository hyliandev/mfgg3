<?php

function bbcode($text){
	global $quote_open, $quote_close;
	
	$quote_open=0;
	$quote_close=0;
	
	// Simple tags
	
	$simple_codes=[
		'b'=>'bold',
		'i'=>'italic',
		'u'=>'underline'
	];
	
	foreach($simple_codes as $key=>$value){
		$text=preg_replace(
			'/\[' . $key . '](.*)\[\/' . $key . ']/i',
			'<span class="bbcode-' . $value . '">$1</span>',
			$text
		);
	}
	
	
	
	// Less simple tags
	
	// URLs
	$text=preg_replace(
		'/\[url=(((http(s|)):\/\/|)[a-zA-Z0-9]{1}[a-zA-Z0-9\-]{1,251}[a-zA-Z0-9]{1}\.[a-zA-Z]{1,10}(\/|)[a-zA-Z0-9@:%_\+.~#?&\/=\-$\^\*\(\)\`]*)\](.+)\[\/url\]/i',
		'<a href="$1" target="_blank">$6</a>',
		$text
	);
	
	// Cited Quotes
	$text=preg_replace_callback(
		'/\[quote(=([a-zA-Z0-9 ]+)|)\](.+)\[\/quote\]/is',
		function($matches){
			$ret=$matches[0];
			
			$ret=preg_replace_callback(
				'/\[quote(=([a-zA-Z0-9 ]+)|)\]/is',
				function($matches){
					global $quote_open;
					
					$quote_open++;
					
					$ret='<blockquote><cite>';
					
					if(!empty($matches[2])){
						$ret.=$matches[2] . ' said:';
					}else{
						$ret.='Quote:';
					}
					
					$ret.='</cite><div class="card-block">';
					
					return $ret;
				},
				$ret
			);
			
			$ret=preg_replace_callback(
				'/\[\/quote\]/is',
				function($matches){
					global $quote_close;
					
					$quote_close++;
					
					$ret='';
					
					$ret.='</div></blockquote>';
					
					return $ret;
				},
				$ret
			);
			
			return $ret;
		},
		$text
	);
	
	if($quote_open != $quote_close){
		if($quote_open > $quote_close){
			$text.='</div></blockquote>';
		}else{
			$text='<blockquote><cite>Quote:</cite><div class="card-block">' . $text;
		}
	}
	
	
	
	// Return
	
	return $text;
}

?>