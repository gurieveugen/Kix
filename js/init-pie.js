jQuery(function() {
	if(window.PIE){
		jQuery('.btn-login, #nav ul, .btn-blue, .slide, .tab-link, .section .image, .form-subscribe input, .form-subscribe textarea, .form-app input, .form-app textarea, .slider-landing, .slider-landing li, .register-form input, .register-form textarea').each(function(){
			PIE.attach(this);
		});
	}
});