<?php 
/*
Plugin Name: Custom Content Scrollbar
Plugin URI: http://wordpress-custom-scrollbar.softhopper.net/
Description: This plugin will enable custom scrollbar in your WordPress site. You can also add custom scrollbar in your post, page etc. And can also change scrollbar theme & other setting from <a href="options-general.php?page=sh-custom-scrollbar-settings">Option Panel</a>
Author: SoftHopper
Author URI: https://www.softhopper.net
Version: 1.3
*/

/* don't call the file directly */
if ( !defined( 'ABSPATH' ) ) exit;

/* Adding Custom Content Scrollbar Script */
function custom_content_scrollbar_scripts() {
	wp_enqueue_style( 'custom-content-scrollbar-main', plugins_url( '/css/jquery.mCustomScrollbar.min.css', __FILE__ ));

	wp_enqueue_script( 'custom-content-scrollbar-main-cst', plugins_url( '/js/jquery.mCustomScrollbar.min.js', __FILE__ ), array('jquery'), 3.1, false);

	wp_enqueue_script( 'custom-content-scrollbar-body', plugins_url( '/js/jquery.nicescroll.min.js', __FILE__ ), array('jquery'), 3.7, false);
}
add_action('wp_enqueue_scripts', 'custom_content_scrollbar_scripts');

function custom_content_scrollbar_admin_scripts( $hook_suffix ) {
    // first check that $hook_suffix is appropriate for your admin page
    wp_enqueue_style( 'wp-color-picker' );
    wp_enqueue_script( 'custom-content-scrollbar-custom-js', plugins_url('js/custom.js', __FILE__ ), array( 'wp-color-picker' ), false, true );

	if ( $hook_suffix == "post.php" || $hook_suffix == "post-new.php" ):
	    wp_enqueue_script('media-upload');
	    wp_enqueue_script('thickbox');
		wp_enqueue_style( 'custom-content-scrollbar-dialog-box', plugins_url( '/css/dialog-box.css', __FILE__ ));
		wp_enqueue_script( 'custom-content-scrollbar-dialog-box-js', plugins_url('js/dialog-box.js', __FILE__ ), array('jquery','wp-color-picker','media-upload','thickbox'), false, true );
	endif;
}
add_action( 'admin_enqueue_scripts', 'custom_content_scrollbar_admin_scripts' );



// load plugin text domain
load_plugin_textdomain('custom-content-scrollbar', FALSE, dirname(plugin_basename(__FILE__)).'/languages/');

// Default options values
$custom_content_scrollbar_options = array (
	'show_main_scrollbar' => 'true',
	'scrollbar_theme' => 'rounded-dots-dark',
	'custom_style' => 'false',
	'arrow_button_mode' => 'true',
	'dragger_rail_color' => '#C4C4C4',
	'main_dragger_rail_color' => '#C4C4C4',
	'dragger_rail_width' => '10px',
	'main_dragger_rail_width' => '10px',
	'dragger_rail_border_radius' => '0px',
	'dragger_bar_color' => '#1D1D1D',
	'main_dragger_bar_color' => '#1D1D1D',
	'dragger_bar_width' => '10px',
	'dragger_bar_border_radius' => '0px',
	'main_dragger_bar_border_radius' => '0px',
	'dragger_bar_hover_color' => '#000',	
	'scroll_speed' => '400',
	'main_scroll_speed' => '60',
	'auto_hide_mode' => 'false',
	'main_auto_hide_mode' => 'false',
	'auto_expand_mode' => 'true',
	'keyboard_mode' => 'true',
	'main_keyboard_mode' => 'true',
	'show_admin_bar' => 'false',
	'shortcode_nested' => '3',
	'custom_css' => '',
	'custom_selector' => ''
);

/* Get option value */
$scrollbar_options_value = get_option( 'custom_content_scrollbar_options', $custom_content_scrollbar_options );

/* Hide admin bar from theme */
if ( $scrollbar_options_value['show_admin_bar'] == "false") {
	show_admin_bar( false );
	add_filter('show_admin_bar', '__return_false');
}

// include scrollbar-shortcode
include( plugin_dir_path( __FILE__ ) . 'includes/scrollbar-shortcode.php' );

// include scrollbar-shortcode
include( plugin_dir_path( __FILE__ ) . 'includes/scrollbar-option-panel.php' );

// scrollbar-activation-scripts
include( plugin_dir_path( __FILE__ ) . 'includes/scrollbar-activation-scripts.php' );
