<?php

function bbcode($text){
	global $quote_open, $quote_close;
	
	$quote_open=0;
	$quote_close=0;
	
	
	
	
	
	
	
	
	
	
	// == SIMPLE TAGS ==
	
	$simple_codes=[
		'b'=>'bold',
		'i'=>'italic',
		'u'=>'underline',
		'center'=>'center'
	];
	
	foreach($simple_codes as $key=>$value){
		$text=preg_replace(
			'/\[' . $key . '](.*)\[\/' . $key . ']/is',
			'<span class="bbcode-' . $value . '">$1</span>',
			$text
		);
	}
	
	
	
	
	
	
	
	
	
	
	// == LESS SIMPLE TAGS ==
	
	// URLs
	$text=preg_replace_callback(
		'/\[url=(((http(s|)):\/\/|)[a-zA-Z0-9]{1}[a-zA-Z0-9\-]{1,251}[a-zA-Z0-9]{1}\.[a-zA-Z]{1,10}(\/|)[a-zA-Z0-9@:%_\+.~#?&\/=\-$\^\*\(\)\`]*)\](.+)\[\/url\]/i',
		function($matches){
			$url=$matches[1];
			
			if(empty($matches[2])){
				$url='http://' . $url;
			}
			
			return '<a href="' . $url . '" target="_blank">' . $matches[6] . '</a>';
		},
		$text
	);
	
	
	
	// Cited Quotes
	$text=preg_replace_callback(
		'/\[quote(=([a-zA-Z0-9@:%_\+.~#?&\/=\-$\^\*\(\)\`\ \<\>\"\']+)|)\](.+)\[\/quote\]/is',
		function($matches){
			$ret=$matches[0];
			
			$ret=preg_replace_callback(
				'/\[quote(=([a-zA-Z0-9@:%_\+.~#?&\/=\-$\^\*\(\)\`\ \<\>\"\']+)|)\]/is',
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
	
	
	
	// Images
	
	$text=preg_replace(
		'/\[img\](((http(s|)):\/\/|)[a-zA-Z0-9]{1}[a-zA-Z0-9\-]{1,251}[a-zA-Z0-9]{1}\.[a-zA-Z]{1,10}(\/|)[a-zA-Z0-9@:%_\+.~#?&\/=\-$\^\*\(\)\`]*)\[\/img\]/is',
		'<img src="$1" class="bbcode-image">',
		$text
	);
	
	
	
	// Text sizes
	
	$text=preg_replace(
		'/\[size\=(200|1[0-9]{2}|[5-9]{1}[0-9]{1})\](.[^\[size\]]+)\[\/size\]/is',
		'<span class="bbcode-size" style="font-size:$1%;">$2</span>',
		$text
	);
	
	
	
	// YouTube / YouTube Audio
	
	$text=preg_replace_callback(
		'/\[(youtube|ytaudio)\](((http(s|)):\/\/|)([a-z0-9\-]{1,255}\.|)([a-zA-Z0-9]{1}[a-zA-Z0-9\-]{1,251}[a-zA-Z0-9]{1}\.[a-zA-Z]{1,10})(\/|)([a-zA-Z0-9;@:%_\+.~#?&\/=\-$\^\*\(\)\`]*))\[\/(youtube|ytaudio)\]/is',
		function($matches){
			if($matches[1] != $matches[10]){
				return $matches[0];
			}
			
			if(!in_array($matches[7],['youtube.com','youtu.be'])){
				return '<div class="alert alert-warning">Non-YouTube URL detected</div>';
			}
			
			if($matches[7] == 'youtu.be'){
				$code=$matches[9];
			}else{
				$code=array_pop(explode('v=',$matches[9]));
				$code=array_shift(explode('&',$code));
			}
			
			return '<iframe src="https://youtube.com/embed/' . $code . '" class="bbcode-youtube' . ($matches[1] == 'ytaudio' ? ' bbcode-youtube-audio' : '') . '"></iframe>';
		},
		$text
	);
	
	
	
	// Code
	
	$text=preg_replace_callback(
		'/\[code\](.+)\[\/code\]/is',
		function($matches){
			return '<div class="bbcode-code">' . str_replace("\t",'&emsp;&emsp;&emsp;&emsp;',$matches[1]) . '</div>';
			//return debug($matches);
		},
		$text
	);
	
	
	
	
	
	
	
	
	
	
	// == RETURN ==
	
	return $text;
}

?>