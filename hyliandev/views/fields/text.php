<input
	type="<?=$type?>"
	name="<?=$name?>"
	class="form-control <?=$error ? 'form-control-danger' : ''?>"
	value="<?=$_POST[$name]?>"
	placeholder="<?=$title?>"
	<?=$required ? 'required' : ''?>
>