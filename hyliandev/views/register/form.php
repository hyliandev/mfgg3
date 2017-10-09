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
			//'minlength'=>3,
			'maxlength'=>32,
			'required'=>true,
			'error'=>$errors['username']
		])?>
		
		<?=field([
			'name'=>'password',
			'type'=>'password',
			'title'=>'Password',
			'minlength'=>5,
			'required'=>true,
			'error'=>$errors['password']
		])?>
		
		<?=field([
			'name'=>'email',
			'type'=>'text',
			'title'=>'Email Address',
			'required'=>true,
			'error'=>$errors['email']
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

<?=debug($errors)?>