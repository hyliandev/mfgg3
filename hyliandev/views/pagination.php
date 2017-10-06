<div class="row">
	<div class="col-6 text-left">
		<?php if($page > 1): ?>
			<a href="<?=url() . '/' . $url?>/page/<?=$page - 1?>">
				Previous
			</a>
		<?php endif; ?>
	</div>
	
	<div class="col-6 text-right">
		<?php if($page < $pageCount): ?>
			<a href="<?=url() . '/' . $url?>/page/<?=$page + 1?>">
				Next
			</a>
		<?php endif; ?>
	</div>
</div>