<div style="display:none;" id="catalyst-custom-css-builder" class="catalyst-optionbox-outer-1col">
	<div class="catalyst-optionbox-inner-1col">
		<h3 style="cursor:pointer; -moz-border-radius: 3px 3px 0px 0px; -webkit-border-radius: 3px 3px 0px 0px; border-radius: 3px 3px 0px 0px;"><?php _e( 'Custom CSS Builder', 'catalyst' ); ?> <span id="custom-css-builder-tooltip" class="tooltip-mark tooltip-bottom-center">[?]</span></h3>
		
		<div class="tooltip tooltip-600">
			<h5><?php _e( 'A CSS Building Tool', 'catalyst' ); ?></h5>
			
			<p>
				<?php _e( 'The Custom CSS Builder is a great little tool that can be used as a simple reference or a full blown CSS coding factory.', 'catalyst' ); ?>
			</p>
			
			<h5><?php _e( 'Full Chunks vs Snippets', 'catalyst' ); ?></h5>
			
			<p>
				<?php _e( 'The "Open/Close Elements" tab provides the ability to output the opening and closing elements for most of the default
				classes and IDs in Catalyst. With this you can build full CSS code chunks to then be pasted into the Custom CSS option box (or
				custom.css file if using the Dynamik Child Theme).', 'catalyst' ); ?>
			</p>
			
			<p>
				<?php _e( 'Sometimes you won\'t need the whole CSS chunk, but instead only need a snippet or two. In this case you can go to any
				of the tabs, select the styles you need and insert them into the Custom CSS textarea, ready for copy/paste. This is perfect for
				either adding to your Custom Stylesheet or the "#Custom" boxes scattered throughout the Dynamik Child Theme options (if active,
				of course).', 'catalyst' ); ?>
			</p>
			
			<h5><?php _e( '#Custom CSS For Your Fonts', 'catalyst' ); ?></h5>
				
			<p>
				<?php _e( 'You\'ll find that most of the font options have a #Custom button to the right. When clicked a textarea will slide down.
				Here you can add any font styling you like and it will be applied to that font type in the dynamik stylesheet. You will see that
				the exact CSS ID/class that will be effected is shown at the top of each textarea. And don\'t forget that if you need any CSS
				assistance the Custom CSS Builder is only a mouse click away!', 'catalyst' ); ?>
				<center><img src="<?php echo bloginfo('template_url'); ?>/lib/css/images/tooltips/tooltip-custom-buttons.png"/></center>
			</p>
		</div>
		
		<form name="form">
		<div id="catalyst-custom-css-builder-wrap">
			<div id="catalyst-custom-css-builder-wrap-inner" class="bg-box">				
				<div id="catalyst-custom-css-builder-nav">
					<ul>
						<li id="custom-css-builder-nav-open-close-elements" class="catalyst-css-builder-nav-all"><a href="#">Elements</a></li><li id="custom-css-builder-nav-backgrounds" class="catalyst-css-builder-nav-all"><a href="#">Backgrounds</a></li><li id="custom-css-builder-nav-borders" class="catalyst-css-builder-nav-all"><a href="#">Borders</a></li><li id="custom-css-builder-nav-margins-padding" class="catalyst-css-builder-nav-all"><a href="#">Margins & Padding</a></li><li id="custom-css-builder-nav-fonts" class="catalyst-css-builder-nav-all catalyst-options-nav-active"><a href="#">Fonts</a></li><li id="custom-css-builder-nav-dimensions-position" class="catalyst-css-builder-nav-all"><a href="#">Dimensions & Position</a></li><li id="custom-css-builder-nav-shadows" class="catalyst-css-builder-nav-all"><a href="#">Shadows</a></li><li id="custom-css-builder-nav-widgets" class="catalyst-css-builder-nav-all"><a class="catalyst-options-nav-last" href="#">Widgets</a></li>
					</ul>
				</div>
				
				<div id="custom-css-builder-nav-open-close-elements-box" class="catalyst-all-css-builder">
					<p style="float:left;">
						<select id="custom_css_divs" name="custom_css_divs" size="1" style="width:300px; margin-bottom:10px;">
						<?php catalyst_list_css_elements(); ?>
						</select><br />
						<input class="custom-css-builder-button-bgs" type="button" value="Insert Catalyst CSS Element/Brackets" onclick="insertAtCaret(this.form.text, this.form.custom_css_divs.value+'\n\n}')"><br />
						<select id="ez_widget_areas_css_divs" name="ez_widget_areas_css_divs" size="1" style="width:300px; margin-bottom:10px;">
						<?php catalyst_list_ez_elements(); ?>
						</select><br />
						<input class="custom-css-builder-button-bgs" type="button" value="Insert EZ Widget Area Element/Brackets" onclick="insertAtCaret(this.form.text, this.form.ez_widget_areas_css_divs.value+'\n\n}')"><br />
						<select id="hybrid_css_divs" name="hybrid_css_divs" size="1" style="width:300px; margin-bottom:10px;">
						<?php catalyst_list_hybrid_elements(); ?>
						</select><br />
						<input class="custom-css-builder-button-bgs" type="button" value="Insert Hybrid Element/Brackets" onclick="insertAtCaret(this.form.text, this.form.hybrid_css_divs.value+'\n\n}')"><br />
					</p>
				</div>
				
				<div id="custom-css-builder-nav-backgrounds-box" class="catalyst-all-css-builder">
					<p style="float:left;">
						<select id="background_type" name="background_type" size="1" class="iewide" style="width:230px;">
							<option value="no-repeat"><?php _e( 'No-Repeat Image (Left)', 'catalyst' ); ?></option>
							<option value="top center no-repeat"><?php _e( 'No-Repeat Image (Center)', 'catalyst' ); ?></option>
							<option value="top right no-repeat"><?php _e( 'No-Repeat Image (Right)', 'catalyst' ); ?></option>
							<option value="fixed no-repeat"><?php _e( 'No-Repeat Image (Left Fixed)', 'catalyst' ); ?></option>
							<option value="top center fixed no-repeat"><?php _e( 'No-Repeat Image (Center Fixed)', 'catalyst' ); ?></option>
							<option value="top right fixed no-repeat"><?php _e( 'No-Repeat Image (Right Fixed)', 'catalyst' ); ?></option>
							<option value="top left repeat-x"><?php _e( 'Horizontal-Repeat Image (Left)', 'catalyst' ); ?></option>
							<option value="top center repeat-x"><?php _e( 'Horizontal-Repeat Image (Center)', 'catalyst' ); ?></option>
							<option value="top right repeat-x"><?php _e( 'Horizontal-Repeat Image (Right)', 'catalyst' ); ?></option>
							<option value="top left fixed repeat-x"><?php _e( 'Horizontal-Repeat Image (Left Fixed)', 'catalyst' ); ?></option>
							<option value="top center fixed repeat-x"><?php _e( 'Horizontal-Repeat Image (Center Fixed)', 'catalyst' ); ?></option>
							<option value="top right fixed repeat-x"><?php _e( 'Horizontal-Repeat Image (Right Fixed)', 'catalyst' ); ?></option>				
							<option value="top left repeat-y"><?php _e( 'Vertical-Repeat Image (Left)', 'catalyst' ); ?></option>
							<option value="top center repeat-y"><?php _e( 'Vertical-Repeat Image (Center)', 'catalyst' ); ?></option>
							<option value="top right repeat-y"><?php _e( 'Vertical-Repeat Image (Right)', 'catalyst' ); ?></option>
							<option value="top left fixed repeat-y"><?php _e( 'Vertical-Repeat Image (Left Fixed)', 'catalyst' ); ?></option>
							<option value="top center fixed repeat-y"><?php _e( 'Vertical-Repeat Image (Center Fixed)', 'catalyst' ); ?></option>
							<option value="top right fixed repeat-y"><?php _e( 'Vertical-Repeat Image (Right Fixed)', 'catalyst' ); ?></option>						
							<option value="repeat"><?php _e( 'Horizontal & Vertical-Repeat Image', 'catalyst' ); ?></option>
							<option value="fixed repeat"><?php _e( 'Horizontal & Vertical-Repeat Image (Fixed)', 'catalyst' ); ?></option>
						</select> <?php _e( 'Type', 'catalyst' ); ?><br />
						<input type="text" class="color {pickerFaceColor:'#FFFFFF'} color-box-230" id="background_color" name="background_color" value="" /> <?php _e( 'Color', 'catalyst' ); ?><br />
						<?php if( defined( 'DYNAMIK_ACTIVE' ) ) { ?>
						<select id="background_image" name="background_image" size="1" style="width:230px; margin-bottom:10px;"><?php catalyst_list_images(); ?></select> <?php _e( 'Image', 'catalyst' ); ?><br />
						<input class="custom-css-builder-button-bgs" type="button" value="Insert Image Background CSS" onclick="insertAtCaret(this.form.text, 'background: #'+this.form.background_color.value+' url(images/'+this.form.background_image.value+') '+this.form.background_type.value+';\n')"><br />
						<?php } else { ?>
						<input type="text" id="background_image" name="background_image" value="" style="width:230px; margin-bottom:10px;" /> <?php _e( 'Image URL', 'catalyst' ); ?><br />
						<input class="custom-css-builder-button-bgs" type="button" value="Insert Image Background CSS" onclick="insertAtCaret(this.form.text, 'background: #'+this.form.background_color.value+' url('+this.form.background_image.value+') '+this.form.background_type.value+';\n')"><br />
						<?php } ?>
						
						<input type="text" class="color {pickerFaceColor:'#FFFFFF'} color-box-230" id="background_color2" name="background_color2" value="" style="margin-bottom:10px;" /> <?php _e( 'Color', 'catalyst' ); ?><br />
						<input class="custom-css-builder-button-bgs" type="button" value="Insert Color Background CSS" onclick="insertAtCaret(this.form.text, 'background: #'+this.form.background_color2.value+';\n')"><br />
						
						<input class="custom-css-builder-button-bgs" type="button" value="Insert Transparent Background CSS" onclick="insertAtCaret(this.form.text, 'background: transparent;\n')">
					</p>
				</div>
				
				<div id="custom-css-builder-nav-borders-box" class="catalyst-all-css-builder">
					<p style="float:left;">
						<?php _e( 'Type', 'catalyst' ); ?>
						<select id="border_type" name="border_type" size="1" style="width:100px;">
							<option value="border"><?php _e( 'Full', 'catalyst' ); ?></option>
							<option value="border-top"><?php _e( 'Top', 'catalyst' ); ?></option>
							<option value="border-bottom"><?php _e( 'Bottom', 'catalyst' ); ?></option>
							<option value="border-left"><?php _e( 'Left', 'catalyst' ); ?></option>
							<option value="border-right"><?php _e( 'Right', 'catalyst' ); ?></option>
						</select>
						<?php _e( 'Thickness', 'catalyst' ); ?>
						<input type="text" id="border_thickness" name="border_thickness" value="0" style="width:35px;" /><?php _e( 'px', 'catalyst' ); ?><br />
						<?php _e( 'Style', 'catalyst' ); ?>
						<select id="border_style" name="border_style" size="1" style="width:100px;">
							<?php catalyst_list_borders(); ?>
						</select>
						<?php _e( 'Color', 'catalyst' ); ?>
						<input type="text" class="color {pickerFaceColor:'#FFFFFF'}" style="width:70px;" id="border_color" name="border_color" value="" /><br />
						<input class="custom-css-builder-button-bgs" type="button" value="Insert Border CSS" style="margin-top:10px;" onclick="insertAtCaret(this.form.text, this.form.border_type.value+': '+this.form.border_thickness.value+'px '+this.form.border_style.value+' #'+this.form.border_color.value+';\n')"><br />
					
						<?php _e( 'Tp-Lft', 'catalyst' ); ?>
						<input type="text" id="border_radius_top" name="border_radius_top" value="0" style="width:30px;" />
						<?php _e( 'Tp-Rt', 'catalyst' ); ?>
						<input type="text" id="border_radius_right" name="border_radius_right" value="0" style="width:30px;" />
						<?php _e( 'Btm-Rt', 'catalyst' ); ?>
						<input type="text" id="border_radius_bottom" name="border_radius_bottom" value="0" style="width:30px;" />
						<?php _e( 'Btm-Lft', 'catalyst' ); ?>
						<input type="text" id="border_radius_left" name="border_radius_left" value="0" style="width:30px; margin-bottom:10px;" /><br />
						<input class="custom-css-builder-button-bgs" type="button" value="Insert Border Radius CSS (in pixels)" onclick="insertAtCaret(this.form.text, '-moz-border-radius: '+this.form.border_radius_top.value+'px '+this.form.border_radius_right.value+'px '+this.form.border_radius_bottom.value+'px '+this.form.border_radius_left.value+'px;\n-webkit-border-radius: '+this.form.border_radius_top.value+'px '+this.form.border_radius_right.value+'px '+this.form.border_radius_bottom.value+'px '+this.form.border_radius_left.value+'px;\nborder-radius: '+this.form.border_radius_top.value+'px '+this.form.border_radius_right.value+'px '+this.form.border_radius_bottom.value+'px '+this.form.border_radius_left.value+'px;\n')">
					</p>
				</div>
				
				<div id="custom-css-builder-nav-margins-padding-box" class="catalyst-all-css-builder">
					<p style="float:left;">
						<?php _e( 'Top', 'catalyst' ); ?>
						<input type="text" id="margin_top" name="margin_top" value="0" style="width:35px;" />
						<?php _e( 'Right', 'catalyst' ); ?>
						<input type="text" id="margin_right" name="margin_right" value="0" style="width:35px;" />
						<?php _e( 'Bottom', 'catalyst' ); ?>
						<input type="text" id="margin_bottom" name="margin_bottom" value="0" style="width:35px;" />
						<?php _e( 'Left', 'catalyst' ); ?>
						<input type="text" id="margin_left" name="margin_left" value="0" style="width:35px; margin-bottom:10px;" /><br />
						<input class="custom-css-builder-button-bgs" type="button" value="Insert Margin CSS" onclick="insertAtCaret(this.form.text, 'margin: '+this.form.margin_top.value+'px '+this.form.margin_right.value+'px '+this.form.margin_bottom.value+'px '+this.form.margin_left.value+'px;\n')"><br />

						<?php _e( 'Top', 'catalyst' ); ?>
						<input type="text" id="padding_top" name="padding_top" value="0" style="width:35px;" />
						<?php _e( 'Right', 'catalyst' ); ?>
						<input type="text" id="padding_right" name="padding_right" value="0" style="width:35px;" />
						<?php _e( 'Bottom', 'catalyst' ); ?>
						<input type="text" id="padding_bottom" name="padding_bottom" value="0" style="width:35px;" />
						<?php _e( 'Left', 'catalyst' ); ?>
						<input type="text" id="padding_left" name="padding_left" value="0" style="width:35px; margin-bottom:10px;" /><br />
						<input class="custom-css-builder-button-bgs" type="button" value="Insert Padding CSS" onclick="insertAtCaret(this.form.text, 'padding: '+this.form.padding_top.value+'px '+this.form.padding_right.value+'px '+this.form.padding_bottom.value+'px '+this.form.padding_left.value+'px;\n')">
					</p>
				</div>
				
				<div id="custom-css-builder-nav-fonts-box" class="catalyst-all-css-builder catalyst-options-display">
					<p style="float:left;">
						<input class="custom-css-builder-button" type="button" value="Insert Font Type" onclick="insertAtCaret(this.form.text, 'font-family: '+this.form.font_type.value+';\n')">
						<select id="font_type" name="font_type" size="1" style="width:150px;">
						<?php catalyst_build_font_menu(); ?></select><br />
						<input class="custom-css-builder-button" type="button" value="Insert Font Size" onclick="insertAtCaret(this.form.text, 'font-size: '+this.form.font_size.value+'px;\n')">
						<input type="text" id="font_size" name="font_size" value="12" style="width:35px;" /><?php _e( 'px |', 'catalyst' ); ?> <?php _e( 'Thickness', 'catalyst' ); ?><br />
						<input class="custom-css-builder-button" type="button" value="Insert Font Color" onclick="insertAtCaret(this.form.text, 'color: #'+this.form.font_color.value+';\n')">
						<input type="text" class="color {pickerFaceColor:'#FFFFFF'} color-box-150" id="font_color" name="font_color" value="" /><br />
						<input class="custom-css-builder-button" type="button" value="Insert Font Weight" onclick="insertAtCaret(this.form.text, 'font-weight: '+this.form.font_weight.value+';\n')">
						<select id="font_weight" name="font_weight" size="1" class="iewide" style="width:150px;">
							<option value="normal"><?php _e( 'Normal', 'catalyst' ); ?></option>
							<option value="bold"><?php _e( 'Bold', 'catalyst' ); ?></option>
						</select><br />
						<input class="custom-css-builder-button" type="button" value="Insert Font Style" onclick="insertAtCaret(this.form.text, 'font-style: '+this.form.font_style.value+';\n')">
						<select id="font_style" name="font_style" size="1" class="iewide" style="width:150px;">
							<option value="normal"><?php _e( 'Normal', 'catalyst' ); ?></option>
							<option value="italic"><?php _e( 'Italic', 'catalyst' ); ?></option>
						</select><br />
						<input class="custom-css-builder-button" type="button" value="Insert Text Align" onclick="insertAtCaret(this.form.text, 'text-align: '+this.form.text_align.value+';\n')">
						<select id="text_align" name="text_align" size="1" class="iewide" style="width:150px;">
							<option value="left"><?php _e( 'Left', 'catalyst' ); ?></option>
							<option value="center"><?php _e( 'Center', 'catalyst' ); ?></option>
							<option value="right"><?php _e( 'Right', 'catalyst' ); ?></option>
						</select><br />
						<input class="custom-css-builder-button" type="button" value="Insert Transform" onclick="insertAtCaret(this.form.text, 'text-transform: '+this.form.font_caps.value+';\n')">
						<select id="font_caps" name="font_caps" size="1" class="iewide" style="width:150px;">
							<option value="none"><?php _e( 'None', 'catalyst' ); ?></option>
							<option value="uppercase"><?php _e( 'Uppercase', 'catalyst' ); ?></option>
							<option value="lowercase"><?php _e( 'Lowercase', 'catalyst' ); ?></option>
							<option value="capitalize"><?php _e( 'Capitalize', 'catalyst' ); ?></option>
						</select><br />
						<input class="custom-css-builder-button" type="button" value="Insert Letter Spacing" onclick="insertAtCaret(this.form.text, 'letter-spacing: '+this.form.letter_spacing.value+';\n')">
						<select id="letter_spacing" name="letter_spacing" size="1" class="iewide" style="width:150px;">
							<option value=".5px"><?php _e( '.5px', 'catalyst' ); ?></option>
							<option value="1px"><?php _e( '1px', 'catalyst' ); ?></option>
							<option value="1.5px"><?php _e( '1.5px', 'catalyst' ); ?></option>
							<option value="2px"><?php _e( '2px', 'catalyst' ); ?></option>
							<option value="2.5px"><?php _e( '2.5px', 'catalyst' ); ?></option>
							<option value="3px"><?php _e( '3px', 'catalyst' ); ?></option>
							<option value="3.5px"><?php _e( '3.5px', 'catalyst' ); ?></option>
							<option value="4px"><?php _e( '4px', 'catalyst' ); ?></option>
						</select><br />
						<input class="custom-css-builder-button" type="button" value="Insert Line Height" onclick="insertAtCaret(this.form.text, 'line-height: '+this.form.line_height.value+';\n')">
						<select id="line_height" name="line_height" size="1" class="iewide" style="width:150px;">
							<option value="100%"><?php _e( '100%', 'catalyst' ); ?></option>
							<option value="110%"><?php _e( '110%', 'catalyst' ); ?></option>
							<option value="120%"><?php _e( '120%', 'catalyst' ); ?></option>
							<option value="130%"><?php _e( '130%', 'catalyst' ); ?></option>
							<option value="140%"><?php _e( '140%', 'catalyst' ); ?></option>
							<option value="150%"><?php _e( '150%', 'catalyst' ); ?></option>
							<option value="160%"><?php _e( '160%', 'catalyst' ); ?></option>
							<option value="170%"><?php _e( '170%', 'catalyst' ); ?></option>
							<option value="180%"><?php _e( '180%', 'catalyst' ); ?></option>
							<option value="190%"><?php _e( '190%', 'catalyst' ); ?></option>
							<option value="200%"><?php _e( '200%', 'catalyst' ); ?></option>
						</select><br />
						<input class="custom-css-builder-button" type="button" value="Insert Txt Decoration" onclick="insertAtCaret(this.form.text, 'text-decoration: '+this.form.text_decoration.value+';\n')">
						<select id="text_decoration" name="text_decoration" size="1" class="iewide" style="width:150px;">
							<option value="none"><?php _e( 'none', 'catalyst' ); ?></option>
							<option value="underline"><?php _e( 'underline', 'catalyst' ); ?></option>
							<option value="overline"><?php _e( 'overline', 'catalyst' ); ?></option>
							<option value="line-through"><?php _e( 'line-through', 'catalyst' ); ?></option>
							<option value="blink"><?php _e( 'blink', 'catalyst' ); ?></option>
							<option value="inherit"><?php _e( 'inherit', 'catalyst' ); ?></option>
						</select>
					</p>
				</div>
				
				<div id="custom-css-builder-nav-dimensions-position-box" class="catalyst-all-css-builder">
					<p style="float:left;">		
						<input class="custom-css-builder-button" type="button" value="Insert Width CSS" onclick="insertAtCaret(this.form.text, 'width: '+this.form.width.value+'px;\n')">
						<input type="text" id="width" name="width" value="" style="width:40px;" /><?php _e( 'px', 'catalyst' ); ?><br />
						<input class="custom-css-builder-button" type="button" value="Insert Height CSS" onclick="insertAtCaret(this.form.text, 'height: '+this.form.height.value+'px;\n')">
						<input type="text" id="height" name="height" value="" style="width:40px;" /><?php _e( 'px', 'catalyst' ); ?><br />
						<input class="custom-css-builder-button" type="button" value="Insert Float CSS" onclick="insertAtCaret(this.form.text, 'float: '+this.form.float_direction.value+';\n')">
						<select id="float_direction" name="float_direction" size="1" class="iewide" style="width:100px;">
							<option value="none"><?php _e( 'None', 'catalyst' ); ?></option>
							<option value="left"><?php _e( 'Left', 'catalyst' ); ?></option>
							<option value="right"><?php _e( 'Right', 'catalyst' ); ?></option>
						</select><br />
						<input class="custom-css-builder-button" type="button" value="Insert Position" onclick="insertAtCaret(this.form.text, 'position: '+this.form.position.value+';\n')">
						<select id="position" name="position" size="1" class="iewide" style="width:150px;">
							<option value="absolute"><?php _e( 'absolute', 'catalyst' ); ?></option>
							<option value="fixed"><?php _e( 'fixed', 'catalyst' ); ?></option>
							<option value="relative"><?php _e( 'relative', 'catalyst' ); ?></option>
							<option value="static"><?php _e( 'static', 'catalyst' ); ?></option>
							<option value="inherit"><?php _e( 'inherit', 'catalyst' ); ?></option>
						</select><br />
						<input class="custom-css-builder-button" type="button" value="Insert Display" onclick="insertAtCaret(this.form.text, 'display: '+this.form.display.value+';\n')">
						<select id="display" name="display" size="1" class="iewide" style="width:150px;">
							<option value="none"><?php _e( 'none', 'catalyst' ); ?></option>
							<option value="block"><?php _e( 'block', 'catalyst' ); ?></option>
							<option value="inline"><?php _e( 'inline', 'catalyst' ); ?></option>
							<option value="inline-block"><?php _e( 'inline-block', 'catalyst' ); ?></option>
							<option value="inline-table"><?php _e( 'inline-table', 'catalyst' ); ?></option>
							<option value="list-item"><?php _e( 'list-item', 'catalyst' ); ?></option>
							<option value="run-in"><?php _e( 'run-in', 'catalyst' ); ?></option>
							<option value="table"><?php _e( 'table', 'catalyst' ); ?></option>
							<option value="table-caption"><?php _e( 'table-caption', 'catalyst' ); ?></option>
							<option value="table-cell"><?php _e( 'table-cell', 'catalyst' ); ?></option>
							<option value="table-column"><?php _e( 'table-column', 'catalyst' ); ?></option>
							<option value="table-column-group"><?php _e( 'table-column-group', 'catalyst' ); ?></option>
							<option value="table-footer-group"><?php _e( 'table-footer-group', 'catalyst' ); ?></option>
							<option value="table-header-group"><?php _e( 'table-header-group', 'catalyst' ); ?></option>
							<option value="table-row"><?php _e( 'table-row', 'catalyst' ); ?></option>
							<option value="table-row-group"><?php _e( 'table-row-group', 'catalyst' ); ?></option>
							<option value="inherit"><?php _e( 'inherit', 'catalyst' ); ?></option>
						</select>
					</p>
				</div>
				
				<div id="custom-css-builder-nav-shadows-box" class="catalyst-all-css-builder">
					<p style="float:left;">
						<?php _e( 'Lft-Rt', 'catalyst' ); ?>
						<input type="text" id="box_shadow_lr" name="box_shadow_lr" value="0" style="width:40px;" />
						<?php _e( 'Tp-Btm', 'catalyst' ); ?>
						<input type="text" id="box_shadow_tb" name="box_shadow_tb" value="0" style="width:40px;" /><br />
						<?php _e( 'Blur', 'catalyst' ); ?>
						<input type="text" id="box_shadow_blur" name="box_shadow_blur" value="0" style="width:30px;" />
						<?php _e( 'Spread', 'catalyst' ); ?>
						<input type="text" id="box_shadow_spread" name="box_shadow_spread" value="0" style="width:30px; margin-bottom:10px;" />
						<?php _e( 'Color', 'catalyst' ); ?>
						<input type="text" class="color {pickerFaceColor:'#FFFFFF'}" style="width:70px;" id="box_shadow_color" name="box_shadow_color" value="" style="margin-bottom:10px;"/><br />
						<input class="custom-css-builder-button-bgs" type="button" value="Insert Box Shadow CSS (in pixels)" onclick="insertAtCaret(this.form.text, '-moz-box-shadow: '+this.form.box_shadow_lr.value+'px '+this.form.box_shadow_tb.value+'px '+this.form.box_shadow_blur.value+'px '+this.form.box_shadow_spread.value+'px #'+this.form.box_shadow_color.value+';\n-webkit-box-shadow: '+this.form.box_shadow_lr.value+'px '+this.form.box_shadow_tb.value+'px '+this.form.box_shadow_blur.value+'px '+this.form.box_shadow_spread.value+'px #'+this.form.box_shadow_color.value+';\nbox-shadow: '+this.form.box_shadow_lr.value+'px '+this.form.box_shadow_tb.value+'px '+this.form.box_shadow_blur.value+'px '+this.form.box_shadow_spread.value+'px #'+this.form.box_shadow_color.value+';\n')"><br />
						
						<?php _e( 'Lft-Rt', 'catalyst' ); ?>
						<input type="text" id="text_shadow_lr" name="text_shadow_lr" value="0" style="width:40px;" />
						<?php _e( 'Tp-Btm', 'catalyst' ); ?>
						<input type="text" id="text_shadow_tb" name="text_shadow_tb" value="0" style="width:40px;" /><br />
						<?php _e( 'Blur', 'catalyst' ); ?>
						<input type="text" id="text_shadow_blur" name="text_shadow_blur" value="0" style="width:30px; margin-bottom:10px;" />
						<?php _e( 'Color', 'catalyst' ); ?>
						<input type="text" class="color {pickerFaceColor:'#FFFFFF'}" style="width:70px;" id="text_shadow_color" name="text_shadow_color" value="" style="margin-bottom:10px;"/><br />
						<input class="custom-css-builder-button-bgs" type="button" value="Insert Text Shadow CSS (in pixels)" onclick="insertAtCaret(this.form.text, 'text-shadow: '+this.form.text_shadow_lr.value+'px '+this.form.text_shadow_tb.value+'px '+this.form.text_shadow_blur.value+'px #'+this.form.text_shadow_color.value+';\n')">
					</p>
				</div>

				<div id="custom-css-builder-nav-widgets-box" class="catalyst-all-css-builder">
					<p style="float:left; margin-bottom:0;">
						<span style="font-weight:bold;"><?php _e( 'Class:', 'catalyst' ); ?></span>
						<select id="widget_class" name="widget_class" size="1" class="iewide" style="width:250px; margin-bottom:5px;">
							<?php catalyst_widget_class_dropdown(); ?>
						</select><br />
						
						<span style="font-weight:bold;"><?php _e( 'Width Calc:', 'catalyst' ); ?></span> <?php _e( '("Parent" = Widget Area Container)', 'catalyst' ); ?><br />
						<?php _e( 'Parent Width', 'catalyst' ); ?>
						<input type="text" class="custom-widget-width-option" id="site_width" name="site_width" value="0" style="width:45px; margin-top:5px;" /> |
						<?php _e( '# of Horizontal Widgets', 'catalyst' ); ?>
						<input type="text" class="custom-widget-width-option" id="widgets_number" name="widgets_number" value="0" style="width:35px; margin-bottom:10px;" /><br />
						
						<span style="font-weight:bold;"><?php _e( 'Border:', 'catalyst' ); ?></span>
						<?php _e( 'Type', 'catalyst' ); ?>
						<select class="custom-widget-width-option" id="widget_border_type" name="widget_border_type" size="1" style="width:80px;">
							<option value="border"><?php _e( 'Full', 'catalyst' ); ?></option>
							<option value="border-top"><?php _e( 'Top', 'catalyst' ); ?></option>
							<option value="border-bottom"><?php _e( 'Bottom', 'catalyst' ); ?></option>
							<option value="border-left"><?php _e( 'Left', 'catalyst' ); ?></option>
							<option value="border-right"><?php _e( 'Right', 'catalyst' ); ?></option>
						</select>
						<?php _e( 'Thickness', 'catalyst' ); ?>
						<input type="text" class="custom-widget-width-option" id="widget_border_thickness" name="widget_border_thickness" value="0" style="width:35px;" /><?php _e( 'px', 'catalyst' ); ?><br />
						<?php _e( 'Style', 'catalyst' ); ?>
						<select id="widget_border_style" name="widget_border_style" size="1" style="width:80px;">
							<?php catalyst_list_borders(); ?>
						</select>
						<?php _e( 'Color', 'catalyst' ); ?>
						<input type="text" class="color {pickerFaceColor:'#FFFFFF'}" style="width:70px;" id="widget_border_color" name="widget_border_color" value="" style="margin-bottom:10px;"/><br />
						
						<span style="font-weight:bold;"><?php _e( 'Margin:', 'catalyst' ); ?></span>
						<?php _e( 'Top', 'catalyst' ); ?><input type="text" id="widget_margin_top" name="widget_margin_top" value="0" style="width:35px;" />
						<?php _e( 'Rt', 'catalyst' ); ?><input type="text" class="custom-widget-width-option" id="widget_margin_right" name="widget_margin_right" value="0" style="width:35px;" />
						<?php _e( 'Btm', 'catalyst' ); ?><input type="text" id="widget_margin_bottom" name="widget_margin_bottom" value="0" style="width:35px;" />
						<?php _e( 'Lft', 'catalyst' ); ?><input type="text" class="custom-widget-width-option" id="widget_margin_left" name="widget_margin_left" value="0" style="width:35px;" /><br />

						<span style="font-weight:bold;"><?php _e( 'Padding:', 'catalyst' ); ?></span>
						<?php _e( 'Top', 'catalyst' ); ?><input type="text" id="widget_padding_top" name="widget_padding_top" value="0" style="width:35px;" />
						<?php _e( 'Rt', 'catalyst' ); ?><input class="custom-widget-width-option" type="text" id="widget_padding_right" name="widget_padding_right" value="0" style="width:35px;" />
						<?php _e( 'Btm', 'catalyst' ); ?><input type="text" id="widget_padding_bottom" name="widget_padding_bottom" value="0" style="width:35px;" />
						<?php _e( 'Lft', 'catalyst' ); ?><input class="custom-widget-width-option" type="text" id="widget_padding_left" name="widget_padding_left" value="0" style="width:35px; margin-bottom:10px;" /><br />
						
						<span style="font-weight:bold;"><?php _e( 'Widget Width:', 'catalyst' ); ?></span>
						<input type="text" id="widget_width" name="widget_width" value="0" style="width:45px;" readonly="readonly" /><?php _e( 'px', 'catalyst' ); ?>
						<span style="font-weight:bold;"><?php _e( 'Float:', 'catalyst' ); ?></span>
						<select id="widget_float_direction" name="widget_float_direction" size="1" class="iewide" style="width:60px; margin-bottom:10px;">
							<option value="left"><?php _e( 'Left', 'catalyst' ); ?></option>
							<option value="right"><?php _e( 'Right', 'catalyst' ); ?></option>
							<option value="none"><?php _e( 'None', 'catalyst' ); ?></option>
						</select><br />
						<input class="custom-css-builder-button-bgs" type="button" value="Insert Custom Widget Area CSS" onclick="insertAtCaret(this.form.text, '.'+this.form.widget_class.value+' {\nwidth: '+this.form.widget_width.value+'px;\nfloat: '+this.form.widget_float_direction.value+';\n'+this.form.widget_border_type.value+': '+this.form.widget_border_thickness.value+'px '+this.form.widget_border_style.value+' #'+this.form.widget_border_color.value+';\nmargin: '+this.form.widget_margin_top.value+'px '+this.form.widget_margin_right.value+'px '+this.form.widget_margin_bottom.value+'px '+this.form.widget_margin_left.value+'px;\npadding: '+this.form.widget_padding_top.value+'px '+this.form.widget_padding_right.value+'px '+this.form.widget_padding_bottom.value+'px '+this.form.widget_padding_left.value+'px;\n}\n')">
					</p>
				</div>
			
				<p style="float:right;">
					<textarea name="text" style="width:430px; height:260px;"></textarea>
				</p>
			</div>
		</div>
		</form>
	</div>
</div>