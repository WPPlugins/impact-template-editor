<?php
	
function impact_activate()
{
	if( !get_option( 'impact_installed' ) )
	{ 
		update_option( 'impact_installed', '1' );
		impact_create_tables();
		
		$upload_dir = IMPACT_UPLOADS;
			
		if( !is_dir( $upload_dir ) )
		{
			@mkdir( $upload_dir, 0755, true );
		}		
	}
	update_option( 'impact_version', '1.5' );
}

function impact_deactivate()
{

}
	
function impact_create_tables()
{
	global $wpdb;
	
	$impact_templates = $wpdb->prefix . 'impact_templates';
	$impact_templates_create = "
	CREATE TABLE IF NOT EXISTS `$impact_templates` (
		`template_id` varchar(255) NOT NULL,
		`data` text NOT NULL,
		PRIMARY KEY  (`template_id`)
	);";
	$wpdb->query( $impact_templates_create );
	
	/*By default, only one template record will get inserted */
	$template_data = impact_template_defaults(); 
	$template_update = serialize( $template_data );
	$impact_templates_insert = "
	INSERT INTO `$impact_templates` (template_id, data) VALUES
		('Template 1','$template_update');";	
	$wpdb->query( $impact_templates_insert );
	
	$impact_widgets = $wpdb->prefix . 'impact_widgets';
	$impact_widgets_create = "
	CREATE TABLE IF NOT EXISTS `$impact_widgets` (
		`widget_id` varchar(255) NOT NULL,
		`template_id` varchar(255) NOT NULL,
		`active_widget` varchar(255) NOT NULL,
		`name` varchar(255) NOT NULL,
		`description` varchar(255) NOT NULL,
		`before_widget` varchar(255) NOT NULL,
		`after_widget` varchar(255) NOT NULL,
		`before_title` varchar(255) NOT NULL,
		`after_title` varchar(255) NOT NULL,
		PRIMARY KEY (`widget_id`)
	);";
	$wpdb->query( $impact_widgets_create );
	
	$impact_hooks = $wpdb->prefix . 'impact_hooks';
	$impact_hooks_create= "
	CREATE TABLE IF NOT EXISTS `$impact_hooks` (
		`hook_id` varchar(255) NOT NULL,
		`template_id` varchar(255) NOT NULL,
		`hook_location` varchar(255) NOT NULL,
		`widget_position` int(2) NOT NULL,
		`hook_textarea` text NOT NULL,
		PRIMARY KEY (`hook_id`)
	);";
	$wpdb->query( $impact_hooks_create );
	
}
	
//end lib/functions/impact-activate.php