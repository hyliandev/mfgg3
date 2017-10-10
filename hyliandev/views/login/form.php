<form method="post">
	<?=field([
		'type'=>'text',
		'name'=>'username',
		'title'=>'Username',
		'required'=>true,
		'error'=>$unerror=(isset($_POST['username']) && !$username) ? 'Incorrect username' : ''
	])?>
	
	<?=field([
		'type'=>'password',
		'name'=>'password',
		'title'=>'Password',
		'required'=>true,
		'error'=>!$unerror && isset($_POST['password']) && !$password ? 'Incorrect password' : false
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