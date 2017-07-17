/* Impact Master CSS Template */
/* Tags */
<?php
if( !is_admin() )
{ ?>
body {
	background: #<?php echo $template_data['main_bg_color'] . $main_bg_image_type; ?>;
}
/* IDs */
#impact-superwrap {
	width: 100%;
	float: left;
<?php
}
?>

<?php
if( is_admin() )
{ ?>
#impact-superwrap {
	width: 99%;
	float: left;
	background: #<?php echo $template_data['main_bg_color'] . $main_bg_image_type; ?>;
	display: inline-block;
	text-align: justify;
	color: #666666;
	border: 1px solid #ABB4BA;
<?php
}
?>}
#impact-page-wrap {
	<?php echo $wrap_bg ?>;
	border-top: <?php echo $template_data['main_tb_border_thickness']; ?>px <?php echo $template_data['border_style']; ?> #<?php echo $template_data['border_color']; ?>;
	border-bottom: <?php echo $template_data['main_tb_border_thickness']; ?>px <?php echo $template_data['border_style']; ?> #<?php echo $template_data['border_color']; ?>;
	border-left: <?php echo $template_data['main_lr_border_thickness']; ?>px <?php echo $template_data['border_style']; ?> #<?php echo $template_data['border_color']; ?>;
	border-right: <?php echo $template_data['main_lr_border_thickness']; ?>px <?php echo $template_data['border_style']; ?> #<?php echo $template_data['border_color']; ?>;
	width: <?php echo $template_wrap_width; ?>px;
	margin: <?php echo $template_data['tb_margin']; ?>px auto <?php echo $template_data['tb_margin']; ?>px;
}
<?php
if( $template_data['header_template'] != 'none' )
{ ?>
#impact-header-outer {
	<?php echo $header_bg; ?>;
	width: 100%;
	clear: both;
}
#impact-header-wrap {
	width: <?php echo $template_wrap_width; ?>px;
	height: <?php echo $template_data['header_height']; ?>px;
	position: relative;
	margin: 0px auto;
}
<?php
}?>
#impact-title {
	float: left;
	display: block;
<?php
	if( !empty( $template_data['title_top_margin'] ) )
	{
		echo 'margin-top: ' . $template_data['title_top_margin'] . 'px;' . "\n";
	}
	if( !empty( $template_data['title_left_margin'] ) )
	{
		echo 'margin-left: ' . $template_data['title_left_margin'] . 'px;' . "\n";
	}
?>}
#impact-container {
	width: <?php echo $container_width; ?>px;
	margin-top: <?php echo $template_data['tb_content_margin']; ?>px;
	margin-bottom: <?php echo $template_data['tb_content_margin']; ?>px;
	padding-left: <?php echo $lr_container_padding; ?>px;
	padding-right: <?php echo $lr_container_padding; ?>px;
	display: inline-block;
	float:left;
}
#impact-content-sidebar-wrap {
	width: <?php echo $content_sidebar_wrap_width; ?>px;
	float: <?php echo $content_sidebar_wrap_float; ?>;
}
#impact-content-wrap {
	width: <?php echo $main_content_width ?>px;
	padding-left: <?php echo $content_padding_left ?>px;
	padding-right: <?php echo $content_padding_right ?>px;
	padding-top:<?php echo $template_data['tb_content_padding']; ?>px;
	padding-bottom:<?php echo $template_data['tb_content_padding']; ?>px;
	<?php echo $content_bg; ?>;
	float: <?php echo $main_content_float; ?>;
	position: relative;
}
#impact-content {
	width:100%;
	clear:both;
	float:left;
}
<?php
if( $template_data['sidebar_template'] == 'right' || $template_data['sidebar_template'] == 'left' )
{ ?>
#impact-sidebar-wrap {
	<?php echo $sidebar_bg ?>;
	width: <?php echo $sb_width ?>px;
	float: <?php echo $sb_float ?>;
	position: relative;
	padding-left: <?php echo $sidebar_padding_left ?>px;
	padding-right: <?php echo $sidebar_padding_right ?>px;
	padding-top:<?php echo $template_data['tb_content_padding']; ?>px;
	padding-bottom:<?php echo $template_data['tb_content_padding']; ?>px;
}
<?php
}?>
<?php
if( $template_data['sidebar_template'] == 'double' || $template_data['sidebar_template'] == 'double_right' || $template_data['sidebar_template'] == 'double_left' )
{ ?>
#impact-sidebar-wrap {
	<?php echo $sidebar_bg ?>;
	width: <?php echo $sb_width ?>px;
	float: <?php echo $sb_float ?>;
	position: relative;
	padding-left: <?php echo $sidebar_padding_left ?>px;
	padding-right: <?php echo $sidebar_padding_right ?>px;
	padding-top:<?php echo $template_data['tb_content_padding']; ?>px;
	padding-bottom:<?php echo $template_data['tb_content_padding']; ?>px;
}
#impact-sidebar2-wrap {
	<?php echo $sidebar_bg ?>;
	width: <?php echo $sb2_width ?>px;
	float: <?php echo $sb2_float ?>;
	position: relative;
	padding-left: <?php echo $sidebar_padding_left ?>px;
	padding-right: <?php echo $sidebar_padding_right ?>px;
	padding-top:<?php echo $template_data['tb_content_padding']; ?>px;
	padding-bottom:<?php echo $template_data['tb_content_padding']; ?>px;
}
<?php
}?>
<?php
if( $template_data['footer_template'] != 'none' )
{ ?>
#impact-footer-outer {
	<?php echo $footer_bg; ?>;
	width: 100%;
	clear: both;
}
#impact-footer-wrap {
	width: <?php echo $template_wrap_width; ?>px;
	height: <?php echo $template_data['footer_height']; ?>px;
	position: relative;
	margin: 0px auto;
}
<?php
}?>
/* Classes */
.outer-wrap {
	width:100%;
	float:left;
}
/* Widget Areas */
<?php
	//before_page_wrap
	if( !empty( $template_data['before_page_wrap_align'] ) && !empty( $template_data['before_page_wrap_width'] ) )
	{
		echo '#impact-before-page-wrap {' . "\n";
		echo '     float:' . $template_data['before_page_wrap_align'] . ';' . "\n";
		echo '     width:' . $template_data['before_page_wrap_width'] . 'px;' . "\n";
		echo '}' . "\n";
	}
	elseif( empty( $template_data['before_page_wrap_align'] ) && !empty( $template_data['before_page_wrap_width'] ) )
	{
		echo '#impact-before-page-wrap {' . "\n";
		echo '     width:' . $template_data['before_page_wrap_width'] . 'px;' . "\n";
		echo '}' . "\n";
	}
	elseif( !empty( $template_data['before_page_wrap_align'] ) && empty( $template_data['before_page_wrap_width'] ) )
	{
		echo '#impact-before-page-wrap {' . "\n";
		echo '     float:' . $template_data['before_page_wrap_align'] . ';' . "\n";
		echo '}' . "\n";
	}
	
	//before_header
	if( !empty( $template_data['before_header_align'] ) && !empty( $template_data['before_header_width'] ) )
	{
		echo '#impact-before-header {' . "\n";
		echo '     float:' . $template_data['before_header_align'] . ';' . "\n";
		echo '     width:' . $template_data['before_header_width'] . 'px;' . "\n";
		echo '}' . "\n";
	}
	elseif( empty( $template_data['before_header_align'] ) && !empty( $template_data['before_header_width'] ) )
	{
		echo '#impact-before-header {' . "\n";
		echo '     width:' . $template_data['before_header_width'] . 'px;' . "\n";
		echo '}' . "\n";
	}
	elseif( !empty( $template_data['before_header_align'] ) && empty( $template_data['before_header_width'] ) )
	{
		echo '#impact-before-header {' . "\n";
		echo '     float:' . $template_data['before_header_align'] . ';' . "\n";
		echo '}' . "\n";
	}
	
	//in_header
	if( !empty( $template_data['in_header_align'] ) && !empty( $template_data['in_header_width'] ) )
	{
		echo '#impact-in-header {' . "\n";
		echo '     float:' . $template_data['in_header_align'] . ';' . "\n";
		echo '     width:' . $template_data['in_header_width'] . 'px;' . "\n";
		echo '}' . "\n";
	}
	elseif( empty( $template_data['in_header_align'] ) && !empty( $template_data['in_header_width'] ) )
	{
		echo '#impact-in-header {' . "\n";
		echo '     width:' . $template_data['in_header_width'] . 'px;' . "\n";
		echo '}' . "\n";
	}
	elseif( !empty( $template_data['in_header_align'] ) && empty( $template_data['in_header_width'] ) )
	{
		echo '#impact-in-header {' . "\n";
		echo '     float:' . $template_data['in_header_align'] . ';' . "\n";
		echo '}' . "\n";
	}
	
	//after_header
	if( !empty( $template_data['after_header_align'] ) && !empty( $template_data['after_header_width'] ) )
	{
		echo '#impact-after-header {' . "\n";
		echo '     float:' . $template_data['after_header_align'] . ';' . "\n";
		echo '     width:' . $template_data['after_header_width'] . 'px;' . "\n";
		echo '}' . "\n";
	}
	elseif( empty( $template_data['after_header_align'] ) && !empty( $template_data['after_header_width'] ) )
	{
		echo '#impact-after-header {' . "\n";
		echo '     width:' . $template_data['after_header_width'] . 'px;' . "\n";
		echo '}' . "\n";
	}
	elseif( !empty( $template_data['after_header_align'] ) && empty( $template_data['after_header_width'] ) )
	{
		echo '#impact-after-header {' . "\n";
		echo '     float:' . $template_data['after_header_align'] . ';' . "\n";
		echo '}' . "\n";
	}
	
	//before_container
	if( !empty( $template_data['before_container_align'] ) && !empty( $template_data['before_container_width'] ) )
	{
		echo '#impact-before-container {' . "\n";
		echo '     float:' . $template_data['before_container_align'] . ';' . "\n";
		echo '     width:' . $template_data['before_container_width'] . 'px;' . "\n";
		echo '}' . "\n";
	}
	elseif( empty( $template_data['before_container_align'] ) && !empty( $template_data['before_container_width'] ) )
	{
		echo '#impact-before-container {' . "\n";
		echo '     width:' . $template_data['before_container_width'] . 'px;' . "\n";
		echo '}' . "\n";
	}
	elseif( !empty( $template_data['before_container_align'] ) && empty( $template_data['before_container_width'] ) )
	{
		echo '#impact-before-container {' . "\n";
		echo '     float:' . $template_data['before_container_align'] . ';' . "\n";
		echo '}' . "\n";
	}
	
	//before_content
	if( !empty( $template_data['before_content_align'] ) && !empty( $template_data['before_content_width'] ) )
	{
		echo '#impact-before-content {' . "\n";
		echo '     float:' . $template_data['before_content_align'] . ';' . "\n";
		echo '     width:' . $template_data['before_content_width'] . 'px;' . "\n";
		echo '}' . "\n";
	}
	elseif( empty( $template_data['before_content_align'] ) && !empty( $template_data['before_content_width'] ) )
	{
		echo '#impact-before-content {' . "\n";
		echo '     width:' . $template_data['before_content_width'] . 'px;' . "\n";
		echo '}' . "\n";
	}
	elseif( !empty( $template_data['before_content_align'] ) && empty( $template_data['before_content_width'] ) )
	{
		echo '#impact-before-content {' . "\n";
		echo '     float:' . $template_data['before_content_align'] . ';' . "\n";
		echo '}' . "\n";
	}
	
	//after_content
	if( !empty( $template_data['after_content_align'] ) && !empty( $template_data['after_content_width'] ) )
	{
		echo '#impact-after-content {' . "\n";
		echo '     float:' . $template_data['after_content_align'] . ';' . "\n";
		echo '     width:' . $template_data['after_content_width'] . 'px;' . "\n";
		echo '}' . "\n";
	}
	elseif( empty( $template_data['after_content_align'] ) && !empty( $template_data['after_content_width'] ) )
	{
		echo '#impact-after-content {' . "\n";
		echo '     width:' . $template_data['after_content_width'] . 'px;' . "\n";
		echo '}' . "\n";
	}
	elseif( !empty( $template_data['after_content_align'] ) && empty( $template_data['after_content_width'] ) )
	{
		echo '#impact-after-content {' . "\n";
		echo '     float:' . $template_data['after_content_align'] . ';' . "\n";
		echo '}' . "\n";
	}
	
	//before_sidebar
	if( !empty( $template_data['before_sidebar_align'] ) && !empty( $template_data['before_sidebar_width'] ) )
	{
		echo '#impact-before-sidebar {' . "\n";
		echo '     float:' . $template_data['before_sidebar_align'] . ';' . "\n";
		echo '     width:' . $template_data['before_sidebar_width'] . 'px;' . "\n";
		echo '}' . "\n";
	}
	elseif( empty( $template_data['before_sidebar_align'] ) && !empty( $template_data['before_sidebar_width'] ) )
	{
		echo '#impact-before-sidebar {' . "\n";
		echo '     width:' . $template_data['before_sidebar_width'] . 'px;' . "\n";
		echo '}' . "\n";
	}
	elseif( !empty( $template_data['before_sidebar_align'] ) && empty( $template_data['before_sidebar_width'] ) )
	{
		echo '#impact-before-sidebar {' . "\n";
		echo '     float:' . $template_data['before_sidebar_align'] . ';' . "\n";
		echo '}' . "\n";
	}
	
	//after_sidebar
	if( !empty( $template_data['after_sidebar_align'] ) && !empty( $template_data['after_sidebar_width'] ) )
	{
		echo '#impact-after-sidebar {' . "\n";
		echo '     float:' . $template_data['after_sidebar_align'] . ';' . "\n";
		echo '     width:' . $template_data['after_sidebar_width'] . 'px;' . "\n";
		echo '}' . "\n";
	}
	elseif( empty( $template_data['after_sidebar_align'] ) && !empty( $template_data['after_sidebar_width'] ) )
	{
		echo '#impact-after-sidebar {' . "\n";
		echo '     width:' . $template_data['after_sidebar_width'] . 'px;' . "\n";
		echo '}' . "\n";
	}
	elseif( !empty( $template_data['after_sidebar_align'] ) && empty( $template_data['after_sidebar_width'] ) )
	{
		echo '#impact-after-sidebar {' . "\n";
		echo '     float:' . $template_data['after_sidebar_align'] . ';' . "\n";
		echo '}' . "\n";
	}
	
	//after_container
	if( !empty( $template_data['after_container_align'] ) && !empty( $template_data['after_container_width'] ) )
	{
		echo '#impact-after-container {' . "\n";
		echo '     float:' . $template_data['after_container_align'] . ';' . "\n";
		echo '     width:' . $template_data['after_container_width'] . 'px;' . "\n";
		echo '}' . "\n";
	}
	elseif( empty( $template_data['after_container_align'] ) && !empty( $template_data['after_container_width'] ) )
	{
		echo '#impact-after-container {' . "\n";
		echo '     width:' . $template_data['after_container_width'] . 'px;' . "\n";
		echo '}' . "\n";
	}
	elseif( !empty( $template_data['after_container_align'] ) && empty( $template_data['after_container_width'] ) )
	{
		echo '#impact-after-container {' . "\n";
		echo '     float:' . $template_data['after_container_align'] . ';' . "\n";
		echo '}' . "\n";
	}
	
	//before_footer
	if( !empty( $template_data['before_footer_align'] ) && !empty( $template_data['before_footer_width'] ) )
	{
		echo '#impact-before-footer {' . "\n";
		echo '     float:' . $template_data['before_footer_align'] . ';' . "\n";
		echo '     width:' . $template_data['before_footer_width'] . 'px;' . "\n";
		echo '}' . "\n";
	}
	elseif( empty( $template_data['before_footer_align'] ) && !empty( $template_data['before_footer_width'] ) )
	{
		echo '#impact-before-footer {' . "\n";
		echo '     width:' . $template_data['before_footer_width'] . 'px;' . "\n";
		echo '}' . "\n";
	}
	elseif( !empty( $template_data['before_footer_align'] ) && empty( $template_data['before_footer_width'] ) )
	{
		echo '#impact-before-footer {' . "\n";
		echo '     float:' . $template_data['before_footer_align'] . ';' . "\n";
		echo '}' . "\n";
	}
	
	//in_footer
	if( !empty( $template_data['in_footer_align'] ) && !empty( $template_data['in_footer_width'] ) )
	{
		echo '#impact-in-footer {' . "\n";
		echo '     float:' . $template_data['in_footer_align'] . ';' . "\n";
		echo '     width:' . $template_data['in_footer_width'] . 'px;' . "\n";
		echo '}' . "\n";
	}
	elseif( empty( $template_data['in_footer_align'] ) && !empty( $template_data['in_footer_width'] ) )
	{
		echo '#impact-in-footer {' . "\n";
		echo '     width:' . $template_data['in_footer_width'] . 'px;' . "\n";
		echo '}' . "\n";
	}
	elseif( !empty( $template_data['in_footer_align'] ) && empty( $template_data['in_footer_width'] ) )
	{
		echo '#impact-in-footer {' . "\n";
		echo '     float:' . $template_data['in_footer_align'] . ';' . "\n";
		echo '}' . "\n";
	}
	
	//after_footer
	if( !empty( $template_data['after_footer_align'] ) && !empty( $template_data['after_footer_width'] ) )
	{
		echo '#impact-after-footer {' . "\n";
		echo '     float:' . $template_data['after_footer_align'] . ';' . "\n";
		echo '     width:' . $template_data['after_footer_width'] . 'px;' . "\n";
		echo '}' . "\n";
	}
	elseif( empty( $template_data['after_footer_align'] ) && !empty( $template_data['after_footer_width'] ) )
	{
		echo '#impact-after-footer {' . "\n";
		echo '     width:' . $template_data['after_footer_width'] . 'px;' . "\n";
		echo '}' . "\n";
	}
	elseif( !empty( $template_data['after_footer_align'] ) && empty( $template_data['after_footer_width'] ) )
	{
		echo '#impact-after-footer {' . "\n";
		echo '     float:' . $template_data['after_footer_align'] . ';' . "\n";
		echo '}' . "\n";
	}
	
	//after_page_wrap
	if( !empty( $template_data['after_page_wrap_align'] ) && !empty( $template_data['after_page_wrap_width'] ) )
	{
		echo '#impact-after-page-wrap {' . "\n";
		echo '     float:' . $template_data['after_page_wrap_align'] . ';' . "\n";
		echo '     width:' . $template_data['after_page_wrap_width'] . 'px;' . "\n";
		echo '}' . "\n";
	}
	elseif( empty( $template_data['after_page_wrap_align'] ) && !empty( $template_data['after_page_wrap_width'] ) )
	{
		echo '#impact-after-page-wrap {' . "\n";
		echo '     width:' . $template_data['after_page_wrap_width'] . 'px;' . "\n";
		echo '}' . "\n";
	}
	elseif( !empty( $template_data['after_page_wrap_align'] ) && empty( $template_data['after_page_wrap_width'] ) )
	{
		echo '#impact-after-page-wrap {' . "\n";
		echo '     float:' . $template_data['after_page_wrap_align'] . ';' . "\n";
		echo '}' . "\n";
	}
?>