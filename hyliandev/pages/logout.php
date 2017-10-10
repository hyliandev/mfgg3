<?php
if($wasLoggedIn = $_SESSION['uid']){
	unset($_SESSION['uid']);
}
?>

<h1>Log Out</h1>

<div class="card">
	<div class="card-block">
		<?php if($wasLoggedIn): ?>
			You've successfully been logged out!
		<?php else: ?>
			You're already logged out!
		<?php endif; ?>
		
		<?=view('redirect')?>
	</div>
</div>