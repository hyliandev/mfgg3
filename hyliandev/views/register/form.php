<form method="post">

<div class="card">
	<div class="card-header">
		Basic Information
	</div>
	
	<div class="card-block">
		<?=field([
			'name'=>'username',
			'type'=>'text',
			'title'=>'Username',
			'required'=>true
		])?>
		
		<?=field([
			'name'=>'password',
			'type'=>'password',
			'title'=>'Password',
			'required'=>true
		])?>
		
		<?=field([
			'name'=>'email',
			'type'=>'email',
			'title'=>'Email Address',
			'required'=>true
		])?>
	</div>
	
	<div class="card-header">
		Submit
	</div>
	
	<div class="card-block">
		<button type="submit" class="btn btn-primary">
			Log In
		</button>
		
		<button type="reset" class="btn btn-secondary">
			Reset
		</button>
	</div>
</div>

</form>