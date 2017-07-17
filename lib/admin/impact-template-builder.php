<?php
function impact_template_builder_admin()
{
global $impact_root;
?>
	<div class="impact-admin-pagewrap">

		<?php
			$template_data = impact_get_firsttemplate();
			$template_id = impact_get_firsttemplateid();
			$template_widget_areas = impact_get_active_widget_areas( $template_id );
			
			
		if( !empty($_GET['impact-updated']) && $_GET['impact-updated'] == 'true' )
		{
	?>		<div id="impact-updated" class="impact-update" style="position:absolute;margin-top:10px;">	
				<p>
					<?php printf( __('Impact has been updated to Version %s', 'impact'), get_option('impact_version') ); ?>
				</p>
			</div>
	<?php	
		}
	?>
		<div id="impact-saved" class="impact-update" style="display:none;position:absolute;margin-top:10px;"></div>
		<div class="impact-admin-title">
		
			<img src="<?php echo IMPACT_IMAGES_URL . '/impact_admin_logo.png'; ?>">
			
			<p style="float:right;margin:24px 18px 10px 0px;"><a href="http://impactpagebuilder.com/resources">Impact User Resources</a> | <a href="http://impactpagebuilder.com/impact-store" target="_blank">Upgrade to Impact Page Builder for (with 12 free premium templates pack) Use Coupon <strong>IMPACTWP</strong> for discounts </a></p>
			
		</div>
					
		<form action="/" id="template-data-form" name="template-data-form">
		
			<input type="hidden" name="action" value="template_data_save" />
			<input type="hidden" name="security" value="<?php echo wp_create_nonce('template-data'); ?>" />
			
			<div class="impact-admin-3column">
				
				<div id="impact-create-template" class="impact-admin-box vp3col">
					<h3><?php _e('Update Template', 'impact'); ?></h3>			
					<div class="impact-boxwrap">
					<table class="impact-option-table">
						<tr>
							<td>
								<label for="templateid"><?php echo "<b>".ucfirst( $template_id)."</b>";?></label>
								<input type="hidden" name="templateid" id="templateid" value="<?php echo $template_id;?>" />
							</td>
						</tr>
						<tr>
							<td>
								<input type="submit" value="<?php _e('Update Template', 'impact'); ?>" class="impact-admin-button button-primary" style="float:left;" /><div class="ajax-loading-img" style="display:none;">&nbsp;&nbsp;<img src="<?php echo IMPACT_IMAGES_URL . '/ajax-loader.gif'; ?>" /></div>
							</td>
						</tr>
					</table>
					</div>
				</div>
			
			</div>
			
			<!--<div id="css-builder" title="<?php _e('CSS Builder', 'impact') ?>" style="display:none;">
			<p>This here's gonna be the CSS Builder</p>
			</div>-->
			
			<div id="template-options" title="<?php _e('Template Options', 'impact') ?>" style="display:none;">
				<div id="options-accordion"> 
					<h3><a href="#"><?php _e("Template Structure", 'impact'); ?></a></h3>
					<div class="impact-boxwrap">
					<table class="impact-templates-table">
						<tr>
							<td>
								<?php _e("Header:", 'impact'); ?>
							</td>
							<td>
								<select id="template_data[header_template]" name="template_data[header_template]" style="width:110px;" class="frame">
									<option value="fixed"<?php if( !empty( $template_data ) && ( $template_data['header_template'] == 'fixed' ) ) echo ' selected="selected"'; ?>>fixed</option>
									<option value="fluid"<?php if( !empty( $template_data ) &&  ( $template_data['header_template'] == 'fluid' ) ) echo ' selected="selected"'; ?>>fluid</option>
									<option value="none"<?php if( !empty( $template_data ) && ( $template_data['header_template'] == 'none' ) ) echo ' selected="selected"'; ?>>none</option>
								</select>
							</td>
						</tr>
						<tr>
							<td>
								<?php _e("Footer:", 'impact'); ?>
							</td>
							<td>
								<select id="template_data[footer_template]" name="template_data[footer_template]" style="width:110px;" class="frame">
									<option value="fixed"<?php if( !empty( $template_data ) && ( $template_data['footer_template'] == 'fixed') ) echo ' selected="selected"'; ?>>fixed</option>
									<option value="fluid"<?php if( !empty( $template_data ) && ( $template_data['footer_template'] == 'fluid' ) ) echo ' selected="selected"'; ?>>fluid</option>
									<option value="none"<?php if( !empty( $template_data ) && ( $template_data['footer_template'] == 'none' ) ) echo ' selected="selected"'; ?>>none</option>
								</select>
							</td>
						</tr>
						<tr>
							<td>
								<?php _e("Sidebar:", 'impact'); ?>
							</td>
							<td>
								<select id="template_data[sidebar_template]" name="template_data[sidebar_template]" style="width:110px;" class="frame horiz-width wimapa">
									<option value="right"<?php if( !empty( $template_data ) && ( $template_data['sidebar_template'] == 'right' ) ) echo ' selected="selected"'; ?>>right</option>
									<option value="left"<?php if( !empty( $template_data ) && ( $template_data['sidebar_template'] == 'left' ) ) echo ' selected="selected"'; ?>>left</option>
									<option value="double"<?php if( !empty( $template_data ) && ( $template_data['sidebar_template'] == 'double' ) ) echo ' selected="selected"'; ?>>double</option>
									<option value="double_right"<?php if( !empty( $template_data ) && ( $template_data['sidebar_template'] == 'double_right' ) ) echo ' selected="selected"'; ?>>double right</option>
									<option value="double_left"<?php if( !empty( $template_data ) && ( $template_data['sidebar_template'] == 'double_left' ) ) echo ' selected="selected"'; ?>>double left</option>
									<option value="none"<?php if( !empty( $template_data ) && ( $template_data['sidebar_template'] == 'none' ) ) echo ' selected="selected"'; ?>>none</option>
								</select>
							</td>
						</tr>
					</table>
					</div>
				
					<h3><a href="#"><?php _e("Widths & Heights / Margins & Padding", 'impact'); ?></a></h3>
					<div class="impact-boxwrap">
					<table class="impact-templates-table">
						<tr>
							<td>
								<?php _e("Header Height:", 'impact'); ?>
							</td>
							<td>
								<input type="text" id="template_data[header_height]" name="template_data[header_height]" value="<?php echo (!empty($template_data['header_height']) ? $template_data['header_height'] : '100'); ?>" class="wimapa" style="width:50px;" />px
							</td>
						</tr>
						<tr>
							<td>
								<?php _e("Content Width:", 'impact'); ?>
							</td>
							<td>
								<input type="text" id="template_data[main_content_width]" name="template_data[main_content_width]" value="<?php echo (!empty($template_data['main_content_width']) ? $template_data['main_content_width'] : '500'); ?>" style="width:50px;" class="horiz-width wimapa" />px
							</td>
						</tr>
						<tr>
							<td>
								<?php _e("Sidebar Width:", 'impact'); ?>
							</td>
							<td>
								<input type="text" id="template_data[sidebar_width]" name="template_data[sidebar_width]" value="<?php echo (!empty($template_data['sidebar_width']) ? $template_data['sidebar_width'] : '200'); ?>" style="width:50px;" class="horiz-width wimapa" />px
							</td>
						</tr>
						<tr>
							<td>
								<?php _e("Sidebar2 Width:", 'impact'); ?>
							</td>
							<td>
								<input type="text" id="template_data[sidebar2_width]" name="template_data[sidebar2_width]" value="<?php echo (!empty($template_data['sidebar2_width']) ? $template_data['sidebar2_width'] : '200'); ?>" style="width:50px;" class="horiz-width wimapa" />px
							</td>
						</tr>
						<tr>
							<td>
								<?php _e("Footer Height:", 'impact'); ?>
							</td>
							<td>
								<input type="text" id="template_data[footer_height]" name="template_data[footer_height]" value="<?php echo (!empty($template_data['footer_height']) ? $template_data['footer_height'] : '100'); ?>" class="wimapa" style="width:50px;" />px
							</td>
						</tr>
					</table>
					<table class="impact-templates-table">
						<tr>
							<td>
								<?php _e("Top/Bottom Main Margins:", 'impact'); ?>
							</td>
							<td>
								<select id="template_data[tb_margin]" name="template_data[tb_margin]" class="wimapa" style="width:50px;">
									<option value="0"<?php if( !empty( $template_data ) && ( $template_data['tb_margin'] == '0' ) ) echo ' selected="selected"'; ?>>0</option>
									<option value="10"<?php if( !empty( $template_data ) && ( $template_data['tb_margin'] == '10' ) ) echo ' selected="selected"'; ?>>10</option>
									<option value="20"<?php if( ( !empty( $template_data ) && $template_data['tb_margin'] == '20' ) || empty( $template_data ) ) echo ' selected="selected"'; ?>>20</option>
									<option value="30"<?php if( !empty( $template_data ) && ( $template_data['tb_margin'] == '30' ) ) echo ' selected="selected"'; ?>>30</option>
									<option value="40"<?php if( !empty( $template_data ) && ( $template_data['tb_margin'] == '40' ) ) echo ' selected="selected"'; ?>>40</option>
									<option value="50"<?php if( !empty( $template_data ) && ( $template_data['tb_margin'] == '50' ) ) echo ' selected="selected"'; ?>>50</option>
									<option value="60"<?php if( !empty( $template_data ) && ( $template_data['tb_margin'] == '60' ) ) echo ' selected="selected"'; ?>>60</option>
								</select>px
							</td>
						</tr>
						<tr>
							<td>
								<?php _e("Top/Bottom Content Margins:", 'impact'); ?>
							</td>
							<td>
								<select id="template_data[tb_content_margin" name="template_data[tb_content_margin]" class="wimapa" style="width:50px;">
									<option value="0"<?php if( !empty( $template_data ) && ( $template_data['tb_content_margin'] == '0' ) ) echo ' selected="selected"'; ?>>0</option>
									<option value="10"<?php if( !empty( $template_data ) && ( $template_data['tb_content_margin'] == '10' ) ) echo ' selected="selected"'; ?>>10</option>
									<option value="20"<?php if( ( !empty( $template_data ) && $template_data['tb_content_margin'] == '20' ) || empty( $template_data ) ) echo ' selected="selected"'; ?>>20</option>
									<option value="30"<?php if( !empty( $template_data ) && ( $template_data['tb_content_margin'] == '30' ) ) echo ' selected="selected"'; ?>>30</option>
									<option value="40"<?php if( !empty( $template_data ) && ( $template_data['tb_content_margin'] == '40' ) ) echo ' selected="selected"'; ?>>40</option>
									<option value="50"<?php if( !empty( $template_data ) && ( $template_data['tb_content_margin'] == '50' ) ) echo ' selected="selected"'; ?>>50</option>
									<option value="60"<?php if( !empty( $template_data ) && ( $template_data['tb_content_margin'] == '60' ) ) echo ' selected="selected"'; ?>>60</option>
								</select>px
							</td>
						</tr>
						<tr>
							<td>
								<?php _e("Top/Bottom Content Padding:", 'impact'); ?>
							</td>
							<td>
								<select id="template_data[tb_content_padding]" name="template_data[tb_content_padding]" class="wimapa" style="width:50px;">
									<option value="0"<?php if( !empty( $template_data ) && ( $template_data['tb_content_padding'] == '0' ) ) echo ' selected="selected"'; ?>>0</option>
									<option value="10"<?php if( ( !empty( $template_data ) && $template_data['tb_content_padding'] == '10' ) || empty( $template_data ) ) echo ' selected="selected"'; ?>>10</option>
									<option value="20"<?php if( !empty( $template_data ) && ( $template_data['tb_content_padding'] == '20' ) ) echo ' selected="selected"'; ?>>20</option>
									<option value="30"<?php if( !empty( $template_data ) && ( $template_data['tb_content_padding'] == '30' ) ) echo ' selected="selected"'; ?>>30</option>
									<option value="40"<?php if( !empty( $template_data ) && ( $template_data['tb_content_padding'] == '40' ) ) echo ' selected="selected"'; ?>>40</option>
									<option value="50"<?php if( !empty( $template_data ) && ( $template_data['tb_content_padding'] == '50' ) ) echo ' selected="selected"'; ?>>50</option>
									<option value="60"<?php if( !empty( $template_data ) && ( $template_data['tb_content_padding'] == '60' ) ) echo ' selected="selected"'; ?>>60</option>
								</select>px
							</td>
						</tr>
						<tr>
							<td>
								<?php _e("Left/Right Content Padding:", 'impact'); ?>
							</td>
							<td>
								<select id="template_data[lr_content_padding]" name="template_data[lr_content_padding]" style="width:50px;" class="horiz-width wimapa">
									<option value="0"<?php if( !empty( $template_data ) && ( $template_data['lr_content_padding'] == '0' ) ) echo ' selected="selected"'; ?>>0</option>
									<option value="10"<?php if( !empty( $template_data ) && ( $template_data['lr_content_padding'] == '10' ) ) echo ' selected="selected"'; ?>>10</option>
									<option value="20"<?php if( ( !empty( $template_data ) && $template_data['lr_content_padding'] == '20' ) || empty( $template_data ) ) echo ' selected="selected"'; ?>>20</option>
									<option value="30"<?php if( !empty( $template_data ) && ( $template_data['lr_content_padding'] == '30' ) ) echo ' selected="selected"'; ?>>30</option>
									<option value="40"<?php if( !empty( $template_data ) && ( $template_data['lr_content_padding'] == '40' ) ) echo ' selected="selected"'; ?>>40</option>
									<option value="50"<?php if( !empty( $template_data ) && ( $template_data['lr_content_padding'] == '50' ) ) echo ' selected="selected"'; ?>>50</option>
									<option value="60"<?php if( !empty( $template_data ) && ( $template_data['lr_content_padding'] == '60' ) ) echo ' selected="selected"'; ?>>60</option>
								</select>px
							</td>
						</tr>
						<tr>
							<td>
								<?php _e("Left/Right Container Padding:", 'impact'); ?>
							</td>
							<td>
								<select id="template_data[lr_container_padding]" name="template_data[lr_container_padding]" style="width:50px;" class="horiz-width wimapa">
									<option value="0"<?php if( ( !empty( $template_data ) && $template_data['lr_container_padding'] == '0' ) || empty( $template_data ) ) echo ' selected="selected"'; ?>>0</option>
									<option value="10"<?php if( !empty( $template_data ) && ( $template_data['lr_container_padding'] == '10' ) ) echo ' selected="selected"'; ?>>10</option>
									<option value="20"<?php if( !empty( $template_data ) && ( $template_data['lr_container_padding'] == '20' ) ) echo ' selected="selected"'; ?>>20</option>
									<option value="30"<?php if( !empty( $template_data ) && ( $template_data['lr_container_padding'] == '30' ) ) echo ' selected="selected"'; ?>>30</option>
									<option value="40"<?php if( !empty( $template_data ) && ( $template_data['lr_container_padding'] == '40' ) ) echo ' selected="selected"'; ?>>40</option>
									<option value="50"<?php if( !empty( $template_data ) && ( $template_data['lr_container_padding'] == '50' ) ) echo ' selected="selected"'; ?>>50</option>
									<option value="60"<?php if( !empty( $template_data ) && ( $template_data['lr_container_padding'] == '60' ) ) echo ' selected="selected"'; ?>>60</option>
								</select>px
							</td>
						</tr>
						<tr>
							<td>
								<?php _e("Content/Sidebar Gap:", 'impact'); ?>
							</td>
							<td>
								<select id="template_data[divider_width]" name="template_data[divider_width]" style="width:50px;" class="horiz-width wimapa">
									<option value="0"<?php if( !empty( $template_data ) && ( $template_data['divider_width'] == '0' ) ) echo ' selected="selected"'; ?>>0</option>
									<option value="10"<?php if( !empty( $template_data ) && ( $template_data['divider_width'] == '10' ) ) echo ' selected="selected"'; ?>>10</option>
									<option value="20"<?php if( ( !empty( $template_data ) && $template_data['divider_width'] == '20' ) || empty( $template_data ) )echo ' selected="selected"'; ?>>20</option>
									<option value="30"<?php if( !empty( $template_data ) && ( $template_data['divider_width'] == '30' ) ) echo ' selected="selected"'; ?>>30</option>
									<option value="40"<?php if( !empty( $template_data ) && ( $template_data['divider_width'] == '40' ) ) echo ' selected="selected"'; ?>>40</option>
									<option value="50"<?php if( !empty( $template_data ) && ( $template_data['divider_width'] == '50' ) ) echo ' selected="selected"'; ?>>50</option>
									<option value="60"<?php if( !empty( $template_data ) && ( $template_data['divider_width'] == '60' ) ) echo ' selected="selected"'; ?>>60</option>
								</select>px
							</td>
						</tr>
					</table>
					<table class="impact-templates-table">
						<tr>
							<td>
								<a class="tooltip" href="#" class="tooltip" title="<?php _e("The Total Site Width is calculated by adding together all widths of elements and padding in your template. This is useful info to have, especially if you intend to use images for the Header, etc., and need to know how wide to create them.", 'impact'); ?>">[?] </a><?php _e("Total Site Width:", 'impact'); ?>
							</td>
							<td>
								<strong><span id="calculated_width"></span></strong>
							</td>
						</tr>
					</table>
					</div>
					
					<h3><a href="#"><?php _e("Title Area", 'impact'); ?></a></h3>
					<div class="impact-boxwrap">
					<table class="impact-templates-table">
						<tr>
							<td>
								<?php _e("Title:", 'impact'); ?>
							</td>
							<td colspan="2">
								<select id="template_data[title_area]" name="template_data[title_area]" style="width:150px;" class="impact-title">
									<option value="none"<?php if( !empty( $template_data ) && ( $template_data['title_area'] == 'none' ) ) echo ' selected="selected"'; ?>><?php _e('No Title', 'impact');?></option>
									<option value="text"<?php if( ( !empty( $template_data ) &&  $template_data['title_area'] == 'text' ) || empty( $template_data ) ) echo ' selected="selected"'; ?>><?php _e('Text Title', 'impact');?></option>
									<option value="image"<?php if( !empty( $template_data ) && ( $template_data['title_area'] == 'image' ) ) echo ' selected="selected"'; ?>><?php _e('Logo Image', 'impact');?></option>
								</select>
							</td>
						</tr>
						<tr>
							<td>
								<?php _e("Logo:", 'impact'); ?>
							</td>
							<td>
								<input type="text" id="logo_image_name" name="template_data[logo_image]" value="<?php if( !empty( $template_data ) ) echo $template_data['logo_image'] ?>" class="upload_image_textfield impact-title" style="width:150px;" />
							</td>								
							<td>
								<input type="button" id="logo_image_button" value="<?php _e('Browse', 'impact'); ?>" class="upload_image_button button" />
							</td>
						</tr>
						<tr>
							<td>
								<?php _e("Title Link:", 'impact'); ?>
							</td>
							<td colspan="2">
								<input type="text" id="title_link" name="template_data[title_link]" value="<?php if( !empty( $template_data ) ) echo $template_data['title_link'] ?>" style="width:150px;" /><a class="tooltip" href="#" class="tooltip" title="<?php _e("If the Title Link field is left blank, your Text Title or Logo Image will link to your homepage by default", 'impact'); ?>"> [?]</a>
							</td>								
						</tr>
						<tr>
							<td nowrap>
								<?php _e("Top Margin:", 'impact'); ?>
							</td>
							<td colspan="2">
								<select id="template_data[title_top_margin]" name="template_data[title_top_margin]" class="impact-title" style="width:50px;">
									<option value="0"<?php if( !empty( $template_data ) && ( $template_data['title_top_margin'] == '0' ) ) echo ' selected="selected"'; ?>>0</option>
									<option value="10"<?php if( !empty( $template_data ) && ( $template_data['title_top_margin'] == '10' ) ) echo ' selected="selected"'; ?>>10</option>
									<option value="20"<?php if( ( !empty( $template_data ) && $template_data['title_top_margin'] == '20' ) || empty( $template_data ) ) echo ' selected="selected"'; ?>>20</option>
									<option value="30"<?php if( !empty( $template_data ) && ( $template_data['title_top_margin'] == '30' ) ) echo ' selected="selected"'; ?>>30</option>
									<option value="40"<?php if( !empty( $template_data ) && ( $template_data['title_top_margin'] == '40' ) ) echo ' selected="selected"'; ?>>40</option>
									<option value="50"<?php if( !empty( $template_data ) && ( $template_data['title_top_margin'] == '50' ) ) echo ' selected="selected"'; ?>>50</option>
									<option value="60"<?php if( !empty( $template_data ) && ( $template_data['title_top_margin'] == '60' ) ) echo ' selected="selected"'; ?>>60</option>
								</select>px
							</td>
						</tr>
						<tr>
							<td nowrap>
								<?php _e("Left Margin:", 'impact'); ?>
							</td>
							<td colspan="2">
								<select id="template_data[title_left_margin]" name="template_data[title_left_margin]" class="impact-title" style="width:50px;">
									<option value="0"<?php if( !empty( $template_data ) && ( $template_data['title_left_margin'] == '0' ) ) echo ' selected="selected"'; ?>>0</option>
									<option value="10"<?php if( !empty( $template_data ) && ( $template_data['title_left_margin'] == '10' ) ) echo ' selected="selected"'; ?>>10</option>
									<option value="20"<?php if( ( !empty( $template_data ) && ( $template_data['title_left_margin'] == '20' ) ) || ( empty( $template_data ) ) ) echo ' selected="selected"'; ?>>20</option>
									<option value="30"<?php if( !empty( $template_data ) && ( $template_data['title_left_margin'] == '30' ) ) echo ' selected="selected"'; ?>>30</option>
									<option value="40"<?php if( !empty( $template_data ) && ( $template_data['title_left_margin'] == '40' ) ) echo ' selected="selected"'; ?>>40</option>
									<option value="50"<?php if( !empty( $template_data ) && ( $template_data['title_left_margin'] == '50' ) ) echo ' selected="selected"'; ?>>50</option>
									<option value="60"<?php if( !empty( $template_data ) && ( $template_data['title_left_margin'] == '60' ) ) echo ' selected="selected"'; ?>>60</option>
								</select>px
							</td>
						</tr>
					</table>
					</div>
					
					<h3><a href="#"><?php _e('Backgrounds: Main / Header / Wrap', 'impact'); ?></a></h3>
					<div class="impact-boxwrap">
					<table class="impact-templates-table">
						<tr>
							<td colspan="2">
								<strong><?php _e("Main Background: Type|Color|Image", 'impact'); ?></strong>
							</td>
						</tr>
						<tr>
							<td>
								<select id="template_data[main_bg_type]" name="template_data[main_bg_type]" class="iewide bg-option" style="width:200px;">
									<option value="color"<?php if( !empty( $template_data ) && ( $template_data['main_bg_type'] == 'color' ) ) echo ' selected="selected"'; ?>>Color</option>
									<option value="top left no-repeat"<?php if( !empty( $template_data ) && ( $template_data['main_bg_type'] == 'top left no-repeat' ) ) echo ' selected="selected"'; ?>>No-Repeat Image (Left)</option>
									<option value="top center no-repeat"<?php if( !empty( $template_data ) && ( $template_data['main_bg_type'] == 'top center no-repeat' ) ) echo ' selected="selected"'; ?>>No-Repeat Image (Center)</option>
									<option value="top right no-repeat"<?php if( !empty( $template_data ) && ( $template_data['main_bg_type'] == 'top right no-repeat' ) ) echo ' selected="selected"'; ?>>No-Repeat Image (Right)</option>
									<option value="top left fixed no-repeat"<?php if( !empty( $template_data ) && ( $template_data['main_bg_type'] == 'top left fixed no-repeat' ) ) echo ' selected="selected"'; ?>>No-Repeat Image (Left Fixed)</option>
									<option value="top center fixed no-repeat"<?php if( !empty( $template_data ) && ( $template_data['main_bg_type'] == 'top center fixed no-repeat' ) ) echo ' selected="selected"'; ?>>No-Repeat Image (Center Fixed)</option>
									<option value="top right fixed no-repeat"<?php if( !empty( $template_data ) && ( $template_data['main_bg_type'] == 'top right fixed no-repeat' ) ) echo ' selected="selected"'; ?>>No-Repeat Image (Right Fixed)</option>
									<option value="top left repeat-x"<?php if( !empty( $template_data ) && ( $template_data['main_bg_type'] == 'top left repeat-x' ) ) echo ' selected="selected"'; ?>>Horizontal-Repeat Image (Left)</option>
									<option value="top center repeat-x"<?php if( !empty( $template_data ) && ( $template_data['main_bg_type'] == 'top center repeat-x' ) ) echo ' selected="selected"'; ?>>Horizontal-Repeat Image (Center)</option>
									<option value="top right repeat-x"<?php if( !empty( $template_data ) && ( $template_data['main_bg_type'] == 'top right repeat-x' ) ) echo ' selected="selected"'; ?>>Horizontal-Repeat Image (Right)</option>
									<option value="top left fixed repeat-x"<?php if( !empty( $template_data ) && ( $template_data['main_bg_type'] == 'top left fixed repeat-x' ) ) echo ' selected="selected"'; ?>>Horizontal-Repeat Image (Left Fixed)</option>
									<option value="top center fixed repeat-x"<?php if( !empty( $template_data ) && ( $template_data['main_bg_type'] == 'top center fixed repeat-x' ) ) echo ' selected="selected"'; ?>>Horizontal-Repeat Image (Center Fixed)</option>
									<option value="top right fixed repeat-x"<?php if( !empty( $template_data ) && ( $template_data['main_bg_type'] == 'top right fixed repeat-x' ) ) echo ' selected="selected"'; ?>>Horizontal-Repeat Image (Right Fixed)</option>
									<option value="top left repeat-y"<?php if( !empty( $template_data ) && ( $template_data['main_bg_type'] == 'top left repeat-y' ) ) echo ' selected="selected"'; ?>>Vertical-Repeat Image (Left)</option>
									<option value="top center repeat-y"<?php if( !empty( $template_data ) && ( $template_data['main_bg_type'] == 'top center repeat-y' ) ) echo ' selected="selected"'; ?>>Vertical-Repeat Image (Center)</option>
									<option value="top right repeat-y"<?php if( !empty( $template_data ) && ( $template_data['main_bg_type'] == 'top right repeat-y' ) ) echo ' selected="selected"'; ?>>Vertical-Repeat Image (Right)</option>
									<option value="top left fixed repeat-y"<?php if( !empty( $template_data ) && ( $template_data['main_bg_type'] == 'top left fixed repeat-y' ) ) echo ' selected="selected"'; ?>>Vertical-Repeat Image (Left Fixed)</option>
									<option value="top center fixed repeat-y"<?php if( !empty( $template_data ) && ( $template_data['main_bg_type'] == 'top center fixed repeat-y' ) ) echo ' selected="selected"'; ?>>Vertical-Repeat Image (Center Fixed)</option>
									<option value="top right fixed repeat-y"<?php if( !empty( $template_data ) && ( $template_data['main_bg_type'] == 'top right fixed repeat-y' ) ) echo ' selected="selected"'; ?>>Vertical-Repeat Image (Right Fixed)</option>
									<option value="top repeat"<?php if( !empty( $template_data ) && ( $template_data['main_bg_type'] == 'top repeat' ) ) echo ' selected="selected"'; ?>>Horizontal & Vertical-Repeat Image</option>
									<option value="top fixed repeat"<?php if( !empty( $template_data ) && ( $template_data['main_bg_type'] == 'top fixed repeat' ) ) echo ' selected="selected"'; ?>>Horizontal & Vertical-Repeat Image (Fixed)</option>
								</select>
							</td>
							<td>
								<input type="text" class="color {pickerFaceColor:'#fff'} impact-color-box bg-option" id="template_data[main_bg_color]" name="template_data[main_bg_color]" value="<?php echo( !empty( $template_data['main_bg_color'] ) ? $template_data['main_bg_color'] : '#ABB4BA' ) ?>" />
							</td>
						</tr>
						<tr>
							<td>
								<?php _e("Image:", 'impact'); ?><input type="text" id="main_bg_image_name" name="template_data[main_bg_image_name]" value="<?php if( !empty( $template_data ) ) echo $template_data['main_bg_image_name'] ?>" class="upload_image_textfield bg-option" style="width:150px;" />	
							</td>
							<td>
								<input type="button" id="main_bg_image_button" value="<?php _e('Browse', 'impact'); ?>" class="upload_image_button button" />
							</td>
						</tr>
					</table>
					<table class="impact-templates-table">
						<tr>
							<td colspan="2">
								<strong><?php _e("Header Background: Type|Color|Image", 'impact'); ?></strong>
							</td>
						</tr>
						<tr>
							<td>
								<select id="template_data[header_bg_type]" name="template_data[header_bg_type]" class="iewide bg-option" style="width:200px;">
									<option value="color"<?php if( !empty( $template_data ) && ( $template_data['header_bg_type'] == 'color' ) ) echo ' selected="selected"'; ?>>Color</option>
									<option value="top left no-repeat"<?php if( !empty( $template_data ) && ( $template_data['header_bg_type'] == 'top left no-repeat' ) ) echo ' selected="selected"'; ?>>No-Repeat Image (Left)</option>
									<option value="top center no-repeat"<?php if( !empty( $template_data ) && ( $template_data['header_bg_type'] == 'top center no-repeat' ) ) echo ' selected="selected"'; ?>>No-Repeat Image (Center)</option>
									<option value="top right no-repeat"<?php if( !empty( $template_data ) && ( $template_data['header_bg_type'] == 'top right no-repeat' ) ) echo ' selected="selected"'; ?>>No-Repeat Image (Right)</option>
									<option value="top left repeat-x"<?php if( !empty( $template_data ) && ( $template_data['header_bg_type'] == 'top left repeat-x' ) ) echo ' selected="selected"'; ?>>Horizontal-Repeat Image (Left)</option>
									<option value="top center repeat-x"<?php if( !empty( $template_data ) && ( $template_data['header_bg_type'] == 'top center repeat-x' ) ) echo ' selected="selected"'; ?>>Horizontal-Repeat Image (Center)</option>
									<option value="top right repeat-x"<?php if( !empty( $template_data ) && ( $template_data['header_bg_type'] == 'top right repeat-x' ) ) echo ' selected="selected"'; ?>>Horizontal-Repeat Image (Right)</option>
									<option value="top left repeat-y"<?php if( !empty( $template_data ) && ( $template_data['header_bg_type'] == 'top left repeat-y' ) ) echo ' selected="selected"'; ?>>Vertical-Repeat Image (Left)</option>
									<option value="top center repeat-y"<?php if( !empty( $template_data ) && ( $template_data['header_bg_type'] == 'top center repeat-y' ) ) echo ' selected="selected"'; ?>>Vertical-Repeat Image (Center)</option>
									<option value="top right repeat-y"<?php if( !empty( $template_data ) && ( $template_data['header_bg_type'] == 'top right repeat-y' ) ) echo ' selected="selected"'; ?>>Vertical-Repeat Image (Right)</option>
									<option value="top repeat"<?php if( !empty( $template_data ) && ( $template_data['header_bg_type'] == 'top repeat' ) ) echo ' selected="selected"'; ?>>Horizontal & Vertical-Repeat Image</option>
									<option value="transparent"<?php if( !empty( $template_data ) && ( $template_data['header_bg_type'] == 'transparent' ) ) echo ' selected="selected"'; ?>>Transparent</option>
								</select>
							</td>
							<td>
								<input type="text" class="color {pickerFaceColor:'#fff'} impact-color-box bg-option" id="template_data[header_bg_color]" name="template_data[header_bg_color]" value="<?php echo( !empty( $template_data['header_bg_color'] ) ? $template_data['header_bg_color'] : '#FFFFFF' ) ?>" />
							</td>
						</tr>
						<tr>
							<td>
								<?php _e("Image:", 'impact'); ?><input type="text" id="header_bg_image_name" name="template_data[header_bg_image_name]" value="<?php if( !empty( $template_data ) ) echo $template_data['header_bg_image_name'] ?>" class="upload_image_textfield bg-option" style="width:150px;" />	
							</td>
							<td>
								<input type="button" id="header_bg_image_button" value="<?php _e('Browse', 'impact'); ?>" class="upload_image_button button" />
							</td>
						</tr>
					</table>
					<table class="impact-templates-table">
						<tr>
							<td colspan="2">
								<strong><?php _e("Wrap Background: Type|Color|Image", 'impact'); ?></strong>
							</td>
						</tr>
						<tr>
							<td>
								<select id="template_data[wrap_bg_type]" name="template_data[wrap_bg_type]" class="iewide bg-option" style="width:200px;">
									<option value="color"<?php if( !empty( $template_data ) && ( $template_data['wrap_bg_type'] == 'color' ) ) echo ' selected="selected"'; ?>>Color</option>
									<option value="no-repeat"<?php if( !empty( $template_data ) && ( $template_data['wrap_bg_type'] == 'no-repeat' ) ) echo ' selected="selected"'; ?>>No-Repeat Image</option>
									<option value="repeat-x"<?php if( !empty( $template_data ) && ( $template_data['wrap_bg_type'] == 'repeat-x' ) ) echo ' selected="selected"'; ?>>Horizontal-Repeat Image</option>
									<option value="repeat-y"<?php if( !empty( $template_data ) && ( $template_data['wrap_bg_type'] == 'repeat-y' ) ) echo ' selected="selected"'; ?>>Vertical-Repeat Image</option>
									<option value="repeat"<?php if( !empty( $template_data ) && ( $template_data['wrap_bg_type'] == 'repeat' ) ) echo ' selected="selected"'; ?>>Horizontal & Vertical-Repeat Image</option>
									<option value="transparent"<?php if( ( !empty( $template_data ) && $template_data['wrap_bg_type'] == 'transparent' ) || empty( $template_data ) ) echo ' selected="selected"'; ?>>Transparent</option>
								</select>
							</td>
							<td>
								<input type="text" class="color {pickerFaceColor:'#fff'} impact-color-box bg-option" id="template_data[wrap_bg_color]" name="template_data[wrap_bg_color]" value="<?php if( !empty( $template_data ) ) echo $template_data['wrap_bg_color'] ?>" />
							</td>
						</tr>
						<tr>
							<td>
								<?php _e("Image:", 'impact'); ?><input type="text" id="wrap_bg_image_name" name="template_data[wrap_bg_image_name]" value="<?php if( !empty( $template_data ) ) echo $template_data['wrap_bg_image_name'] ?>" class="upload_image_textfield bg-option" style="width:150px;" />	
							</td>
							<td>
								<input type="button" id="wrap_bg_image_button" value="<?php _e('Browse', 'impact'); ?>" class="upload_image_button button" />
							</td>
						</tr>
					</table>
					</div>
					<h3><a href="#"><?php _e('Backgrounds: Content / Sidebar / Footer', 'impact'); ?></a></h3>
					<div class="impact-boxwrap">
					<table class="impact-templates-table">
						<tr>
							<td colspan="2">
								<strong><?php _e("Content Background: Type|Color|Image", 'impact'); ?></strong>
							</td>
						</tr>
						<tr>
							<td>
								<select id="template_data[content_bg_type]" name="template_data[content_bg_type]" class="iewide bg-option" style="width:200px;">
									<option value="color"<?php if( !empty( $template_data ) && ( $template_data['content_bg_type'] == 'color' ) ) echo ' selected="selected"'; ?>>Color</option>
									<option value="no-repeat"<?php if( !empty( $template_data ) && ( $template_data['content_bg_type'] == 'no-repeat' ) ) echo ' selected="selected"'; ?>>No-Repeat Image</option>
									<option value="repeat-x"<?php if( !empty( $template_data ) && ( $template_data['content_bg_type'] == 'repeat-x' ) ) echo ' selected="selected"'; ?>>Horizontal-Repeat Image</option>
									<option value="repeat-y"<?php if( !empty( $template_data ) && ( $template_data['content_bg_type'] == 'repeat-y' ) ) echo ' selected="selected"'; ?>>Vertical-Repeat Image</option>
									<option value="repeat"<?php if( !empty( $template_data ) && ( $template_data['content_bg_type'] == 'repeat' ) ) echo ' selected="selected"'; ?>>Horizontal & Vertical-Repeat Image</option>
									<option value="transparent"<?php if( !empty( $template_data ) && ( $template_data['content_bg_type'] == 'transparent' ) ) echo ' selected="selected"'; ?>>Transparent</option>
								</select>
							</td>
							<td>
								<input type="text" class="color {pickerFaceColor:'#fff'} impact-color-box bg-option" id="template_data[content_bg_color]" name="template_data[content_bg_color]" value="<?php if( !empty( $template_data ) ) echo $template_data['content_bg_color'] ?>" />
							</td>
						</tr>
						<tr>
							<td>
								<?php _e("Image:", 'impact'); ?><input type="text" id="content_bg_image_name" name="template_data[content_bg_image_name]" value="<?php if( !empty( $template_data ) ) echo $template_data['content_bg_image_name'] ?>" class="upload_image_textfield bg-option" style="width:150px;" />	
							</td>
							<td>
								<input type="button" id="content_bg_image_button" value="<?php _e('Browse', 'impact'); ?>" class="upload_image_button button" />
							</td>
						</tr>
					</table>
					<table class="impact-templates-table">
						<tr>
							<td colspan="2">
								<strong><?php _e("Sidebar Background: Type|Color|Image", 'impact'); ?></strong>
							</td>
						</tr>
						<tr>
							<td>
								<select id="template_data[sidebar_bg_type]" name="template_data[sidebar_bg_type]" class="iewide bg-option" style="width:200px;">
									<option value="color"<?php if( !empty( $template_data ) && ( $template_data['sidebar_bg_type'] == 'color' ) ) echo ' selected="selected"'; ?>>Color</option>
									<option value="no-repeat"<?php if( !empty( $template_data ) && ( $template_data['sidebar_bg_type'] == 'no-repeat' ) ) echo ' selected="selected"'; ?>>No-Repeat Image</option>
									<option value="repeat-x"<?php if( !empty( $template_data ) && ( $template_data['sidebar_bg_type'] == 'repeat-x' ) ) echo ' selected="selected"'; ?>>Horizontal-Repeat Image</option>
									<option value="repeat-y"<?php if( !empty( $template_data ) && ( $template_data['sidebar_bg_type'] == 'repeat-y' ) ) echo ' selected="selected"'; ?>>Vertical-Repeat Image</option>
									<option value="repeat"<?php if( !empty( $template_data ) && ( $template_data['sidebar_bg_type'] == 'repeat' ) ) echo ' selected="selected"'; ?>>Horizontal & Vertical-Repeat Image</option>
									<option value="transparent"<?php if( !empty( $template_data ) && ( $template_data['sidebar_bg_type'] == 'transparent' ) ) echo ' selected="selected"'; ?>>Transparent</option>
								</select>
							</td>
							<td>
								<input type="text" class="color {pickerFaceColor:'#fff'} impact-color-box bg-option" id="template_data[sidebar_bg_color]" name="template_data[sidebar_bg_color]" value="<?php if( !empty( $template_data ) ) echo $template_data['sidebar_bg_color'] ?>" />
							</td>
						</tr>
						<tr>
							<td>
								<?php _e("Image:", 'impact'); ?><input type="text" id="sidebar_bg_image_name" name="template_data[sidebar_bg_image_name]" value="<?php if( !empty( $template_data ) ) echo $template_data['sidebar_bg_image_name'] ?>" class="upload_image_textfield bg-option" style="width:150px;" />	
							</td>
							<td>
								<input type="button" id="sidebar_bg_image_button" value="<?php _e('Browse', 'impact'); ?>" class="upload_image_button button" />
							</td>
						</tr>
					</table>
					<table class="impact-templates-table">
						<tr>
							<td colspan="2">
								<strong><?php _e("Footer Background: Type|Color|Image", 'impact'); ?></strong>
							</td>
						</tr>
						<tr>
							<td>
								<select id="template_data[footer_bg_type]" name="template_data[footer_bg_type]" class="iewide bg-option" style="width:200px;">
									<option value="color"<?php if( !empty( $template_data ) && ( $template_data['footer_bg_type'] == 'color' ) ) echo ' selected="selected"'; ?>>Color</option>
									<option value="no-repeat"<?php if( !empty( $template_data ) && ( $template_data['footer_bg_type'] == 'no-repeat' ) ) echo ' selected="selected"'; ?>>No-Repeat Image</option>
									<option value="repeat-x"<?php if( !empty( $template_data ) && ( $template_data['footer_bg_type'] == 'repeat-x' ) ) echo ' selected="selected"'; ?>>Horizontal-Repeat Image</option>
									<option value="repeat-y"<?php if( !empty( $template_data ) && ( $template_data['footer_bg_type'] == 'repeat-y' ) ) echo ' selected="selected"'; ?>>Vertical-Repeat Image</option>
									<option value="repeat"<?php if( !empty( $template_data ) && ( $template_data['footer_bg_type'] == 'repeat' ) ) echo ' selected="selected"'; ?>>Horizontal & Vertical-Repeat Image</option>
									<option value="transparent"<?php if( !empty( $template_data ) && ( $template_data['footer_bg_type'] == 'transparent' ) ) echo ' selected="selected"'; ?>>Transparent</option>
								</select>
							</td>
							<td>
								<input type="text" class="color {pickerFaceColor:'#fff'} impact-color-box bg-option" id="template_data[footer_bg_color]" name="template_data[footer_bg_color]" value="<?php echo( !empty( $template_data['footer_bg_color'] ) ? $template_data['footer_bg_color'] : '#FFFFFF' ) ?>" />
							</td>
						</tr>
						<tr>
							<td>
								<?php _e("Image:", 'impact'); ?><input type="text" id="footer_bg_image_name" name="template_data[footer_bg_image_name]" value="<?php if( !empty( $template_data ) ) echo $template_data['footer_bg_image_name'] ?>" class="upload_image_textfield bg-option" style="width:150px;" />	
							</td>
							<td>
								<input type="button" id="footer_bg_image_button" value="<?php _e('Browse', 'impact'); ?>" class="upload_image_button button" />
							</td>
						</tr>
					</table>
					</div>
					
					<h3><a href="#"><?php _e("Border Options", 'impact'); ?></a></h3>
					<div class="impact-boxwrap">
					<table class="impact-templates-table">
						<tr>
							<td>
								<?php _e("Border Style:", 'impact'); ?>
							</td>
							<td>
								<select id="template_data[border_style]" name="template_data[border_style]" style="width:100px;" class="border">
									<option value="solid"<?php if( !empty( $template_data ) && ( $template_data['border_style'] == 'solid' ) ) echo ' selected="selected"'; ?>>solid</option>
									<option value="dotted"<?php if( !empty( $template_data ) && ( $template_data['border_style'] == 'dotted' ) ) echo ' selected="selected"'; ?>>dotted</option>
									<option value="dashed"<?php if( !empty( $template_data ) && ( $template_data['border_style'] == 'dashed' ) ) echo ' selected="selected"'; ?>>dashed</option>
									<option value="double"<?php if( !empty( $template_data ) && ( $template_data['border_style'] == 'double' ) ) echo ' selected="selected"'; ?>>double</option>
								</select>
							</td>
						</tr>
						<tr>
							<td>
								<?php _e("Border Color:", 'impact'); ?>
							</td>
							<td>
								<input type="text" class="color {pickerFaceColor:'fff'} impact-color-box border" id="template_data[border_color]" name="template_data[border_color]" value="<?php if( !empty( $template_data ) ) echo $template_data['border_color'] ?>" />
							</td>
						</tr>
						<tr>
							<td>
								<?php _e("Top & Bottom Thickness:", 'impact'); ?>
							</td>
							<td>
								<input type="text" id="template_data[main_tb_border_thickness]" name="template_data[main_tb_border_thickness]" value="<?php echo (!empty($template_data['main_tb_border_thickness']) ? $template_data['main_tb_border_thickness'] : '0'); ?>" class="border" style="width:50px;" />px
							</td>
						</tr>
						<tr>
							<td>
								<?php _e("Left & Right Thickness:", 'impact'); ?>
							</td>
							<td>
								<input type="text" id="template_data[main_lr_border_thickness]" name="template_data[main_lr_border_thickness]" value="<?php echo (!empty($template_data['main_lr_border_thickness']) ? $template_data['main_lr_border_thickness'] : '0'); ?>" class="border" style="width:50px;" />px
							</td>
						</tr>
					</table>
					</div>
					
					<h3><a href="#"><?php _e("Active Widget Areas", 'impact'); ?></a></h3>
					<div class="impact-boxwrap">
					<table class="impact-templates-table">
						<tr>
							<td>
								<input type="checkbox" id="before_page_wrap_checkbox" name="impact_active_widget_areas[]" value="before_page_wrap"<?php if( is_array( $template_widget_areas ) ) impact_widget_area_checked( $template_widget_areas, 'before_page_wrap' ); ?> class="widget-area-option" >
							</td>
							<td>
								<span style="font-size:10px"><strong><?php _e('Before Page Wrap', 'impact'); ?></strong></span>
							</td>
							<td>
								<select id="template_data[before_page_wrap_align]" name="template_data[before_page_wrap_align]" style="width:100px;" class="widget-area-option" >
									<option value=""><?php _e('No Align', 'impact'); ?></option>
									<option value="left"<?php if( !empty( $template_data ) && ( $template_data['before_page_wrap_align'] == 'left' ) ) echo ' selected="selected"'; ?>><?php _e('Left Align', 'impact'); ?></option>
									<option value="right"<?php if( !empty( $template_data ) && ( $template_data['before_page_wrap_align'] == 'right' ) ) echo ' selected="selected"'; ?>><?php _e('Right Align', 'impact'); ?></option>
								</select>
							</td>
							<td>
								<input type="text" id="before_page_wrap_width" name="template_data[before_page_wrap_width]" value="<?php echo ( !empty($template_data['before_page_wrap_width'] ) ? $template_data['before_page_wrap_width'] : '' ) ?>" class="placeholder widget-area-option" rel="<?php _e('Width', 'impact'); ?>" style="width:50px;" />px
							</td>
						</tr>
						<tr>
							<td>
								<input type="checkbox" id="before_header_checkbox" name="impact_active_widget_areas[]" value="before_header"<?php if( is_array( $template_widget_areas ) ) impact_widget_area_checked( $template_widget_areas, 'before_header' ); ?> class="widget-area-option" >
							</td>
							<td>
								<span style="font-size:10px"><strong><?php _e('Before Header', 'impact'); ?></strong></span>
							</td>
							<td>
								<select id="template_data[before_header_align]" name="template_data[before_header_align]" style="width:100px;" class="widget-area-option" >
									<option value=""><?php _e('No Align', 'impact'); ?></option>
									<option value="left"<?php if( !empty( $template_data ) && ( $template_data['before_header_align'] == 'left' ) ) echo ' selected="selected"'; ?>><?php _e('Left Align', 'impact'); ?></option>
									<option value="right"<?php if( !empty( $template_data ) && ( $template_data['before_header_align'] == 'right' ) ) echo ' selected="selected"'; ?>><?php _e('Right Align', 'impact'); ?></option>
								</select>
							</td>
							<td>
								<input type="text" id="before_header_width" name="template_data[before_header_width]" value="<?php echo ( !empty($template_data['before_header_width'] ) ? $template_data['before_header_width'] : '' ) ?>" class="placeholder widget-area-option" rel="<?php _e('Width', 'impact'); ?>" style="width:50px;" />px
							</td>
						</tr>
						<tr>
							<td>
								<input type="checkbox" id="in_header_checkbox" name="impact_active_widget_areas[]" value="in_header"<?php if( is_array( $template_widget_areas ) ) impact_widget_area_checked( $template_widget_areas, 'in_header' ); ?> class="widget-area-option" >
							</td>
							<td>
								<span style="font-size:10px"><strong><?php _e('In Header', 'impact'); ?></strong></span>
							</td>
							<td>
								<select id="template_data[in_header_align]" name="template_data[in_header_align]" style="width:100px;" class="widget-area-option" >
									<option value=""><?php _e('No Align', 'impact'); ?></option>
									<option value="left"<?php if( !empty( $template_data ) && ( $template_data['in_header_align'] == 'left' ) ) echo ' selected="selected"'; ?>><?php _e('Left Align', 'impact'); ?></option>
									<option value="right"<?php if( !empty( $template_data ) && ( $template_data['in_header_align'] == 'right' ) ) echo ' selected="selected"'; ?>><?php _e('Right Align', 'impact'); ?></option>
								</select>
							</td>
							<td>
								<input type="text" id="in_header_width" name="template_data[in_header_width]" value="<?php echo ( !empty($template_data['in_header_width'] ) ? $template_data['in_header_width'] : '' ) ?>" class="placeholder widget-area-option" rel="<?php _e('Width', 'impact'); ?>" style="width:50px;" />px
							</td>
						</tr>
						<tr>
							<td>
								<input type="checkbox" id="after_header_checkbox" name="impact_active_widget_areas[]" value="after_header"<?php if( is_array( $template_widget_areas ) ) impact_widget_area_checked( $template_widget_areas, 'after_header' ); ?> class="widget-area-option" >
							</td>
							<td>
								<span style="font-size:10px"><strong><?php _e('After Header', 'impact'); ?></strong></span>
							</td>
							<td>
								<select id="template_data[after_header_align]" name="template_data[after_header_align]" style="width:100px;" class="widget-area-option" >
									<option value=""><?php _e('No Align', 'impact'); ?></option>
									<option value="left"<?php if( !empty( $template_data ) && ( $template_data['after_header_align'] == 'left' ) ) echo ' selected="selected"'; ?>><?php _e('Left Align', 'impact'); ?></option>
									<option value="right"<?php if( !empty( $template_data ) && ( $template_data['after_header_align'] == 'right' ) ) echo ' selected="selected"'; ?>><?php _e('Right Align', 'impact'); ?></option>
								</select>
							</td>
							<td>
								<input type="text" id="after_header_width" name="template_data[after_header_width]" value="<?php echo ( !empty($template_data['after_header_width'] ) ? $template_data['after_header_width'] : '' ) ?>" class="placeholder widget-area-option" rel="<?php _e('Width', 'impact'); ?>" style="width:50px;" />px
							</td>
						</tr>
						<tr>
							<td>
								<input type="checkbox" id="before_container_checkbox" name="impact_active_widget_areas[]" value="before_container"<?php if( is_array( $template_widget_areas ) ) impact_widget_area_checked( $template_widget_areas, 'before_container' ); ?> class="widget-area-option" >
							</td>
							<td>
								<span style="font-size:10px"><strong><?php _e('Before Container', 'impact'); ?></strong></span>
							</td>
							<td>
								<select id="template_data[before_container_align]" name="template_data[before_container_align]" style="width:100px;" class="widget-area-option" >
									<option value=""><?php _e('No Align', 'impact'); ?></option>
									<option value="left"<?php if( !empty( $template_data ) && ( $template_data['before_container_align'] == 'left' ) ) echo ' selected="selected"'; ?>><?php _e('Left Align', 'impact'); ?></option>
									<option value="right"<?php if( !empty( $template_data ) && ( $template_data['before_container_align'] == 'right' ) ) echo ' selected="selected"'; ?>><?php _e('Right Align', 'impact'); ?></option>
								</select>
							</td>
							<td>
								<input type="text" id="before_container_width" name="template_data[before_container_width]" value="<?php echo ( !empty($template_data['before_container_width'] ) ? $template_data['before_container_width'] : '' ) ?>" class="placeholder widget-area-option" rel="<?php _e('Width', 'impact'); ?>" style="width:50px;" />px
							</td>
						</tr>
						<tr>
							<td>
								<input type="checkbox" id="before_content_checkbox" name="impact_active_widget_areas[]" value="before_content"<?php if( is_array( $template_widget_areas ) ) impact_widget_area_checked( $template_widget_areas, 'before_content' ); ?> class="widget-area-option" >
							</td>
							<td>
								<span style="font-size:10px"><strong><?php _e('Before Content', 'impact'); ?></strong></span>
							</td>
							<td>
								<select id="template_data[before_content_align]" name="template_data[before_content_align]" style="width:100px;" class="widget-area-option" >
									<option value=""><?php _e('No Align', 'impact'); ?></option>
									<option value="left"<?php if( !empty( $template_data ) && ( $template_data['before_content_align'] == 'left' ) ) echo ' selected="selected"'; ?>><?php _e('Left Align', 'impact'); ?></option>
									<option value="right"<?php if( !empty( $template_data ) && ( $template_data['before_content_align'] == 'right' ) ) echo ' selected="selected"'; ?>><?php _e('Right Align', 'impact'); ?></option>
								</select>
							</td>
							<td>
								<input type="text" id="before_content_width" name="template_data[before_content_width]" value="<?php echo ( !empty($template_data['before_content_width'] ) ? $template_data['before_content_width'] : '' ) ?>" class="placeholder widget-area-option" rel="<?php _e('Width', 'impact'); ?>" style="width:50px;" />px
							</td>
						</tr>
						<tr>
							<td>
								<input type="checkbox" id="after_content_checkbox" name="impact_active_widget_areas[]" value="after_content"<?php if( is_array( $template_widget_areas ) ) impact_widget_area_checked( $template_widget_areas, 'after_content' ); ?> class="widget-area-option" >
							</td>
							<td>
								<span style="font-size:10px"><strong><?php _e('After Content', 'impact'); ?></strong></span>
							</td>
							<td>
								<select id="template_data[after_content_align]" name="template_data[after_content_align]" style="width:100px;" class="widget-area-option" >
									<option value=""><?php _e('No Align', 'impact'); ?></option>
									<option value="left"<?php if( !empty( $template_data ) && ( $template_data['after_content_align'] == 'left' ) ) echo ' selected="selected"'; ?>><?php _e('Left Align', 'impact'); ?></option>
									<option value="right"<?php if( !empty( $template_data ) && ( $template_data['after_content_align'] == 'right' ) ) echo ' selected="selected"'; ?>><?php _e('Right Align', 'impact'); ?></option>
								</select>
							</td>
							<td>
								<input type="text" id="after_content_width" name="template_data[after_content_width]" value="<?php echo ( !empty($template_data['after_content_width'] ) ? $template_data['after_content_width'] : '' ) ?>" class="placeholder widget-area-option" rel="<?php _e('Width', 'impact'); ?>" style="width:50px;" />px
							</td>
						</tr>
						<tr>
							<td>
								<input type="checkbox" id="before_sidebar_checkbox" name="impact_active_widget_areas[]" value="before_sidebar"<?php if( is_array( $template_widget_areas ) ) impact_widget_area_checked( $template_widget_areas, 'before_sidebar' ); ?> class="widget-area-option" >
							</td>
							<td>
								<span style="font-size:10px"><strong><?php _e('Before Sidebar', 'impact'); ?></strong></span>
							</td>
							<td>
								<select id="template_data[before_sidebar_align]" name="template_data[before_sidebar_align]" style="width:100px;" class="widget-area-option" >
									<option value=""><?php _e('No Align', 'impact'); ?></option>
									<option value="left"<?php if( !empty( $template_data ) && ( $template_data['before_sidebar_align'] == 'left' ) ) echo ' selected="selected"'; ?>><?php _e('Left Align', 'impact'); ?></option>
									<option value="right"<?php if( !empty( $template_data ) && ( $template_data['before_sidebar_align'] == 'right' ) ) echo ' selected="selected"'; ?>><?php _e('Right Align', 'impact'); ?></option>
								</select>
							</td>
							<td>
								<input type="text" id="before_sidebar_width" name="template_data[before_sidebar_width]" value="<?php echo ( !empty($template_data['before_sidebar_width'] ) ? $template_data['before_sidebar_width'] : '' ) ?>" class="placeholder widget-area-option" rel="<?php _e('Width', 'impact'); ?>" style="width:50px;" />px
							</td>
						</tr>
						<tr>
							<td>
								<input type="checkbox" id="after_sidebar_checkbox" name="impact_active_widget_areas[]" value="after_sidebar" <?php if( is_array( $template_widget_areas ) ) impact_widget_area_checked( $template_widget_areas, 'after_sidebar' ); ?> class="widget-area-option" >
							</td>
							<td>
								<span style="font-size:10px"><strong><?php _e('After Sidebar', 'impact'); ?></strong></span>
							</td>
							<td>
								<select id="template_data[after_sidebar_align]" name="template_data[after_sidebar_align]" style="width:100px;" class="widget-area-option" >
									<option value=""><?php _e('No Align', 'impact'); ?></option>
									<option value="left"<?php if( !empty( $template_data ) && ( $template_data['after_sidebar_align'] == 'left' ) ) echo ' selected="selected"'; ?>><?php _e('Left Align', 'impact'); ?></option>
									<option value="right"<?php if( !empty( $template_data ) && ( $template_data['after_sidebar_align'] == 'right' ) ) echo ' selected="selected"'; ?>><?php _e('Right Align', 'impact'); ?></option>
								</select>
							</td>
							<td>
								<input type="text" id="after_sidebar_width" name="template_data[after_sidebar_width]" value="<?php echo ( !empty($template_data['after_sidebar_width'] ) ? $template_data['after_sidebar_width'] : '' ) ?>" class="placeholder widget-area-option" rel="<?php _e('Width', 'impact'); ?>" style="width:50px;" />px
							</td>
						</tr>
						<tr>
							<td>
								<input type="checkbox" id="before_sidebar2_checkbox" name="impact_active_widget_areas[]" value="before_sidebar2"<?php if( is_array( $template_widget_areas ) ) impact_widget_area_checked( $template_widget_areas, 'before_sidebar2' ); ?> class="widget-area-option" >
							</td>
							<td>
								<span style="font-size:10px"><strong><?php _e('Before Sidebar2', 'impact'); ?></strong></span>
							</td>
							<td>
								<select id="template_data[before_sidebar2_align]" name="template_data[before_sidebar2_align]" style="width:100px;" class="widget-area-option" >
									<option value=""><?php _e('No Align', 'impact'); ?></option>
									<option value="left"<?php if( !empty( $template_data ) && ( $template_data['before_sidebar2_align'] == 'left' ) ) echo ' selected="selected"'; ?>><?php _e('Left Align', 'impact'); ?></option>
									<option value="right"<?php if( !empty( $template_data ) && ( $template_data['before_sidebar2_align'] == 'right' ) ) echo ' selected="selected"'; ?>><?php _e('Right Align', 'impact'); ?></option>
								</select>
							</td>
							<td>
								<input type="text" id="before_sidebar2_width" name="template_data[before_sidebar2_width]" value="<?php echo ( !empty($template_data['before_sidebar2_width'] ) ? $template_data['before_sidebar2_width'] : '' ) ?>" class="placeholder widget-area-option" rel="<?php _e('Width', 'impact'); ?>" style="width:50px;" />px
							</td>
						</tr>
						<tr>
							<td>
								<input type="checkbox" id="after_sidebar2_checkbox" name="impact_active_widget_areas[]" value="after_sidebar2" <?php if( is_array( $template_widget_areas ) ) impact_widget_area_checked( $template_widget_areas, 'after_sidebar2' ); ?> class="widget-area-option" >
							</td>
							<td>
								<span style="font-size:10px"><strong><?php _e('After Sidebar2', 'impact'); ?></strong></span>
							</td>
							<td>
								<select id="template_data[after_sidebar2_align]" name="template_data[after_sidebar2_align]" style="width:100px;" class="widget-area-option" >
									<option value=""><?php _e('No Align', 'impact'); ?></option>
									<option value="left"<?php if( !empty( $template_data ) && ( $template_data['after_sidebar2_align'] == 'left' ) ) echo ' selected="selected"'; ?>><?php _e('Left Align', 'impact'); ?></option>
									<option value="right"<?php if( !empty( $template_data ) && ( $template_data['after_sidebar2_align'] == 'right' ) ) echo ' selected="selected"'; ?>><?php _e('Right Align', 'impact'); ?></option>
								</select>
							</td>
							<td>
								<input type="text" id="after_sidebar2_width" name="template_data[after_sidebar2_width]" value="<?php echo ( !empty($template_data['after_sidebar2_width'] ) ? $template_data['after_sidebar2_width'] : '' ) ?>" class="placeholder widget-area-option" rel="<?php _e('Width', 'impact'); ?>" style="width:50px;" />px
							</td>
						</tr>
						<tr>
							<td>
								<input type="checkbox" id="after_container_checkbox" name="impact_active_widget_areas[]" value="after_container"<?php if( is_array( $template_widget_areas ) ) impact_widget_area_checked( $template_widget_areas, 'after_container' ); ?> class="widget-area-option" >
							</td>
							<td>
								<span style="font-size:10px"><strong><?php _e('After Container', 'impact'); ?></strong></span>
							</td>
							<td>
								<select id="template_data[after_container_align]" name="template_data[after_container_align]" style="width:100px;" class="widget-area-option" >
									<option value=""><?php _e('No Align', 'impact'); ?></option>
									<option value="left"<?php if( !empty( $template_data ) && ( $template_data['after_container_align'] == 'left' ) ) echo ' selected="selected"'; ?>><?php _e('Left Align', 'impact'); ?></option>
									<option value="right"<?php if( !empty( $template_data ) && ( $template_data['after_container_align'] == 'right' ) ) echo ' selected="selected"'; ?>><?php _e('Right Align', 'impact'); ?></option>
								</select>
							</td>
							<td>
								<input type="text" id="after_container_width" name="template_data[after_container_width]" value="<?php echo ( !empty($template_data['after_container_width'] ) ? $template_data['after_container_width'] : '' ) ?>" class="placeholder widget-area-option" rel="<?php _e('Width', 'impact'); ?>" style="width:50px;" />px
							</td>
						</tr>
						<tr>
							<td>
								<input type="checkbox" id="before_footer_checkbox" name="impact_active_widget_areas[]" value="before_footer"<?php if( is_array( $template_widget_areas ) ) impact_widget_area_checked( $template_widget_areas, 'before_footer' ); ?> class="widget-area-option" >
							</td>
							<td>
								<span style="font-size:10px"><strong><?php _e('Before Footer', 'impact'); ?></strong></span>
							</td>
							<td>
								<select id="template_data[before_footer_align]" name="template_data[before_footer_align]" style="width:100px;" class="widget-area-option" >
									<option value=""><?php _e('No Align', 'impact'); ?></option>
									<option value="left"<?php if( !empty( $template_data ) && ( $template_data['before_footer_align'] == 'left' ) ) echo ' selected="selected"'; ?>><?php _e('Left Align', 'impact'); ?></option>
									<option value="right"<?php if( !empty( $template_data ) && ( $template_data['before_footer_align'] == 'right' ) ) echo ' selected="selected"'; ?>><?php _e('Right Align', 'impact'); ?></option>
								</select>
							</td>
							<td>
								<input type="text" id="before_footer_width" name="template_data[before_footer_width]" value="<?php echo ( !empty($template_data['before_footer_width'] ) ? $template_data['before_footer_width'] : '' ) ?>" class="placeholder widget-area-option" rel="<?php _e('Width', 'impact'); ?>" style="width:50px;" />px
							</td>
						</tr>
						<tr>
							<td>
								<input type="checkbox" id="in_footer_checkbox" name="impact_active_widget_areas[]" value="in_footer"<?php if( is_array( $template_widget_areas ) ) impact_widget_area_checked( $template_widget_areas, 'in_footer' ); ?> class="widget-area-option" >
							</td>
							<td>
								<span style="font-size:10px"><strong><?php _e('In Footer', 'impact'); ?></strong></span>
							</td>
							<td>
								<select id="template_data[in_footer_align]" name="template_data[in_footer_align]" style="width:100px;" class="widget-area-option" >
									<option value=""><?php _e('No Align', 'impact'); ?></option>
									<option value="left"<?php if( !empty( $template_data ) && ( $template_data['in_footer_align'] == 'left' ) ) echo ' selected="selected"'; ?>><?php _e('Left Align', 'impact'); ?></option>
									<option value="right"<?php if( !empty( $template_data ) && ( $template_data['in_footer_align'] == 'right' ) ) echo ' selected="selected"'; ?>><?php _e('Right Align', 'impact'); ?></option>
								</select>
							</td>
							<td>
								<input type="text" id="in_footer_width" name="template_data[in_footer_width]" value="<?php echo ( !empty($template_data['in_footer_width'] ) ? $template_data['in_footer_width'] : '' ) ?>" class="placeholder widget-area-option" rel="<?php _e('Width', 'impact'); ?>" style="width:50px;" />px
							</td>
						</tr>
						<tr>
							<td>
								<input type="checkbox" id="after_footer_checkbox" name="impact_active_widget_areas[]" value="after_footer"<?php if( is_array( $template_widget_areas ) ) impact_widget_area_checked( $template_widget_areas, 'after_footer' ); ?> class="widget-area-option" >
							</td>
							<td>
								<span style="font-size:10px"><strong><?php _e('After Footer', 'impact'); ?></strong></span>
							</td>
							<td>
								<select id="template_data[after_footer_align]" name="template_data[after_footer_align]" style="width:100px;" class="widget-area-option" >
									<option value=""><?php _e('No Align', 'impact'); ?></option>
									<option value="left"<?php if( !empty( $template_data ) && ( $template_data['after_footer_align'] == 'left' ) ) echo ' selected="selected"'; ?>><?php _e('Left Align', 'impact'); ?></option>
									<option value="right"<?php if( !empty( $template_data ) && ( $template_data['after_footer_align'] == 'right' ) ) echo ' selected="selected"'; ?>><?php _e('Right Align', 'impact'); ?></option>
								</select>
							</td>
							<td>
								<input type="text" id="after_footer_width" name="template_data[after_footer_width]" value="<?php echo ( !empty($template_data['after_footer_width'] ) ? $template_data['after_footer_width'] : '' ) ?>" class="placeholder widget-area-option" rel="<?php _e('Width', 'impact'); ?>" style="width:50px;" />px
							</td>
						</tr>
						<tr>
							<td>
								<input type="checkbox" id="after_page_wrap_checkbox" name="impact_active_widget_areas[]" value="after_page_wrap"<?php if( is_array( $template_widget_areas ) ) impact_widget_area_checked( $template_widget_areas, 'after_page_wrap' ); ?> class="widget-area-option" >
							</td>
							<td>
								<span style="font-size:10px"><strong><?php _e('After Page Wrap', 'impact'); ?></strong></span>
							</td>
							<td>
								<select id="template_data[after_page_wrap_align]" name="template_data[after_page_wrap_align]" style="width:100px;" class="widget-area-option" >
									<option value=""><?php _e('No Align', 'impact'); ?></option>
									<option value="left"<?php if( !empty( $template_data ) && ( $template_data['after_page_wrap_align'] == 'left' ) ) echo ' selected="selected"'; ?>><?php _e('Left Align', 'impact'); ?></option>
									<option value="right"<?php if( !empty( $template_data ) && ( $template_data['after_page_wrap_align'] == 'right' ) ) echo ' selected="selected"'; ?>><?php _e('Right Align', 'impact'); ?></option>
								</select>
							</td>
							<td>
								<input type="text" id="after_page_wrap_width" name="template_data[after_page_wrap_width]" value="<?php echo ( !empty($template_data['after_page_wrap_width'] ) ? $template_data['after_page_wrap_width'] : '' ) ?>" class="placeholder widget-area-option" rel="<?php _e('Width', 'impact'); ?>" style="width:50px;" />px
							</td>
						</tr>
					</table>
					</div>
					
					<h3><a href="#"><?php _e("Template Custom CSS", 'impact'); ?></a></h3>
					<div class="impact-boxwrap">
					<table class="impact-templates-table">
						<tr>
							<td>
							<textarea id="template_data[custom_css]" name="template_data[custom_css]" style="width:300px;height:300px;" class="custom-css"><?php
							if( isset( $template_data['custom_css'] ) )
							{
								echo $template_data['custom_css'];
							}
							else
							{
								include( IMPACT_CSS . '/impact-custom-css-defaults.css');
							}							
							?></textarea>
							</td>
						</tr>
					</table>
					</div>

				</div> 
			</div>
		
		</form>
		
		
	</div> <!--close impact-admin-pagewrap-->
	
	<div class="impact-template-preview">
		<button id="show-options-button" class="ui-state-default ui-corner-all" type="button"><?php _e('Show Template Options', 'impact') ?></button>
		<!--<button id="show-css-builder-button" class="ui-state-default ui-corner-all" type="button"><?php _e('Show CSS Builder', 'impact') ?></button>-->
		<?php require_once(IMPACT_TEMPLATES . '/impact-template-builder.tpl.php'); ?>
	</div>
	
	<div id="impact-ie-warning" style="display:none; text-align:center; width:99%;">
		<p><span style="color:red;font-weight:bold;font-size:14px;"><?php _e('Are You Still Using Internet Explorer?', 'impact'); ?></span></p>
		<p><?php _e('We suggest upgrading to a better browser for web design & development. We recommend:','impact'); ?></p>
		<p><a href="http://www.mozilla.com"><span style="font-size:18px;">Mozilla Firefox</span></a></p>
		<p><?php _e('-or-', 'impact'); ?></p>
		<p><a href="http://www.google.com/chrome"><span style="font-size:18px;">Google Chrome</span></a></p>
		<p><span style="color:red;font-weight:bold;font-size:12px;"><?php _e('If you insist on sticking with Internet Explorer, beware that we do not guarantee the Impact Template Builder will be fully compatible.', 'impact'); ?></span></p>
	</div>

<?php
}

function impact_template_defaults()
{
	$defaults = array(
		'template_id' => 'Template 1',
		'header_template' => 'fixed',
		'footer_template' => 'fixed',
		'sidebar_template' => 'right',
		'header_height' => '100',
		'main_content_width' => '500',
		'sidebar_width' => '200',
		'sidebar2_width' => '200',
		'footer_height' => '80',
		'tb_margin' => '20',
		'tb_content_margin' => '20',
		'tb_content_padding' => '20',
		'lr_content_padding' => '20',
		'lr_container_padding' => '20',
		'divider_width' => '0',
		'title_area' => 'text',
		'title_top_margin' => '20',
		'title_left_margin' => '40',
		'main_bg_type' => 'color',
		'main_bg_color' => '355C6D',
		'header_bg_type' => 'color',
		'header_bg_color' => 'EEEEEE',
		'wrap_bg_type' => 'color',
		'wrap_bg_color' => 'FFFFFF',
		'content_bg_type' => 'color',
		'content_bg_color' => 'FFFFFF',
		'sidebar_bg_type' => 'color',
		'sidebar_bg_color' => 'FFFFFF',
		'footer_bg_type' => 'color',
		'footer_bg_color' => 'EEEEEE',
		'border_style' => 'solid',
		'border_color' => 'FFFFFF',
		'main_tb_border_thickness' => '0',
		'main_lr_border_thickness' => '0',
	);
	
	return $defaults;
}

//end lib/admin/impact-template-builder.php