<?php
add_action('template_redirect', 'impact_pagehandler');
function impact_pagehandler()
{
	if ( defined('WP_USE_THEMES') && WP_USE_THEMES )
	{
		if( $impact_page = is_impact_page() )
		{			
			$template_data = impact_get_template( $impact_page );
			
			impact_hook_widget_areas( $template_data['template_id'] );
			impact_hook_hook_boxes( $template_data['template_id'] );
			
			$template = IMPACT_TEMPLATES . '/impact-master-template.php';
			
			if ( $template = apply_filters( 'template_include', $template ) )
				include( $template );
			exit();
		}
	}
}

function is_impact_page()
{
	global $wp_query;
	
	$this_page = $wp_query->get_queried_object();
	$this_page_id = $this_page->ID;
	$use_impact = get_post_meta( $this_page_id, '_use_impact' );
	$impact_template = get_post_meta( $this_page_id, '_impact_template' );

	if( $use_impact[0] == 'yes' && !empty( $impact_template[0] ) )
	{
		return $impact_template[0];
	}
	else
	{
		return false;
	}
}

//end lib/functions/impact-pagehandler.php