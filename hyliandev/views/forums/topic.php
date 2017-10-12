<div class="card-footer">
	<div class="flex-row">
		<div class="flex-column flex-column-grow">
			<a href="<?=url()?>/forums/topic/<?=$tid?>-<?=titleToSlug($title)?>">
				<?=$title?>
			</a>
		</div>
		
		<div class="flex-column">
			Posted by <?=User::ShowUsername(Users::Read(['uid'=>$poster_uid]))?>
			<?=date('m/d/Y g:i:sa',$date)?>
		</div>
	</div>
</div>

<div class="card-block">
	test
</div>