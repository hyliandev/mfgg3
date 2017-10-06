<h1>Updates</h1>

<?php foreach(Updates::Read() as $update): ?>

<?php
$user=Users::Read(['uid'=>$update->uid]);
?>

<div class="card">
	<h2 class="card-header">
		<?=$update->title?>
	</h2>
	
	<div class="card-block">
		<div class="row">
			<div class="col-12 col-lg-3 text-center">
				<p><?=$user->username?></p>
				
				<?=date('m/d/Y g:i:sa',$update->date)?>
			</div>
			
			<div class="col-12 col-lg-9">
				<?=$update->message?>
			</div>
		</div>
	</div>
	
	<div class="card-footer">
		Comments (<?=$update->comments?>)
	</div>
</div>

<?php endforeach; ?>