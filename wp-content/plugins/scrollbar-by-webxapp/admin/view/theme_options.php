<?php
if (!defined( 'ABSPATH' )) exit;
global $post;
$wxacs_theme_meta = get_post_meta($post->ID, "wxacs_theme_meta", true);
$wxacs_thumb_image = get_post_meta($post->ID, "wxacs_thumb_image", true);
$wxacs_ease_scroll = get_post_meta($post->ID, "wxacs_ease_scroll", true);
$wxacs_scrollbar_sizes = get_post_meta($post->ID, "wxacs_scrollbar_sizes", true);
$default_theme_id = get_option("wxacs_theme");
$wxacs_set_default_val = "";
$wxacs_ease_scroll_val = "";

$wxacs_scrollbar_width_val = 10;
$wxacs_scrollbar_thumb_height_val = 10;
$wxacs_thumb_border_radius_val = 0;

if($default_theme_id !== false && intval($default_theme_id)>0 && intval($post->ID) === intval($default_theme_id)){
    $wxacs_set_default_val = "checked";
}

if($default_theme_id === false && $post->post_status === "auto-draft"){
    $wxacs_set_default_val = "checked";
}
$visibility = "0";
if($wxacs_ease_scroll !== false && intval($wxacs_ease_scroll)===1){
    $wxacs_ease_scroll_val = "checked";
    $visibility = "1";
}
$wxacs_upload_image_val = "
  <button class='wxacs_add_thumb_image'>Add thumb image</button>
  <div class='wxacs_image'></div>
";
if(isset($wxacs_thumb_image) && $wxacs_thumb_image){
    $wxacs_img_data = wp_get_attachment_image_src($wxacs_thumb_image);
    if(is_array($wxacs_img_data) && isset($wxacs_img_data[0]) && !empty($wxacs_img_data[0])){
        $wxacs_upload_image_val = '
        <button class="wxacs_add_thumb_image wxacs_remove_image">Remove image</button>
        <div class="wxacs_image">
            <img class="wxacs_thumb_image" src="'.$wxacs_img_data[0].'">
            <input type="hidden" name="wxacs_image_id" value="'.$wxacs_thumb_image.'">
        </div>
    ';
    }
}


if(isset($wxacs_scrollbar_sizes) && isset($wxacs_scrollbar_sizes["wxacs_scrollbar_width"])){
    $wxacs_scrollbar_width_val = intval($wxacs_scrollbar_sizes["wxacs_scrollbar_width"]);
}
if(isset($wxacs_scrollbar_sizes) && isset($wxacs_scrollbar_sizes["wxacs_scrollbar_thumb_height"])){
    $wxacs_scrollbar_thumb_height_val = intval($wxacs_scrollbar_sizes["wxacs_scrollbar_thumb_height"]);
}
if(isset($wxacs_scrollbar_sizes) && isset($wxacs_scrollbar_sizes["wxacs_thumb_border_radius"])){
    $wxacs_thumb_border_radius_val = intval($wxacs_scrollbar_sizes["wxacs_thumb_border_radius"]);
}
$wxacs_frameRate = 60;
$wxacs_animationTime = 1000;
$wxacs_stepSize = 120;
$wxacs_pulseScale = 8;
$wxacs_pulseNormalize = 1;
$wxacs_accelerationDelta = 20;
$wxacs_accelerationMax = 1;
$wxacs_arrowScroll = 50;
$wxacs_ease_scroll_params = get_post_meta($post->ID, "wxacs_ease_scroll_params", true);

if(isset($wxacs_ease_scroll_params) && is_array($wxacs_ease_scroll_params)){
    if(isset($wxacs_ease_scroll_params["wxacs_frameRate"])){
        $wxacs_frameRate = intval($wxacs_ease_scroll_params["wxacs_frameRate"]);
    }
    if(isset($wxacs_ease_scroll_params["wxacs_animationTime"])){
        $wxacs_animationTime = intval($wxacs_ease_scroll_params["wxacs_animationTime"]);
    }
    if(isset($wxacs_ease_scroll_params["wxacs_stepSize"])){
        $wxacs_stepSize = intval($wxacs_ease_scroll_params["wxacs_stepSize"]);
    }
    if(isset($wxacs_ease_scroll_params["wxacs_pulseScale"])){
        $wxacs_pulseScale = intval($wxacs_ease_scroll_params["wxacs_pulseScale"]);
    }
    if(isset($wxacs_ease_scroll_params["wxacs_pulseNormalize"])){
        $wxacs_pulseNormalize = intval($wxacs_ease_scroll_params["wxacs_pulseNormalize"]);
    }
    if(isset($wxacs_ease_scroll_params["wxacs_accelerationDelta"])){
        $wxacs_accelerationDelta = intval($wxacs_ease_scroll_params["wxacs_accelerationDelta"]);
    }
    if(isset($wxacs_ease_scroll_params["wxacs_accelerationMax"])){
        $wxacs_accelerationMax = intval($wxacs_ease_scroll_params["wxacs_accelerationMax"]);
    }
    if(isset($wxacs_ease_scroll_params["wxacs_arrowScroll"])){
        $wxacs_arrowScroll = intval($wxacs_ease_scroll_params["wxacs_arrowScroll"]);
    }
}

$wxacs_theme_fileds = array(
    'wxacs_set_default' => array(
        'name' => 'wxacs_set_default',
        'type' => 'checkbox',
        'style' => 'check',
        'default' => $wxacs_set_default_val,
        'label' => 'Set default'
    ),
    'wxacs_selectors' => array(
        'name' => 'wxacs_selectors',
        'type' => 'multi_input',
        'default' => '',
        'label' => 'Add selector'
    ),
    'wxacs_scrollbar_thumb_color' => array(
        'name' => 'wxacs_scrollbar_thumb_color',
        'type' => 'text_color',
        'default' => 'rgb(34, 34, 34)',
        'label' => 'Scrollbar thumb color'
    ),
    'wxacs_scrollbar_thumb__hover_color' => array(
        'name' => 'wxacs_scrollbar_thumb_hover_color',
        'type' => 'text_color',
        'default' => 'rgb(34, 34, 34)   ',
        'label' => 'Scrollbar thumb hover color'
    ),
    'wxacs_scrollbar_track_color' => array(
        'name' => 'wxacs_scrollbar_track_color',
        'type' => 'text_color',
        'default' => 'rgb(57, 57, 58)',
        'label' => 'Scrollbar track color'
    ),
    'wxacs_upload_image' => array(
        'name' => 'wxacs_upload_image',
        'type' => 'html',
        'default' => $wxacs_upload_image_val,
        'label' => 'Image for thumb'
    ),


    'wxacs_scrollbar_width' => array(
        'name' => 'wxacs_scrollbar_width',
        'type' => 'number_slider',
        'default' => $wxacs_scrollbar_width_val,
        'from' => 0,
        'to' => 120,
        'main' => 'wxacs_scrollbar_sizes',
        'format' => '%s px',
        'label' => 'Scrollbar width'
    ),
    'wxacs_scrollbar_thumb_height' => array(
        'name' => 'wxacs_scrollbar_thumb_height',
        'type' => 'number_slider',
        'default' => $wxacs_scrollbar_thumb_height_val,
        'from' => 1,
        'to' => 1000,
        'main' => 'wxacs_scrollbar_sizes',
        'format' => '%s px',
        'label' => 'Scrollbar thumb height'
    ),
    'wxacs_thumb_border_radius' => array(
        'name' => 'wxacs_thumb_border_radius',
        'type' => 'number_slider',
        'default' => $wxacs_thumb_border_radius_val,
        'from' => 0,
        'to' => 100,
        'main' => 'wxacs_scrollbar_sizes',
        'format' => '%s px',
        'label' => 'Scrollbar thumb border radius'
    ),
    'wxacs_ease_scroll' => array(
        'name' => 'wxacs_ease_scroll',
        'type' => 'checkbox',
        'style' => 'switch',
        'default' => $wxacs_ease_scroll_val,
        'label' => 'Smooth Scroll'
    ),

    /*'wxacs_notice' =>array(
      'type'=>'notice',
      'class'=>'wxacs_pro_notice',
      'text'=>'Smooth Scroll options are disabled in free version. If you need this functionality, you need to buy the <a href="#">pro version</a>'
    ),*/
    'wxacs_frameRate' => array(
        'name' => 'wxacs_frameRate',
        'type' => 'number_slider',
        'default' => $wxacs_frameRate,
        'from' => 0,
        'to' => 500,
        'format' => '%s',
        'visibility' => $visibility,
        'main_el' => 'wxacs_ease_scroll',
        'main' => 'wxacs_ease_scroll_params',
        'label' => 'Frame rate',
        'disable'=>false,
    ),
    'wxacs_animationTime' => array(
        'name' => 'wxacs_animationTime',
        'type' => 'number_slider',
        'default' => $wxacs_animationTime,
        'from' => 0,
        'to' => 5000,
        'format' => '%s',
        'visibility' => $visibility,
        'main_el' => 'wxacs_ease_scroll',
        'main' => 'wxacs_ease_scroll_params',
        'label' => 'Animation time',
        'disable'=>false,
    ),
    'wxacs_stepSize' => array(
        'name' => 'wxacs_stepSize',
        'type' => 'number_slider',
        'default' => $wxacs_stepSize,
        'from' => 0,
        'to' => 1000,
        'format' => '%s',
        'visibility' => $visibility,
        'main_el' => 'wxacs_ease_scroll',
        'main' => 'wxacs_ease_scroll_params',
        'label' => 'Step size',
        'disable'=>false,
    ),
    'wxacs_pulseScale' => array(
        'name' => 'wxacs_pulseScale',
        'type' => 'number_slider',
        'default' => $wxacs_pulseScale,
        'from' => 0,
        'to' => 120,
        'format' => '%s',
        'visibility' => $visibility,
        'main_el' => 'wxacs_ease_scroll',
        'main' => 'wxacs_ease_scroll_params',
        'label' => 'Pulse scale',
        'disable'=>false,
    ),
    'wxacs_pulseNormalize' => array(
        'name' => 'wxacs_pulseNormalize',
        'type' => 'number_slider',
        'default' => $wxacs_pulseNormalize,
        'from' => 0,
        'to' => 120,
        'format' => '%s',
        'visibility' => $visibility,
        'main_el' => 'wxacs_ease_scroll',
        'main' => 'wxacs_ease_scroll_params',
        'label' => 'Pulse normalize',
        'disable'=>false,
    ),
    'wxacs_accelerationDelta' => array(
        'name' => 'wxacs_accelerationDelta',
        'type' => 'number_slider',
        'default' => $wxacs_accelerationDelta,
        'from' => 0,
        'to' => 500,
        'format' => '%s',
        'visibility' => $visibility,
        'main_el' => 'wxacs_ease_scroll',
        'main' => 'wxacs_ease_scroll_params',
        'label' => 'Acceleration delta',
        'disable'=>false,
    ),
    'wxacs_accelerationMax' => array(
        'name' => 'wxacs_accelerationMax',
        'type' => 'number_slider',
        'default' => $wxacs_accelerationMax,
        'from' => 0,
        'to' => 120,
        'format' => '%s',
        'visibility' => $visibility,
        'main_el' => 'wxacs_ease_scroll',
        'main' => 'wxacs_ease_scroll_params',
        'label' => 'Acceleration max',
        'disable'=>false,
    ),
    'wxacs_arrowScroll' => array(
        'name' => 'wxacs_arrowScroll',
        'type' => 'number_slider',
        'default' => $wxacs_arrowScroll,
        'from' => 0,
        'to' => 1000,
        'format' => '%s',
        'visibility' => $visibility,
        'main_el' => 'wxacs_ease_scroll',
        'main' => 'wxacs_ease_scroll_params',
        'label' => 'Arrow scroll',
        'disable'=>false,
    ),







);
echo '<div class="wxacs_theme_meta">';


foreach ($wxacs_theme_fileds as $filed){
    if($filed["type"] === "text_color"){
        echo wxacs_text_color($filed, $wxacs_theme_meta);
    }elseif ($filed["type"] === "checkbox"){
        echo wxacs_checkbox($filed, $wxacs_theme_meta);
    }elseif ($filed["type"] === "number_slider"){
        echo wxacs_number_slider($filed, $wxacs_theme_meta);
    }elseif ($filed["type"] === "notice"){
        echo wxacs_notice($filed, $wxacs_theme_meta);
    }elseif ($filed["type"] === "html"){
        echo wxacs_html($filed, $wxacs_theme_meta);
    }
}
echo '</div>';
function wxacs_html($filed, $wxacs_theme_meta){
    return "<div class='wxacs_input_block'>
                <div class='wxacs_upload_image'>
                 <label for='".$filed["name"]."'>".$filed["label"]."</label>
                            ".$filed['default']."
                          
                 </div>
            </div>";
}
function wxacs_notice($filed, $wxacs_theme_meta){
    return'<div class="wxacs_input_block"><p style="font-size:16px; color:#cc0000;" class="'.$filed["class"].'">'.$filed["text"].'</p></div>';
}
function wxacs_checkbox($filed ,$wxacs_theme_meta){
    if($filed["style"] === "switch"){
        return'
        <div class="wxacs_input_block">
            <label for="">'.$filed["label"].'</label>
            <div class="pretty p-switch">
                <input '.$filed["default"].'  name="'.$filed["name"].'" type="checkbox" />
                <div class="state p-success">
                    <label></label>
                </div>
            </div>
        </div>';
    }else{
        return'
        <div class="wxacs_input_block">
            <label for="">'.$filed["label"].'</label>
             <div class="pretty p-icon p-smooth">
                <input '.$filed["default"].'  name="'.$filed["name"].'" type="checkbox" />
                <div class="state p-success">
                    <i class="icon mdi mdi-check"></i>
                    <label></label>
                </div>
             </div>
        </div>';
    }

}
function wxacs_text_color($filed ,$wxacs_theme_meta){
    $val = $filed["default"];
    if(isset($wxacs_theme_meta) && isset($wxacs_theme_meta[$filed["name"]]) && !empty($wxacs_theme_meta[$filed["name"]])){
        $val = $wxacs_theme_meta[$filed["name"]];
    }
    return '<div class="wxacs_input_block">
                <label for="wxacs_next_prev_color">'.$filed["label"].'</label>
                <input type="text" onload="" name="wxacs_theme_color['.$filed["name"].']" class="wxacs_color_picker" id="'.$filed["name"].'" value="'.$val.'" />
            </div>';
}
function wxacs_number_slider($filed ,$wxacs_theme_meta){
    if(isset($filed["main"]) && !empty($filed["main"])){
        $input_name = $filed["main"].'['.$filed["name"].']';
    }else{
        $input_name = $filed["name"];
    }
    $el_visibility = "";
    if(isset($filed["visibility"]) &&  $filed["visibility"] == "0"){
        $el_visibility = "wxacs_hidden";
    }
    $main_el = "";
    if(isset($filed["main_el"])){
        $main_el = $filed["main_el"]."_child";
    }
    $data_disabled = "";
    $disabled_style = "";
    if(isset($filed["disable"]) && $filed["disable"] === true){
        $data_disabled = "data-disable='true'";
        $disabled_style = "style='opacity:0.6;'";
    }
    return '
    <div class="wxacs_input_block wxacs_input_block_slider '.$el_visibility.' '.$main_el.'" '.$disabled_style.'>
        <label for="">'.$filed["label"].'</label>
        <input '.$data_disabled.' data-format="'.$filed["format"].'" data-from="'.$filed["from"].'" data-to="'.$filed["to"].'" type="hidden" class="wxacs_number_slider" name="'.$input_name.'" value="'.$filed["default"].'" />
    </div>
    ';
}