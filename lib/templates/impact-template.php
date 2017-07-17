<?php
//** Determin Dynamic Dimensions **//
$main_content_width = $template_data['main_content_width'];
$lr_content_padding = $template_data['lr_content_padding'];
$lr_container_padding = $template_data['lr_container_padding'];
$container_pad = $lr_container_padding * 2;

if( $template_data['sidebar_template'] == 'left' )
{
	$sb_width = $template_data['sidebar_width'];
	$sb_float = 'left';
	$main_content_float = 'right';
	$content_padding_left = $lr_content_padding;
	$content_padding_right = $lr_content_padding;
	$sidebar_padding_left = $lr_content_padding;
	$sidebar_padding_right = $lr_content_padding;
	$content_horizontal_padding = $lr_content_padding * 4;
	$divider_padding = $template_data['divider_width'];
	$template_wrap_width = $main_content_width + $sb_width + $content_horizontal_padding + $container_pad + $divider_padding;
	$container_width = $main_content_width + $sb_width + $content_horizontal_padding + $divider_padding;
	$content_sidebar_wrap_width = $main_content_width + $sb_width + $content_horizontal_padding + $divider_padding;
}
elseif( $template_data['sidebar_template'] == 'right' )
{
	$sb_width = $template_data['sidebar_width'];
	$sb_float = 'right';
	$main_content_float = 'left';
	$content_padding_left = $lr_content_padding;
	$content_padding_right = $lr_content_padding;
	$sidebar_padding_left = $lr_content_padding;
	$sidebar_padding_right = $lr_content_padding;
	$content_horizontal_padding = $lr_content_padding * 4;
	$divider_padding = $template_data['divider_width'];
	$template_wrap_width = $main_content_width + $sb_width + $content_horizontal_padding + $container_pad + $divider_padding;
	$container_width = $main_content_width + $sb_width + $content_horizontal_padding + $divider_padding;
	$content_sidebar_wrap_width = $main_content_width + $sb_width + $content_horizontal_padding + $divider_padding;
}
elseif( $template_data['sidebar_template'] == 'double' )
{
	$sb_width = $template_data['sidebar_width'];
	$sb2_width = $template_data['sidebar2_width'];
	$sb_float = 'left';
	$sb2_float = 'right';
	$main_content_float = 'right';
	$content_sidebar_wrap_float = 'left';
	$content_padding_left = $lr_content_padding;
	$content_padding_right = $lr_content_padding;
	$sidebar_padding_left = $lr_content_padding;
	$sidebar_padding_right = $lr_content_padding;
	$content_horizontal_padding = $lr_content_padding * 6;
	$divider_padding = $template_data['divider_width'] * 2;
	$template_wrap_width = $main_content_width + $sb_width + $sb2_width + $content_horizontal_padding + $container_pad + $divider_padding;
	$container_width = $main_content_width + $sb_width + $sb2_width + $content_horizontal_padding + $divider_padding;
	$content_sidebar_wrap_width = $main_content_width + $sb_width + ( $lr_content_padding * 4 ) + $template_data['divider_width'];
}
elseif( $template_data['sidebar_template'] == 'double_right' )
{
	$sb_width = $template_data['sidebar_width'];
	$sb2_width = $template_data['sidebar2_width'];
	$sb_float = 'right';
	$sb2_float = 'right';
	$main_content_float = 'left';
	$content_sidebar_wrap_float = 'left';
	$content_padding_left = $lr_content_padding;
	$content_padding_right = $lr_content_padding;
	$sidebar_padding_left = $lr_content_padding;
	$sidebar_padding_right = $lr_content_padding;
	$content_horizontal_padding = $lr_content_padding * 6;
	$divider_padding = $template_data['divider_width'] * 2;
	$template_wrap_width = $main_content_width + $sb_width + $sb2_width + $content_horizontal_padding + $container_pad + $divider_padding;
	$container_width = $main_content_width + $sb_width + $sb2_width + $content_horizontal_padding + $divider_padding;
	$content_sidebar_wrap_width = $main_content_width + $sb_width + ( $lr_content_padding * 4 ) + $template_data['divider_width'];
}
elseif( $template_data['sidebar_template'] == 'double_left' )
{
	$sb_width = $template_data['sidebar_width'];
	$sb2_width = $template_data['sidebar2_width'];
	$sb_float = 'left';
	$sb2_float = 'left';
	$main_content_float = 'right';
	$content_sidebar_wrap_float = 'right';
	$content_padding_left = $lr_content_padding;
	$content_padding_right = $lr_content_padding;
	$sidebar_padding_left = $lr_content_padding;
	$sidebar_padding_right = $lr_content_padding;
	$content_horizontal_padding = $lr_content_padding * 6;
	$divider_padding = $template_data['divider_width'] * 2;
	$template_wrap_width = $main_content_width + $sb_width + $sb2_width + $content_horizontal_padding + $container_pad + $divider_padding;
	$container_width = $main_content_width + $sb_width + $sb2_width + $content_horizontal_padding + $divider_padding;
	$content_sidebar_wrap_width = $main_content_width + $sb_width + ( $lr_content_padding * 4 ) + $template_data['divider_width'];
}
elseif( $template_data['sidebar_template'] == 'none' )
{
	$divider_padding = 0;
	$sb_width = 0;
	$content_padding_left = $lr_content_padding;
	$content_padding_right = $lr_content_padding;
	$sidebar_padding_left = 0;
	$sidebar_padding_right = 0;
	$divider_padding = 0;
	$content_horizontal_padding = $lr_content_padding * 2;
	$template_wrap_width = $main_content_width + $sb_width + $content_horizontal_padding + $container_pad + $divider_padding;
	$container_width = $main_content_width + $sb_width + $content_horizontal_padding + $container_pad + $divider_padding;
	$content_sidebar_wrap_width = $main_content_width + $sb_width + $content_horizontal_padding + $divider_padding;
}

if( $template_data['header_template'] == 'fixed' || $template_data['header_template'] == 'none' )
{
	$wrap_open = 'fixed';
}
else
{
	$wrap_open = 'fluid';
}

if( $template_data['footer_template'] == 'fixed' || $template_data['footer_template'] == 'none' )
{
	$wrap_close = 'fixed';
}
else
{
	$wrap_close = 'fluid';
}

//** Main Background Styles **//
if( $template_data['main_bg_type'] != 'color' )
{
	$main_bg_image_type = ' url(' . $template_data['main_bg_image_name'] . ') ' . $template_data['main_bg_type'];
}
else
{
	$main_bg_image_type = '';
}

//Wrap Background
if( $template_data['wrap_bg_type'] == 'color' )
{
	$wrap_bg = 'background: #' . $template_data['wrap_bg_color'];
}
elseif( $template_data['wrap_bg_type'] == 'transparent' )
{
	$wrap_bg = 'background: transparent';
}
else
{
	$wrap_bg = 'background: url(' . $template_data['wrap_bg_image_name'] . ') ' . $template_data['wrap_bg_type'];
}

//Header Background
if( $template_data['header_bg_type'] == 'color' )
{
	$header_bg = 'background: #' . $template_data['header_bg_color'];
}
elseif( $template_data['header_bg_type'] == 'transparent' )
{
	$header_bg = 'background: transparent';
}
else
{
	$header_bg = 'background: url(' . $template_data['header_bg_image_name'] . ') ' . $template_data['header_bg_type'];
}

//Content Background
if( $template_data['content_bg_type'] == 'color' )
{
	$content_bg = 'background: #' . $template_data['content_bg_color'];
}
elseif( $template_data['content_bg_type'] == 'transparent' )
{
	$content_bg = 'background: transparent';
}
else
{
	$content_bg = 'background: url(' . $template_data['content_bg_image_name'] . ') ' . $template_data['content_bg_type'];
}

//Sidebar Background
if( $template_data['sidebar_bg_type'] == 'color' )
{
	$sidebar_bg = 'background: #' . $template_data['sidebar_bg_color'];
}
elseif( $template_data['sidebar_bg_type'] == 'transparent' )
{
	$sidebar_bg = 'background: transparent';
}
else
{
	$sidebar_bg = 'background: url(' . $template_data['sidebar_bg_image_name'] . ') ' . $template_data['sidebar_bg_type'];
}

//Footer Background
if( $template_data['footer_bg_type'] == 'color' )
{
	$footer_bg = 'background: #' . $template_data['footer_bg_color'];
}
elseif( $template_data['footer_bg_type'] == 'transparent' )
{
	$footer_bg = 'background: transparent';
}
else
{
	$footer_bg = 'background: url(' . $template_data['footer_bg_image_name'] . ') ' . $template_data['footer_bg_type'];
}

require_once('impact-template.css.php');

//end /lib/templates/impact-template.php