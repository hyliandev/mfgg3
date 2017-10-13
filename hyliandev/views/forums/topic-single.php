<h1><?=$title?></h1>

<div class="card"><?php foreach(Posts::Read($data=['tid'=>$tid,'page'=>$page,'limit'=>1]) as $post): ?>
	<?=view('forums/post',$post)?>
<?php endforeach; ?></div>

<?=view('pagination',[
	'url'=>'forums/topic/' . $GLOBALS['params'][1],
	'page'=>$page,
	'pageCount'=>Posts::NumberOfPages($data)
])?>