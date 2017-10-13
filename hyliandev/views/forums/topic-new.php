<h1>
	New Topic in
	<?=$title?>
</h1>

<form method="post" class="new-topic-form">

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
			'title'=>'Title',
			'name'=>'title',
			'type'=>'text',
			'required'=>true
		])?>
		
		<?=field([
			'title'=>'Message',
			'name'=>'message',
			'type'=>'textarea-bbcode',
			'required'=>true
		])?>
		
		<div>
			<button type="submit" class="btn btn-blue">
				<?=lang('misc-submit')?>
			</button>
			
			<button type="submit" class="btn btn-success" data-bbcode-preview>
				<?=lang('misc-preview')?>
			</button>
			
			<button type="reset" class="btn btn-warning">
				<?=lang('misc-reset')?>
			</button>
		</div>
	</div>
</div>

</form>