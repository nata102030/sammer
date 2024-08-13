<?php 

// adding some css code
function custom_content_scrollbar_some_custom_css_code() {
 	global $custom_content_scrollbar_options; 
 	$custom_content_scrollbar_settings = get_option( 'custom_content_scrollbar_options', $custom_content_scrollbar_options );
	$main_scrollbar = $custom_content_scrollbar_settings['show_main_scrollbar'];
			
	$custom_selector = $custom_content_scrollbar_settings['custom_selector']; 
	$custom_selectors = explode(",", $custom_selector);
	if($custom_selectors[0] != '') {
		foreach ($custom_selectors as $value) { 
			$theme_style = $custom_content_scrollbar_settings['scrollbar_theme'];
			$custom_style = $custom_content_scrollbar_settings['custom_style'];
			if( $custom_style == "true" ) { ?>	
			<style type="text/css"> 		
				<?php echo $value; ?> > .mCustomScrollBox > .mCS-<?php echo esc_attr($theme_style); ?>.mCSB_scrollTools .mCSB_draggerRail {
					width: <?php echo esc_attr($custom_content_scrollbar_settings['dragger_rail_width']); ?> !important;
					background: <?php echo esc_attr($custom_content_scrollbar_settings['dragger_rail_color']); ?> !important;
					-webkit-border-radius: <?php echo esc_attr($custom_content_scrollbar_settings['dragger_rail_border_radius']); ?> !important;
					-moz-border-radius: <?php echo esc_attr($custom_content_scrollbar_settings['dragger_rail_border_radius']); ?> !important;
					border-radius: <?php echo esc_attr($custom_content_scrollbar_settings['dragger_rail_border_radius']); ?> !important;
				}
				<?php echo $value; ?> > .mCustomScrollBox > .mCS-<?php echo esc_attr($theme_style); ?>.mCSB_scrollTools .mCSB_dragger .mCSB_dragger_bar {
					width: <?php echo esc_attr($custom_content_scrollbar_settings['dragger_bar_width']); ?> !important;
					background: <?php echo esc_attr($custom_content_scrollbar_settings['dragger_bar_color']); ?> !important;
					-webkit-border-radius: <?php echo esc_attr($custom_content_scrollbar_settings['dragger_bar_border_radius']); ?> !important;
					-moz-border-radius: <?php echo esc_attr($custom_content_scrollbar_settings['dragger_bar_border_radius']); ?> !important;
					border-radius: <?php echo esc_attr($custom_content_scrollbar_settings['dragger_bar_border_radius']); ?> !important;
				}
				<?php echo $value; ?> > .mCustomScrollBox > .mCS-<?php echo esc_attr($theme_style); ?>.mCSB_scrollTools .mCSB_dragger:hover .mCSB_dragger_bar,
				<?php echo $value; ?> > .mCustomScrollBox > .mCS-<?php echo esc_attr($theme_style); ?>.mCSB_scrollTools .mCSB_dragger:active .mCSB_dragger_bar,
				<?php echo $value; ?> > .mCustomScrollBox > .mCS-<?php echo esc_attr($theme_style); ?>.mCSB_scrollTools .mCSB_dragger.mCSB_dragger_onDrag .mCSB_dragger_bar {
					background: <?php echo esc_attr($custom_content_scrollbar_settings['dragger_bar_hover_color']); ?> !important; 
				}
			</style> 
			<?php }
		}
	}

	$custom_css = $custom_content_scrollbar_settings['custom_css']; 
	if ( !empty($custom_css) ) { ?>
		<style type="text/css"> 
			<?php echo stripslashes($custom_content_scrollbar_settings['custom_css']); ?>			
		</style>	
	<?php }
}
add_action('wp_head', 'custom_content_scrollbar_some_custom_css_code');

// adding some js code
function custom_content_scrollbar_active_js() { 
	global $custom_content_scrollbar_options; 
	$custom_content_scrollbar_settings = get_option( 'custom_content_scrollbar_options', $custom_content_scrollbar_options ); 
	$main_scrollbar = $custom_content_scrollbar_settings['show_main_scrollbar'];
	$custom_selector = $custom_content_scrollbar_settings['custom_selector']; 
	$custom_selectors = explode(",", $custom_selector);
	if($custom_selectors[0] != '') {
		foreach ($custom_selectors as $value) { ?>
		<script> 
			(function($){
				$(document).ready(function() {
					$("<?php echo $value; ?>").mCustomScrollbar({
						theme: "<?php echo esc_js($custom_content_scrollbar_settings['scrollbar_theme']); ?>",
						scrollInertia: <?php echo esc_js($custom_content_scrollbar_settings['scroll_speed']); ?>,
						scrollButtons: {enable: <?php echo esc_js($custom_content_scrollbar_settings['arrow_button_mode']); ?>},		
						autoHideScrollbar: <?php echo esc_js($custom_content_scrollbar_settings['auto_hide_mode']); ?>,	
						autoExpandScrollbar: <?php echo esc_js($custom_content_scrollbar_settings['auto_expand_mode']); ?>,
						keyboard:{ enable: <?php echo esc_js($custom_content_scrollbar_settings['keyboard_mode']); ?> }
					});	
				});
			})(jQuery); 
		</script>
		<?php }
	}

	if ( $main_scrollbar == "true" ) { ?>
	<script>
		(function($){
			$(document).ready(
			function() {
				$("html").niceScroll({
					cursorcolor:		"<?php echo esc_js($custom_content_scrollbar_settings['main_dragger_bar_color']); ?>",
					cursorwidth: 		"<?php echo esc_js($custom_content_scrollbar_settings['main_dragger_rail_width']); ?>",
					cursorborder: 		"0px solid #000",
					cursorborderradius: "<?php echo esc_js($custom_content_scrollbar_settings['main_dragger_bar_border_radius']); ?>", 
					scrollspeed: 		<?php echo esc_js($custom_content_scrollbar_settings['main_scroll_speed']); ?>,
					autohidemode: 		<?php echo esc_js($custom_content_scrollbar_settings['main_auto_hide_mode']); ?>,
					background: 		"<?php echo esc_js($custom_content_scrollbar_settings['main_dragger_rail_color']); ?>",
					hidecursordelay: 	40,
					cursorfixedheight: 	false,
					cursorminheight: 	20,
					enablekeyboard: 	<?php echo esc_js($custom_content_scrollbar_settings['main_keyboard_mode']); ?>,
					horizrailenabled: 	true,
					bouncescroll: 		false,
					smoothscroll: 		true,
					iframeautoresize: 	true,
					touchbehavior: 		false,
					zindex: 999999
				});
			});
		})(jQuery);
		
	</script>					
	<?php 
	}
}
add_action('wp_footer', 'custom_content_scrollbar_active_js');
