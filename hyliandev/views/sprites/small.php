<?php
$user=Users::Read(['uid'=>$uid]);
?>

<div class="card">
	<div class="card-header">
		<a href="<?=url()?>/sprites/<?=$rid?>-<?=titleToSlug($title)?>/">
			<?=$title?>
		</a>
	</div>
	
	<div class="card-block">
		<?=format($description)?>
	</div>
	
	<div class="card-footer">
		Comments (<?=$comments?>)
	</div>
</div>