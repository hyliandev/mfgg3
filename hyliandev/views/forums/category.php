<div class="card-header">
	<a href="<?=url()?>/forums/category/<?=$fid?>-<?=titleToSlug($title)?>">
		<?=$title?>
	</a>
</div>

<?php foreach(Forums::Read(['pid'=>$fid]) as $forum): ?>
	<?=view('forums/forum',$forum)?>
<?php endforeach; ?>