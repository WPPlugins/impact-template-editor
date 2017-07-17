<style type="text/css">
<?php if( empty( $template_data ) )
{ ?>
/* IDs */
#impact-superwrap {
	width: 99%;
	background: #ABB4BA;
	display: inline-block;
	text-align: justify;
	color: #666666;
	border: 1px solid #ABB4BA;
}
#impact-page-wrap {
	background: transparent;
	border-top: 0px solid #FFFFFF;
	border-bottom: 0px solid #FFFFFF;
	border-left: 0px solid #FFFFFF;
	border-right: 0px solid #FFFFFF;
	width: 960px;
	margin: 20px auto 20px;
}
#impact-header-outer {
	background: #FFFFFF;
	width: 100%;
	clear: both;
}
#impact-header-wrap {
	width: 960px;
	height: 100px;
	position: relative;
	margin: 0px auto;
}
#impact-title {
	float: left;
	display: block;
}
#impact-container {
	width: 960px;
	margin-top: 20px;
	margin-bottom: 20px;
	display: inline-block;
	float:left;
}
#impact-content-sidebar-wrap {
	display: inline-block;
	float:left;
}
#impact-content-wrap {
	width: 580px;
	padding-left: 20px;
	padding-right: 20px;
	padding-top:10px;
	padding-bottom:10px;
	background: #FFFFFF;
	float: left;
	position: relative;
}
#impact-content {
	clear:both;
}
#impact-sidebar-wrap {
	background: #FFFFFF;
	width: 180px;
	float: right;
	position: relative;
	padding-left: 20px;
	padding-right: 20px;
	padding-top:10px;
	padding-bottom:10px;
}
#impact-sidebar2-wrap {
	background: #FFFFFF;
	width: 180px;
	float: right;
	position: relative;
	padding-left: 20px;
	padding-right: 20px;
	padding-top:10px;
	padding-bottom:10px;
}
#impact-footer-outer {
	background: #FFFFFF;
	width: 100%;
	clear: both;
}
#impact-footer-wrap {
	width: 960px;
	height: 100px;
	position: relative;
	margin: 0px auto;
}
/* Classes */
.outer-wrap {
	width:100%;
	float:left;
}
.float-left {
	float:left;
}
.float-right {
	float:right;
}
<?php
}
else
{
	require_once('impact-template.php');
}
?>
#impact-content {
	height: 270px;
}
#impact-sidebar {
	height: 270px;
}
#impact-sidebar2 {
	height: 270px;
}
h1 {
	margin:0;
}
</style>
<div id="impact-custom-css">
<?php
if(!empty( $template_data ) )
{
	echo '<style type="text/css">' . "\n";
	echo $template_data['custom_css'] . "\n";
	echo '</style>';
}
?>
</div>

<div id="impact-superwrap">

	<div id="before-page-wrap-outer" class="outer-wrap">
		<div id="impact-before-page-wrap">
		</div>
	</div>

	<div id="impact-page-wrap">
	
			<div id="before-header-outer" class="outer-wrap">
			<div id="impact-before-header">
			</div>
			</div>

		<div id="impact-header-outer">
		<div id="impact-header-wrap">

				<div id="impact-title">
				</div>
				
				<div id="impact-in-header">
				</div>
	
		</div><!--#impact-header-wrap-->
		</div><!--#impact-header-outer-->
		
		<div id="after-header-outer" class="outer-wrap">
			<div id="impact-after-header">
			</div>
		</div>
		
		<div id="before-container-outer" class="outer-wrap">
			<div id="impact-before-container">
			</div>
		</div>
		
		<div id="impact-container">

			<div id="impact-content-sidebar-wrap">
			<div id="impact-content-wrap">
			
				<div id="before-content-outer" class="outer-wrap">
					<div id="impact-before-content">
					</div>
				</div>
			
				<div id="impact-content">
				
					<div class="page">
						
						<span style="margin:0px 0px 5px;padding:0px 0px 15px">
						<h1 style="font-size:20px;color:#222222;font-family:Arial,Tahoma,Verdana;font-weight:normal;margin:10px 0 0 0; class="entry-title">Main Content</h1>
						</span>
						<span style="color:#222222;font-size:13px;font-family:Arial,Tahoma,Verdana;line-height:160%;">
						<div class="entry-content">
							<?php _e('<p>There was nothing so VERY remarkable in that; nor did Alice think it so VERY much out of the way to hear the Rabbit say to itself, "Oh dear! Oh dear! I shall be late!" (when she thought it over afterwards, it occurred to her that she ought to have wondered at this, but at the time it all seemed quite natural); but when the Rabbit actually TOOK A WATCH OUT OF ITS WAISTCOAT-POCKET, and looked at it, and then hurried on, Alice started to her feet, for it flashed across her mind that she had never before seen a rabbit with either a waistcoat-pocket, or a watch to take out of it, and burning with curiosity, she ran across the field after it, and fortunately was just in time to see it pop down a large rabbit-hole under the hedge.</p><p>In another moment down went Alice after it, never once considering how in the world she was to get out again. The rabbit-hole went straight on like a tunnel for some way, and then dipped suddenly down, so suddenly that Alice had not a moment to think about stopping herself before she found herself falling down a very deep well.</p>', 'impact'); ?>
						</div>
						</span>
						<!-- .entry-content -->
					
					</div><!-- .page -->

				</div>

				<div id="after-content-outer" class="outer-wrap">
					<div id="impact-after-content">
					</div>
				</div>

			<div style="clear:both;"></div>
			</div><!--#impact-content-wrap-->

			<div id="impact-sidebar-wrap">
				
				<div id="before-sidebar-outer" class="outer-wrap">
					<div id="impact-before-sidebar">
					</div>
				</div>
			
				<div id="sidebar-outer" class="outer-wrap">
					<div id="impact-sidebar">
						<h2 style="margin:10px 0 0 0;padding:0;font-size:13px;color:#222222;font-weight: bold;" class="entry-title">Sidebar</h2>
						<span style="color:#222222;font-size:13px;font-family:Arial,Tahoma,Verdana;line-height:160%;">
						<?php _e('<p>"Have you guessed the riddle yet?" the Hatter said, turning to Alice again.</p><p>"No, I give it up," Alice replied: "what\'s the answer?"</p><p>"I haven\'t the slightest idea," said the Hatter.</p><p>"Nor I," said the March Hare.</p>', 'impact'); ?>
						</span>
					</div>
				</div>
				
				<div id="after-sidebar-outer" class="outer-wrap">
					<div id="impact-after-sidebar">
					</div>
				</div>

			</div><!--#impact-sidebar-wrap-->
			</div><!--#impact-content-sidebar-wrap-->
			
			<div id="impact-sidebar2-wrap">
				
				<div id="before-sidebar2-outer" class="outer-wrap">
					<div id="impact-before-sidebar2">
					</div>
				</div>
			
				<div id="sidebar2-outer" class="outer-wrap">
					<div id="impact-sidebar2">
						<h2 style="margin:10px 0 0 0;padding:0;font-size:13px;color:#222222;font-weight: bold;" class="entry-title">Sidebar2</h2>
						<span style="color:#222222;font-size:13px;font-family:Arial,Tahoma,Verdana;line-height:160%;">
						<?php _e('<p>"Would you tell me, please, which way I ought to go from here?"</p><p>"That depends a good deal on where you want to get to," said the Cat.</p><p>"I don\'t much care where--" said Alice.</p><p>"Then it doesn\'t matter which way you go," said the Cat.</p>', 'impact'); ?>
						</span>
					</div>
				</div>
				
				<div id="after-sidebar2-outer" class="outer-wrap">
					<div id="impact-after-sidebar2">
					</div>
				</div>

			</div><!--#impact-sidebar2-wrap-->

		</div><!--#impact-container-->
		
		<div id="after-container-outer" class="outer-wrap">
			<div id="impact-after-container">
			</div>
		</div>


		<div id="before-footer-outer" class="outer-wrap">
			<div id="impact-before-footer">
			</div>
		</div>
		
		<div id="impact-footer-outer">
		<div id="impact-footer-wrap">
		
			<div id="impact-in-footer">
			</div>
			
		</div><!--#impact-footer-wrap-->
		</div><!--#impact-footer-outer-->

			<div id="after-footer-outer" class="outer-wrap">
			<div id="impact-after-footer">
			</div>
			</div>
	
	<div style="clear:both;"></div>
	</div><!--#impact-page-wrap-->

	<div id="after-page-wrap-outer" class="outer-wrap">
		<div id="impact-after-page-wrap">
		</div>
	</div>

</div><!--#impact-superwrap-->