// Document ready

$(function(){
	prepareForm();
	fixNavbar();
	
	highlightJS();
	
	$('#show-menu').click(function(e){
		e.preventDefault();
		
		$('header nav ul.top-menu').stop().slideToggle(100);
	});
	
	$(document).click(function(e){
		if(window.innerWidth < 992 && !$('header nav').is(':hover')){
			$('header nav ul.top-menu').stop().slideUp(100);
		}
	});
	
	$(window).scroll(fixNavbar);
	
	$(window).resize(function(){
		$('header nav ul.top-menu').css('display','');
	});
	
	$('.no-js').removeClass('no-js');
	
	if($('.redirect-url').get().length){
		setTimeout(function(){
			window.location=$('.redirect-url').attr('href');
		},3000);
	}
	
	$('.bbcode-spoiler-container button.spoiler-button').click(spoilerButton);
	$('[data-bbcode]').click(bbcodeButton);
});










// == FORM FUNCTIONS ==

function checkForm(e){
	if($(this).attr('data-fasttrack')){
		return;
	}
	
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
		$('body,html').stop().animate({
			scrollTop:$(this).offset().top + 'px'
		},100);
	}
}

function checkRegistrationForm(e){
	if($(this).attr('data-fasttrack')){
		return;
	}
	
	e.preventDefault();
	
	$(this).attr('data-fasttrack');
	
	$.ajax({
		type:'POST',
		url:API(),
		data:{
			data:{
				purpose:'verify-registration',
				username:$(this).find('[name="username"]').val(),
				password:$(this).find('[name="password"]').val(),
				email:$(this).find('[name="email"]').val()
			}
		}
	}).done(function(response){
		var hasError=false;
		
		for(var i in response.data){
			var error=response.data[i];
			
			if(!error){
				continue;
			}
			
			hasError=true;
			
			setFieldError(i,error);
		}
		
		if(!hasError){
			$('form.registration-form').attr('data-fasttrack',true).submit();
		}
	});
}

function clearForm(f){
	if(f.nodeType == undefined){
		f=this;
	}
	
	$(f).find('.form-control-danger').removeClass('form-control-danger');
	$(f).find('.text-danger').removeClass('text-danger');
	$(f).find('.has-danger').removeClass('has-danger');
	$(f).find('.error-info').html('');
}

function prepareForm(){
	var list=$('form').get();
	for(var i in list){
		var $form=$(list[i]).submit(checkForm).on('reset',clearForm);
		
		if($form.hasClass('registration-form')){
			$form.submit(checkRegistrationForm);
		}
		
		$form.find('[required]').attr('required',false).attr('data-required',true);
	}
}

function setFieldError(field,error){
	var $field=$('.field [name="' + field + '"]').closest('.field');
	
	$field.addClass('has-danger');
	$field.find('strong').addClass('text-danger');
	$field.find('.form-control').addClass('form-control-danger');
	$field.find('small').html(error);
}










// == NAVBAR FUNCTIONS ==

function fixNavbar(){
	var scroll=$(window).scrollTop();
	var $nav=$('header nav');
	
	if(window.navTop == undefined){
		window.navTop=$nav.offset().top + parseInt($nav.css('padding-top'));
	}
	
	var func='remove';
	
	if(scroll > window.navTop){
		func='add';
		$('header').css('margin-bottom',$nav.outerHeight());
	}else{
		$('header').css('margin-bottom','');
	}
	
	$nav[func + 'Class']('stick');
}










// == BBCODE FUNCTIONS ==

function bbcodeButton(e){
	e.preventDefault();
	
	var $textarea=$(this).closest('.field').find('textarea');
	
	var start=$textarea.prop('selectionStart');
	
	if(!start){
		start=0;
	}
	
	var pre=$textarea.val().substring(0,start);
	var post=$textarea.val().substring(start);
	
	var bbcode=$(this).attr('data-bbcode');
	
	var final=bbcode.indexOf(']') + 1;
	
	if(final < 0){
		final=0;
	}
	
	final+=start;
	
	$textarea.val(
		pre
		+
		bbcode
		+
		post
	).prop('selectionStart',final).prop('selectionEnd',final).focus();
}

function highlightJS(){
	var list=$('.bbcode-code').get();
	for(var i in list){
		hljs.highlightBlock(list[i]);
	}
}

function spoilerButton(){
	$(this).closest('.bbcode-spoiler-container').find('> .bbcode-spoiler').stop().slideToggle(100);
}