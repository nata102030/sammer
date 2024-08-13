<?php 
if ( ! function_exists( 'custom_content_scrollbar_get_file_name' ) ) :
function custom_content_scrollbar_get_file_name( $file_path ){
    $get_file_name_path = explode("/", $file_path);
    return end($get_file_name_path);
}
endif;

function add_my_media_button() { ?>
    <a href="javascript:void(0)" id="insert-scrollbar-shortcode" class="button"><span class="dashicons dashicons-controls-pause"></span><?php esc_html_e("Custom Content Scrollbar", "custom-content-scrollbar"); ?></a>
<?php }

if ( custom_content_scrollbar_get_file_name( $_SERVER['PHP_SELF'] ) == "post.php" || custom_content_scrollbar_get_file_name( $_SERVER['PHP_SELF'] ) == "post-new.php" ):
	add_action('media_buttons', 'add_my_media_button', 15);
	add_action('admin_head', 'custom_content_scrollbar_shortcode_box');
endif;
function custom_content_scrollbar_shortcode_box($hook_suffix) { 
	global $custom_content_scrollbar_options;
	$options_value = get_option( 'custom_content_scrollbar_options', $custom_content_scrollbar_options ); ?>
	<div class="scrollbar-shrotcode-container-area">
	<div class="scrollbar-shrotcode-container">
		<div class="scrollbar-shrotcode-title">
			<h2><?php esc_html_e("Custom Content Scrollbar", "custom-content-scrollbar"); ?></h2>
			<div class="scrollbar-shortcode-close">
				<span class="dashicons dashicons-no-alt"></span>
			</div><!-- /.scrollbar-shortcode-close -->
		</div><!-- /.scrollbar-shrotcode-title -->
		<div class="scrollbar-shortcode-content">
			<table>
				<tr>
					<th>
						<label for="scrollbar_theme"><?php esc_html_e("Scrollbar Theme", "custom-content-scrollbar"); ?></label>
					</th>
					<td>
						<select name="scrollbar_theme" id="scrollbar_theme" size="1">
							<?php
							// storing drop down value in a array 
							$scrollbar_theme = array ('light','minimal','minimal-dark','rounded','rounded-dark','rounded-dots','rounded-dots-dark','3d','3d-dark','3d-thick',
							'3d-thick-dark','dark','dark-2','dark-3','dark-thick','dark-thin','inset','inset-2','inset-2-dark','inset-3','inset-3-dark',
							'inset-dark','light-2','light-3','light-thick','light-think');
							?>
							<option value="" selected="selected"><?php esc_html_e("Select", "custom-content-scrollbar"); ?></option>
							<?php foreach( $scrollbar_theme as $value ):?>					
							<option value="<?php echo $value; ?>"><?php echo $value; ?></option>
							<?php endforeach; ?>	
						</select>
					</td>
				</tr>
				<tr>
					<th>
						<label for="arrow_button_mode"><?php esc_html_e("Show arrow button mode", "custom-content-scrollbar"); ?></label>
					</th>
					<td>
						<select name="arrow_button_mode" id="arrow_button_mode" size="1">
							<option value="" selected="selected"><?php esc_html_e("Select", "custom-content-scrollbar"); ?></option>
							<option value="true"><?php esc_html_e("True", "custom-content-scrollbar"); ?></option>
							<option value="false" ><?php esc_html_e("False", "custom-content-scrollbar"); ?></option>
						</select>
					</td>
				</tr>
				<tr>
					<th>
						<label for="width"><?php esc_html_e("Set Width", "custom-content-scrollbar"); ?></label>
					</th>
					<td>
						<input class="unit-field" type="number" name="width" value="" id="width" />
						<select class="unit-type" name="unit_type_width" id="unit_type_width" size="1">
							<option value="px" selected="selected"><?php esc_html_e("px", "custom-content-scrollbar"); ?></option>
							<option value="%" ><?php esc_html_e("%", "custom-content-scrollbar"); ?></option>
						</select>
					</td>
				</tr>
				<tr>
					<th>
						<label for="height"><?php esc_html_e("Set Height", "custom-content-scrollbar"); ?></label>
					</th>
					<td>
						<input class="unit-field" type="number" name="height" value="" id="height" />
						<select class="unit-type" name="unit_type_height" id="unit_type_height" size="1">
							<option value="px" selected="selected"><?php esc_html_e("px", "custom-content-scrollbar"); ?></option>
						</select>
					</td>
				</tr>
				<tr>
					<th>
						<label for="responsive_width"><?php esc_html_e("Responsive Custom Width", "custom-content-scrollbar"); ?></label>
					</th>
					<td>
						<select name="responsive_width" id="responsive_width" size="1">
							<option value="no" selected="selected"><?php esc_html_e("No", "custom-content-scrollbar"); ?></option>
							<option value="yes"><?php esc_html_e("Yes", "custom-content-scrollbar"); ?></option>
						</select>							
					</td>
				</tr>
				<tr class="responsive-width">
					<th>
						<label for="tablet_device_width"><?php esc_html_e("Tablet Device Width", "custom-content-scrollbar"); ?></label>
					</th>
					<td>
						<input class="unit-field" type="number" name="tablet_device_width" value="" id="tablet_device_width" />
						<select class="unit-type" name="unit_type_tablet_device_width" id="unit_type_tablet_device_width" size="1">
							<option value="px" selected="selected"><?php esc_html_e("px", "custom-content-scrollbar"); ?></option>
							<option value="%" ><?php esc_html_e("%", "custom-content-scrollbar"); ?></option>
						</select>
					</td>
				</tr>
				<tr class="responsive-width">
					<th>
						<label for="mobile_device_horizontal"><?php esc_html_e("Mobile Device Horizontal", "custom-content-scrollbar"); ?></label>
					</th>
					<td>
						<input class="unit-field" type="number" name="mobile_device_horizontal" value="" id="mobile_device_horizontal" />
						<select class="unit-type" name="unit_type_mobile_device_horizontal" id="unit_type_mobile_device_horizontal" size="1">
							<option value="px" selected="selected"><?php esc_html_e("px", "custom-content-scrollbar"); ?></option>
							<option value="%" ><?php esc_html_e("%", "custom-content-scrollbar"); ?></option>
						</select>
					</td>
				</tr>
				<tr class="responsive-width">
					<th>
						<label for="mobile_device_vertical"><?php esc_html_e("Mobile Device Vertical", "custom-content-scrollbar"); ?></label>
					</th>
					<td>
						<input class="unit-field" type="number" name="mobile_device_vertical" value="" id="mobile_device_vertical" />
						<select class="unit-type" name="unit_type_mobile_device_vertical" id="unit_type_mobile_device_vertical" size="1">
							<option value="px" selected="selected"><?php esc_html_e("px", "custom-content-scrollbar"); ?></option>
							<option value="%" ><?php esc_html_e("%", "custom-content-scrollbar"); ?></option>
						</select>
					</td>
				</tr>
				<tr>
					<th>
						<label for="axis"><?php esc_html_e("Show Scrollbar", "custom-content-scrollbar"); ?></label>
					</th>
					<td>
						<select name="axis" id="axis" size="1">
							<option value="" selected="selected"><?php esc_html_e("Select", "custom-content-scrollbar"); ?></option>
							<option value="y"><?php esc_html_e("Vertically", "custom-content-scrollbar"); ?></option>
							<option value="x"><?php esc_html_e("Horizontally", "custom-content-scrollbar"); ?></option>
							<option value="yx"><?php esc_html_e("Vertically & Horizontally", "custom-content-scrollbar"); ?></option>
						</select>							
					</td>
				</tr>
				<tr class="scroll-to-y">
					<th>
						<label for="scroll_to_y"><?php esc_html_e("Scroll To Vertically", "custom-content-scrollbar"); ?></label>
					</th>
					<td>
						<input type="number" name="scroll_to_y" value="" id="scroll_to_y" />
					</td>
				</tr>
				<tr class="scroll-to-x">
					<th>
						<label for="scroll_to_x"><?php esc_html_e("Scroll To Horizontally", "custom-content-scrollbar"); ?></label>
					</th>
					<td>
						<input type="number" name="scroll_to_x" value="" id="scroll_to_x" />
					</td>
				</tr>
				<tr class="horizontal-div-width">
					<th>
						<label for="horizontal_div_width"><?php esc_html_e("Horizontal Div Width", "custom-content-scrollbar"); ?></label>
					</th>
					<td>
						<input class="unit-field" type="number" name="horizontal_div_width" value="" id="horizontal_div_width" />
						<select class="unit-type" name="unit_type_horizontal_div_width" id="unit_type_horizontal_div_width" size="1">
							<option value="px" selected="selected"><?php esc_html_e("px", "custom-content-scrollbar"); ?></option>
						</select>
					</td>
				</tr>
				<tr>
					<th>
						<label for="mouse_wheel_axis"><?php esc_html_e("Mouse Wheel", "custom-content-scrollbar"); ?></label>
					</th>
					<td>
						<select name="mouse_wheel_axis" id="mouse_wheel_axis" size="1">
							<option value="" selected="selected"><?php esc_html_e("Select", "custom-content-scrollbar"); ?></option>
							<option value="y"><?php esc_html_e("Vertically", "custom-content-scrollbar"); ?></option>
							<option value="x"><?php esc_html_e("Horizontally", "custom-content-scrollbar"); ?></option>
						</select>
					</td>
				</tr>
				<tr>
					<th>
						<label for="scrollbar_position"><?php esc_html_e("Scrollbar Position", "custom-content-scrollbar"); ?></label>
					</th>
					<td>
						<select name="scrollbar_position" id="scrollbar_position" size="1">
							<option value="" selected="selected"><?php esc_html_e("Select", "custom-content-scrollbar"); ?></option>
							<option value="inside"><?php esc_html_e("Inside", "custom-content-scrollbar"); ?></option>
							<option value="outside" ><?php esc_html_e("Outside", "custom-content-scrollbar"); ?></option>
						</select>
					</td>
				</tr>
				<tr>
					<th>
						<label for="scroll_speed"><?php esc_html_e("Scrollbar Speed", "custom-content-scrollbar"); ?></label>
					</th>
					<td>
						<input type="number" name="scroll_speed" value="" id="scroll_speed" />
					</td>
				</tr>
				<tr>
					<th>
						<label for="auto_hide_mode"><?php esc_html_e("Auto hide mode", "custom-content-scrollbar"); ?></label>
					</th>
					<td>
						<select name="auto_hide_mode" id="auto_hide_mode" size="1">
							<option value="" selected="selected"><?php esc_html_e("Select", "custom-content-scrollbar"); ?></option>
							<option value="true" ><?php esc_html_e("True", "custom-content-scrollbar"); ?></option>
							<option value="false"><?php esc_html_e("False", "custom-content-scrollbar"); ?></option>
						</select>
					</td>
				</tr>
				<tr>
					<th>
						<label for="auto_expand_mode"><?php esc_html_e("Auto expand mode", "custom-content-scrollbar"); ?></label>
					</th>
					<td>
						<select name="auto_expand_mode" id="auto_expand_mode" size="1">
							<option value="" selected="selected"><?php esc_html_e("Select", "custom-content-scrollbar"); ?></option>
							<option value="true" ><?php esc_html_e("True", "custom-content-scrollbar"); ?></option>
							<option value="false"><?php esc_html_e("False", "custom-content-scrollbar"); ?></option>
						</select>
					</td>
				</tr>
				<tr>
					<th>
						<label for="upload_type"><?php esc_html_e("Upload Type", "custom-content-scrollbar"); ?></label>
					</th>
					<td>
						<select name="upload_type" id="upload_type" size="1">
							<option value="content" selected="selected"><?php esc_html_e("Content", "custom-content-scrollbar"); ?></option>
							<option value="gallery" ><?php esc_html_e("Gallery", "custom-content-scrollbar"); ?></option>
						</select>
					</td>
				</tr>
				<tr class="gallery-field">
					<th>
						<label for="upload_image"><?php esc_html_e("Upload Gallery", "custom-content-scrollbar"); ?></label>
					</th>
					<td>
						<input id="upload_image_button" type="button" value="Upload Image" />
						<div id="uploaded-images"></div>
					</td>
				</tr>
				<tr class="content-field">
					<th>
						<label for="text_content"><?php esc_html_e("Text Content", "custom-content-scrollbar"); ?></label>
					</th>
					<td>
						<textarea name="text_content" id="text_content" rows="5"></textarea>	
					</td>
				</tr>
				<tr>
					<th>
						<label for="snap_amount"><?php esc_html_e("Scroll Amount", "custom-content-scrollbar"); ?></label>
					</th>
					<td>
						<input type="number" name="snap_amount" value="" id="snap_amount" />
					</td>
				</tr>
				<tr>
					<th>
						<label for="rtl"><?php esc_html_e("RTL Direction", "custom-content-scrollbar"); ?></label>
					</th>
					<td>
						<select name="rtl" id="rtl" size="1">
							<option value="" selected="selected"><?php esc_html_e("Select", "custom-content-scrollbar"); ?></option>
							<option value="true" ><?php esc_html_e("True", "custom-content-scrollbar"); ?></option>
							<option value="false"><?php esc_html_e("False", "custom-content-scrollbar"); ?></option>
						</select>
					</td>
				</tr>
				<tr>
					<th>
						<label for="custom_class"><?php esc_html_e("Add custom class for CSS", "custom-content-scrollbar"); ?></label>
					</th>
					<td>
						<input type="text" name="custom_class" value="" id="custom_class" />
					</td>
				</tr>
				<tr>
					<th>
						<label for="nested_shortcode"><?php esc_html_e("Nested Shortcode", "custom-content-scrollbar"); ?></label>
					</th>
					<td>
						<select name="nested_shortcode" id="nested_shortcode" size="1">
							<option value="" selected="selected"><?php esc_html_e("No", "custom-content-scrollbar"); ?></option>
							<?php $total_nested = (isset($options_value['shortcode_nested'])) ? $options_value['shortcode_nested'] : ''; 
							$number_text_string =  array(
								esc_html__("Two", "custom-content-scrollbar"), 
								esc_html__("Three", "custom-content-scrollbar"), 
								esc_html__("Four", "custom-content-scrollbar"), 
								esc_html__("Five", "custom-content-scrollbar"), 
								esc_html__("Six", "custom-content-scrollbar"), 
								esc_html__("Seven", "custom-content-scrollbar"), 
								esc_html__("Eight", "custom-content-scrollbar"), 
								esc_html__("Nine", "custom-content-scrollbar"), 
								esc_html__("Ten", "custom-content-scrollbar"), 
							);
							for ($i=0; $i < $total_nested-1; $i++) { 
								echo "<option value='".strtolower($number_text_string[$i])."'>{$number_text_string[$i]}</option>";
							}
							?>
							
						</select>
					</td>
				</tr>
				<tr>
					<th>
						<label for="custom_style"><?php esc_html_e("Custom Style", "custom-content-scrollbar"); ?></label>
					</th>
					<td>
						<select name="custom_style" id="custom_style" size="1">
							<option value="true" ><?php esc_html_e("True", "custom-content-scrollbar"); ?></option>
							<option value="false" selected="selected"><?php esc_html_e("False", "custom-content-scrollbar"); ?></option>
						</select>
					</td>
				</tr>
				<tr class="custom-style">
					<th>
						<label for="dragger_rail_color"><?php esc_html_e("Dragger Rail Color (HEX)", "custom-content-scrollbar"); ?></label>
					</th>
					<td>
						<?php
							printf(
					            '<input type="text" class="color-field" id="dragger_rail_color" name="dragger_rail_color" value="%s" />',
					            isset( $options_value['dragger_rail_color'] ) ? esc_attr( $options_value['dragger_rail_color']) : ''
					        );
						?>
					</td>
				</tr>
				<tr class="custom-style">
					<th>
						<label for="dragger_rail_width"><?php esc_html_e("Dragger Rail Width", "custom-content-scrollbar"); ?></label>
					</th>
					<td>
						<input type="text" name="dragger_rail_width" value="10px" id="dragger_rail_width" />
					</td>
				</tr>
				<tr class="custom-style">
					<th>
						<label for="dragger_rail_border_radius"><?php esc_html_e("Dragger Rail Border Radius", "custom-content-scrollbar"); ?></label>
					</th>
					<td>
						<input type="text" name="dragger_rail_border_radius" value="0px" id="dragger_rail_border_radius" />
					</td>
				</tr>
				<tr class="custom-style">
					<th>
						<label for="dragger_bar_color"><?php esc_html_e("Dragger Bar Color (HEX)", "custom-content-scrollbar"); ?></label>
					</th>
					<td>
						<?php
							printf(
							    '<input type="text" class="color-field" id="dragger_bar_color" name="dragger_bar_color" value="%s" />',
							    isset( $options_value['dragger_bar_color'] ) ? esc_attr( $options_value['dragger_bar_color']) : ''
							);
						?>
					</td>
				</tr>
				<tr class="custom-style">
					<th>
						<label for="dragger_bar_width"><?php esc_html_e("Dragger Bar Width", "custom-content-scrollbar"); ?></label>
					</th>
					<td>
						<input type="text" name="dragger_bar_width" value="10px" id="dragger_bar_width" />
					</td>
				</tr>
				<tr class="custom-style">
					<th>
						<label for="dragger_bar_border_radius"><?php esc_html_e("Dragger Bar Border Radius", "custom-content-scrollbar"); ?></label>
					</th>
					<td>
						<input type="text" name="dragger_bar_border_radius" value="0px" id="dragger_bar_border_radius" />
					</td>
				</tr>
				<tr class="custom-style">
					<th>
						<label for="dragger_bar_hover_color"><?php esc_html_e("Dragger Bar Hover Color", "custom-content-scrollbar"); ?></label>
					</th>
					<td>
						<?php
							printf(
							    '<input type="text" class="color-field" id="dragger_bar_hover_color" name="dragger_bar_hover_color" value="%s" />',
							    isset( $options_value['dragger_bar_hover_color'] ) ? esc_attr( $options_value['dragger_bar_hover_color']) : ''
							);
						?>
					</td>
				</tr>
				<tr class="custom-style">
					<th>
						<label for="dragger_rail_margin"><?php esc_html_e("Dragger Horizontal Rail Margin", "custom-content-scrollbar"); ?></label>
					</th>
					<td>
						<input type="text" name="dragger_rail_margin" value="3px 0" id="dragger_rail_margin" />
					</td>
				</tr>
				<tr class="custom-style">
					<th>
						<label for="dragger_bar_margin"><?php esc_html_e("Dragger Horizontal Bar Margin", "custom-content-scrollbar"); ?></label>
					</th>
					<td>
						<input type="text" name="dragger_bar_margin" value="3px 0" id="dragger_bar_margin" />
					</td>
				</tr>
			</table>
		</div><!-- /.scrollbar-shortcode-content -->
		<div class="scrollbar-shortcode-insert">
			<button class="button"><?php esc_html_e("Insert Shortcode", "custom-content-scrollbar"); ?></button>
		</div><!-- /.scrollbar-shortcode-insert -->
	</div><!-- /.scrollbar-shrotcode-container -->	
	</div><!-- /.scrollbar-shrotcode-container-area -->	
<?php }


//Adding shortcode
$number_text = array("", "-two", "-three", "-four", "-five", "-six", "-seven", "-eight", "-nine", "-ten");
for ( $i=0; $i < $scrollbar_options_value['shortcode_nested'] ; $i++) { 
	$number_text_list[] = $number_text[$i];
}
$custom_content_scrollbar_shortcode = $number_text_list;
foreach ($custom_content_scrollbar_shortcode as $value) {
add_shortcode("custom-content-scrollbar$value", function($atts, $content = null) {
	global $custom_content_scrollbar_options;
	$custom_content_scrollbar_settings = get_option( 'custom_content_scrollbar_options', $custom_content_scrollbar_options );
	$shortcode_id = uniqid();
	$atts = shortcode_atts(
		array(
			'class' => '',
			'themes' => $custom_content_scrollbar_settings['scrollbar_theme'],
			'arrow_button_mode' => $custom_content_scrollbar_settings['arrow_button_mode'],
			'width' => '',
			'height' => '',
			'tablet_device_width' => '',
			'mobile_device_horizontal' => '',
			'mobile_device_vertical' => '',
			'axis' => 'y',
			'scroll_to_y' => '0',
			'scroll_to_x' => '0',
			'mouse_wheel_axis' => '',
			'scrollbar_position' => 'inside',	
			'scroll_speed' => $custom_content_scrollbar_settings['scroll_speed'],
			'auto_hide_mode' => $custom_content_scrollbar_settings['auto_hide_mode'],
			'auto_expand_mode' => $custom_content_scrollbar_settings['auto_expand_mode'],
			'upload_type' => '',
			'rtl' => '',
			'snap_amount' => '',
			'custom_style' => 'false',
			'dragger_rail_color' => '#C4C4C4',
			'dragger_rail_width' => '10px',
			'dragger_rail_border_radius' => '0px',
			'dragger_bar_color' => '#1D1D1D',
			'dragger_bar_width' => '10px',
			'dragger_bar_border_radius' => '0px',
			'dragger_bar_hover_color' => '#000',
			'dragger_rail_margin' => '3px 0',
			'dragger_bar_margin' => '3px 0',
		), $atts
	);
	extract($atts);

	if ( !empty($scroll_to_y) || !empty($scroll_to_x) ) {
		$scroll_to = '	
		<script>
			(function($){
				$(document).ready(function(){
					$("#custom-content-scrollbar-'.$shortcode_id.'").mCustomScrollbar("scrollTo",{y:"'.$scroll_to_y.'",x:"'.$scroll_to_x.'"});	
				});
			})(jQuery);
		</script>';
	} else { $scroll_to = ''; }

	$rtl_tag = "";
	if (!empty($rtl)) {
		if ($rtl == "true") {
			$rtl_tag = "dir='rtl'";
		} elseif ($rtl == "false")  {
			$rtl_tag = "dir='ltr'";
		}
	} else {
		if (is_rtl()) {
			$rtl_tag = "dir='rtl'";
		}
	}
	$snap_amount_one = "";
	$snap_amount_two = "";
	$horizontal_scroll = "";
	$scroll_type = "";
	if (!empty($snap_amount)) {
		$snap_amount_one = "scrollAmount: $snap_amount";
		$snap_amount_two = "snapAmount: $snap_amount";
		$scroll_type = 'scrollType:"stepped"';
		if ( $axis == "x" ) {
			$horizontal_scroll = "advanced:{autoExpandHorizontalScroll:true},";
		}
	}
	?>
	<style type="text/css"> 	
		<?php if ( $custom_style == "true" ): ?>	
		#custom-content-scrollbar-<?php echo esc_attr($shortcode_id); ?> > .mCustomScrollBox > .mCS-<?php echo esc_attr($themes); ?>.mCSB_scrollTools_vertical .mCSB_draggerRail {
			width: <?php echo esc_attr($dragger_rail_width); ?> !important;
			background: <?php echo esc_attr($dragger_rail_color); ?> !important;
			-webkit-border-radius: <?php echo esc_attr($dragger_rail_border_radius); ?> !important;
			-moz-border-radius: <?php echo esc_attr($dragger_rail_border_radius); ?> !important;
			border-radius: <?php echo esc_attr($dragger_rail_border_radius); ?> !important;
		}
		#custom-content-scrollbar-<?php echo esc_attr($shortcode_id); ?> > .mCustomScrollBox > .mCS-<?php echo esc_attr($themes); ?>.mCSB_scrollTools_vertical .mCSB_dragger .mCSB_dragger_bar {
			width: <?php echo esc_attr($dragger_bar_width); ?> !important;
			background: <?php echo esc_attr($dragger_bar_color); ?> !important;
			-webkit-border-radius: <?php echo esc_attr($dragger_bar_border_radius); ?> !important;
			-moz-border-radius: <?php echo esc_attr($dragger_bar_border_radius); ?> !important;
			border-radius: <?php echo esc_attr($dragger_bar_border_radius); ?> !important;
		 }
		#custom-content-scrollbar-<?php echo esc_attr($shortcode_id); ?> > .mCustomScrollBox > .mCS-<?php echo esc_attr($themes); ?>.mCSB_scrollTools_vertical .mCSB_dragger:hover .mCSB_dragger_bar,
		#custom-content-scrollbar-<?php echo esc_attr($shortcode_id); ?> > .mCustomScrollBox > .mCS-<?php echo esc_attr($themes); ?>.mCSB_scrollTools_vertical .mCSB_dragger:active .mCSB_dragger_bar,
		#custom-content-scrollbar-<?php echo esc_attr($shortcode_id); ?> > .mCustomScrollBox > .mCS-<?php echo esc_attr($themes); ?>.mCSB_scrollTools_vertical .mCSB_dragger.mCSB_dragger_onDrag .mCSB_dragger_bar {
			background: <?php echo esc_attr($dragger_bar_hover_color); ?> !important; 
		}

		/* Horizontal Start */

		#custom-content-scrollbar-<?php echo esc_attr($shortcode_id); ?> > .mCustomScrollBox > .mCS-<?php echo esc_attr($themes); ?>.mCSB_scrollTools_horizontal .mCSB_draggerRail {
			height: <?php echo esc_attr($dragger_rail_width); ?> !important;
			background: <?php echo esc_attr($dragger_rail_color); ?> !important;
			-webkit-border-radius: <?php echo esc_attr($dragger_rail_border_radius); ?> !important;
			-moz-border-radius: <?php echo esc_attr($dragger_rail_border_radius); ?> !important;
			border-radius: <?php echo esc_attr($dragger_rail_border_radius); ?> !important;
		}
		#custom-content-scrollbar-<?php echo esc_attr($shortcode_id); ?> > .mCustomScrollBox > .mCS-<?php echo esc_attr($themes); ?>.mCSB_scrollTools_horizontal .mCSB_dragger .mCSB_dragger_bar {
			height: <?php echo esc_attr($dragger_bar_width); ?> !important;
			background: <?php echo esc_attr($dragger_bar_color); ?> !important;
			-webkit-border-radius: <?php echo esc_attr($dragger_bar_border_radius); ?> !important;
			-moz-border-radius: <?php echo esc_attr($dragger_bar_border_radius); ?> !important;
			border-radius: <?php echo esc_attr($dragger_bar_border_radius); ?> !important;
		 }
		#custom-content-scrollbar-<?php echo esc_attr($shortcode_id); ?> > .mCustomScrollBox > .mCS-<?php echo esc_attr($themes); ?>.mCSB_scrollTools_horizontal .mCSB_dragger:hover .mCSB_dragger_bar,
		#custom-content-scrollbar-<?php echo esc_attr($shortcode_id); ?> > .mCustomScrollBox > .mCS-<?php echo esc_attr($themes); ?>.mCSB_scrollTools_horizontal .mCSB_dragger:active .mCSB_dragger_bar,
		#custom-content-scrollbar-<?php echo esc_attr($shortcode_id); ?> > .mCustomScrollBox > .mCS-<?php echo esc_attr($themes); ?>.mCSB_scrollTools_horizontal .mCSB_dragger.mCSB_dragger_onDrag .mCSB_dragger_bar {
			background: <?php echo esc_attr($dragger_bar_hover_color); ?> !important; 
		}
		#custom-content-scrollbar-<?php echo esc_attr($shortcode_id); ?> > .mCustomScrollBox > .mCS-<?php echo esc_attr($themes); ?>.mCSB_scrollTools.mCSB_scrollTools_horizontal .mCSB_draggerRail {
		    margin: <?php echo esc_attr($dragger_rail_margin); ?>;
		}
		#custom-content-scrollbar-<?php echo esc_attr($shortcode_id); ?> > .mCustomScrollBox > .mCS-<?php echo esc_attr($themes); ?>.mCSB_scrollTools.mCSB_scrollTools_horizontal .mCSB_dragger .mCSB_dragger_bar {
		    margin: <?php echo esc_attr($dragger_bar_margin); ?>;
		}
		<?php endif; ?>

		#custom-content-scrollbar-<?php echo esc_attr($shortcode_id); ?>  {
		    width: <?php echo esc_attr($width); ?>;
		    height: <?php echo esc_attr($height); ?>;
		}
		@media only screen and (max-width: 768px) {
			#custom-content-scrollbar-<?php echo esc_attr($shortcode_id); ?>  {
			    width: <?php echo esc_attr($tablet_device_width); ?>;
			}
		}
		@media only screen and (max-width: 480px) {
			#custom-content-scrollbar-<?php echo esc_attr($shortcode_id); ?>  {
			    width: <?php echo esc_attr($mobile_device_horizontal); ?>;
			}
		}
		@media only screen and (max-width: 320px) {
			#custom-content-scrollbar-<?php echo esc_attr($shortcode_id); ?>  {
			    width: <?php echo esc_attr($mobile_device_vertical); ?>;
			}
		}
		<?php if ($upload_type == "gallery" && $axis == "x"): ?>
		#custom-content-scrollbar-<?php echo esc_attr($shortcode_id); ?> .wp-scrollbar-image { 
			float: left;
		}
		#custom-content-scrollbar-<?php echo esc_attr($shortcode_id); ?> .wp-scrollbar-image img { 
			width: <?php echo esc_attr($snap_amount); ?>px;
		}
		<?php endif; ?>
	</style> 
	<?php
	$list = '	
	<script>
		(function($){
			$(document).ready(function() {
				$("#custom-content-scrollbar-'.esc_js($shortcode_id).'").mCustomScrollbar({
					theme:"'.esc_js($themes).'",
					scrollInertia: '.esc_js($scroll_speed).',
					scrollButtons:{enable: '.esc_js($arrow_button_mode).', '.$scroll_type.'},		
					autoHideScrollbar:'.esc_js($auto_hide_mode).',
					axis:"'.esc_js($axis).'",
					mouseWheel:{ axis: "'.esc_js($mouse_wheel_axis).'", '.$snap_amount_one.' },			
					autoExpandScrollbar: '.esc_js($auto_expand_mode).',
					scrollbarPosition:"'.esc_js($scrollbar_position).'",
					keyboard:{'.$scroll_type.'},
					'.esc_js($horizontal_scroll).'
					'.esc_js($snap_amount_two).'
				});	
			});
		})(jQuery);
	</script>'.$scroll_to.'<div '.$rtl_tag.' id="custom-content-scrollbar-'.$shortcode_id.'" class="'.$class.'" >';	
	$list .= do_shortcode( $content ).'</div>';
	return $list;
});
} // end foreach()

foreach ($custom_content_scrollbar_shortcode as $value) {
	add_shortcode("custom-content-scrollbar-div$value", function($atts, $content = null) {
		$atts = shortcode_atts(
			array(
				'width' => '',
				'height' => '',
			), $atts
		);
		extract($atts);
		$list = '<div style="width:'.$width.'; height:'.$height.';" >';	
		$list .= do_shortcode( $content ).'</div>';
		return $list;
	});
}

// bootstrap column grid row shortcode
add_shortcode("row", function($atts, $content = null) {
	return '<div class="row">' . do_shortcode( $content ) . '</div>';
});

// bootstrap column grid shortcode
add_shortcode("column", function($atts, $content = null) {
	$atts = shortcode_atts(
		array(
			'number' => '',
			'offset' => '',
		), $atts
	);
	extract($atts);
	if ( !empty($offset) ) {
		$offset = "col-md-offset-$offset";
	}
	return "<div class='$offset col-md-$number'>". do_shortcode( $content ) ."</div>";
});

// remove unnecessary p and br tag from shortcode
if( !function_exists('custom_content_scrollbar_fix_shortcodes') ) :
    function custom_content_scrollbar_fix_shortcodes($content){
        $array = array (
            '<p>[' => '[',
            ']</p>' => ']',
            ']<br />' => ']'
        );
        $content = strtr($content, $array);
        return $content;   
    }
    add_filter('the_content', 'custom_content_scrollbar_fix_shortcodes');
endif;