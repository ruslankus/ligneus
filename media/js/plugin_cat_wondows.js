// JavaScript Document
$(document).ready(function(e) {
    
	$('.numbers').click(function(e) {
        
		 $('.numbers').each(function() {
            $(this).removeClass('num_active');
        });
		
		$(this).addClass('num_active');
		var pos = $(this).html();
		r_pos = (pos-1)*550;
		$('#plugin_slide').animate({right:r_pos+"px"},500);
		$(this).unbind('mouseenter');
		
    });	
	
});