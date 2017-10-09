<h1>Comments</h1>

<?php
if(count($comments=Comments::Read($data=['type'=>$type,'rid'=>$id,'page'=>$page]))):
	foreach($comments as $comment){
		echo view('comments/single',$comment);
	}
else: ?>

<div class="card card-block">
	There are no comments to show
</div>

<?php endif; ?>

<?=view('pagination',[
	'page'=>$page,
	'pageCount'=>Comments::NumberOfPages($data),
	'url'=>$url . '/' . $GLOBALS['params'][0]
])?>