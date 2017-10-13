<div class="card-header">
	Testing
</div>

<div class="card-block">
	<div class="row">
		<div class="col-12 col-lg-3 text-center">
			<?=User::ShowUsername($user)?>
			
			<br>
			
			<?=date('m/d/Y g:i:sa',$date)?>
		</div>
		
		<div class="col-12col-lg-9">
			<?=format($message)?>
		</div>
	</div>
</div>