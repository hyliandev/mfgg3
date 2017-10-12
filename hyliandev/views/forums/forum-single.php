<h1><?=$title?></h1>

<div class="card">
	<div class="card-header">
		Topics
	</div>
	
	<?php foreach(Topics::Read(['pid'=>$fid]) as $topic): ?>
		<?=view('forums/topic',$topic)?>
	<?php endforeach; ?>
</div>