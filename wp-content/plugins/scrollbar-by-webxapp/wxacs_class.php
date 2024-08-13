<?php
if (!defined( 'ABSPATH' )) exit;
class WXACS{
    protected static $instance = null;
    private $default_theme_id = null;
    function __construct () {
        add_action('wp_enqueue_scripts', array($this, 'enqueue_scripts'), 5);
        add_action('wp_enqueue_scripts', array($this, 'enqueue_styles'));

        $default_theme_id = get_option("wxacs_theme");
        if($default_theme_id !== false && intval($default_theme_id) >0){
            $this->default_theme_id = intval($default_theme_id);
        }
    }



    public function enqueue_scripts(){
        $class_list = "";
        if(isset($this->default_theme_id) && $this->default_theme_id>0){
            $wxacs_ease_scroll = get_post_meta( $this->default_theme_id, 'wxacs_ease_scroll',true );
            if(isset($wxacs_ease_scroll) && $wxacs_ease_scroll === "1"){
                $wxacs_ease_scroll_params = get_post_meta( $this->default_theme_id, 'wxacs_ease_scroll_params',true );
                if(is_array($wxacs_ease_scroll_params) && !empty($wxacs_ease_scroll_params)){
                    wp_enqueue_script('wxacs_easeScroll_js', plugins_url('assets/js/jquery.easeScroll.js', __FILE__), array('jquery'), WXACS_VERSION, true);
                    wp_enqueue_script('wxacs_front_script', plugins_url('assets/js/script.js', __FILE__), array('jquery','wxacs_easeScroll_js'), WXACS_VERSION, true);
                    wp_localize_script( 'wxacs_front_script', 'wxacs_ease_scroll_params',
                        $wxacs_ease_scroll_params
                    );
                }
            }
        }
    }
    public function enqueue_styles(){
        wp_enqueue_style('wxacs_front_style', plugins_url('assets/css/style.css', __FILE__), '', WXACS_VERSION, 'all');
        $wxacs_css = "";
        if(isset($this->default_theme_id) && $this->default_theme_id>0){
            $wxacs_css .= $this->generate_options_css($this->default_theme_id, '');
        }
        $wxacs_selectors = get_option("wxacs_selectors");
        if(isset($wxacs_selectors) && is_array($wxacs_selectors)){
            foreach ($wxacs_selectors as  $selector){
                $wxacs_css .= $this->generate_options_css($selector["theme_id"], $selector["selector"]);
            }
        }
        if (!empty($wxacs_css)){
            wp_add_inline_style( 'wxacs_front_style', $wxacs_css );
        }
    }


    private function generate_options_css($theme_id, $selector){
        $size_options = array();
        $options_data = array();
        $theme_colors = get_post_meta( $theme_id, 'wxacs_theme_meta',true );
        $wxacs_scrollbar_sizes = get_post_meta( $theme_id, 'wxacs_scrollbar_sizes',true );
        $wxacs_thumb_image_id = get_post_meta($theme_id, "wxacs_thumb_image", true);
        if(isset($wxacs_thumb_image_id) && intval($wxacs_thumb_image_id)>0){
            $wxacs_img_data = wp_get_attachment_image_src($wxacs_thumb_image_id);
        }

        if(isset($wxacs_scrollbar_sizes) && is_array($wxacs_scrollbar_sizes)){
            $size_options = $wxacs_scrollbar_sizes;
        }
        if(isset($theme_colors) && $theme_colors !== false && is_array($theme_colors)){
            $options_data = array_merge($theme_colors, $size_options);
        }
        if(isset($wxacs_img_data) && $wxacs_img_data){
            if(is_array($wxacs_img_data) && isset($wxacs_img_data[0]) && !empty($wxacs_img_data[0])){
                if(is_array($wxacs_img_data) && isset($wxacs_img_data[0]) && !empty($wxacs_img_data[0])){
                    $options_data["thumb_img_url"] = $wxacs_img_data[0];
                }
            }
        }
        $custom_css = $this->generate_theme($selector,$options_data);
        return $custom_css;
    }
    private function generate_theme($selector ,$options){
        $wxacs_scrollbar_thumb_color = "";
        $wxacs_thumb_border_radius = "";
        $wxacs_scrollbar_thumb_height = "";
        $wxacs_scrollbar_thumb_img = "";
        if(isset($options["wxacs_scrollbar_thumb_color"])){
            $wxacs_scrollbar_thumb_color = "background: ".$options["wxacs_scrollbar_thumb_color"]." ;";
        }
        if(isset($options["wxacs_thumb_border_radius"])){
            $wxacs_thumb_border_radius = "border-radius:".$options["wxacs_thumb_border_radius"]."px;";
        }
        if(isset($options["wxacs_scrollbar_thumb_height"])){
            $wxacs_scrollbar_thumb_height = "height:".$options["wxacs_scrollbar_thumb_height"]."px;";
        }
        if(isset($options["thumb_img_url"])){
            $wxacs_scrollbar_thumb_img = 'background-image: url("'.$options["thumb_img_url"].'");
                                          background-repeat: no-repeat;
                                              background-size: contain;
                                              background-position: center;
                                            ';
        }
        $theme_css = "";
        if(isset($options["wxacs_scrollbar_width"])) {
            $theme_css .= $selector."::-webkit-scrollbar {
                                width: ".$options['wxacs_scrollbar_width']."px;
                         }";
        }

        $theme_css.= $selector."::-webkit-scrollbar-thumb {
                            ".$wxacs_scrollbar_thumb_color."
                            ".$wxacs_thumb_border_radius."
                            ".$wxacs_scrollbar_thumb_height."
                            ".$wxacs_scrollbar_thumb_img."
                       }";

        if(isset($options["wxacs_scrollbar_thumb_hover_color"])){
            $theme_css.= $selector."::-webkit-scrollbar-thumb:hover {
                            background: ".$options["wxacs_scrollbar_thumb_hover_color"]."; 
                             ".$wxacs_scrollbar_thumb_img."
                            }";
        }
        if(isset($options["wxacs_scrollbar_track_color"])){
            $theme_css.= $selector."::-webkit-scrollbar-track {
                                background: ".$options["wxacs_scrollbar_track_color"]."; 
                           }";
        }


        return $theme_css;
    }


    public static function get_instance() {
        if (null == self::$instance) {
            self::$instance = new self;
        }

        return self::$instance;
    }




}


