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
		
		if($params[1] == 'new'){
			if(empty($vars=Forums::Read(['fid'=>$params[2]]))){
				$view='badparams';
				break;
			}
			
			$view='topic-new';
			
			if(isset($_POST['title']) && isset($_POST['message'])){
				$vars->errors=Topics::Create([
					'title'=>$_POST['title'],
					'message'=>$_POST['message'],
					'pid'=>$params[2]
				]);
				
				$view='topic-new-success';
				
				if($vars->errors === true){
					$view='topic-new-success';
				}else{
					foreach($vars->errors as $error){
						if(!empty($error)){
							$view='topic-new';
						}
					}
				}
			}
			
			break;
		}
		
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

if(empty($vars->page=$params[2]) || !is_numeric($vars->page) || $vars->page <= 0){
	$vars->page=1;
}

echo view('forums/' . $view,$vars);

?>