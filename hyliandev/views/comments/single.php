<div class="card">
	<div class="card-header">
		<?=User::ShowUsername($user)?>
		<small>
			<?=date('m/d/Y g:i:sa',$date)?>
		</small>
	</div>
	
	<div class="card-block">
		<?=format($message)?>
	</div>
</div>