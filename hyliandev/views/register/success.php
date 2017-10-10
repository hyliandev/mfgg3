<div class="card">
	<div class="card-block">
		You've successfully registered an account with the username <?=User::ShowUsername(Users::Read(['username'=>$_POST['username']]))?>!
		
		<br><br>
		
		<a href="<?=url()?>/login/">Click here</a> to log in.
	</div>
</div>