<?php
$sprites=Sprites::Read([
	'page'=>$page
]);

if(count($sprites)):
	foreach($sprites as $sprite){
		echo view('sprites/small',$sprite);
	}
else: ?>

<div class="card card-block">
	There are no sprites to show
</div>

<?php endif; ?>

<?=view('pagination',[
	'page'=>$page,
	'pageCount'=>Sprites::NumberOfPages(),
	'url'=>'sprites/archive'
])?>