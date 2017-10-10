<?php
$updates=Updates::Read([
	'page'=>$page
]);

if(count($updates)):
	foreach($updates as $update){
		echo view('updates/small',$update);
	}
else: ?>

<div class="card">
	<div class="card-block">
		There are no updates to show
	</div>
</div>

<?php endif; ?>

<?=view('pagination',[
	'page'=>$page,
	'pageCount'=>Updates::NumberOfPages(),
	'url'=>'updates/archive'
])?>