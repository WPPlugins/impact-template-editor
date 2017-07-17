jQuery(document).ready(function($) {

	if( $.browser.msie ) {
		$('#impact-ie-warning').dialog(
		{
			open:function()
			{
			},
			autoOpen: false,
			width: 330,
		});
		$('#impact-ie-warning').dialog('open');
	}
	
	function show_message(response) {
		$('.ajax-loading-img').fadeOut();  
		$('#impact-saved').html(response).fadeIn();
		window.setTimeout(function(){
			$('#impact-saved').fadeOut(); 
		}, 3333);
	}
		
	$('form#template-data-form').submit(function() {
		$('.ajax-loading-img').fadeIn(); 
		var data = $(this).serialize();
		jQuery.post(ajaxurl, data, function(response) {
			if(response) {
				show_message(response);
			}
		});
		
		return false;
	});
	
	$('form#template-data-form').one('submit', function() {
		var template_id = $(":input[name='template_data[template_id]']").val();
		var template_option = '<option value="' + template_id + '">' + template_id + '</option>';
		$('#templates_edit_list').prepend(template_option).val(template_option);
		$('#templates_delete_list').prepend(template_option).val(template_option);
	});

	$('#show-options-button')
	.click(function()
	{
		var x = $(this).position().left + $(this).outerWidth();
		var y = $(this).position().top - $(document).scrollTop();
		$('#template-options').dialog(
		{
			open:function()
			{
				$('#options-accordion').accordion({autoHeight: false, collapsible: true, active: false});
			},
			autoOpen: false,
			width: 330,
		});//.parent().appendTo($('#template-data-form'));
		$('#template-options').dialog('open');
		$('#template-options').dialog( 'option', 'position', [x,y] );
	});
	
	$('#show-css-builder-button')
	.click(function()
	{
		var x = $(this).position().left + $(this).outerWidth();
		var y = $(this).position().top - $(document).scrollTop() + 35;
		$('#css-builder').dialog(
		{
			autoOpen: false,
			width: 500,
		});
		$('#css-builder').dialog('open');
		$('#css-builder').dialog( 'option', 'position', [x,y] );
	});
	
	function horiz_width_change() {
		var sidebar = $(":input[name='template_data[sidebar_template]']").val();
		var content_width = $(":input[name='template_data[main_content_width]']").val();
		var lr_padding = $(":input[name='template_data[lr_content_padding]']").val();
		var lr_container = $(":input[name='template_data[lr_container_padding]']").val();
		var container_pad = lr_container * 2;
		var divider_value = $(':input[name="template_data[divider_width]"]').val();

		if( sidebar === 'none' ){
			var horiz_pad = lr_padding * 2;
			var sidebar_width = 0;
			var sidebar2_width = 0;
			var divider_width = 0;
		}else if( !(lr_padding === 0) && ( sidebar === 'left' || sidebar === 'right' ) ){
			var horiz_pad = lr_padding * 4;
			var sidebar_width = $(":input[name='template_data[sidebar_width]']").val();
			var sidebar2_width = 0;
			var divider_width = divider_value;
		}else if( !(lr_padding === 0) && ( sidebar === 'double_left' || sidebar === 'double_right' || sidebar === 'double' ) ){
			var horiz_pad = lr_padding * 6;
			var sidebar_width = $(":input[name='template_data[sidebar_width]']").val();
			var sidebar2_width = $(":input[name='template_data[sidebar2_width]']").val();
			var divider_width = divider_value * 2;
		}else if( lr_padding === 0 && ( sidebar === 'left' || sidebar === 'right' ) ){
			var sidebar_width = $(":input[name='template_data[sidebar_width]']").val();
			var sidebar2_width = 0;
			var divider_width = divider_value;
		}else if( lr_padding === 0 && ( sidebar === 'double_left' || sidebar === 'double_right' || sidebar === 'double' ) ){
			var sidebar_width = $(":input[name='template_data[sidebar_width]']").val();
			var sidebar2_width = $(":input[name='template_data[sidebar2_width]']").val();
			var divider_width = divider_value * 2;
		}
		var calculated_ints = parseInt(content_width) + parseInt(sidebar_width) + parseInt(sidebar2_width) + parseInt(horiz_pad) + parseInt(container_pad) + parseInt(divider_width);
		var calculated_width = calculated_ints + 'px';
		
		$('#calculated_width').text(calculated_width);
	}
	
	$('.horiz-width').change( function() {
		horiz_width_change();
	});
	
	horiz_width_change();
	
	function frame_change() {
		var header_template = $(':input[name="template_data[header_template]"]').val();
		var footer_template = $(':input[name="template_data[footer_template]"]').val();
		var sidebar_template = $(':input[name="template_data[sidebar_template]"]').val();
		
		if(header_template == 'fixed') {
			$('#after-header-outer').prependTo('#impact-page-wrap').show();
			$('#impact-header-outer').prependTo('#impact-page-wrap').show();
			$('#before-header-outer').prependTo('#impact-page-wrap').show();
		} else if(header_template == 'fluid') {
			$('#after-header-outer').prependTo('#impact-superwrap').show();
			$('#impact-header-outer').prependTo('#impact-superwrap').show();
			$('#before-header-outer').prependTo('#impact-superwrap').show();
		}
		else if(header_template == 'none') {
			$('#impact-header-outer').hide();
		}
		
		if(footer_template == 'fixed') {
			$('#before-footer-outer').appendTo('#impact-page-wrap').show();
			$('#impact-footer-outer').appendTo('#impact-page-wrap').show();
			$('#after-footer-outer').appendTo('#impact-page-wrap').show();
		} else if(footer_template == 'fluid') {
			$('#before-footer-outer').appendTo('#impact-superwrap').show();
			$('#impact-footer-outer').appendTo('#impact-superwrap').show();
			$('#after-footer-outer').appendTo('#impact-superwrap').show();
		}
		else if(footer_template == 'none') {
			$('#impact-footer-outer').hide();
		}
		
		if(sidebar_template == 'left') {
			$('#impact-content-sidebar-wrap').css('float','left');
			$('#impact-sidebar-wrap').css('float','left').show();
			$('#impact-content-wrap').css('float','right');
			$('#impact-sidebar2-wrap').hide();
		} else if(sidebar_template == 'right') {
			$('#impact-content-sidebar-wrap').css('float','left');
			$('#impact-sidebar-wrap').css('float','right').show();
			$('#impact-content-wrap').css('float','left');
			$('#impact-sidebar2-wrap').hide();
		} else if(sidebar_template == 'double') {
			$('#impact-content-sidebar-wrap').css('float','left');
			$('#impact-sidebar-wrap').css('float','left').show();
			$('#impact-content-wrap').css('float','right');
			$('#impact-sidebar2-wrap').css('float','right').show();
		} else if(sidebar_template == 'double_right') {
			$('#impact-content-sidebar-wrap').css('float','left');
			$('#impact-sidebar-wrap').css('float','right').show();
			$('#impact-content-wrap').css('float','left');
			$('#impact-sidebar2-wrap').css('float','right').show();
		} else if(sidebar_template == 'double_left') {
			$('#impact-content-sidebar-wrap').css('float','right');
			$('#impact-sidebar-wrap').css('float','left').show();
			$('#impact-content-wrap').css('float','right');
			$('#impact-sidebar2-wrap').css('float','left').show();
		}
		else if(sidebar_template == 'none') {
			$('#impact-sidebar-wrap').hide();
			$('#impact-sidebar2-wrap').hide();
		}
	}
	
	$('.frame').change(function() {
		frame_change();
	});
	
	frame_change();
	
	function border_change() {
		var border_style = $(':input[name="template_data[border_style]"]').val();
		var border_color = $(':input[name="template_data[border_color]"]').val();
		var main_tb_border_thickness = $(':input[name="template_data[main_tb_border_thickness]"]').val();
		var main_lr_border_thickness = $(':input[name="template_data[main_lr_border_thickness]"]').val();
		
		$('#impact-page-wrap').css({'border-top' : main_tb_border_thickness + 'px ' + border_style + ' #' + border_color, 'border-bottom' : main_tb_border_thickness + 'px ' + border_style + ' #' + border_color, 'border-left' : main_lr_border_thickness + 'px ' + border_style + ' #' + border_color, 'border-right' : main_lr_border_thickness + 'px ' + border_style + ' #' + border_color, });
	}
	
	$('.border').change(function() {
		border_change();
	});
	
	border_change();
	
	function bg_option_change() {
		var main_bg_type = $(':input[name="template_data[main_bg_type]"]').val();
		var main_bg_color = $(':input[name="template_data[main_bg_color]"]').val();
		var main_bg_image_name = $(':input[name="template_data[main_bg_image_name]"]').val();
		
		if (main_bg_type == 'color') {
			$('#impact-superwrap').css('background', '#' + main_bg_color);
		} else {
			$('#impact-superwrap').css('background', '#' + main_bg_color + ' url(' + main_bg_image_name + ') ' + main_bg_type);
		}
		
		var wrap_bg_type = $(':input[name="template_data[wrap_bg_type]"]').val();
		var wrap_bg_color = $(':input[name="template_data[wrap_bg_color]"]').val();
		var wrap_bg_image_name = $(':input[name="template_data[wrap_bg_image_name]"]').val();
		
		if (wrap_bg_type == 'color') {
			$('#impact-page-wrap').css('background', '#' + wrap_bg_color);
		} else if (wrap_bg_type == 'transparent') {
			$('#impact-page-wrap').css('background', 'transparent');
		} else {
			$('#impact-page-wrap').css('background', 'url(' + wrap_bg_image_name + ') ' + wrap_bg_type);
		}
		
		var header_bg_type = $(':input[name="template_data[header_bg_type]"]').val();
		var header_bg_color = $(':input[name="template_data[header_bg_color]"]').val();
		var header_bg_image_name = $(':input[name="template_data[header_bg_image_name]"]').val();
		
		if (header_bg_type == 'color') {
			$('#impact-header-outer').css('background', '#' + header_bg_color);
		} else if (header_bg_type == 'transparent') {
			$('#impact-header-outer').css('background', 'transparent');
		} else {
			$('#impact-header-outer').css('background', 'url(' + header_bg_image_name + ') ' + header_bg_type);
		}
		
		var content_bg_type = $(':input[name="template_data[content_bg_type]"]').val();
		var content_bg_color = $(':input[name="template_data[content_bg_color]"]').val();
		var content_bg_image_name = $(':input[name="template_data[content_bg_image_name]"]').val();
		
		if (content_bg_type == 'color') {
			$('#impact-content-wrap').css('background', '#' + content_bg_color);
		} else if (content_bg_type == 'transparent') {
			$('#impact-content-wrap').css('background', 'transparent');
		} else {
			$('#impact-content-wrap').css('background', 'url(' + content_bg_image_name + ') ' + content_bg_type);
		}
		
		var sidebar_bg_type = $(':input[name="template_data[sidebar_bg_type]"]').val();
		var sidebar_bg_color = $(':input[name="template_data[sidebar_bg_color]"]').val();
		var sidebar_bg_image_name = $(':input[name="template_data[sidebar_bg_image_name]"]').val();
		
		if (sidebar_bg_type == 'color') {
			$('#impact-sidebar-wrap').css('background', '#' + sidebar_bg_color);
			$('#impact-sidebar2-wrap').css('background', '#' + sidebar_bg_color);
		} else if (sidebar_bg_type == 'transparent') {
			$('#impact-sidebar-wrap').css('background', 'transparent');
			$('#impact-sidebar-wrap2').css('background', 'transparent');
		} else {
			$('#impact-sidebar-wrap').css('background', '#' + sidebar_bg_color + ' url(' + sidebar_bg_image_name + ') ' + sidebar_bg_type);
			$('#impact-sidebar2-wrap').css('background', 'url(' + sidebar_bg_image_name + ') ' + sidebar_bg_type);
		}
		
		var footer_bg_type = $(':input[name="template_data[footer_bg_type]"]').val();
		var footer_bg_color = $(':input[name="template_data[footer_bg_color]"]').val();
		var footer_bg_image_name = $(':input[name="template_data[footer_bg_image_name]"]').val();
		
		if (footer_bg_type == 'color') {
			$('#impact-footer-outer').css('background', '#' + footer_bg_color);
		} else if (footer_bg_type == 'transparent') {
			$('#impact-footer-outer').css('background', 'transparent');
		} else {
			$('#impact-footer-outer').css('background', 'url(' + footer_bg_image_name + ') ' + footer_bg_type);
		}
	}
	
	$('.bg-option').change(function() {
		bg_option_change();
	});
	
	bg_option_change();

	function wimapa_change() {
		var header_height = $(':input[name="template_data[header_height]"]').val();
		var content_width = $(':input[name="template_data[main_content_width]"]').val();
		var sidebar_width = $(':input[name="template_data[sidebar_width]"]').val();
		var sidebar2_width = $(':input[name="template_data[sidebar2_width]"]').val();
		var footer_height = $(':input[name="template_data[footer_height]"]').val();
		var sidebar_template = $(':input[name="template_data[sidebar_template]"]').val();
		var tb_margin = $(':input[name="template_data[tb_margin]"]').val();
		var tb_content_margin = $(':input[name="template_data[tb_content_margin]"]').val();
		var tb_content_padding = $(':input[name="template_data[tb_content_padding]"]').val();
		var lr_content_padding = $(':input[name="template_data[lr_content_padding]"]').val();
		var lr_container_padding = $(':input[name="template_data[lr_container_padding]"]').val();
		var container_pad = lr_container_padding * 2;
		var divider_width = $(':input[name="template_data[divider_width]"]').val();
		
		if(  sidebar_template == 'left' || sidebar_template == 'right' )
		{
			var lr_sidebar_padding = lr_content_padding;
			var content_horizontal_padding = lr_content_padding * 4;
			sidebar2_width = 0;
			var template_wrap_width = parseInt(content_width) + parseInt(sidebar_width) + parseInt(content_horizontal_padding) + parseInt(container_pad) + parseInt(divider_width);
			var container_width = parseInt(content_width) + parseInt(sidebar_width) + parseInt(content_horizontal_padding) + parseInt(divider_width);
			var c_s_wrap_width = parseInt(content_width) + parseInt(sidebar_width) + parseInt(content_horizontal_padding) + parseInt(divider_width);
		}
		else if( sidebar_template == 'double_right' || sidebar_template == 'double_left' || sidebar_template === 'double' )
		{
			var lr_sidebar_padding = lr_content_padding;
			var content_horizontal_padding = lr_content_padding * 6;
			var c_s_horizontal_padding = lr_content_padding * 4;
			var template_wrap_width = parseInt(content_width) + parseInt(sidebar_width) + parseInt(sidebar2_width) + parseInt(content_horizontal_padding) + parseInt(container_pad) + parseInt(divider_width) + parseInt(divider_width);
			var container_width = parseInt(content_width) + parseInt(sidebar_width) + parseInt(sidebar2_width) + parseInt(content_horizontal_padding) + parseInt(divider_width) + parseInt(divider_width);
			var c_s_wrap_width = parseInt(content_width) + parseInt(sidebar_width) + parseInt(c_s_horizontal_padding) + parseInt(divider_width);
		}
		else if( sidebar_template == 'none' )
		{
			sidebar_width = 0;
			sidebar2_width = 0;
			divider_width = 0;
			var lr_sidebar_padding = 0;
			var content_horizontal_padding = lr_content_padding * 2;
			var template_wrap_width = parseInt(content_width) + parseInt(sidebar_width) + parseInt(content_horizontal_padding) + parseInt(container_pad) + parseInt(divider_width);
			var container_width = parseInt(content_width) + parseInt(sidebar_width) + parseInt(content_horizontal_padding) + parseInt(divider_width);
			var c_s_wrap_width = parseInt(content_width) + parseInt(sidebar_width) + parseInt(content_horizontal_padding) + parseInt(divider_width);
		}

		$('#impact-page-wrap').css({'width' : template_wrap_width + 'px', 'margin' : tb_margin + 'px' + ' auto'});
		$('#impact-header-wrap').css({'height' : header_height + 'px', 'width' : template_wrap_width + 'px'});
		$('#impact-container').css({'width' : container_width + 'px ', 'margin-top' : tb_content_margin + 'px', 'margin-bottom' : tb_content_margin + 'px', 'padding-left' : lr_container_padding + 'px', 'padding-right' : lr_container_padding + 'px'});
		$('#impact-content-sidebar-wrap').css( 'width', c_s_wrap_width + 'px ' );
		$('#impact-content-wrap').css({'width' : content_width + 'px', 'padding' : tb_content_padding + 'px ' + lr_content_padding + 'px'});
		$('#impact-sidebar-wrap').css({'width' : sidebar_width + 'px', 'padding' : tb_content_padding + 'px ' + lr_sidebar_padding + 'px'});
		$('#impact-sidebar2-wrap').css({'width' : sidebar2_width + 'px', 'padding' : tb_content_padding + 'px ' + lr_sidebar_padding + 'px'});
		$('#impact-footer-wrap').css({'height' : footer_height + 'px', 'width' : template_wrap_width + 'px'});
	}
	
	$('.wimapa').change(function() {
		wimapa_change();
	});
	
	wimapa_change();
	
	function impact_title_change() {
		var title_area = $(':input[name="template_data[title_area]"]').val();
		var logo_image = $(':input[name="template_data[logo_image]"]').val();
		var title_top_margin = $(':input[name="template_data[title_top_margin]"]').val();
		var title_left_margin = $(':input[name="template_data[title_left_margin]"]').val();
		
		if( title_area == 'none') {
			$('#impact-title').hide();
		} else if( title_area == 'text' ) {
			$('#impact-title').html('<span style="color:#222222;font-size:30px;font-family:Arial,Tahoma,Verdana;font-weight:bold;line-height:120%;margin:0;padding:0;">Text Title</span><br><span style="margin:0;padding:0;color:#888888;font-size:14px;font-style: italic;">Just another description</span>').css('margin', title_top_margin + 'px 0px 0px ' + title_left_margin + 'px').show();
		} else if( title_area == 'image' ) {
			$('#impact-title').html('<img src="' + logo_image + '" />').css('margin', title_top_margin + 'px 0px 0px ' + title_left_margin + 'px').show();
		}
	}
	
	$('.impact-title').change(function() {
		impact_title_change();
	});
	
	impact_title_change();
	
	function custom_css_change() {
		var custom_css = $(':input[name="template_data[custom_css]"]').val();
		
		$("#impact-custom-css").html('<style type="text/css">' + custom_css + '</style>');
	}
	
	$('.custom-css').keypress(function() {
		custom_css_change();
	});
	
	custom_css_change();
	
	function widget_area_option_change() {

		var before_page_wrap_align = $(':input[name="template_data[before_page_wrap_align]"]').val();
		var before_page_wrap_width = $(':input[name="template_data[before_page_wrap_width]"]').val();
		if( before_page_wrap_align == 'left' ) {
			$('#impact-before-page-wrap').removeClass('float-right').addClass('float-left');
		} else if( before_page_wrap_align == 'right' ) {
			$('#impact-before-page-wrap').removeClass('float-left').addClass('float-right');
		} else {
			$('#impact-before-page-wrap').removeClass('float-left float-right');
		}
		$('#before_page_wrap_checkbox').is(':checked') ? $('#impact-before-page-wrap').css({'height' : '50px', 'width' : before_page_wrap_width + 'px', 'background-color' : '#BFDCE4',	'border' : '1px solid #96BFBF' }).show() : $('#impact-before-page-wrap').hide();
		
		var before_header_align = $(':input[name="template_data[before_header_align]"]').val();
		var before_header_width = $(':input[name="template_data[before_header_width]"]').val();
		if( before_header_align == 'left' ) {
			$('#impact-before-header').removeClass('float-right').addClass('float-left');
		} else if( before_header_align == 'right' ) {
			$('#impact-before-header').removeClass('float-left').addClass('float-right');
		} else {
			$('#impact-before-header').removeClass('float-left float-right');
		}
		$('#before_header_checkbox').is(':checked') ? $('#impact-before-header').css({'height' : '50px', 'width' : before_header_width + 'px', 'background-color' : '#BFDCE4', 'border' : '1px solid #96BFBF' }).show() : $('#impact-before-header').hide();
		
		var in_header_align = $(':input[name="template_data[in_header_align]"]').val();
		var in_header_width = $(':input[name="template_data[in_header_width]"]').val();
		if( in_header_align == 'left' ) {
			$('#impact-in-header').removeClass('float-right').addClass('float-left');
		} else if( in_header_align == 'right' ) {
			$('#impact-in-header').removeClass('float-left').addClass('float-right');
		} else {
			$('#impact-in-header').removeClass('float-left float-right');
		}
		$('#in_header_checkbox').is(':checked') ? $('#impact-in-header').css({'height' : '50px', 'width' : in_header_width + 'px', 'background-color' : '#BFDCE4', 'border' : '1px solid #96BFBF' }).show() : $('#impact-in-header').hide();
		
		var after_header_align = $(':input[name="template_data[after_header_align]"]').val();
		var after_header_width = $(':input[name="template_data[after_header_width]"]').val();
		if( after_header_align == 'left' ) {
			$('#impact-after-header').removeClass('float-right').addClass('float-left');
		} else if( after_header_align == 'right' ) {
			$('#impact-after-header').removeClass('float-left').addClass('float-right');
		} else {
			$('#impact-after-header').removeClass('float-left float-right');
		}
		$('#after_header_checkbox').is(':checked') ? $('#impact-after-header').css({'height' : '50px', 'width' : after_header_width + 'px', 'background-color' : '#BFDCE4', 'border' : '1px solid #96BFBF' }).show() : $('#impact-after-header').hide();
		
		var before_container_align = $(':input[name="template_data[before_container_align]"]').val();
		var before_container_width = $(':input[name="template_data[before_container_width]"]').val();
		if( before_container_align == 'left' ) {
			$('#impact-before-container').removeClass('float-right').addClass('float-left');
		} else if( before_container_align == 'right' ) {
			$('#impact-before-container').removeClass('float-left').addClass('float-right');
		} else {
			$('#impact-before-container').removeClass('float-left float-right');
		}
		$('#before_container_checkbox').is(':checked') ? $('#impact-before-container').css({'height' : '50px', 'width' : before_container_width + 'px', 'background-color' : '#BFDCE4', 'border' : '1px solid #96BFBF' }).show() : $('#impact-before-container').hide();
		
		var before_content_align = $(':input[name="template_data[before_content_align]"]').val();
		var before_content_width = $(':input[name="template_data[before_content_width]"]').val();
		if( before_content_align == 'left' ) {
			$('#impact-before-content').removeClass('float-right').addClass('float-left');
		} else if( before_content_align == 'right' ) {
			$('#impact-before-content').removeClass('float-left').addClass('float-right');
		} else {
			$('#impact-before-content').removeClass('float-left float-right');
		}
		$('#before_content_checkbox').is(':checked') ? $('#impact-before-content').css({'height' : '50px', 'width' : before_content_width + 'px', 'background-color' : '#BFDCE4',	'border' : '1px solid #96BFBF' }).show() : $('#impact-before-content').hide();
		
		var after_content_align = $(':input[name="template_data[after_content_align]"]').val();
		var after_content_width = $(':input[name="template_data[after_content_width]"]').val();
		if( after_content_align == 'left' ) {
			$('#impact-after-content').removeClass('float-right').addClass('float-left');
		} else if( after_content_align == 'right' ) {
			$('#impact-after-content').removeClass('float-left').addClass('float-right');
		} else {
			$('#impact-after-content').removeClass('float-left float-right');
		}
		$('#after_content_checkbox').is(':checked') ? $('#impact-after-content').css({'height' : '50px', 'width' : after_content_width + 'px', 'background-color' : '#BFDCE4', 'border' : '1px solid #96BFBF' }).show() : $('#impact-after-content').hide();
		
		var before_sidebar_align = $(':input[name="template_data[before_sidebar_align]"]').val();
		var before_sidebar_width = $(':input[name="template_data[before_sidebar_width]"]').val();
		if( before_sidebar_align == 'left' ) {
			$('#impact-before-sidebar').removeClass('float-right').addClass('float-left');
		} else if( before_sidebar_align == 'right' ) {
			$('#impact-before-sidebar').removeClass('float-left').addClass('float-right');
		} else {
			$('#impact-before-sidebar').removeClass('float-left float-right');
		}
		$('#before_sidebar_checkbox').is(':checked') ? $('#impact-before-sidebar').css({'height' : '50px', 'width' : before_sidebar_width + 'px', 'background-color' : '#BFDCE4',	'border' : '1px solid #96BFBF' }).show() : $('#impact-before-sidebar').hide();
		
		var after_sidebar_align = $(':input[name="template_data[after_sidebar_align]"]').val();
		var after_sidebar_width = $(':input[name="template_data[after_sidebar_width]"]').val();
		if( after_sidebar_align == 'left' ) {
			$('#impact-after-sidebar').removeClass('float-right').addClass('float-left');
		} else if( after_sidebar_align == 'right' ) {
			$('#impact-after-sidebar').removeClass('float-left').addClass('float-right');
		} else {
			$('#impact-after-sidebar').removeClass('float-left float-right');
		}
		$('#after_sidebar_checkbox').is(':checked') ? $('#impact-after-sidebar').css({'height' : '50px', 'width' : after_sidebar_width + 'px', 'background-color' : '#BFDCE4', 'border' : '1px solid #96BFBF' }).show() : $('#impact-after-sidebar').hide();
		
		var before_sidebar2_align = $(':input[name="template_data[before_sidebar2_align]"]').val();
		var before_sidebar2_width = $(':input[name="template_data[before_sidebar2_width]"]').val();
		if( before_sidebar2_align == 'left' ) {
			$('#impact-before-sidebar2').removeClass('float-right').addClass('float-left');
		} else if( before_sidebar2_align == 'right' ) {
			$('#impact-before-sidebar2').removeClass('float-left').addClass('float-right');
		} else {
			$('#impact-before-sidebar2').removeClass('float-left float-right');
		}
		$('#before_sidebar2_checkbox').is(':checked') ? $('#impact-before-sidebar2').css({'height' : '50px', 'width' : before_sidebar2_width + 'px', 'background-color' : '#BFDCE4',	'border' : '1px solid #96BFBF' }).show() : $('#impact-before-sidebar2').hide();
		
		var after_sidebar2_align = $(':input[name="template_data[after_sidebar2_align]"]').val();
		var after_sidebar2_width = $(':input[name="template_data[after_sidebar2_width]"]').val();
		if( after_sidebar2_align == 'left' ) {
			$('#impact-after-sidebar2').removeClass('float-right').addClass('float-left');
		} else if( after_sidebar2_align == 'right' ) {
			$('#impact-after-sidebar2').removeClass('float-left').addClass('float-right');
		} else {
			$('#impact-after-sidebar2').removeClass('float-left float-right');
		}
		$('#after_sidebar2_checkbox').is(':checked') ? $('#impact-after-sidebar2').css({'height' : '50px', 'width' : after_sidebar2_width + 'px', 'background-color' : '#BFDCE4', 'border' : '1px solid #96BFBF' }).show() : $('#impact-after-sidebar2').hide();
		
		var after_container_align = $(':input[name="template_data[after_container_align]"]').val();
		var after_container_width = $(':input[name="template_data[after_container_width]"]').val();
		if( after_container_align == 'left' ) {
			$('#impact-after-container').removeClass('float-right').addClass('float-left');
		} else if( after_container_align == 'right' ) {
			$('#impact-after-container').removeClass('float-left').addClass('float-right');
		} else {
			$('#impact-after-container').removeClass('float-left float-right');
		}
		$('#after_container_checkbox').is(':checked') ? $('#impact-after-container').css({'height' : '50px', 'width' : after_container_width + 'px', 'background-color' : '#BFDCE4', 'border' : '1px solid #96BFBF' }).show() : $('#impact-after-container').hide();
		
		var before_footer_align = $(':input[name="template_data[before_footer_align]"]').val();
		var before_footer_width = $(':input[name="template_data[before_footer_width]"]').val();
		if( before_footer_align == 'left' ) {
			$('#impact-before-footer').removeClass('float-right').addClass('float-left');
		} else if( before_footer_align == 'right' ) {
			$('#impact-before-footer').removeClass('float-left').addClass('float-right');
		} else {
			$('#impact-before-footer').removeClass('float-left float-right');
		}
		$('#before_footer_checkbox').is(':checked') ? $('#impact-before-footer').css({'height' : '50px', 'width' : before_footer_width + 'px', 'background-color' : '#BFDCE4', 'border' : '1px solid #96BFBF' }).show() : $('#impact-before-footer').hide();
		
		var in_footer_align = $(':input[name="template_data[in_footer_align]"]').val();
		var in_footer_width = $(':input[name="template_data[in_footer_width]"]').val();
		if( in_footer_align == 'left' ) {
			$('#impact-in-footer').removeClass('float-right').addClass('float-left');
		} else if( in_footer_align == 'right' ) {
			$('#impact-in-footer').removeClass('float-left').addClass('float-right');
		} else {
			$('#impact-in-footer').removeClass('float-left float-right');
		}
		$('#in_footer_checkbox').is(':checked') ? $('#impact-in-footer').css({'height' : '50px', 'width' : in_footer_width + 'px', 'background-color' : '#BFDCE4', 'border' : '1px solid #96BFBF' }).show() : $('#impact-in-footer').hide();
		
		var after_footer_align = $(':input[name="template_data[after_footer_align]"]').val();
		var after_footer_width = $(':input[name="template_data[after_footer_width]"]').val();
		if( after_footer_align == 'left' ) {
			$('#impact-after-footer').removeClass('float-right').addClass('float-left');
		} else if( after_footer_align == 'right' ) {
			$('#impact-after-footer').removeClass('float-left').addClass('float-right');
		} else {
			$('#impact-after-footer').removeClass('float-left float-right');
		}
		$('#after_footer_checkbox').is(':checked') ? $('#impact-after-footer').css({'height' : '50px', 'width' : after_footer_width + 'px', 'background-color' : '#BFDCE4', 'border' : '1px solid #96BFBF' }).show() : $('#impact-after-footer').hide();
		
		var after_page_wrap_align = $(':input[name="template_data[after_page_wrap_align]"]').val();
		var after_page_wrap_width = $(':input[name="template_data[after_page_wrap_width]"]').val();
		if( after_page_wrap_align == 'left' ) {
			$('#impact-after-page-wrap').removeClass('float-right').addClass('float-left');
		} else if( after_page_wrap_align == 'right' ) {
			$('#impact-after-page-wrap').removeClass('float-left').addClass('float-right');
		} else {
			$('#impact-after-page-wrap').removeClass('float-left float-right');
		}
		$('#after_page_wrap_checkbox').is(':checked') ? $('#impact-after-page-wrap').css({'height' : '50px', 'width' : after_page_wrap_width + 'px', 'background-color' : '#BFDCE4',	'border' : '1px solid #96BFBF' }).show() : $('#impact-after-page-wrap').hide();
		
	}
	
	$('.widget-area-option').change(function() {
		widget_area_option_change();
	});
	
	widget_area_option_change();
	
	window.setTimeout(function(){ $('#impact-deleted').fadeOut(); }, 3333);
	
	$('.upload_image_button').click(function() {
		var field = $(this).attr('id').replace('button', 'name');
		openKCFinder(field);
	});
	
	function openKCFinder(field) {
	window.KCFinder = {
		callBack: function(value) {
			document.getElementById(field).value = value;
			if( field == 'logo_image_name' ) {
				impact_title_change();
			}
			else {
				bg_option_change();
			}
		}
	};
	window.open('../wp-content/plugins/impact/lib/kcfinder/browse.php', 'kcfinder',
        'status=0, toolbar=0, location=0, menubar=0, directories=0, ' +
        'resizable=1, scrollbars=0, width=800, height=600'
    );
}
	
});