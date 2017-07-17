<?php

$api_url = 'http://api.impactpagebuilder.com/';
$plugin_slug = 'impact';

// Take over the update check
add_filter('pre_set_site_transient_update_plugins', 'impact_update_check');
function impact_update_check($checked_data) {
	global $api_url, $plugin_slug;
	
	if (empty($checked_data->checked))
		return $checked_data;
	
	$request_args = array(
		'slug' => $plugin_slug,
		'version' => $checked_data->checked[$plugin_slug .'/'. $plugin_slug .'.php'],
	);

	$request_string = impact_prep_request('basic_check', $request_args);

	// Start checking for an update
	$raw_response = wp_remote_post($api_url, $request_string);
	
	if (!is_wp_error($raw_response) && ($raw_response['response']['code'] == 200))
		$response = unserialize($raw_response['body']);
	
	if (is_object($response) && !empty($response->new_version)) // Feed the update data into WP updater
		$checked_data->response[$plugin_slug .'/'. $plugin_slug .'.php'] = $response;
	
	return $checked_data;
}

// Take over the Plugin info screen
add_filter('plugins_api', 'impact_api_call', 10, 3);
function impact_api_call($def, $action, $args) {
	global $plugin_slug, $api_url;
	
	if ($args->slug != $plugin_slug)
		return false;
	
	// Get the current version
	$plugin_info = get_site_transient('update_plugins');
	$current_version = $plugin_info->checked[$plugin_slug .'/'. $plugin_slug .'.php'];
	$args->version = $current_version;
	
	$request_string = impact_prep_request($action, $args);
	
	$request = wp_remote_post($api_url, $request_string);
	
	if (is_wp_error($request)) {
		$res = new WP_Error('plugins_api_failed', __('An Unexpected HTTP Error occurred during the API request.</p> <p><a href="?" onclick="document.location.reload(); return false;">Try again</a>'), $request->get_error_message());
	} else {
		$res = unserialize($request['body']);
		
		if ($res === false)
			$res = new WP_Error('plugins_api_failed', __('An unknown error occurred'), $request['body']);
	}
	
	return $res;
}

function impact_prep_request($action, $args) {
	global $wp_version;
	
	return array(
		'body' => array(
			'action' => $action, 
			'request' => serialize($args),
			'api-key' => md5(get_bloginfo('url'))
		),
		'user-agent' => 'WordPress/' . $wp_version . '; ' . get_bloginfo('url')
	);	
}

add_action('admin_init', 'impact_update');
function impact_update()
{
	// Don't do anything if we're on the latest version
	if( version_compare( get_option( 'impact_version' ), IMPACT_VERSION, '>=') )
		return;

	//Update to Impact 1.5
	if( version_compare( get_option( 'impact_version' ), '1.5', '<') )
	{
		update_option( 'impact_version', '1.5' );
	}
	
	//finish update sequence
	wp_redirect( admin_url('admin.php?page=impact&impact-updated=true') );
}

//end lib/functions/impact-update.php