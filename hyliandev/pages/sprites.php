<?php
$page=$params[0] == 'page' && is_numeric($params[1]) && $params[1] > 0 ? $params[1] : 1;
?>

<h1>Sprites</h1>

<?php if(count($sprites=Sprites::Read([
	'page'=>$page
]))): foreach($sprites as $sprite): ?>

<?php
$user=Users::Read(['uid'=>$sprite->uid]);
?>

<?=debug($sprite)?>

<?php endforeach; else: ?>

<div class="card card-block">
	There are no sprites to show.
</div>

<?php endif; ?>

<?=view('pagination',[
	'page'=>$page,
	'pageCount'=>Sprites::NumberOfPages(),
	'url'=>'sprites'
])?>