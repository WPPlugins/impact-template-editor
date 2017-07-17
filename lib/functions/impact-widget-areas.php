<?php
add_action('init', 'impact_spawn_widget_areas');
function impact_spawn_widget_areas()
{
	global $wpdb;
	
	$impact_widgets = $wpdb->prefix . 'impact_widgets';
	$impact_widget_areas = array();
	$impact_widget_areas = $wpdb->get_results( "SELECT * FROM $impact_widgets", ARRAY_A );
	
	array_multisort( $impact_widget_areas );
	
	foreach( $impact_widget_areas as $impact_widget_area => $widget_bits )
	{	
		if( $widget_bits['active_widget'] == 'yes' )
		{	
			impact_register_sidebar( $widget_bits );
		}
	}
}

function impact_register_sidebar( $widget_bits )
{
	$args = array(
		'name'          => $widget_bits['name'],
		'id'            => $widget_bits['widget_id'],
		'description'   => $widget_bits['description'],
		'before_widget' => $widget_bits['before_widget'],
		'after_widget'  => $widget_bits['after_widget'],
		'before_title'  => $widget_bits['before_title'],
		'after_title'   => $widget_bits['after_title'],
	);
	
	if( register_sidebar( $args ) )
	{
		return true;
	}
	else
	{
		return false;
	}
}

function impact_hook_widget_areas( $template_id )
{
	global $wpdb;
	
	$impact_widgets = $wpdb->prefix . 'impact_widgets';
	$template_widget_areas = $wpdb->get_results( "SELECT `template_id`, `widget_id` FROM $impact_widgets WHERE `template_id` = '$template_id'", ARRAY_A );
	
	foreach( $template_widget_areas as $template_widget_area => $widget_bits )
	{
		$impact_widget_id = str_replace( strtolower( str_replace( ' ', '_', $widget_bits['template_id'] ) ), 'impact', $widget_bits['widget_id'] );
		
		add_action( $impact_widget_id, 'dynamic_sidebar', 10, 1 );
	}
}

function impact_store_widget_areas( $template_id, $active_widget_areas = false )
{
	if( $active_widget_areas )
	{
		$all_widget_areas = array(			
			'in_header',			
			'before_content',
			'after_content',			
			'in_footer',			
		);
		
		foreach( $all_widget_areas as $key => $value )
		{
			if( in_array( $value, $active_widget_areas ) )
			{
				unset( $all_widget_areas[$key] );
			}
		}
		foreach( $active_widget_areas as $active_widget_area )
		{
			impact_save_widget_area( $template_id, $active_widget_area, 'yes','yes');
			$response = true;
		}
		
		foreach( $all_widget_areas as $inactive_widget_area )
		{
			impact_save_widget_area( $template_id, $inactive_widget_area, 'no', 'yes' );
			$response = true;
		}
	}
	return true;
}

function impact_save_widget_area( $template_id, $widget_id, $active, $update_only = 'no', $description = '', $before_widget = '<li id="%1$s" class="widget %2$s">', $after_widget = '</li>', $before_title = '<h2 class="widgettitle">', $after_title = '</h2>' )
{
	global $wpdb;
	
	$widget_id_bits = explode( '_', $widget_id );
	$widget_uncapped_name = implode( ' ', $widget_id_bits );
	$widget_name = $template_id . ' ' . ucwords( $widget_uncapped_name );
	
	$widget_full_id = strtolower( str_replace( ' ', '_', $template_id ) ) . '_' . $widget_id;
	
	$widget_args = array(
		'template_id'	=> $template_id,
		'active_widget' => $active,
		'name'          => $widget_name,
		'description'   => $description,
		'before_widget' => $before_widget,
		'after_widget'  => $after_widget,
		'before_title'  => $before_title,
		'after_title'   => $after_title
	);
	
	$widget_primary = array(
		'widget_id' => $widget_full_id,
	);
		
	$widget_full_args = array_merge( $widget_args, $widget_primary );
	
	$impact_widgets = $wpdb->prefix . 'impact_widgets';
	
	if( $wpdb->update( $impact_widgets, $widget_args, $widget_primary ) )
	{
		$response = 'update';
	}
	elseif( $update_only = 'no' )
	{
		if( $wpdb->insert( $impact_widgets, $widget_full_args ) )
		{
			$response = 'insert';
		}
	}
	else
	{
		$response = false;
	}
	
	return $response;
}

function impact_get_widget_areas( $template_id )
{
	global $wpdb;
	
	$impact_widgets = $wpdb->prefix . 'impact_widgets';
	
	if( $widgets_fetch = $wpdb->get_results( "SELECT * FROM $impact_widgets WHERE `template_id` = '$template_id'", ARRAY_A ) )
	{
		return $widgets_fetch;
	}
	else
	{
		return false;
	}
}

function impact_get_active_widget_areas( $template_id )
{
	global $wpdb;
	
	$impact_widgets = $wpdb->prefix . 'impact_widgets';
	
	if( $widgets_fetch = $wpdb->get_col( "SELECT `widget_id` FROM $impact_widgets WHERE `template_id` = '$template_id' AND `active_widget` = 'yes'" ) )
	{
		foreach( $widgets_fetch as $key => $value )
		{
			$widget_id = str_replace( strtolower( str_replace( ' ', '_', $template_id ) ) . '_', '', $value );
			$template_fetch[$key] = $widget_id;
		}
		return $template_fetch;
	}
	else
	{
		return false;
	}
}

function impact_widget_area_checked( $template_widget_areas, $widget_area )
{
	if( in_array( $widget_area, $template_widget_areas ) )
	{
		echo ' checked';
	}
}

function impact_delete_widget_areas( $template_id )
{
	global $wpdb;
	
	$impact_widgets = $wpdb->prefix . 'impact_widgets';

	if( $wpdb->query( "DELETE FROM $impact_widgets WHERE `template_id` = '$template_id'" ) )
	{
		return 'deleted';
	}
	else
	{
		return false;
	}
}
	
//end lib/funcitons/impact-widget-areas.php