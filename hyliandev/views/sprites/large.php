<div class="card">
	<div class="card-header">
		<?=$title?>
	</div>
	
	<div class="card-block">
		<div class="resource-layout">
			<img src="<?=url()?>/../tcsms/thumbnail/1/<?=$thumbnail?>" class="resource-thumbnail">
			
			<div class="resource-description">
				<?=$description?>
			</div>
		</div>
		
		<div class="resource-action-bar">
			<a href="<?=url()?>/../tcsms/file/1/<?=$file?>" target="_blank">
				<span class="fa fa-download"></span>
				Download
			</a>
		</div>
	</div>
</div>