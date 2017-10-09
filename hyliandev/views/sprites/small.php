<?php
$user=Users::Read(['uid'=>$uid]);
?>

<div class="card">
	<div class="card-header">
		<a href="<?=$url = url() . '/sprites/' . $rid . '-' . titleToSlug($title) . '/'?>">
			<?=$title?>
		</a>
	</div>
	
	<div class="card-block">
		<?=format($description)?>
	</div>
	
	<div class="card-footer">
		<a href="<?=$url?>">
			Comments (<?=$comments?>)
		</a>
	</div>
</div>