jQuery(document).ready(function($) {

	$(".iewide").mousedown(function(){
		if($.browser.msie) {
			$(this).css("width","auto");
		}
	});
	$(".iewide").change(function(){
		if ($.browser.msie) {
			$(this).css("width","200px");
		}
	});
	$(".iewide").blur(function(){
		if ($.browser.msie) {
			$(this).css("width","200px");
		}
	});
	
	$('.placeholder').each(function(i) {
       
		var item = $(this);
		var text = item.attr('rel');
		var form = item.parents('form:first');

		if (item.val() === '')
		{
			item.val(text);
			item.css('color', '#888');
		}
	   
		item.bind('focus.placeholder', function(event) {
			if (item.val() === text)
				item.val('');
			item.css('color', '');
		});
	   
		item.bind('blur.placeholder', function(event) {
			if (item.val() === '')
			{
				item.val(text);
				item.css('color', '#888');
			}
		});
	   
		form.bind("submit.placeholder", function(event) {
		  if (item.val() === text)
			item.val("");
		});    
	   
	});
	
	window.setTimeout(function(){ $('#impact-updated').fadeOut(); }, 3333);
	window.setTimeout(function(){ $('#impact-must-choose').fadeOut(); }, 3333);
	window.setTimeout(function(){ $('#impact-deleted').fadeOut(); }, 3333);
	window.setTimeout(function(){ $('#impact-imported').fadeOut(); }, 3333);
});
