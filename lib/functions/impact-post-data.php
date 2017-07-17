<?php
add_filter('manage_posts_columns', 'impact_columns');
add_filter('manage_pages_columns', 'impact_columns');
function impact_columns($columns)
{
	$columns['impact'] = '<span class="impact-column"><img alt="Impact" src="' . IMPACT_IMAGES_URL . '/impact16.png" /></span>';
    return $columns;
}

add_action('manage_posts_custom_column',  'impact_column');
add_action('manage_pages_custom_column',  'impact_column');
function impact_column($name)
{
	global $post;
	
	switch ($name)
	{
		case 'impact':
		
			$use_impact = get_post_meta( $post->ID, '_use_impact' );
			$impact_template = get_post_meta( $post->ID, '_impact_template' );

			if( $use_impact[0] == 'yes' && !empty( $impact_template[0] ) )
			{
				echo '<span class="is-impact"><img alt="Impact" src="' . IMPACT_IMAGES_URL . '/impact16.png" /></span>';
			}
	}
}

add_action('manage_posts_custom_column',  'my_show_columns');
function my_show_columns($name) {
    global $post;
    switch ($name) {
        case 'views':
            $views = get_post_meta($post->ID, 'views', true);
            echo $views;
    }
}

add_action('admin_menu', 'impact_add_post_boxes');
function impact_add_post_boxes()
{
    add_meta_box( 'impact_choose_template', __( 'Impact Page Options', 'impact' ), 'impact_inner_post_box', 'page', 'normal' );
	add_meta_box( 'impact_choose_template', __( 'Impact Post Options', 'impact' ), 'impact_inner_post_box', 'post', 'normal' );
}

function impact_inner_post_box()
{
	$template_id = impact_get_custom_field('_impact_template');
	
?>	<div id="impact_options_table">
	<table>
		<tr>
			<td>
				<p><label for="impact_this_page"><b><?php _e('Use Impact For This Page? ', 'impact' ); ?></b></label>
				<select id="impact_this_page" name="impact_options[_use_impact]" style="width: 99%;">
					<option value="no" <?php echo ( impact_get_custom_field('_use_impact') == 'no' ) ? 'selected="selected"' : ''; ?>><?php _e('No', 'impact'); ?></option>
					<option value="yes" <?php echo ( impact_get_custom_field('_use_impact') == 'yes' ) ? 'selected="selected"' : ''; ?>><?php _e('Yes', 'impact'); ?></option>
				</select></p>
			</td>
			<td>				
				<p><label for="impact_template"><b><?php _e('Select Impact Template: ', 'impact' ); ?></b></label>
				<select id="impact_template" name="impact_options[_impact_template]" style="width: 99%;"><?php $impact_template = impact_get_custom_field('_impact_template'); impact_list_templates( $impact_template ); ?></select></p>
			<td>
		</tr>
		<tr>
			<td colspan="2">				
				<p><label for="impact_title"><b><?php _e('Impact Page Title', 'impact'); ?></b><br><code>&lt;title&gt;</code></label></p>
				<p><input type="text" value="<?php $impact_title = impact_get_custom_field('_impact_title'); echo ( !empty( $impact_title ) ) ? $impact_title : ''; ?>" id="impact_title" name="impact_options[_impact_title]" style="width: 99%;"></p>
			</td>
		</tr>
		<tr>
			<td>
				<p><label for="impact_description"><b><?php _e('Impact Description', 'impact'); ?></b><br><code>&lt;meta name="description"&gt;</code></label></p>
				<p><textarea id="impact_description" name="impact_options[_impact_description]" style="width: 99%;"><?php $impact_description = impact_get_custom_field('_impact_description'); echo ( !empty( $impact_description ) ) ? $impact_description : ''; ?></textarea></p>
			</td>
			<td>
				<p><label for="impact_keywords"><b><?php _e('Impact Keywords', 'impact'); ?></b><br><code>&lt;meta name="keywords"&gt;</code></label></p>
				<p><textarea id="impact_keywords" name="impact_options[_impact_keywords]" style="width: 99%;"><?php $impact_keywords = impact_get_custom_field('_impact_keywords'); echo ( !empty( $impact_keywords ) ) ? $impact_keywords : ''; ?></textarea></p>
			</td>
		</tr>
		<tr>
			<td>			
				<p><b><?php _e('Noindex This Page', 'impact'); ?></b> ( <a target="_blank" href="http://www.robotstxt.org/meta.html"><?php _e('more info' , 'impact'); ?></a> )</p>
				<p><label for="impact_noindex"><?php _e('Apply'); ?> <code>noindex</code> <?php _e('to this post/page?', 'impact'); ?></label> 
				<select id="impact_noindex" name="impact_options[_impact_noindex]" style="width: 99%;">
					<option value="index" <?php echo ( impact_get_custom_field('_impact_noindex') == 'index' ) ? 'selected="selected"' : ''; ?>><?php _e('No', 'impact'); ?></option>
					<option value="noindex" <?php echo ( impact_get_custom_field('_impact_noindex') == 'noindex' ) ? 'selected="selected"' : ''; ?>><?php _e('Yes', 'impact'); ?></option>
				</select></p>
			</td>
			<td>			
				<p><b><?php _e('Nofollow This Page', 'impact'); ?></b> ( <a target="_blank" href="http://www.robotstxt.org/meta.html"><?php _e('more info' , 'impact'); ?></a> )</p>
				<p><label for="impact_nofollow"><?php _e('Apply'); ?> <code>nofollow</code> <?php _e('to this post/page?', 'impact'); ?></label>
				<select id="impact_nofollow" name="impact_options[_impact_nofollow]" style="width: 99%;">
					<option value="follow" <?php echo ( impact_get_custom_field('_impact_nofollow') == 'follow' ) ? 'selected="selected"' : ''; ?>><?php _e('No', 'impact'); ?></option>
					<option value="nofollow" <?php echo ( impact_get_custom_field('_impact_nofollow') == 'nofollow' ) ? 'selected="selected"' : ''; ?>><?php _e('Yes', 'impact'); ?></option>
				</select></p>
			</td>
		</tr>
		<tr>
			<td>
				<p><label for="impact_header_scripts"><b><?php _e('Header Scripts', 'impact'); ?></b></label></p>
				<p><textarea id="impact_header_scripts" name="impact_options[_impact_header_scripts]" style="width: 99%;"><?php $impact_header_scripts = impact_get_custom_field('_impact_header_scripts'); echo ( !empty( $impact_header_scripts ) ) ? $impact_header_scripts : ''; ?></textarea></p>
			</td>
			<td>
				<p><label for="impact_footer_scripts"><b><?php _e('Footer Scripts', 'impact'); ?></b></label></p>
				<p><textarea id="impact_footer_scripts" name="impact_options[_impact_footer_scripts]" style="width: 99%;"><?php $impact_footer_scripts = impact_get_custom_field('_impact_footer_scripts'); echo ( !empty( $impact_footer_scripts ) ) ? $impact_footer_scripts : ''; ?></textarea></p>
			</td>
		</tr>
	</table>
	</div>
<?php
}

function impact_post_type()
{
	global $post;
	
	$post_type = $post->post_type;
	
	if ( $post_type ) {
		return $post_type;
	}
	else {
		return false;
	}
}

add_action('save_post', 'impact_save_postdata');
function impact_save_postdata( $post_id )
{
	global $post;
	
	if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) return;
	if ( defined('DOING_AJAX') && DOING_AJAX ) return;
	if ( defined('DOING_CRON') && DOING_CRON ) return;
	
	$impact_options_defaults = array(
		'_use_impact' => false,
		'_impact_template' => false,
		'_impact_title' => false,
		'_impact_description' => false,
		'_impact_keywords' => false,
		'_impact_noindex' => false,
		'_impact_nofollow' => false,
	); 

	$impact_options = wp_parse_args($_POST['impact_options'], $impact_options_defaults);
	
	foreach ( $impact_options as $key => $value )
	{
		if ( $post->post_type == 'revision' ) return; // don't try to store data during revision save

		if ( $value )
		{
			update_post_meta($post->ID, $key, $value);
		}
		else
		{
			delete_post_meta($post->ID, $key);
		}
	}
}

function impact_get_custom_field( $field )
{
	global $post;
	
	if ( null === $post ) return false;
	
	$custom_field = get_post_meta($post->ID, $field, true);
	
	if ( $custom_field ) {
		// sanitize and return the value of the custom field
		return wp_kses_stripslashes( wp_kses_decode_entities( $custom_field ) );
	}
	else {
		// return false if custom field is empty
		return false;
	}
}

function impact_post_meta()
{
	if ( class_exists('All_in_One_SEO_Pack') || class_exists('HeadSpace_Plugin') || class_exists('Platinum_SEO_Pack') )
	{
		return;
	}
	else
	{
		$impact_description = impact_get_custom_field('_impact_description');
		$impact_keywords = impact_get_custom_field('_impact_keywords');
		$impact_noindex = impact_get_custom_field('_impact_noindex');
		$impact_nofollow = impact_get_custom_field('_impact_nofollow');
		
		if( $impact_noindex == 'noindex' )
		{
			$noindex = 'noindex';
		}
		else
		{
			$noindex = 'index';
		}
		
		if( $impact_nofollow == 'nofollow' )
		{
			$nofollow = 'nofollow';
		}
		else
		{
			$nofollow = 'follow';
		}
?><meta name="robots" content="<?php echo $noindex . ', ' . $nofollow; ?>" />
<?php if( !empty( $impact_description ) ) { ?>
<meta name="description" content="<?php echo $impact_description; ?>" />
<?php }	if( !empty( $impact_keywords ) ) { ?>
<meta name="keywords" content="<?php echo $impact_keywords; ?>" />
<?php	}
	}
}

add_action('wp', 'impact_title_check');
function impact_title_check()
{
	if( is_impact_page() && !class_exists('All_in_One_SEO_Pack') && !class_exists('HeadSpace_Plugin') && !class_exists('Platinum_SEO_Pack') )
	{
		add_filter('wp_title', 'impact_build_site_title');
	}
}

function impact_build_site_title()
{
	global $impact_main_options;

	$impact_title = get_bloginfo('name');
	$impact_tagline = get_bloginfo('description');
	$page_title = get_the_title();
	$category_title = single_cat_title('', false);
	$tag_title = single_tag_title('', false);
	$post_title = get_the_title();
	$search_title = get_search_query();
	$title_separator = '|';
	
	if (is_day())
	{
		$archive_title = get_the_time(get_option('D F Y'));
	}
 	elseif (is_month())
	{
		$archive_title = get_the_time('F Y');
	}
	elseif (is_year())
	{
		$archive_title = get_the_time('Y');
    }
	
	if(get_query_var('author_name'))
	{
		$author_info = get_userdatabylogin(get_query_var('author_name'));
	}
	else
	{
		$author_info = get_userdata(get_query_var('author'));
	}
	$author_title = $author_info->display_name;
	
	if (function_exists('seo_title_tag'))
	{
		seo_title_tag();
		return null;
	}
	else
	{
		if (is_home() || is_front_page())
		{
			if ( impact_get_custom_field('_impact_title') )
			{
				$page_seo_title = stripslashes( impact_get_custom_field('_impact_title') );
				$output = $page_seo_title;
			}
			else
			{
				$output = $impact_title . " $title_separator " . $impact_tagline;
			}
		}
		elseif (is_single())
		{
			if ( impact_get_custom_field('_impact_title') )
			{
				$post_seo_title = stripslashes( impact_get_custom_field('_impact_title') );
				$output = $post_seo_title;
			}
			else
			{
				$output = $post_title;
			}
		}
		elseif (is_page())
		{
			if ( impact_get_custom_field('_impact_title') )
			{
				$page_seo_title = stripslashes( impact_get_custom_field('_impact_title') );
				$output = $page_seo_title;
			}
			else
			{
				$output = $page_title;
			}
		}
		elseif (is_category())
		{
			$output = $category_title;
		}
		elseif (is_tag())
		{
			$output = $tag_title;
		}
		elseif (is_date())
		{
			$output = $archive_title;
		}
		elseif (is_search())
		{
			$output = $search_title;
		}
		elseif (is_author())
		{
			$output = $author_title;
		}
	}
	
	//$output = $output . " $title_separator " . $impact_title;
	return esc_html(trim($output));
}

function impact_header_scripts()
{
	$impact_header_scripts = impact_get_custom_field('_impact_header_scripts');
	echo $impact_header_scripts;
}

function impact_footer_scripts()
{
	$impact_footer_scripts = impact_get_custom_field('_impact_footer_scripts');
	echo $impact_footer_scripts;
}

function impact_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case '' :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<div id="comment-<?php comment_ID(); ?>">
		<div class="comment-author vcard">
			<?php echo get_avatar( $comment, 48 ); ?>
			<?php printf( __( '%s <span class="says">says:</span>', 'impact' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
		</div><!-- .comment-author .vcard -->
		<?php if ( $comment->comment_approved == '0' ) : ?>
			<em><?php _e( 'Your comment is awaiting moderation.', 'impact' ); ?></em>
			<br />
		<?php endif; ?>

		<div class="comment-meta commentmetadata"><a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
			<?php
				/* translators: 1: date, 2: time */
				printf( __( '%1$s at %2$s', 'impact' ), get_comment_date(),  get_comment_time() ); ?></a><?php edit_comment_link( __( '(Edit)', 'impact' ), ' ' );
			?>
		</div><!-- .comment-meta .commentmetadata -->

		<div class="comment-body"><?php comment_text(); ?></div>

		<div class="reply">
			<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
		</div><!-- .reply -->
	</div><!-- #comment-##  -->

	<?php
			break;
		case 'pingback'  :
		case 'trackback' :
	?>
	<li class="pingback" style="margin:0px;padding:0 0 0 10px;">
		<p><?php _e( 'Pingback:', 'impact' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __('(Edit)', 'impact'), ' ' ); ?></p>
	<?php
			break;
	endswitch;
}

function impact_comment_form( $args = array(), $post_id = null ) {
	global $user_identity, $id;

	if ( null === $post_id )
		$post_id = $id;
	else
		$id = $post_id;

	$commenter = wp_get_current_commenter();

	$req = get_option( 'require_name_email' );
	$aria_req = ( $req ? " aria-required='true'" : '' );
	$fields =  array(
		'author' => '<p class="comment-form-author"><input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' />' .
					' <label for="author">' . __( 'Name' ) . '</label> ' . ( $req ? '<span class="required">*</span>' : '' ) . '</p>',
		'email'  => '<p class="comment-form-email"><input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' />' .
					' <label for="email">' . __( 'Email' ) . '</label> ' . ( $req ? '<span class="required">*</span>' : '' ) . '</p>',
		'url'    => '<p class="comment-form-url"><input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" />' .
					' <label for="url">' . __( 'Website' ) . '</label></p>',
		            
	);

	$required_text = '';
	$defaults = array(
		'fields'               => apply_filters( 'comment_form_default_fields', $fields ),
		'comment_field'        => '<p class="comment-form-comment"><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea></p>',
		'must_log_in'          => '<p class="must-log-in">' .  sprintf( __( 'You must be <a href="%s">logged in</a> to post a comment.' ), wp_login_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) ) . '</p>',
		'logged_in_as'         => '<p class="logged-in-as">' . sprintf( __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>' ), admin_url( 'profile.php' ), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) ) . '</p>',
		'comment_notes_before' => '<p class="comment-notes">' . __( 'Your email address will not be published.' ) . ( $req ? $required_text : '' ) . '</p>',
		'comment_notes_after'  => '<p class="form-allowed-tags">' . sprintf( __( 'You may use these <abbr title="HyperText Markup Language">HTML</abbr> tags and attributes: %s' ), ' <code>' . allowed_tags() . '</code>' ) . '</p>',
		'id_form'              => 'commentform',
		'id_submit'            => 'submit',
		'title_reply'          => __( 'Add Your Comment' ),
		'title_reply_to'       => __( 'Leave a Reply to %s' ),
		'cancel_reply_link'    => __( 'Cancel reply' ),
		'label_submit'         => __( 'Submit Comment' ),
	);

	$args = wp_parse_args( $args, apply_filters( 'comment_form_defaults', $defaults ) );

	?>
		<?php if ( comments_open() ) : ?>
			<?php do_action( 'comment_form_before' ); ?>
			<div id="respond">
				<h3 id="reply-title"><?php comment_form_title( $args['title_reply'], $args['title_reply_to'] ); ?> <small><?php cancel_comment_reply_link( $args['cancel_reply_link'] ); ?></small></h3>
				<?php if ( get_option( 'comment_registration' ) && !is_user_logged_in() ) : ?>
					<?php echo $args['must_log_in']; ?>
					<?php do_action( 'comment_form_must_log_in_after' ); ?>
				<?php else : ?>
					<form action="<?php echo site_url( '/wp-comments-post.php' ); ?>" method="post" id="<?php echo esc_attr( $args['id_form'] ); ?>">
						<?php do_action( 'comment_form_top' ); ?>
						<?php if ( is_user_logged_in() ) : ?>
							<?php echo apply_filters( 'comment_form_logged_in', $args['logged_in_as'], $commenter, $user_identity ); ?>
							<?php do_action( 'comment_form_logged_in_after', $commenter, $user_identity ); ?>
						<?php else : ?>
							<?php
							do_action( 'comment_form_before_fields' );
							foreach ( (array) $args['fields'] as $name => $field ) {
								echo apply_filters( "comment_form_field_{$name}", $field ) . "\n";
							}
							do_action( 'comment_form_after_fields' );
							?>
						<?php endif; ?>
						<?php echo apply_filters( 'comment_form_field_comment', $args['comment_field'] ); ?>
						<?php echo $args['comment_notes_after']; ?>
						<p class="form-submit">
							<input name="submit" type="submit" id="<?php echo esc_attr( $args['id_submit'] ); ?>" value="<?php echo esc_attr( $args['label_submit'] ); ?>" />
							<?php comment_id_fields(); ?>
						</p>
						<?php do_action( 'impact_comment_form', $post_id ); ?>
					</form>
				<?php endif; ?>
			</div><!-- #respond -->
			<?php do_action( 'comment_form_after' ); ?>
		<?php else : ?>
			<?php do_action( 'comment_form_comments_closed' ); ?>
		<?php endif; ?>
	<?php
}

function impact_comments_template( $file = '/impact-comments-template.php', $separate_comments = false ) {
	global $wp_query, $withcomments, $post, $wpdb, $id, $comment, $user_login, $user_ID, $user_identity, $overridden_cpage;

	if ( !(is_single() || is_page() || $withcomments) || empty($post) )
		return;

	if ( empty($file) )
		$file = '/impact-comments-template.php';

	$req = get_option('require_name_email');

	/**
	 * Comment author information fetched from the comment cookies.
	 *
	 * @uses wp_get_current_commenter()
	 */
	$commenter = wp_get_current_commenter();

	/**
	 * The name of the current comment author escaped for use in attributes.
	 */
	$comment_author = $commenter['comment_author']; // Escaped by sanitize_comment_cookies()

	/**
	 * The email address of the current comment author escaped for use in attributes.
	 */
	$comment_author_email = $commenter['comment_author_email'];  // Escaped by sanitize_comment_cookies()

	/**
	 * The url of the current comment author escaped for use in attributes.
	 */
	$comment_author_url = esc_url($commenter['comment_author_url']);

	/** @todo Use API instead of SELECTs. */
	if ( $user_ID) {
		$comments = $wpdb->get_results($wpdb->prepare("SELECT * FROM $wpdb->comments WHERE comment_post_ID = %d AND (comment_approved = '1' OR ( user_id = %d AND comment_approved = '0' ) )  ORDER BY comment_date_gmt", $post->ID, $user_ID));
	} else if ( empty($comment_author) ) {
		$comments = get_comments( array('post_id' => $post->ID, 'status' => 'approve', 'order' => 'ASC') );
	} else {
		$comments = $wpdb->get_results($wpdb->prepare("SELECT * FROM $wpdb->comments WHERE comment_post_ID = %d AND ( comment_approved = '1' OR ( comment_author = %s AND comment_author_email = %s AND comment_approved = '0' ) ) ORDER BY comment_date_gmt", $post->ID, wp_specialchars_decode($comment_author,ENT_QUOTES), $comment_author_email));
	}

	// keep $comments for legacy's sake
	$wp_query->comments = apply_filters( 'comments_array', $comments, $post->ID );
	$comments = &$wp_query->comments;
	$wp_query->comment_count = count($wp_query->comments);
	update_comment_cache($wp_query->comments);

	if ( $separate_comments ) {
		$wp_query->comments_by_type = &separate_comments($comments);
		$comments_by_type = &$wp_query->comments_by_type;
	}

	$overridden_cpage = FALSE;
	if ( '' == get_query_var('cpage') && get_option('page_comments') ) {
		set_query_var( 'cpage', 'newest' == get_option('default_comments_page') ? get_comment_pages_count() : 1 );
		$overridden_cpage = TRUE;
	}

	if ( !defined('COMMENTS_TEMPLATE') || !COMMENTS_TEMPLATE)
		define('COMMENTS_TEMPLATE', true);

	$include = apply_filters('comments_template', IMPACT_TEMPLATES . $file );
	if ( file_exists( $include ) )
		require( $include );
	else
		require( IMPACT_TEMPLATES .  $file );
}

function impact_posted_on() {
	printf( __( '<span class="%1$s">Posted on</span> %2$s <span class="meta-sep">by</span> %3$s', 'impact' ),
		'meta-prep meta-prep-author',
		sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><span class="entry-date">%3$s</span></a>',
			get_permalink(),
			esc_attr( get_the_time() ),
			get_the_date()
		),
		sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s">%3$s</a></span>',
			get_author_posts_url( get_the_author_meta( 'ID' ) ),
			sprintf( esc_attr__( 'View all posts by %s', 'impact' ), get_the_author() ),
			get_the_author()
		)
	);
}

function impact_posted_in() {
	// Retrieves tag list of current post, separated by commas.
	$tag_list = get_the_tag_list( '', ', ' );
	if ( $tag_list ) {
		$posted_in = __( 'This entry was posted in %1$s and tagged %2$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'impact' );
	} elseif ( is_object_in_taxonomy( get_post_type(), 'category' ) ) {
		$posted_in = __( 'This entry was posted in %1$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'impact' );
	} else {
		$posted_in = __( 'Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'impact' );
	}
	// Prints the string, replacing the placeholders.
	printf(
		$posted_in,
		get_the_category_list( ', ' ),
		$tag_list,
		get_permalink(),
		the_title_attribute( 'echo=0' )
	);
}

//end lib/functions/impact-post-type.php