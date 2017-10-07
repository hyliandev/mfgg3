<?php
$updates=Updates::Read([
	'page'=>$page
]);

if(count($updates)):
	foreach($updates as $update){
		echo view('updates/small',$update);
	}
else: ?>

<div class="card card-block">
	There are no updates to show
</div>

<?php endif; ?>

<?=view('pagination',[
	'page'=>$page,
	'pageCount'=>Updates::NumberOfPages(),
	'url'=>'updates/archive'
])?>