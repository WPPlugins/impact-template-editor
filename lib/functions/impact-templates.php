<?php
function impact_get_template( $template_id )
{
	global $wpdb;
	
	$impact_templates = $wpdb->prefix . 'impact_templates';
	
	if( $template_fetch = $wpdb->get_var( "SELECT `data` FROM $impact_templates WHERE `template_id`='$template_id'" ) )
	{
		$template_data = unserialize( $template_fetch );
		
		if( !empty( $template_data['custom_css'] ) )
		{
			$template_data['custom_css'] = stripslashes( $template_data['custom_css']  );
		}
		
		return $template_data;
	}
	else
	{
		return false;
	}
}

function impact_stripslashes_deep($value)
{
    $value = is_array($value) ?
                array_map('stripslashes_deep', $value) :
                stripslashes($value);

    return $value;
}

add_action( 'wp_ajax_template_data_save', 'template_data_save_ajax' );
function template_data_save_ajax()
{	
	check_ajax_referer( 'template-data', 'security' );

	$template_data = $_POST['template_data']; 	
	$template_id = $_POST['templateid'];	
	$impact_active_widget_areas = $_POST['impact_active_widget_areas'];
	
	$default_css = file_get_contents( IMPACT_CSS . '/impact-custom-css-defaults.css' );
		
	if( $template_data['custom_css'] == $default_css )
	{
		$template_data['custom_css'] = '';				
	}
	
	$template_data = impact_prune_array( $template_data );		
	$impact_valid_id = impact_valid_id( $template_id );

	if( !empty( $template_data['sidebar_template'] ) && ( $template_data['sidebar_template'] == 'right' || $template_data['sidebar_template'] == 'left' ) )
	{
		$impact_active_widget_areas[] = 'sidebar';
	}
	elseif( !empty( $template_data['sidebar_template'] ) && ( $template_data['sidebar_template'] == 'double' || $template_data['sidebar_template'] == 'double_right' || $template_data['sidebar_template'] == 'double_left' ) )
	{
		$impact_active_widget_areas[] = 'sidebar';
		$impact_active_widget_areas[] = 'sidebar2';
	}
	
	if( $impact_valid_id == 'valid' )
	{
		$update_template = impact_update_template( $template_id, $template_data ); 		
		$store_widget_areas = impact_store_widget_areas( $template_id, $impact_active_widget_areas );
		$template_widget_areas = impact_get_active_widget_areas( $template_id );
		
		if( $update_template || $store_widget_areas )
		{
			$response = '<p>' . __("Template <em>{$template_id}</em> Has Been Updated!", 'impact') . '</p>';
		}
	}
	elseif( $impact_valid_id == 'blank' )
	{
		$response = '<p>' . __('Template ID Must Not Be Blank', 'impact') . '</p>';
	}
	elseif( $impact_valid_id == 'chars' )
	{
		$response = '<p>' . __('Template ID Must Contain Only Letters, Numbers, Spaces, Hyphens & Underscores', 'impact') . '<p>';

	}
	echo $response;
	exit();
}


function impact_update_template( $template_id, $template_data )
{
	global $wpdb;
	
	$impact_templates = $wpdb->prefix . 'impact_templates';
	$template_update = serialize( $template_data ); 
				
	if( $wpdb->update( $impact_templates, array( 'data' => $template_update ), array( 'template_id' => $template_id ) ) )
	{
		$response = 'update'; 
	}
	else
	{
		$response = false;
	}
	
	return $response;
}

function impact_list_templates( $selected = 'none_selected' )
{
	global $wpdb;
	
	$impact_templates = $wpdb->prefix . 'impact_templates';
	
	echo '<option value="">Choose Template...</option>';
	
	if( $templates = $wpdb->get_col( "SELECT `template_id` FROM $impact_templates" ) )
	{
		foreach( $templates as $template )
		{
			$option = '<option value="' . $template . '"';
			
			if( $template == $selected )
			{
				$option .= ' selected="selected"';
			}
			
			$option .= '>' . $template . '</option>';
			
			echo $option;
		}
	}
	else
	{
		return false;
	}
}

function impact_valid_id( $id )
{
	if( !empty( $id ) )
	{
		if( !preg_match( '/[^a-z0-9 _-]/i', $id ) )
		{
			return 'valid';
		}
		else
		{
			return 'chars';
		}
	}
	else
	{
		return 'blank';
	}
}

function impact_prune_array( $array )
{
	$empty_elements = array_keys( $array,"" );
	
	foreach( $empty_elements as $e )
	{
		unset( $array[$e] );
	}
	
	return $array;
}
function impact_get_firsttemplate( )
{
	global $wpdb;
	
	$impact_templates = $wpdb->prefix . 'impact_templates';
	
	if( $template_fetch = $wpdb->get_var( "SELECT `data` FROM $impact_templates LIMIT 1" ) )
	{
		$template_data = unserialize( $template_fetch );
		
		if( !empty( $template_data['custom_css'] ) )
		{
			$template_data['custom_css'] = stripslashes( $template_data['custom_css']  );
		}
		
		return $template_data;
	}
	else
	{
		return false;
	}
}
function impact_get_firsttemplateid( )
{
	global $wpdb;
	
	$impact_templates = $wpdb->prefix . 'impact_templates';
	
	if( $template_id = $wpdb->get_var( "SELECT `template_id` FROM $impact_templates LIMIT 1" ) )
	{			
		return $template_id;
	}
	else
	{
		return false;
	}
}

//end lib/functions/impact-templates.php