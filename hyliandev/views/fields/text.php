<input
	type="<?=$type?>"
	name="<?=$name?>"
	class="form-control <?=$error ? 'form-control-danger' : ''?>"
	value="<?=$_POST[$name]?>"
	placeholder="<?=$title?>"
	<?php if($minlength) echo 'minlength="' . $minlength . '"'; ?>
	<?php if($maxlength) echo 'maxlength="' . $maxlength . '"'; ?>
	<?=$required ? 'required' : ''?>
>