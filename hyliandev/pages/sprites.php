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

<div class="card">
	<div class="card-header">
		<?=$sprite->title?>
	</div>
	
	<div class="card-block">
		<img src="<?=url()?>/../tcsms/thumbnail/1/<?=$sprite->thumbnail?>" style="float:left; margin:0 0.5em 0.5em 0;">
		
		<?=$sprite->description?>
		
		<div style="clear:both;"></div>
		
		<p>
			<a href="<?=url()?>/../tcsms/file/1/<?=$sprite->file?>" target="_blank">
				<span class="fa fa-download"></span>
				Download
			</a>
			
			<a href="#" onclick="$(this).closest('.card-block').find('.debug').toggle(100); return false;">
				<span class="fa fa-plus"></span>
				Debug
			</a>
		</p>
		
		<div class="debug" style="display:none;">
			<?=debug($sprite)?>
		</div>
	</div>
</div>

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