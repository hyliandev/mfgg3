<?php
if($wasLoggedIn = $_SESSION['uid']){
	unset($_SESSION['uid']);
}
?>

<h1>Log Out</h1>

<div class="card card-block">
	<?php if($wasLoggedIn): ?>
		You've successfully been logged out!
	<?php else: ?>
		You're already logged out!
	<?php endif; ?>
</div>