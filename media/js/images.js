// JavaScript Document
$(document).ready(function(e) {
    
	$('.img_thumb a img').click(function(e) {
		
		var src = $(this).attr('src');
		$('.main_image img').attr('src',src);
		$('.main_image a').attr('href',src);
		//var pos = $('.img_thumb a:first-child');
		//$.scrollTo(pos);
		return false;
		
		
		
		
    });
	
});