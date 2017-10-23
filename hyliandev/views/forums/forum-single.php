<h1><?=format($title)?></h1>

<a href="<?=url()?>/forums/topic/new/<?=$fid?>" class="btn btn-primary">
	New Topic
</a>

<div class="card">
	<div class="card-header">
		Topics
	</div>
	
	<?php foreach(Topics::Read($data=['pid'=>$fid,'page'=>$page]) as $topic): ?>
		<?=view('forums/topic',$topic)?>
	<?php endforeach; ?>
</div>

<?=view('pagination',[
	'url'=>'forums/forum/' . $GLOBALS['params'][1],
	'page'=>$page,
	'pageCount'=>Topics::NumberOfPages($data)
])?>