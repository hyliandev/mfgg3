<?php
$type_view=$type;

if(!file_exists('./views/fields/' . $type . '.php')){
	$type_view='text';
}
?>
<div class="field <?=$error ? 'has-danger' : ''?>">
	<?php if($has_label=(!in_array($type,[ 'checkbox','radio' ]) && !$multiple)): ?><label><?php endif; ?>
	<strong><?=$title?></strong>
	<?=view('fields/' . $type_view,$vars)?>
	<?php if($has_label): ?></label><?php endif; ?>
</div>