// Document ready

$(function(){
	prepareForm();
	fixNavbar();
	
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
		$('body,html').stop().animate({
			scrollTop:$(this).offset().top + 'px'
		},100);
	}
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
		
		$form.find('[required]').attr('required',false).attr('data-required',true);
	}
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