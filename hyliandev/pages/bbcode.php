<div class="card">
	<div class="card-header">
		Testing BBCode
	</div>
	
	<div class="card-block">
		<?=format(preFormat($_POST['message']))?>
	</div>
	
	<div class="card-header">
		Type
	</div>
	
	<div class="card-block">
		<form method="post">
			<?=field([
				'title'=>'Message',
				'name'=>'message',
				'type'=>'textarea'
			])?>
			
			<button class="btn btn-primary" type="submit">Submit</button>
		</form>
	</div>
</div>