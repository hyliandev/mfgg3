<form method="post">
	<?=field([
		'type'=>'text',
		'name'=>'username',
		'title'=>'Username',
		'required'=>true,
		'error'=>isset($_POST['username']) && !$username
	])?>
	
	<?=field([
		'type'=>'password',
		'name'=>'password',
		'title'=>'Password',
		'required'=>true,
		'error'=>isset($_POST['password']) && !$password
	])?>
	
	<div>
		<button type="submit" class="btn btn-primary">
			Log In
		</button>
		
		<button type="reset" class="btn btn-secondary">
			Reset
		</button>
	</div>
</form>