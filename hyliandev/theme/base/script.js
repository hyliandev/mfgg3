// Document ready

$(function(){
	prepareForm();
});










// == FORM FUNCTIONS ==

function checkForm(e){
	clearForm(this);
	
	var hasError=false;
	
	var list=$(this).find('[data-required]').get();
	for(var i in list){
		var $field=$(list[i]);
		
		if($field.val().length <= 0){
			hasError=true;
			$field.addClass('form-control-danger').closest('label').addClass('has-danger').find('strong').addClass('text-danger');
		}
	}
	
	if(hasError){
		e.preventDefault();
	}
}

function clearForm(f){
	if(f.nodeType == undefined){
		f=this;
	}
	
	$(f).find('.form-control-danger').removeClass('form-control-danger');
	$(f).find('.text-danger').removeClass('text-danger');
	$(f).find('.has-danger').removeClass('has-danger');
}

function prepareForm(){
	var list=$('form').get();
	for(var i in list){
		var $form=$(list[i]).submit(checkForm).on('reset',clearForm);
		
		$form.find('[required]').attr('required',false).attr('data-required',true);
	}
}