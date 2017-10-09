<?php
if(empty($id=array_shift(explode('-',$GLOBALS['params'][0]))) || !is_numeric($id) || $id < 0 || empty($update=Updates::Read(['nid'=>$id]))):
?>

<div class="card card-block">
	Invalid ID
</div>

<?php
else:

echo view('updates/large',$update);

echo view('comments/archive',[
	'id'=>$id,
	'page'=>$page,
	'type'=>2,
	'url'=>'updates'
]);

endif;
?>