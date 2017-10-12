<h1>Forums</h1>

<div class="card"><?php foreach(Forums::Read() as $category): ?>
	<?=view('forums/category',$category)?>
<?php endforeach; ?></div>