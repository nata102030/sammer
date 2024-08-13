<?php 
//add options framework
function add_custom_content_scrollbar_options_framwrork() {  
	add_options_page( esc_html__('SH Scrollbar Options', 'custom-content-scrollbar'), esc_html__('SH Scrollbar Options', 'custom-content-scrollbar'), 'manage_options', 'sh-custom-scrollbar-settings','custom_content_scrollbar_options_framwrork');  
}  
add_action('admin_menu', 'add_custom_content_scrollbar_options_framwrork');

if ( is_admin() ) : // Load only if we are viewing an admin page

function custom_content_scrollbar_register_settings() {
	// Register settings and call sanitation functions
	register_setting( 'custom_content_scrollbar_options', 'custom_content_scrollbar_options', 'custom_content_scrollbar_validate_options' );
}
add_action( 'admin_init', 'custom_content_scrollbar_register_settings' );

// Function to generate options page
function custom_content_scrollbar_options_framwrork() {
	global $custom_content_scrollbar_options;
	$options_value = get_option( 'custom_content_scrollbar_options', $custom_content_scrollbar_options );

	$radio_true_false_array = array (
	    'true' => esc_html__('True', 'custom-content-scrollbar'), 
	    'false' => esc_html__('False', 'custom-content-scrollbar'), 
	);
?>

<div class="wrap">
	<h2><?php esc_html_e('Custom Content Scrollbar', 'custom-content-scrollbar'); ?></h2> 
	<?php 
	if ( ! isset( $_REQUEST['updated'] ) ) {
		$_REQUEST['updated'] = false; // This checks whether the form has just been submitted. 
	}

	if ( false !== $_REQUEST['updated'] ) : ?>
	<div class="updated fade"><p><strong><?php esc_html_e( 'Options saved', 'custom-content-scrollbar' ); ?></strong></p></div>
	<?php endif; // If the form has just been submitted, this shows the notification 

	function custom_content_scrollbar_admin_tabs( $current = 'main-scrollbar' ) {
	    $tabs = array( 'main-scrollbar' => esc_html__('Main Scrollbar', 'custom-content-scrollbar'), 'custom-selector' => esc_html__('Custom Selector', 'custom-content-scrollbar') );
	    echo '<h2 class="nav-tab-wrapper">';
	    foreach( $tabs as $tab => $name ){
	        $class = ( $tab == $current ) ? ' nav-tab-active' : '';
	        echo "<a class='nav-tab$class' href='?page=sh-custom-scrollbar-settings&tab=$tab'>$name</a>";
	    }
	    echo '</h2>';
	}
	if ( isset ( $_GET['tab'] ) ) custom_content_scrollbar_admin_tabs($_GET['tab']); else custom_content_scrollbar_admin_tabs('main-scrollbar');

	$curent_tab = ( isset ( $_GET['tab'] ) ) ? $_GET['tab'] : 'main-scrollbar'; ?>

	<form method="post" action="options.php"> 

	<?php settings_fields( 'custom_content_scrollbar_options' );
	/* This function outputs some hidden fields required by the form,
	including a nonce, a unique number used to ensure the form has been submitted from the admin page
	and not somewhere else, very important for security */ ?>
	<style>
	<?php if ($curent_tab == 'main-scrollbar') { ?>
		.main-scrollbar {
			display: block;
		}
		.custom-selector {
			display: none;
		}
    <?php } else { ?>
		.main-scrollbar {
			display: none;
		}
		.custom-selector {
			display: block;
		}
    <?php } ?>
	</style>

	<table class="form-table main-scrollbar"><!-- Grab a hot cup of coffee, yes we're using tables! -->
		<tr valign="top">
			<th scope="row"><label><?php esc_html_e('Show main scrollbar', 'custom-content-scrollbar'); ?></label></th>
			<td>
			<?php
				echo "<fieldset>";
		        foreach( $radio_true_false_array as $key => $value ) : ?>
		            <input type="radio" id="<?php echo esc_attr($key); ?>" name="custom_content_scrollbar_options[show_main_scrollbar]" value="<?php esc_attr_e( $key ); ?>" <?php isset($options_value['show_main_scrollbar']) ? checked( $options_value['show_main_scrollbar'], $key ) : checked($key == 'false'); ?> />
		            <label for="<?php echo esc_attr($key); ?>"><?php echo esc_html($value); ?></label><br />
		            <?php 
		        endforeach; 
		        echo '<p class="description">'.esc_html__('Enable or disable main scrollbar. If you select False the main scrollbar will hide from your theme. And default browser scrollbar will load', 'custom-content-scrollbar').'</p>';
		        echo "</fieldset>";

			?>
			</td>
		</tr>
			
		<tr valign="top">
			<th scope="row"><label for="main_dragger_rail_color"><?php esc_html_e('Dragger rail color', 'custom-content-scrollbar'); ?></label></th>
			<td>
			<?php
				printf(
		            '<input type="text" class="color-field" id="main_dragger_rail_color" name="custom_content_scrollbar_options[main_dragger_rail_color]" value="%s" />',
		            isset( $options_value['main_dragger_rail_color'] ) ? esc_attr( $options_value['main_dragger_rail_color']) : ''
		        );
	        	echo '<p class="description">'.esc_html__('Select dragger rail color here. You can also add html HEX color code.','custom-content-scrollbar').'</p>'; 
			?>
			</td>
		</tr>
	
		<tr valign="top">
			<th scope="row"><label for="main_dragger_rail_width"><?php esc_html_e('Dragger rail width', 'custom-content-scrollbar'); ?></label></th>
			<td>
			<?php
				printf(
				    '<input type="text"  id="main_dragger_rail_width" name="custom_content_scrollbar_options[main_dragger_rail_width]" value="%s" />', isset( $options_value['main_dragger_rail_width'] ) ? esc_attr( $options_value['main_dragger_rail_width']) : '' );
				echo '<p class="description">'.esc_html__('Select dragger rail width here. Please use px. Example: 15px. You can add value 1px to 16px. More than 16px this value will not be execute.','custom-content-scrollbar').'</p>'; 
			?>
			</td>
		</tr>
		
		<tr valign="top">
			<th scope="row"><label for="main_dragger_bar_color"><?php esc_html_e('Dragger bar color', 'custom-content-scrollbar'); ?></label></th>
			<td>
			<?php
				printf(
				    '<input type="text" class="color-field" id="main_dragger_bar_color" name="custom_content_scrollbar_options[main_dragger_bar_color]" value="%s" />',
				    isset( $options_value['main_dragger_bar_color'] ) ? esc_attr( $options_value['main_dragger_bar_color']) : ''
				);
				echo '<p class="description">'.esc_html__('Select dragger bar color here. You can also add html HEX color code.','custom-content-scrollbar').'</p>';
			?>
			</td>
		</tr>
		
		<tr valign="top">
			<th scope="row"><label for="main_dragger_bar_border_radius"><?php esc_html_e('Dragger bar border radius', 'custom-content-scrollbar'); ?></label></th>
			<td>
			<?php
				printf(
				    '<input type="text"  id="main_dragger_bar_border_radius" name="custom_content_scrollbar_options[main_dragger_bar_border_radius]" value="%s" />', isset( $options_value['main_dragger_bar_border_radius'] ) ? esc_attr( $options_value['main_dragger_bar_border_radius']) : '' );
				echo '<p class="description">'.esc_html__('Select dragger bar border radius here. Please use px. Example: 10px','custom-content-scrollbar').'</p>';
			?>
			</td>
		</tr>
		
		<tr valign="top">
			<th scope="row"><label for="main_scroll_speed"><?php esc_html_e('Scrollbar scroll speed', 'custom-content-scrollbar'); ?></label></th>
			<td>
			<?php
				printf(
				    '<input type="text"  id="main_scroll_speed" name="custom_content_scrollbar_options[main_scroll_speed]" value="%s" />', isset( $options_value['main_scroll_speed'] ) ? esc_attr( $options_value['main_scroll_speed']) : '' );
				echo '<p class="description">'.esc_html__('Select scrollbar speed here. Default value is 60. If you increase value, the scrolling speed will be slower. If you decrease value, scrolling speed will be faster.', 'custom-content-scrollbar').'</p>'; 
			?>
			</td>
		</tr>	
				
		<tr valign="top">
			<th scope="row"><label><?php esc_html_e('Scrollbar auto hide mode', 'custom-content-scrollbar'); ?></label></th>
			<td>
			<?php
				echo "<fieldset>";
		        foreach( $radio_true_false_array as $key => $value ) : ?>
		            <input type="radio" id="<?php echo esc_attr($key)."3"; ?>" name="custom_content_scrollbar_options[main_auto_hide_mode]" value="<?php esc_attr_e( $key ); ?>" <?php isset($options_value['main_auto_hide_mode']) ? checked( $options_value['main_auto_hide_mode'], $key ) : checked($key == 'false'); ?> />
		            <label for="<?php echo esc_attr($key)."3"; ?>"><?php echo esc_html($value); ?></label><br />
		            <?php 
		        endforeach; 
		        echo '<p class="description">'.esc_html__('Enable or disable auto-hiding the scrollbar. If you select true will hide the scrollbar when scrolling is idle and/or cursor is out of the scrolling area.', 'custom-content-scrollbar').'</p>';
		        echo "</fieldset>";
			?>
			</td>
		</tr>	
		
		<tr valign="top">
			<th scope="row"><label for="main_keyboard_mode"><?php esc_html_e('Moving mode by keyboard', 'custom-content-scrollbar'); ?></label></th>
			<td>
			<?php
				echo "<fieldset>";
		        foreach( $radio_true_false_array as $key => $value ) : ?>
		            <input type="radio" id="<?php echo esc_attr($key)."5"; ?>" name="custom_content_scrollbar_options[main_keyboard_mode]" value="<?php esc_attr_e( $key ); ?>" <?php isset($options_value['main_keyboard_mode']) ? checked( $options_value['main_keyboard_mode'], $key ) : checked($key == 'false'); ?> />
		            <label for="<?php echo esc_attr($key)."5"; ?>"><?php echo esc_html($value); ?></label><br />
		            <?php 
		        endforeach; 
		        echo '<p class="description">'.esc_html__('Enable or disable content scrolling via the keyboard. The plugin supports the directional arrows (top, left, right and down), page-up (PgUp), page-down (PgDn), Home and End keys.', 'custom-content-scrollbar').'</p>';
		        echo "</fieldset>";
			?>
			</td>
		</tr>	

		<tr valign="top">
			<th scope="row"><label for="show_admin_bar"><?php esc_html_e('Show Admin Bar', 'custom-content-scrollbar'); ?></label></th>
			<td>
			<?php
				echo "<fieldset>";
		        foreach( $radio_true_false_array as $key => $value ) : ?>
		            <input type="radio" id="<?php echo esc_attr($key)."6"; ?>" name="custom_content_scrollbar_options[show_admin_bar]" value="<?php esc_attr_e( $key ); ?>" <?php isset($options_value['show_admin_bar']) ? checked( $options_value['show_admin_bar'], $key ) : checked($key == 'false'); ?> />
		            <label for="<?php echo esc_attr($key)."6"; ?>"><?php echo esc_html($value); ?></label><br />
		            <?php 
		        endforeach; 
		        echo '<p class="description">'.esc_html__('You can show or hide admin bar from here.', 'custom-content-scrollbar').'</p>';
		        echo "</fieldset>";
			?>
			</td>
		</tr>	

		<tr valign="top">
			<th scope="row"><label for="shortcode_nested"><?php esc_html_e('Nested Shortcode', 'custom-content-scrollbar'); ?></label></th>
			<td>	
	    		<select id="shortcode_nested" name="custom_content_scrollbar_options[shortcode_nested]">
					<?php
						// storing drop down value in a array 
						$shortcode_nested = array ('1','2','3','4','5','6', '7','8','9','10');
						foreach( $shortcode_nested as $item ): ?>
						<option value="<?php echo esc_attr($item); ?>" <?php if($options_value['shortcode_nested'] == $item){ echo 'selected="selected"';} ?>><?php echo esc_html($item); ?></option>
					<?php endforeach; ?>	
				</select>
		        <?php
		        	echo '<p class="description">'.esc_html__('How many nested shortcode do you want?', 'custom-content-scrollbar').'</p>';
				?>
			</td>
		</tr>

		<tr valign="top">
			<th scope="row"><label for="custom_css"><?php esc_html_e('Custom CSS', 'custom-content-scrollbar'); ?></label></th>
			<td>
			<?php
				$custom_css = isset( $options_value['custom_css'] ) ? esc_attr( $options_value['custom_css'] ) : '';
				echo '<textarea id="custom_css" rows="10" style="width: 80%;" name="custom_content_scrollbar_options[custom_css]">'.$custom_css.'</textarea>';
				echo '<p class="description">'.esc_html__('Here, Type your custom CSS Code, If you want to modify your content scrollbar style.', 'custom-content-scrollbar').'<br> <b>'.esc_html__('Note :','custom-content-scrollbar').'</b> '.esc_html__('Paste your CSS code without &lt;style&gt; &lt;/style&gt; block','custom-content-scrollbar').'</p>';
			?>
			</td>
		</tr>
	</table>
	
	<table class="form-table custom-selector"><!-- Grab a hot cup of coffee, yes we're using tables! -->
		<tr valign="top">
			<th scope="row"><label for="custom_selector"><?php esc_html_e('Custom Selector', 'custom-content-scrollbar'); ?></label></th>
			<td>
			<?php
				$custom_selector = isset( $options_value['custom_selector'] ) ? esc_attr( $options_value['custom_selector'] ) : '';
				echo '<textarea id="custom_selector" rows="3" style="width: 80%;" name="custom_content_scrollbar_options[custom_selector]">'.$custom_selector.'</textarea>';
				echo '<p class="description">'.esc_html__('Here, Type your custom selector Class or Id name separate by comma, Like: .test_class, #test_id, .test_class2, #test_id2', 'custom-content-scrollbar').'</p>';
			?>
			</td>
		</tr> 

		<tr valign="top">
			<th scope="row"><label for="scrollbar_scrollbar_theme"><?php esc_html_e('Scrollbar theme style', 'custom-content-scrollbar'); ?></label></th>
			<td>	
	    		<select id="scrollbar_scrollbar_theme" name="custom_content_scrollbar_options[scrollbar_theme]">
					<?php
						// storing drop down value in a array 
						$scrollbar_theme = array ('light','dark','light-2','dark-2','light-3','dark-3', 'minimal','minimal-dark','rounded','rounded-dark','rounded-dots','rounded-dots-dark','3d','3d-dark','3d-thick', '3d-thick-dark','dark-thick','dark-thin','inset','inset-2','inset-2-dark','inset-3','inset-3-dark',	'inset-dark','light-thick','light-think');
						foreach( $scrollbar_theme as $item ): ?>
						<option value="<?php echo esc_attr($item); ?>" <?php if($options_value['scrollbar_theme'] == $item){ echo 'selected="selected"';} ?>><?php echo esc_html($item); ?></option>
					<?php endforeach; ?>	
				</select>
		        <?php
		        	echo '<p class="description">'.esc_html__('If you change the list value your scrollbar theme style will change. If your theme background white or light color you should have select dark theme style. if you want to see how look like the color demo, just go to this  web site ', 'custom-content-scrollbar').'<a target="blank" href="http://manos.malihu.gr/repository/custom-scrollbar/demo/examples/scrollbar_themes_demo.html">'.esc_html__('Click here', 'custom-content-scrollbar').'</a></p>';
				?>
			</td>
		</tr>

		<tr valign="top">
			<th scope="row"><label><?php esc_html_e('Custom Style', 'custom-content-scrollbar'); ?></label></th>
			<td>
			<?php
				echo "<fieldset>";
		        foreach( $radio_true_false_array as $key => $value ) : ?>
		            <input type="radio" id="<?php echo esc_attr($key)."2"; ?>" name="custom_content_scrollbar_options[custom_style]" value="<?php esc_attr_e( $key ); ?>" <?php isset($options_value['custom_style']) ? checked( $options_value['custom_style'], $key ) : checked($key == 'false'); ?> />
		            <label for="<?php echo esc_attr($key)."2"; ?>"><?php echo esc_html($value); ?></label><br />
		            <?php 
		        endforeach; 
		        echo '<p class="description">'.esc_html__('If you want you can add custom style', 'custom-content-scrollbar').'<br> <b>'.esc_html__('Note :','custom-content-scrollbar').'</b> '.esc_html__('Custom Style will not execute properly when you select "rounded" or "3d" ScrollBar theme style from ScrollBar theme style dropdown list. So please use other theme style when you use custom style','custom-content-scrollbar').'</p>';
		        echo "</fieldset>";
			?>
			</td>
		</tr>	
			
		<tr valign="top">
			<th scope="row"><label for="dragger_rail_color"><?php esc_html_e('Dragger rail color', 'custom-content-scrollbar'); ?></label></th>
			<td>
			<?php
				printf(
		            '<input type="text" class="color-field" id="dragger_rail_color" name="custom_content_scrollbar_options[dragger_rail_color]" value="%s" />',
		            isset( $options_value['dragger_rail_color'] ) ? esc_attr( $options_value['dragger_rail_color']) : ''
		        );
	        	echo '<p class="description">'.esc_html__('Select dragger rail color here. You can also add html HEX color code.','custom-content-scrollbar').'</p>'; 
			?>
			</td>
		</tr>
	
		<tr valign="top">
			<th scope="row"><label for="dragger_rail_width"><?php esc_html_e('Dragger rail width', 'custom-content-scrollbar'); ?></label></th>
			<td>
			<?php
				printf(
				    '<input type="text"  id="dragger_rail_width" name="custom_content_scrollbar_options[dragger_rail_width]" value="%s" />', isset( $options_value['dragger_rail_width'] ) ? esc_attr( $options_value['dragger_rail_width']) : '' );
				echo '<p class="description">'.esc_html__('Select dragger rail width here. Please use px. Example: 15px. You can add value 1px to 16px. More than 16px this value will not be execute.','custom-content-scrollbar').'</p>'; 
			?>
			</td>
		</tr>
		
		<tr valign="top">
			<th scope="row"><label for="dragger_rail_border_radius"><?php esc_html_e('Dragger rail border radius', 'custom-content-scrollbar'); ?></label></th>
			<td>
			<?php
				printf(
				    '<input type="text"  id="dragger_rail_border_radius" name="custom_content_scrollbar_options[dragger_rail_border_radius]" value="%s" />', isset( $options_value['dragger_rail_border_radius'] ) ? esc_attr( $options_value['dragger_rail_border_radius']) : '' );
				echo '<p class="description">'.esc_html__('Select dragger rail border radius here. Please use px. Example: 10px','custom-content-scrollbar').'</p>';
			?>
			</td>
		</tr>
		
		<tr valign="top">
			<th scope="row"><label for="dragger_bar_color"><?php esc_html_e('Dragger bar color', 'custom-content-scrollbar'); ?></label></th>
			<td>
			<?php
				printf(
				    '<input type="text" class="color-field" id="dragger_bar_color" name="custom_content_scrollbar_options[dragger_bar_color]" value="%s" />',
				    isset( $options_value['dragger_bar_color'] ) ? esc_attr( $options_value['dragger_bar_color']) : ''
				);
				echo '<p class="description">'.esc_html__('Select dragger bar color here. You can also add html HEX color code.','custom-content-scrollbar').'</p>';
			?>
			</td>
		</tr>

		<tr valign="top">
			<th scope="row"><label for="dragger_bar_hover_color"><?php esc_html_e('Dragger bar hover color', 'custom-content-scrollbar'); ?></label></th>
			<td>
			<?php
				printf(
				    '<input type="text" class="color-field" id="dragger_bar_hover_color" name="custom_content_scrollbar_options[dragger_bar_hover_color]" value="%s" />',
				    isset( $options_value['dragger_bar_hover_color'] ) ? esc_attr( $options_value['dragger_bar_hover_color']) : ''
				);
				echo '<p class="description">'.esc_html__('Select dragger bar hover color here. You can also add html HEX color code.','custom-content-scrollbar').'</p>';
			?>
			</td>
		</tr>
		
		<tr valign="top">
			<th scope="row"><label for="dragger_bar_width"><?php esc_html_e('Dragger bar width', 'custom-content-scrollbar'); ?></label></th>
			<td>
			<?php
				printf(
		            '<input type="text"  id="dragger_bar_width" name="custom_content_scrollbar_options[dragger_bar_width]" value="%s" />', isset( $options_value['dragger_bar_width'] ) ? esc_attr( $options_value['dragger_bar_width']) : '' );
		        echo '<p class="description">'.esc_html__('Select dragger bar width here. Please use px. Example: 15px. You can add value 1px to 16px. More than 16px this value will not be execute.','custom-content-scrollbar').'</p>'; 
			?>
			</td>
		</tr>
		
		<tr valign="top">
			<th scope="row"><label for="dragger_bar_border_radius"><?php esc_html_e('Dragger bar border radius', 'custom-content-scrollbar'); ?></label></th>
			<td>
			<?php
				printf(
				    '<input type="text"  id="dragger_bar_border_radius" name="custom_content_scrollbar_options[dragger_bar_border_radius]" value="%s" />', isset( $options_value['dragger_bar_border_radius'] ) ? esc_attr( $options_value['dragger_bar_border_radius']) : '' );
				echo '<p class="description">'.esc_html__('Select dragger bar border radius here. Please use px. Example: 10px','custom-content-scrollbar').'</p>';
			?>
			</td>
		</tr>
		
		<tr valign="top">
			<th scope="row"><label for="scroll_speed"><?php esc_html_e('Scrollbar scroll speed', 'custom-content-scrollbar'); ?></label></th>
			<td>
			<?php
				printf(
				    '<input type="text"  id="scroll_speed" name="custom_content_scrollbar_options[scroll_speed]" value="%s" />', isset( $options_value['scroll_speed'] ) ? esc_attr( $options_value['scroll_speed']) : '' );
				echo '<p class="description">'.esc_html__('Select scrollbar speed here. Default value is 400. If you increase value, the scrolling speed will be slower. If you decrease value, scrolling speed will be faster.', 'custom-content-scrollbar').'</p>'; 
			?>
			</td>
		</tr>
		
		<tr valign="top">
			<th scope="row"><label><?php esc_html_e('Showing arrow button', 'custom-content-scrollbar'); ?></label></th>
			<td>
			<?php
				echo "<fieldset>";
		        foreach( $radio_true_false_array as $key => $value ) : ?>
		            <input type="radio" id="<?php echo esc_attr($key)."9"; ?>" name="custom_content_scrollbar_options[arrow_button_mode]" value="<?php esc_attr_e( $key ); ?>" <?php isset($options_value['arrow_button_mode']) ? checked( $options_value['arrow_button_mode'], $key ) : checked($key == 'false'); ?> />
		            <label for="<?php echo esc_attr($key)."9"; ?>"><?php echo esc_html($value); ?></label><br />
		            <?php 
		        endforeach; 
		        echo '<p class="description">'.esc_html__('If you select False. Arrow button will hide from the up/down or left/right of scrollbar.', 'custom-content-scrollbar').'</p>';
		        echo "</fieldset>";
			?>
			</td>
		</tr>		
				
		<tr valign="top">
			<th scope="row"><label><?php esc_html_e('Scrollbar auto hide mode', 'custom-content-scrollbar'); ?></label></th>
			<td>
			<?php
				echo "<fieldset>";
		        foreach( $radio_true_false_array as $key => $value ) : ?>
		            <input type="radio" id="<?php echo esc_attr($key)."3"; ?>" name="custom_content_scrollbar_options[auto_hide_mode]" value="<?php esc_attr_e( $key ); ?>" <?php isset($options_value['auto_hide_mode']) ? checked( $options_value['auto_hide_mode'], $key ) : checked($key == 'false'); ?> />
		            <label for="<?php echo esc_attr($key)."3"; ?>"><?php echo esc_html($value); ?></label><br />
		            <?php 
		        endforeach; 
		        echo '<p class="description">'.esc_html__('Enable or disable auto-hiding the scrollbar. If you select true will hide the scrollbar when scrolling is idle and/or cursor is out of the scrolling area.', 'custom-content-scrollbar').'</p>';
		        echo "</fieldset>";
			?>
			</td>
		</tr>	
		
		<tr valign="top">
			<th scope="row"><label><?php esc_html_e('Scrollbar auto expnad mode', 'custom-content-scrollbar'); ?></label></th>
			<td>
			<?php
				echo "<fieldset>";
		        foreach( $radio_true_false_array as $key => $value ) : ?>
		            <input type="radio" id="<?php echo esc_attr($key)."4"; ?>" name="custom_content_scrollbar_options[auto_expand_mode]" value="<?php esc_attr_e( $key ); ?>" <?php isset($options_value['auto_expand_mode']) ? checked( $options_value['auto_expand_mode'], $key ) : checked($key == 'false'); ?> />
		            <label for="<?php echo esc_attr($key)."4"; ?>"><?php echo esc_html($value); ?></label><br />
		            <?php 
		        endforeach; 
		        echo '<p class="description">'.esc_html__('Enable or disable auto-expanding the scrollbar(s) when cursor is over or dragging the scrollbar.', 'custom-content-scrollbar').'</p>';
		        echo "</fieldset>";
			?>
			</td>
		</tr>	
		
		<tr valign="top">
			<th scope="row"><label for="keyboard_mode"><?php esc_html_e('Moving mode by keyboard', 'custom-content-scrollbar'); ?></label></th>
			<td>
			<?php
				echo "<fieldset>";
		        foreach( $radio_true_false_array as $key => $value ) : ?>
		            <input type="radio" id="<?php echo esc_attr($key)."5"; ?>" name="custom_content_scrollbar_options[keyboard_mode]" value="<?php esc_attr_e( $key ); ?>" <?php isset($options_value['keyboard_mode']) ? checked( $options_value['keyboard_mode'], $key ) : checked($key == 'false'); ?> />
		            <label for="<?php echo esc_attr($key)."5"; ?>"><?php echo esc_html($value); ?></label><br />
		            <?php 
		        endforeach; 
		        echo '<p class="description">'.esc_html__('Enable or disable content scrolling via the keyboard. The plugin supports the directional arrows (top, left, right and down), page-up (PgUp), page-down (PgDn), Home and End keys.', 'custom-content-scrollbar').'</p>';
		        echo "</fieldset>";
			?>
			</td>
		</tr>	
 
	</table>
	
	<?php submit_button(); ?>

	</form>
</div><!-- /.wrap -->

<?php
} // end custom_content_scrollbar_options_framwrork()

function custom_content_scrollbar_validate_options( $input ) {
	$new_input = array();

    $tf_settings_field = array(
        "show_main_scrollbar",
        "main_dragger_rail_color",
        "main_dragger_rail_width",
        "main_dragger_bar_color",
        "main_dragger_bar_border_radius",
        "main_scroll_speed",
        "main_auto_hide_mode",
        "main_keyboard_mode",
        "scrollbar_theme",
        "custom_style",
        "dragger_rail_color",
        "dragger_rail_width",
        "dragger_rail_border_radius",
        "dragger_bar_color",
        "dragger_bar_hover_color",
        "dragger_bar_width",
        "dragger_bar_border_radius",
        "scroll_speed",
        "auto_hide_mode",
        "arrow_button_mode",
        "auto_expand_mode",
        "keyboard_mode",
        "show_admin_bar",
        "shortcode_nested",
    ); 

    foreach ($tf_settings_field as $value) {
        $new_input[ $value ] = sanitize_text_field( $input[ $value ] );
    }

    if( isset( $input['custom_css'] ) )
        $new_input['custom_css'] = wp_filter_nohtml_kses( $input['custom_css'] );

    if( isset( $input['custom_selector'] ) )
        $new_input['custom_selector'] = wp_filter_nohtml_kses( $input['custom_selector'] );

    return $new_input;
}
endif;  // endif is_admin()