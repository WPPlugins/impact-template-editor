<?php
function impact_hook_boxes_admin()
{
global $impact_root;
?>
	<div class="impact-admin-pagewrap">

		<?php
		
			/* To get & display first template by default */
		
			$template_data = impact_get_firsttemplate( );
			$template_id = impact_get_firsttemplateid( ); 
				
		if( ( !empty( $_POST ) ) && ( $_POST['clicked_button'] == __('Save Hook Box', 'impact') ) )
		{		
			//$template_id = $_POST['impact_templates_list'];
			$hook_location = $_POST['impact_hooks_list'];
			$hook_id = strtolower( str_replace( ' ', '_', $template_id ) ) . '_' . $hook_location; 
			if( $_POST['widget_position'] == 'after' )
			{
				$widget_position = 15;
			}
			else
			{
				$widget_position = 5;
			}		
			$hook_textarea = htmlspecialchars($_POST['impact_hook_textarea']);
			$impact_valid_template = impact_valid_id($template_id);
			$impact_valid_location = impact_valid_id($hook_location);
			
			if( $impact_valid_template == 'valid' && $impact_valid_location == 'valid' )
			{
				$update_hook_box = impact_update_hook_box( $hook_id, $template_id, $hook_location, $widget_position, $hook_textarea );
				
				if( $update_hook_box )
				{
		?>			<div id="impact-updated" class="impact-update" style="position:absolute;margin-top:10px;">	
						<p>
							<?php _e('Hook ', 'impact'); ?><em><?php echo $hook_id ?></i></em> <?php _e('has been Updated!', 'impact'); ?>
						</p>
					</div>
		<?php	}
		
				$hook_textarea = stripslashes( $hook_textarea );
			}
			elseif( $impact_valid_template == 'blank' || $impact_valid_locaiton == 'blank' )
			{
		?>		<div id="impact-must-choose" class="impact-update" style="position:absolute;margin-top:10px;">	
					<p>
						<?php _e('You Must Choose A Template & Hook Location', 'impact'); ?>
					</p>
				</div>
		<?php
			}
		}
		elseif( ( !empty( $_POST ) ) && ( $_POST['clicked_button'] == __('Edit Hook Box', 'impact') ) )
		{
			$hook_data = impact_get_hook( $_POST['hooks_edit_list'] );
			$hook_id = $hook_data['hook_id'];
			$template_id = $hook_data['template_id'];
			$hook_location = $hook_data['hook_location'];
			$widget_position = $hook_data['widget_position'];
			$hook_textarea = $hook_data['hook_textarea'];
		}
		elseif( ( !empty( $_POST ) ) && ( $_POST['clicked_button'] == __('Delete Hook Box', 'impact') ) )
		{ 
			if(!$_POST['hooks_delete_list'])
			{
		?>
					<div id="impact-notdeleted" class="impact-update" style="position:absolute;margin-top:10px;">	
						<p>
							<?php _e('Please choose Hook first!', 'impact'); ?>
						</p>
					</div>
		<?php 
			}
			else
			{
				$delete_hook = impact_delete_hook( $_POST['hooks_delete_list'] );
				
				if( $delete_hook )
				{
		?>			<div id="impact-deleted" class="impact-update" style="position:absolute;margin-top:10px;">	
						<p>
							<?php _e('Hook ', 'impact'); ?><em><?php echo $_POST['hooks_delete_list'] ?></em><?php _e(' has been Deleted!', 'impact'); ?>
						</p>
					</div>
		<?php	}
			}
		}
		?>
		<div class="impact-admin-title">
		
			<img src="<?php echo IMPACT_IMAGES_URL . '/impact_admin_logo.png'; ?>"><p style="float:right;margin:24px 18px 0px 0px;"><a href="http://impactpagebuilder.com/resources">Impact User Resources</a> | <a href="http://impactpagebuilder.com/forum">Impact Support Forum</a></p>
			
		</div>
		
		<form id="hook-box-form" method="post">
		
		<div class="impact-admin-3column">
			
			<div id="impact-edit-hook" class="impact-admin-box vp3col">
				<h3><?php _e('Edit Hook Box', 'impact'); ?></h3>
				<div class="impact-boxwrap">
				<table class="impact-option-table">
					<tr>
						<td>
							<select id="hooks_edit_list" name="hooks_edit_list" style="width:200px;" class="iewide"><?php impact_list_hook_boxes( $hook_id ); ?></select>
						</td>
					</tr>
					<tr>
						<td>
							<input type="submit" name="clicked_button" value="<?php _e('Edit Hook Box', 'impact'); ?>" class="button-highlighted"/>
						</td>
					</tr>
				</table>
				</div>
			</div>
			
		</div>
	
		<div class="impact-admin-3column">

			<div id="impact-create-hook" class="impact-admin-box vp3col">
				<h3><?php _e('Save Hook Box', 'impact'); ?></h3>			
				<div class="impact-boxwrap">
				<table class="impact-option-table">
					<tr>
						<td colspan="2">
							<!--  <select id="impact_templates_list" name="impact_templates_list" style="width:200px;" class="iewide"><?php impact_list_templates( $template_id ); ?></select>-->
							<label for="impact_templates_list" id="impact_templates_list" style="width:200px;"><?php echo "<b>". ucfirst( $template_id )."</b>"; ?></label>
						</td>
					</tr>
					<tr>
						<td colspan="2">
							<select id="impact_hooks_list" name="impact_hooks_list" style="width:200px;" class="iewide"><?php impact_list_hook_locations( $hook_location ); ?></select>
						</td>
					</tr>
					<tr>
						<td>
							<?php _e('Before Widgets', 'impact') ?> <input type="radio" value="before" name="widget_position"<?php if( $widget_position == 5 || empty( $widget_position ) ) echo ' CHECKED'; ?>>
						</td>
						<td>
							<?php _e('After Widgets', 'impact') ?> <input type="radio" value="after" name="widget_position"<?php if( $widget_position == 15 ) echo ' checked'; ?>>
						</td>
					</tr>
					<tr>
						<td colspan="2">
							<input type="submit" name="clicked_button" value="<?php _e('Save Hook Box', 'impact'); ?>" class="impact-admin-button button-primary" />
						</td>
					</tr>
				</table>
				</div>
			</div>
		
		</div>
		
		<div class="impact-admin-3column">
			
			<div id="impact-delete-hook" class="impact-admin-box vp3col">
				<h3><?php _e('Delete Hook Box', 'impact'); ?></h3>
				<div class="impact-boxwrap">
				<table class="impact-option-table">
					<tr>
						<td>
							<select id="hooks_delete_list" name="hooks_delete_list" style="width:200px;" class="iewide"><?php impact_list_hook_boxes( $hook_id ); ?></select>
						</td>
					</tr>
					<tr>
						<td>
							<input type="submit" name="clicked_button" value="<?php _e('Delete Hook Box', 'impact'); ?>" class="button-highlighted"/>
						</td>
					</tr>
				</table>
				</div>
			</div>
			
		</div>
		
		<div class="impact-admin-1column">
				
			<div id="impact-hook-box" class="impact-admin-box vp1col">
				<h3><?php _e('Enter Custom HTML, JavaScript & Text Here', 'impact'); ?></h3>			
				<div class="impact-boxwrap">
				<table class="impact-option-table">
					<tr>
						<td>
							<textarea id="impact_hook_textarea" name="impact_hook_textarea" style="width:750px;height:300px;" class="placeholder" rel="Put your stuff here"><?php echo $hook_textarea; ?></textarea>
						</td>
					</tr>
				</table>
				</div>
			</div>
			
		</div>
		
		</form>
		
	</div> <!--close impact-admin-pagewrap-->

<?php
}

//end lib/admin/impact-hook-builder.phpx`