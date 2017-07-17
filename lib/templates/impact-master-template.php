<?php /* Impact Master Template */
$this_template = strtolower( str_replace( ' ', '_', $template_data['template_id'] ) );
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>

<meta charset="<?php bloginfo( 'charset' ); ?>" />

<title><?php echo strip_tags( wp_title('',false,'') ); ?></title>

<?php impact_post_meta(); ?>

<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<link rel="stylesheet" type="text/css" media="all" href="<?php echo IMPACT_CSS_URL . '/default.css'; ?>" />

<style type="text/css">
<?php require_once('impact-template.php'); ?>
</style>
<?php
if( !empty( $template_data['custom_css'] ) )
{ ?>
<style type="text/css">
<?php echo $template_data['custom_css']; ?>
</style>
<?php
} ?>

<?php if ( is_singular() && get_option( 'thread_comments' ) ) {	wp_enqueue_script( 'comment-reply' ); } ?>

<?php impact_header_scripts(); ?>

<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

<div id="impact-superwrap">

	<div id="before-page-wrap-outer" class="outer-wrap">
	<div id="impact-before-page-wrap" class="widget-area">
		
	</div>
	</div>

<?php if( $wrap_open == 'fixed' ) { ?>

	<div id="impact-page-wrap">
	
<?php }	if( $template_data['header_template'] != 'none' ) { ?>

		<div id="before-header-outer" class="outer-wrap">
		<div id="impact-before-header" class="widget-area">
			
		</div>
		</div>
	
		<div id="impact-header-outer">
		<div id="impact-header-wrap">

<?php		if( $template_data['title_area'] == 'text' )
			{
?>				<div id="impact-title">
				<?php $heading_tag = ( is_home() || is_front_page() ) ? 'h1' : 'div'; ?>
					<<?php echo $heading_tag; ?> id="site-title">
						<span>
<?php						if( !empty( $template_data['title_link'] ) )
							{
?>								<a href="<?php echo $template_data['title_link']; ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
<?php						}
							else
							{
?>								<a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
<?php						}
?>							<?php bloginfo( 'name' ); ?></a>
						</span>
					</<?php echo $heading_tag; ?>>
				<div id="site-description"><?php bloginfo( 'description' ); ?></div>
				</div>
<?php		}
			elseif( $template_data['title_area'] == 'image' )
			{
?>				<div id="impact-title">
<?php						if( !empty( $template_data['title_link'] ) )
							{
?>								<a href="<?php echo $template_data['title_link']; ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
<?php						}
							else
							{
?>								<a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
<?php						}
?>							<img src="<?php echo $template_data['logo_image']; ?>" alt="<?php bloginfo( 'name' ); ?>" /></a>
					<?php $heading_tag = ( is_home() || is_front_page() ) ? 'h1' : 'div'; ?>
					<<?php echo $heading_tag; ?> id="site-title" style="display:none;">
						<span>
<?php						if( !empty( $template_data['title_link'] ) )
							{
?>								<a href="<?php echo $template_data['title_link']; ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
<?php						}
							else
							{
?>								<a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
<?php						}
?>							<?php bloginfo( 'name' ); ?></a>
						</span>
					</<?php echo $heading_tag; ?>>
				<div id="site-description" style="display:none;"><?php bloginfo( 'description' ); ?></div>
				</div>
<?php		}
?>
				<div id="impact-in-header" class="widget-area">
					<?php impact_in_header( $this_template . '_in_header' ); ?>
				</div>
		
		</div><!--#impact-header-wrap-->
		</div><!--impact-header-outer-->
		
		<div id="after-header-outer" class="outer-wrap">
		<div id="impact-after-header" class="widget-area">
			
		</div>
		</div>
		
<?php }	if( $wrap_open == 'fluid' )	{ ?>

	<div id="impact-page-wrap">

<?php } ?>

		<div id="before-container-outer" class="outer-wrap">
		<div id="impact-before-container" class="widget-area">
			
		</div>
		</div>
		
		<div id="impact-container">

			<div id="impact-content-sidebar-wrap">
			<div id="impact-content-wrap">
			
				<div id="before-content-outer" class="outer-wrap">
				<div id="impact-before-content" class="widget-area">
					<?php impact_before_content( $this_template . '_before_content' ); ?>
				</div>
				</div>
			
				<div id="impact-content" style="width:100%;">
				<?php
				$impact_post_type = impact_post_type();
				if( $impact_post_type == 'page' )
				{ ?>
					<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<div class="impact-page-title">
					<?php if ( is_front_page() ) { ?>
						<h2 class="entry-title"><?php the_title(); ?></h2>
					<?php } else { ?>
						<h1 class="entry-title"><?php the_title(); ?></h1>
					<?php } ?>
					</div>

					<div class="entry-content">
						<?php the_content(); ?>
						<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'impact' ), 'after' => '</div>' ) ); ?>
						<?php edit_post_link( __( 'Edit', 'impact' ), '<span class="edit-link">', '</span>' ); ?>
					</div><!-- .entry-content -->
				</div><!-- #post-## -->

				<?php impact_comments_template( '', true ); ?>

				<?php endwhile; ?>
				<?php
				}
				else
				{ ?>
					<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<div class="impact-post-title">
						<h1 class="entry-title"><?php the_title(); ?></h1>

						<div class="entry-meta">
							<?php impact_posted_on(); ?>
						</div><!-- .entry-meta -->
					</div>

					<div class="entry-content">
						<?php the_content(); ?>
						<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'impact' ), 'after' => '</div>' ) ); ?>
					</div><!-- .entry-content -->
					
					<div class="entry-utility">
						<?php impact_posted_in(); ?>
						<?php edit_post_link( __( 'Edit', 'impact' ), '<span class="edit-link">', '</span>' ); ?>
					</div><!-- .entry-utility -->

<?php if ( get_the_author_meta( 'description' ) ) : // If a user has filled out their description, show a bio on their entries  ?>
					<div id="entry-author-info">
						<div id="author-avatar">
							<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'impact_author_bio_avatar_size', 70 ) ); ?>
						</div><!-- #author-avatar -->
						<div id="author-description">
							<h2><?php printf( esc_attr__( 'About %s', 'impact' ), get_the_author() ); ?></h2>
							<div id="author-link">
								<?php the_author_meta( 'description' ); ?>
								<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>">
									<?php printf( __( 'View all posts by %s <span class="meta-nav">&rarr;</span>', 'impact' ), get_the_author() ); ?>
								</a>
							</div><!-- #author-link	-->
						</div><!-- #author-description -->
					</div><!-- #entry-author-info -->
<?php endif; ?>

				</div><!-- #post-## -->

				<div id="nav-below" class="navigation">
					<div class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'impact' ) . '</span> %title' ); ?></div>
					<div class="nav-next"><?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'impact' ) . '</span>' ); ?></div>
				</div><!-- #nav-below -->

				<?php impact_comments_template( '', true ); ?>

<?php endwhile; // end of the loop. ?>
				<?php
				} ?>
					</div>
				
					<div id="after-content-outer" class="outer-wrap">
					<div id="impact-after-content" class="widget-area">
						<?php impact_after_content( $this_template . '_after_content' ); ?>
					</div>
					</div>

			<div style="clear:both;"></div>
			</div><!--#impact-content-wrap-->
			
			<div id="impact-sidebar-wrap">
			
				<div id="before-sidebar-outer" class="outer-wrap">
				<div id="impact-before-sidebar" class="widget-area">
					
				</div>
				</div>
			
				<div id="sidebar-outer" class="outer-wrap">
				<div id="impact-sidebar" class="widget-area">
					
				</div>
				</div>
				
				<div id="after-sidebar-outer" class="outer-wrap">
				<div id="impact-after-sidebar" class="widget-area">
					
				</div>
				</div>

			</div><!--#impact-sidebar-wrap-->
			</div><!--#impact-content-sidebar-wrap-->
			
			<div id="impact-sidebar2-wrap">
			
				<div id="before-sidebar2-outer" class="outer-wrap">
				<div id="impact-before-sidebar2" class="widget-area">
					
				</div>
				</div>
			
				<div id="sidebar2-outer" class="outer-wrap">
				<div id="impact-sidebar2" class="widget-area">
					
				</div>
				</div>
				
				<div id="after-sidebar2-outer" class="outer-wrap">
				<div id="impact-after-sidebar2" class="widget-area">
					
				</div>
				</div>

			</div><!--#impact-sidebar2-wrap-->

		</div><!--#impact-container-->
		
		<div id="after-container-outer" class="outer-wrap">
		<div id="impact-after-container" class="widget-area">
			
		</div>
		</div>

		
<?php if( $wrap_close == 'fluid' || $wrap_close == 'none' ) { ?>

		<div style="clear:both;"></div>

	</div><!--#impact-page-wrap-->	

<?php }	if( $template_data['footer_template'] != 'none' ) { ?>

		<div id="before-footer-outer" class="outer-wrap">
		<div id="impact-before-footer" class="widget-area">
			
		</div>
		</div>
		
		<div id="impact-footer-outer">
		<div id="impact-footer-wrap">
		
			<div id="impact-in-footer" class="widget-area">
				<?php impact_in_footer( $this_template . '_in_footer' ); ?>
			</div>
			
		</div><!--#impact-footer-wrap-->
		</div><!--#impact-footer-outer-->

		<div id="after-footer-outer" class="outer-wrap">
		<div id="impact-after-footer" class="widget-area">
			
		</div>
		</div>

<?php } if( $wrap_close == 'fixed' ) { ?>

		<div style="clear:both;"></div>

	</div><!--#impact-page-wrap-->

<?php } ?>

	<div id="after-page-wrap-outer" class="outer-wrap">
	<div id="impact-after-page-wrap" class="widget-area">
		
	</div>
	</div>

</div><!--#impact-superwrap-->

<?php impact_footer_scripts(); ?>

<?php wp_footer(); ?>

</body>
</html>