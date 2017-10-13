<div class="topic">
	<div class="card-footer">
		<div class="flex-row">
			<div class="flex-column flex-column-grow">
				<a href="<?=url()?>/forums/topic/<?=$tid?>-<?=titleToSlug($title)?>">
					<?=$title?>
				</a>
			</div>
			
			<div class="flex-column">
				Posted by <?=User::ShowUsername($user)?>
				<?=date('m/d/Y g:i:sa',$date)?>
			</div>
		</div>
	</div>

	<div class="card-block">
		<div class="flex-row">
			<a href="<?=url()?>/forums/forum/<?=$pid?>/mark-as-read/<?=$tid?>" class="flex-column">
				<span class="fa fa-2x fa-star-o"></span>
			</a>
			
			<a href="<?=url()?>/forums/tag/<?=$tag?>" class="flex-column">
				#<?=$tag?>
			</a>
			
			<div class="flex-column">
				<?=$views?>
				Views
			</div>
			
			<div class="flex-column">
				<?=$replies?>
				Replies
			</div>
			
			<div class="flex-column">
				Last post by
				Lol
			</div>
		</div>
	</div>
</div>