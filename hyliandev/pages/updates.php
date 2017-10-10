<h1><?=lang('updates-title')?></h1>

<?php
if(empty($view=$params[0])) $view='archive';
if(empty($page=$params[1]) || !is_numeric($page) || $page <= 0) $page=1;

switch($view){
	case 'archive':
		$view='updates/archive';
	break;
	
	default:
		$view='updates/single';
	break;
}

echo view(
	$view,
	[
		'page'=>$page
	]
);

?>