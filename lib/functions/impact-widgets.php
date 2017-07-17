<?php

add_action( 'widgets_init', 'impact_widgets_init' );
function impact_widgets_init()
{
	register_widget( 'Impact_Nav_Menu_Widget' );
}

function impact_font_menu( $selected = '' )
{
	$fonts = array(
		"Arial" => "Arial, sans-serif",
		"Courier New" => "'Courier New', sans-serif",
		"Georgia" => "Georgia, serif",
		"Helvetica" => "Helvetica, sans-serif",
		"Impact" => "Impact, sans-serif",
		"Lucida Console" => "'Lucida Console', sans-serif",
		"Lucida Sans Unicode" => "'Lucida Sans Unicode', sans-serif",
		"Tahoma" => "Tahoma, sans-serif",
		"Times New Roman" => "'Times New Roman', serif",
		"Trebuchet MS" => "'Trebuchet MS', sans-serif",
		"Verdana" => "Verdana, sans-serif"
	);
	
	foreach( $fonts as $font_slug => $font_data )
	{
		$option = '<option value="' . $font_data . '"';
			
		if( $font_data == $selected )
		{
			$option .= ' selected="selected"';
		}
		
		$option .= '>' . $font_slug . '</option>';
		
		echo $option;
	}
}

class Impact_Nav_Menu_Widget extends WP_Widget 
{
	function __construct()
	{
		$widget_ops = array( 'description' => __('Use this widget to add & style custom menus in Impact Page Builder templates', 'impact') );
		parent::__construct( 'impact_nav_menu', __('Impact - Custom Menu', 'impact'), $widget_ops );
	}

	function widget($args, $instance) 
	{
		//add_filter('wp_nav_menu', 'add_first_and_last');
		//function add_first_and_last($output)
		//{
		//  $output = preg_replace('/class="menu-item/', 'class="first-menu-item menu-item', $output, 1);
		//  return $output;
		//}

		// defaults
		$instance = wp_parse_args( (array) $instance, array(
			'nav_menu' => '',
			'main_bg' => '000000',
			'item_bg' => '112233',
			'item_txt' => 'CCCCCC',
			'hover_bg' => '333333',
			'hover_txt' => 'FFFFFF',
			'current_bg' => '333333',
			'current_txt' => 'FFFFFF',
			'nav_font' => 'Arial, sans-serif',
			'nav_align' => 'left'
		) );
		
		// Get menu
		$nav_menu = wp_get_nav_menu_object( $instance['nav_menu'] );
		
		if ( !$nav_menu )
			return;

		$instance['title'] = apply_filters('widget_title', $instance['title'], $instance, $this->id_base);

		$nav_styles = '';
		
		switch( $instance['nav_align'] )
		{
			case 'left':
				$nav_styles .= '
#' . $args['widget_id'] . ' ul {
	padding-left: 10px;
	float: left;
	list-style: none;
}';
				break;
			case 'right':
				$nav_styles .= '
#' . $args['widget_id'] . ' ul {
	float: right;
	list-style: none;
}';
				break;
			case 'center':
				$nav_styles .= '
#' . $args['widget_id'] . ' ul {
	display: table;
	margin: 0 auto;
	padding-left: 10px;
	list-style: none;
}';
				break;
		}
		
		
		$nav_styles .= '
#' . $args['widget_id'] . ' {
	background: #' . $instance['main_bg'] . ';
	width: 100%;
	height: 38px;
	margin: 0px auto;
	font-family: ' . $instance['nav_font'] . ';
	font-size: 14px;
	line-height: 1em;
	float: none;
	display: block;
}
#' . $args['widget_id'] . ' li {
	float: left;
	list-style: none;
	margin-right: 10px;
}
#' . $args['widget_id'] . ' li a, #' . $args['widget_id'] . ' li a:link, #' . $args['widget_id'] . ' li a:visited {
	background: #' . $instance['item_bg'] . ';
	padding: 12px;
	color: #' . $instance['item_txt'] . ';
	text-decoration: none;
	display: block;
}
#' . $args['widget_id'] . ' li a:hover, #' . $args['widget_id'] . ' li a:active {
	background: #' . $instance['hover_bg'] . ';
	color: #' . $instance['hover_txt'] . ';
	text-decoration: none;
}
#' . $args['widget_id'] . ' li li a, #' . $args['widget_id'] . ' li li a:link, #' . $args['widget_id'] . ' li li a:visited {
	background: #' . $instance['item_bg'] . ';
	width: 150px;
	padding: 12px;
	color: #' . $instance['item_txt'] . ';
	text-decoration: none;
	float: none;
}
#' . $args['widget_id'] . ' li li a:hover, #' . $args['widget_id'] . ' li li a:active {
	background: #' . $instance['hover_bg'] . ';
	color: #' . $instance['hover_txt'] . ';
	text-decoration: none;
}
#' . $args['widget_id'] . ' li ul {
	width: 150px;
	height: auto;
	margin: 0;
	padding: 0;
	z-index: 9999;
	left: -999em;
	position: absolute;
}
#' . $args['widget_id'] . ' li ul ul {
	margin: -38px 0 0 174px;
}
#' . $args['widget_id'] . ' li:hover ul ul, #' . $args['widget_id'] . ' li:hover ul ul ul, #' . $args['widget_id'] . ' li.sfhover ul ul, #' . $args['widget_id'] . ' li.sfhover ul ul ul {
	left: -999em;
}
#' . $args['widget_id'] . ' li:hover ul, #' . $args['widget_id'] . ' li li:hover ul, #' . $args['widget_id'] . ' li li li:hover ul, #' . $args['widget_id'] . ' li.sfhover ul, #' . $args['widget_id'] . ' li li.sfhover ul, #' . $args['widget_id'] . ' li li li.sfhover ul {
	left: auto;
}
#' . $args['widget_id'] . ' li:hover, #' . $args['widget_id'] . ' li.sfhover {
	position: static;
}
#' . $args['widget_id'] . ' li.current-menu-item a {
	background: #' . $instance['current_bg'] . ';
	color: #' . $instance['current_txt'] . ';
	text-decoration: none;
}
#' . $args['widget_id'] . ' li.current-menu-item a:hover {
	background: #' . $instance['hover_bg'] . ';
	color: #' . $instance['hover_txt'] . ';
}';

		echo "\n<style type='text/css'>" . apply_filters( 'impact_nav_styles', $nav_styles ) . "\n</style>\n";
		
		echo $args['before_widget'];

		wp_nav_menu( array( 'fallback_cb' => '', 'menu' => $nav_menu ) );

		echo $args['after_widget'];
	}

	function update( $new_instance, $old_instance ) 
	{
		$new_instance['nav_menu'] = (int) $new_instance['nav_menu'];
		return $new_instance;
	}

	function form( $instance ) 
	{
		if( empty( $instance ) )
		{
			$brand_new = true;
		}
		
		// defaults
		$instance = wp_parse_args( (array) $instance, array(
			'nav_menu' => '',
			'main_bg' => '000000',
			'item_bg' => '112233',
			'item_txt' => 'CCCCCC',
			'hover_bg' => '333333',
			'hover_txt' => 'FFFFFF',
			'current_bg' => '333333',
			'current_txt' => 'FFFFFF',
			'nav_font' => 'Arial, sans-serif',
			'nav_align' => 'left'
		) );

		// Get menus
		$menus = get_terms( 'nav_menu', array( 'hide_empty' => false ) );

		// If no menus exists, direct the user to go and create some.
		if ( !$menus ) {
			echo '<p>'. sprintf( __('No menus have been created yet. <a href="%s">Create some</a>.'), admin_url('nav-menus.php') ) .'</p>';
			return;
		}
		?>
		<script type="text/javascript">
			var main_bgPicker = new jscolor.color(document.getElementById('<?php echo $this->get_field_id('main_bg'); ?>'), {pickerFaceColor:'#fff'});
			main_bgPicker.fromString('<?php echo $instance['main_bg']; ?>');
			var item_bgPicker = new jscolor.color(document.getElementById('<?php echo $this->get_field_id('item_bg'); ?>'), {pickerFaceColor:'#fff'});
			item_bgPicker.fromString('<?php echo $instance['item_bg']; ?>');
			var item_txtPicker = new jscolor.color(document.getElementById('<?php echo $this->get_field_id('item_txt'); ?>'), {pickerFaceColor:'#fff'});
			item_txtPicker.fromString('<?php echo $instance['item_txt']; ?>');
			var hover_bgPicker = new jscolor.color(document.getElementById('<?php echo $this->get_field_id('hover_bg'); ?>'), {pickerFaceColor:'#fff'});
			hover_bgPicker.fromString('<?php echo $instance['hover_bg']; ?>');
			var hover_txtPicker = new jscolor.color(document.getElementById('<?php echo $this->get_field_id('hover_txt'); ?>'), {pickerFaceColor:'#fff'});
			hover_txtPicker.fromString('<?php echo $instance['hover_txt']; ?>');
			var current_bgPicker = new jscolor.color(document.getElementById('<?php echo $this->get_field_id('current_bg'); ?>'), {pickerFaceColor:'#fff'});
			current_bgPicker.fromString('<?php echo $instance['current_bg']; ?>');
			var current_txtPicker = new jscolor.color(document.getElementById('<?php echo $this->get_field_id('current_txt'); ?>'), {pickerFaceColor:'#fff'});
			current_txtPicker.fromString('<?php echo $instance['current_txt']; ?>');
		</script>
		<?php if( $brand_new ) { ?><p><span style="color:red;"><?php _e('Click "Save" once to activate color pickers', 'impact'); ?></span></p><?php } ?>
		<p>
			<label for="<?php echo $this->get_field_id('nav_menu'); ?>"><?php _e('Select Menu:'); ?></label>
			<select id="<?php echo $this->get_field_id('nav_menu'); ?>" name="<?php echo $this->get_field_name('nav_menu'); ?>">
		<?php
			foreach ( $menus as $menu ) {
				$selected = $instance['nav_menu'] == $menu->term_id ? ' selected="selected"' : '';
				echo '<option'. $selected .' value="'. $menu->term_id .'">'. $menu->name .'</option>';
			}
		?>
			</select>
		</p>
		<table>
		<tr>
		<td><p><label for="<?php echo $this->get_field_id('main_bg'); ?>"><?php _e('Main BG:', 'impact') ?></label></p></td>
		<td><p><input type="text" class="color {pickerFaceColor:'#fff'}" id="<?php echo $this->get_field_id('main_bg'); ?>" name="<?php echo $this->get_field_name('main_bg'); ?>" value="<?php echo $instance['main_bg']; ?>" /></p></td>
		</tr>
		<tr>
		<td><p><label for="<?php echo $this->get_field_id('item_bg'); ?>"><?php _e('Item BG:', 'impact') ?></label></p></td>
		<td><p><input type="text" class="color {pickerFaceColor:'#fff'}" id="<?php echo $this->get_field_id('item_bg'); ?>" name="<?php echo $this->get_field_name('item_bg'); ?>" value="<?php echo $instance['item_bg']; ?>" /></p></td>
		</tr>
		<tr>
		<td><p><label for="<?php echo $this->get_field_id('item_txt'); ?>"><?php _e('Item Text:', 'impact') ?></label></p></td>
		<td><p><input type="text" class="color {pickerFaceColor:'#fff'}" id="<?php echo $this->get_field_id('item_txt'); ?>" name="<?php echo $this->get_field_name('item_txt'); ?>" value="<?php echo $instance['item_txt']; ?>" /></p></td>
		</tr>
		<tr>
		<td><p><label for="<?php echo $this->get_field_id('hover_bg'); ?>"><?php _e('Hover BG:', 'impact') ?></label></p></td>
		<td><p><input type="text" class="color {pickerFaceColor:'#fff'}" id="<?php echo $this->get_field_id('hover_bg'); ?>" name="<?php echo $this->get_field_name('hover_bg'); ?>" value="<?php echo $instance['hover_bg']; ?>" /></p></td>
		</tr>
		<tr>
		<td><p><label for="<?php echo $this->get_field_id('hover_txt'); ?>"><?php _e('Hover Text:', 'impact') ?></label></p></td>
		<td><p><input type="text" class="color {pickerFaceColor:'#fff'}" id="<?php echo $this->get_field_id('hover_txt'); ?>" name="<?php echo $this->get_field_name('hover_txt'); ?>" value="<?php echo $instance['hover_txt']; ?>" /></p></td>
		</tr>
		<tr>
		<td><p><label for="<?php echo $this->get_field_id('current_bg'); ?>"><?php _e('Current BG:', 'impact') ?></label></p></td>
		<td><p><input type="text" class="color {pickerFaceColor:'#fff'}" id="<?php echo $this->get_field_id('current_bg'); ?>" name="<?php echo $this->get_field_name('current_bg'); ?>" value="<?php echo $instance['current_bg']; ?>" /></p></td>
		</tr>
		<tr>
		<td><p><label for="<?php echo $this->get_field_id('current_txt'); ?>"><?php _e('Current Text:', 'impact') ?></label></p></td>
		<td><p><input type="text" class="color {pickerFaceColor:'#fff'}" id="<?php echo $this->get_field_id('current_txt'); ?>" name="<?php echo $this->get_field_name('current_txt'); ?>" value="<?php echo $instance['current_txt']; ?>" /></p></td>
		</tr>
		<tr>
		<td><p><label for="<?php echo $this->get_field_id('nav_font'); ?>"><?php _e('Menu Font:'); ?></label></p></td>
		<td><p><select id="<?php echo $this->get_field_id('nav_font'); ?>" name="<?php echo $this->get_field_name('nav_font'); ?>"><?php impact_font_menu( $instance['nav_font'] ); ?></select></p></td>
		</tr>
		<tr>
		<td><p><label for="<?php echo $this->get_field_id('nav_align'); ?>"><?php _e('Menu Align:'); ?></label></p></td>
		<td><p>
		<select id="<?php echo $this->get_field_id('nav_align'); ?>" name="<?php echo $this->get_field_name('nav_align'); ?>">
			<option value="left"<?php echo ( $instance['nav_align'] == 'left' ) ? ' selected="selected"' : ''; ?>><?php _e('Left', 'impact');?></option>
			<option value="center"<?php echo ( $instance['nav_align'] == 'center' ) ? ' selected="selected"' : ''; ?>><?php _e('Center', 'impact');?></option>
			<option value="right"<?php echo ( $instance['nav_align'] == 'right' ) ? ' selected="selected"' : ''; ?>><?php _e('Right', 'impact');?></option>
		</select>
		</p></td>
		</tr>
		</table>
		<?php
	}
}

//end lib/functions/impact-widgets.php