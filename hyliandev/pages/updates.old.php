<?php
$page=$params[0] == 'page' && is_numeric($params[1]) && $params[1] > 0 ? $params[1] : 1;
?>

<h1>Updates</h1>

<?php if(count($updates=Updates::Read([
	'page'=>$page
]))): foreach($updates as $update): ?>

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
				<pre><?=unconvert($update->message)?></pre>
			</div>
		</div>
	</div>
	
	<div class="card-footer">
		Comments (<?=$update->comments?>)
	</div>
</div>

<?php endforeach; else: ?>

<div class="card card-block">
	There are no updates to show.
</div>

<?php endif; ?>

<?=view('pagination',[
	'page'=>$page,
	'pageCount'=>Updates::NumberOfPages(),
	'url'=>'updates'
])?>