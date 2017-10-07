<?php
if(empty($id=array_shift(explode('-',$GLOBALS['params'][0]))) || !is_numeric($id) || $id < 0){
	echo 'bad id';
}

$update=Updates::Read([
	'nid'=>$id
]);

echo view('updates/large',$update);
?>

<h1>Comments</h1>