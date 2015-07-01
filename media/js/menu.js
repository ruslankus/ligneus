// JavaScript Document
$(document).ready(function(e) {
	
	
	//Cufon.replace('#nav > li a',{hover:true});
	//Cufon.replace('#nav > li span:first-child');
	$('#nav .sub').css('display','none');
	
	$('#nav span').click(function(e) {
        $('.sub').slideToggle(200);
    });
	
	
	
	$('.sub').mouseleave(function(e) {
        $(this).slideUp(200);
    });
    
/*	$('#nav li').hover(
		function(){
			console.log($('span',this));
			
			$('ul',this).slideDown(200);	
		},
		function(){
			
			$('ul',this).slideUp(200);
		}
	); */
	
});