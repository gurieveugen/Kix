$(function() {
	$('.btn-nav-m').click(function(){
		//$('#header nav').toggleClass('open');
		$('#header nav').slideToggle();
		
	});
	$('#nav i').click(function(){
		//$(this).parent().parent().toggleClass('open');
		$(this).parent().parent().find('ul').slideToggle();
		return false;
	});
});
