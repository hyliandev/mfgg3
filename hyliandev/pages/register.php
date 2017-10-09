<h1>Register An Account</h1>

<?php if(User::GetUser()){
	echo view('register/already-logged-in');
}else{
	echo view('register/form');
}
?>