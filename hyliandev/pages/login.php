<?php
$view='form';
$login=[];

if(User::GetUser()){
	$view='already-logged-in';
}elseif(
	!empty($username=$_POST['username']) && !empty($password=$_POST['password'])
){
	$login=User::Login($username,$password);
	
	if($login['username'] && $login['password'] && $login['attempts']){
		$view='success';
	}
}
?>
<h1>Log In</h1>

<div class="card">
	<div class="card-block">
		<?=view('login/' . $view,$login)?>
	</div>
</div>