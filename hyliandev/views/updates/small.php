<?php
$user=Users::Read(['uid'=>$uid]);
?>

<div class="card">
	<div class="card-header">
		<a href="<?=url()?>/updates/<?=$nid?>-<?=titleToSlug($title)?>/">
			<?=$title?>
		</a>
	</div>
	
	<div class="card-block">
		<div class="row">
			<div class="col-12 col-lg-3 text-center">
				<p>
					<?=$user->username?>
				</p>
				
				<?=date('m/d/Y g:i:sa',$date)?>
			</div>
			
			<div class="col-12 col-lg-9">
				<?=unconvert($message)?>
			</div>
		</div>
	</div>
	
	<div class="card-footer">
		Comments (<?=$comments?>)
	</div>
</div>