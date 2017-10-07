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

<?php
if(count($comments=Comments::Read($data=['type'=>2,'rid'=>$id,'page'=>$page]))):
	foreach($comments as $comment){
		echo view('comments',$comment);
	}
else: ?>

<div class="card card-block">
	There are no comments to show
</div>

<?php endif; ?>

<?=view('pagination',[
	'page'=>$page,
	'pageCount'=>Comments::NumberOfPages($data),
	'url'=>'updates/' . $GLOBALS['params'][0]
])?>