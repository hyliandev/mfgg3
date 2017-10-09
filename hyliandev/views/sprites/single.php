<?php
if(empty($id=array_shift(explode('-',$GLOBALS['params'][0]))) || !is_numeric($id) || $id < 0 || empty($sprite=Sprites::Read(['rid'=>$id]))):
?>

<div class="card card-block">
	Invalid ID
</div>

<?php
else:

echo view('sprites/large',$sprite);

echo view('comments/archive',[
	'id'=>$id,
	'page'=>$page,
	'type'=>1,
	'url'=>'sprites'
]);

endif;
?>