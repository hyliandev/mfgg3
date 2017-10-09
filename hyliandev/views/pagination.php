<div class="row">
	<div class="col-6 text-left">
		<?php if($page > 1): ?>
			<a class="btn btn-secondary" href="<?=url() . '/' . $url?>/<?=$page - 1?>">
				Previous
			</a>
		<?php endif; ?>
	</div>
	
	<div class="col-6 text-right">
		<?php if($page < $pageCount): ?>
			<a class="btn btn-secondary" href="<?=url() . '/' . $url?>/<?=$page + 1?>">
				Next
			</a>
		<?php endif; ?>
	</div>
	
	<div class="col-12 text-center"><?php for($i=0;$i<$pageCount;$i++): ?>
		<a class="btn btn-secondary <?=$page == $i + 1 ? 'disabled' : ''?>" href="<?=url()?>/<?=$url?>/<?=$i + 1?>">
			<?=$i + 1?>
		</a>
	<?php endfor; ?></div>
</div>