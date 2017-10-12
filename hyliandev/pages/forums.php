<?php

$vars=[];

switch($params[0]){
	case '':
	case 'index':
		$view='index';
	break;
	
	case 'category':
		$view='category-single';
		
		$fid=array_shift(explode('-',$params[1]));
		
		if(empty($vars=Forums::Read(['fid'=>$fid]))){
			$view='badparams';
			break;
		}
	break;
	
	case 'forum':
		$view='forum-single';
		
		$fid=array_shift(explode('-',$params[1]));
		
		if(empty($vars=Forums::Read(['fid'=>$fid]))){
			$view='badparams';
			break;
		}
	break;
	
	case 'topic':
		$view='topic-single';
		
		$tid=array_shift(explode('-',$params[1]));
		
		if(empty($vars=Topics::Read(['tid'=>$tid]))){
			$view='badparams';
			break;
		}
	break;
	
	default:
		$view='badparams';
	break;
}

echo view('forums/' . $view,$vars);

?>