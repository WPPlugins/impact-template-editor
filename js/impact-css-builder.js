function insertAtCaret(obj, text) {
	if(document.selection) {
		obj.focus();
		var orig = obj.value.replace(/\r\n/g, "\n");
		var range = document.selection.createRange();

		if(range.parentElement() != obj) {
			return false;
		}

		range.text = text;
		
		var actual = tmp = obj.value.replace(/\r\n/g, "\n");

		for(var diff = 0; diff < orig.length; diff++) {
			if(orig.charAt(diff) != actual.charAt(diff)) break;
		}

		for(var index = 0, start = 0; 
			tmp.match(text) 
				&& (tmp = tmp.replace(text, "")) 
				&& index <= diff; 
			index = start + text.length
		) {
			start = actual.indexOf(text, index);
		}
	} else if(obj.selectionStart) {
		var start = obj.selectionStart;
		var end   = obj.selectionEnd;

		obj.value = obj.value.substr(0, start) 
			+ text 
			+ obj.value.substr(end, obj.value.length);
	}
	
	if(start != null) {
		setCaretTo(obj, start + text.length);
	} else {
		obj.value += text;
	}
}
	
function setCaretTo(obj, pos) {
	if(obj.createTextRange) {
		var range = obj.createTextRange();
		range.move('character', pos);
		range.select();
	} else if(obj.selectionStart) {
		obj.focus();
		obj.setSelectionRange(pos, pos);
	}
}

jQuery(document).ready(function($) {

	// Variables
	var catalyst_css_builder_nav_all = $('.catalyst-css-builder-nav-all');
	
	catalyst_css_builder_nav_all.click(function() {
		var css_nav_id = $(this).attr('id');
		$('.catalyst-all-css-builder').hide();
		$('#'+css_nav_id+'-box').show();
		catalyst_css_builder_nav_all.removeClass('catalyst-options-nav-active');
		$('#'+css_nav_id).addClass('catalyst-options-nav-active');
	});
	
	$('#show-hide-custom-css-builder').click(function() {
		$('#catalyst-custom-css-builder').animate({"height": "toggle"}, { duration: 300 });
	});
});