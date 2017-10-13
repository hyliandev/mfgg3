<?php
$user=Users::Read(['uid'=>$uid]);
?>

<div class="card">
	<div class="card-header">
		<a href="<?=$url = url() . '/updates/' . $nid . '-' . titleToSlug($title) . '/'?>">
			<?=$title?>
		</a>
	</div>
	
	<div class="card-block">
		<div class="row">
			<div class="col-12 col-lg-3 text-center">
				<p>
					<?=User::ShowUsername($user)?>
				</p>
				
				<?=displayDate($date)?>
			</div>
			
			<div class="col-12 col-lg-9">
				<?=format($message)?>
			</div>
		</div>
	</div>
	
	<div class="card-footer">
		<a href="<?=$url?>">
			<?=lang('comments-name')?> (<?=$comments?>)
		</a>
	</div>
</div>