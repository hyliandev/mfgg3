<h1>
	New Topic in
	<?=format($title)?>
</h1>

<form method="post" class="new-stopic-form">

<div class="card">
	<div class="bbcode-preview-container">
		<div class="card-header">
			Preview
		</div>
		
		<div class="card-block">
			<div id="bbcode-preview"></div>
		</div>
	</div>
	
	<div class="card-header">
		Information
	</div>
	
	<div class="card-block">
		<?=field([
			'title'=>'Message',
			'name'=>'message',
			'type'=>'textarea-bbcode',
			'error'=>$errors['message'],
			'tabindex'=>2,
			'required'=>true
		])?>
		
		<div>
			<button type="submit" class="btn btn-blue" tabindex="3">
				<?=lang('misc-submit')?>
			</button>
			
			<button type="submit" class="btn btn-success" tabindex="4" data-bbcode-preview>
				<?=lang('misc-preview')?>
			</button>
			
			<button type="reset" class="btn btn-warning" tabindex="5">
				<?=lang('misc-reset')?>
			</button>
		</div>
	</div>
</div>

</form>