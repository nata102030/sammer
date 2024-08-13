<?php
if (!defined( 'ABSPATH' )) exit;
Class WXACS_Admin{
    protected static $instance = null;
    private $prefix = "wxacs";
    private $default_data = null;
    private function __construct() {
        require_once(WXACS_DIR. '/includes/WXACS_Library.php');
        add_action('init', array($this, 'setup_cpt'));
        add_action('add_meta_boxes', array($this, 'scrollbar_theme'));
        add_action("admin_enqueue_scripts", array($this, "load_admin_styles"));
        add_action("admin_enqueue_scripts", array($this, "load_admin_scripts"));
        add_action('post_updated', array($this, 'save_meta'), 10, 3);
        add_action('admin_menu', array($this, 'add_selectors_menu'));
        add_action('wp_ajax_wxacs_add_selector', array($this, 'wxacs_add_selector'));


    }

    public function wxacs_add_selector(){
        if(isset($_POST["nonce"]) && wp_verify_nonce( $_POST["nonce"], 'wxacs_admin_ajax')){
            if(isset($_POST["wxacs_data"])){
                $update_data = array();
                foreach ($_POST["wxacs_data"] as $item){
                    if(isset($item["selector"]) && isset($item["theme"])){
                        $selector_name = WXACS_Library::validate_string($item["selector"]);
                        $theme_id = WXACS_Library::validate_number($item["theme"]);
                        if(!empty($selector_name) && $theme_id>=0){
                            array_push($update_data,array('selector'=>$selector_name, 'theme_id'=> $theme_id));
                        }
                    }
                }
                $return_data = update_option('wxacs_selectors' , $update_data);
                echo json_encode(array('success' => $return_data));die;
            }
        }
        die(0);
    }

    public function save_meta($post_id, $post, $post_before) {

        if(isset($this->default_data) && is_array($this->default_data)){
            $data = $this->default_data;
        }else{
            $data = $_POST;
        }
        if ((isset($post) && isset($post->post_type) && $post->post_type === "wxacs_theme") || $post === "default"){
            if(isset($data["wxacs_theme_color"]) && is_array($data["wxacs_theme_color"])){
                $wxacs_theme_meta = array_map(array('WXACS_Library','validate_string'), $data["wxacs_theme_color"] );
                update_post_meta($post_id, "wxacs_theme_meta", $wxacs_theme_meta);
            }
            if(isset($data["wxacs_scrollbar_sizes"])){
                $wxacs_scrollbar_sizes = array_map(array('WXACS_Library','validate_number'), $data["wxacs_scrollbar_sizes"] );
                update_post_meta($post_id, "wxacs_scrollbar_sizes", $wxacs_scrollbar_sizes);
            }
            if(isset($data["wxacs_ease_scroll"])){
                $wxacs_ease_scroll = WXACS_Library::validate_string($data["wxacs_ease_scroll"]);
                if($wxacs_ease_scroll === "on"){
                    update_post_meta($post_id, "wxacs_ease_scroll", 1);
                }else{
                    delete_post_meta($post_id, "wxacs_ease_scroll");
                }
            }else{
                delete_post_meta($post_id, "wxacs_ease_scroll");
            }

            if(isset($data["wxacs_set_default"])){
                $wxacs_set_default = WXACS_Library::validate_string($data["wxacs_set_default"]);
                if($wxacs_set_default === "on"){
                    update_option("wxacs_theme", $post_id);
                }
            }else{
                $default_theme_id = get_option("wxacs_theme");
                if(intval($default_theme_id) === intval($post_id)){
                    delete_option("wxacs_theme");
                }
            }
            if(isset($data["wxacs_ease_scroll_params"]) && is_array($data["wxacs_ease_scroll_params"])){
                $wxacs_ease_scroll_params = array_map(array('WXACS_Library','validate_number'), $data["wxacs_ease_scroll_params"] );
                update_post_meta($post_id, "wxacs_ease_scroll_params", $wxacs_ease_scroll_params);
            }
            if(isset($data["wxacs_image_id"])){
                $wxacs_image_id = WXACS_Library::validate_number($data["wxacs_image_id"]);
                update_post_meta($post_id, "wxacs_thumb_image", $wxacs_image_id);
            }else{
                delete_post_meta($post_id, "wxacs_thumb_image");
            }
        }
    }

    public function add_default_themes(){
        require_once ("includes/wxacs_default.php");
        if(isset($wxacs_default)){
            foreach ($wxacs_default as $key=>$val){
                $post_data = array(
                    'post_type' => "wxacs_theme",
                    'post_title'    => $val["name"],
                    'post_status'   => 'publish',
                );
                $post_id = wp_insert_post( $post_data );
                $this->default_data= $val["data"];
                $this->save_meta($post_id, 'default' ,'');
            }
        }

    }

    public static function global_activate($networkwide)
    {
        if (function_exists('is_multisite') && is_multisite()) {
            // Check if it is a network activation - if so, run the activation function for each blog id.
            if ($networkwide) {
                global $wpdb;
                // Get all blog ids.
                $blogids = $wpdb->get_col("SELECT blog_id FROM $wpdb->blogs");
                foreach ($blogids as $blog_id) {
                    switch_to_blog($blog_id);
                    self::activate(new self);
                    restore_current_blog();
                }
                return;
            }
        }
        self::activate(new self);
    }
    public static function activate($WXACS_Admin) {
        $wxacs_theme = get_option("wxacs_theme");
        if($wxacs_theme === false || intval($wxacs_theme)<1){
            $WXACS_Admin -> add_default_themes();
        }
    }
    public function load_admin_styles(){
        wp_enqueue_style( 'wxacs_load_admin_styles', WXACS_URL . '/assets/css/wxacs_admin.css',"", WXACS_VERSION );
        wp_enqueue_style( 'wxacs_spectrum_styles', WXACS_URL . '/assets/css/spectrum.css',"", WXACS_VERSION );
        wp_enqueue_style( 'wxacs_pretty_checkbox_styles', WXACS_URL . '/assets/css/pretty-checkbox.css',"", WXACS_VERSION );
        wp_enqueue_style( 'wxacs_range_styles', WXACS_URL . '/assets/css/jquery.range.css',"", WXACS_VERSION );
        wp_enqueue_style( 'wxacs_materialdesignicons', WXACS_URL . '/assets/css/materialdesignicons.min.css',"", WXACS_VERSION );
        wp_enqueue_style( 'wxacs_datatables_css', WXACS_URL . '/assets/css/datatables.min.css',"", WXACS_VERSION );
    }
    public function load_admin_scripts(){
        wp_enqueue_script( 'jquery' );
        wp_enqueue_media();

        wp_register_script( 'wxacs_datatables_js', WXACS_URL . '/assets/js/datatables.min.js', array( 'jquery') , WXACS_VERSION, true );
        wp_register_script( 'wxacs_spectrum_js', WXACS_URL . '/assets/js/spectrum.js', array( 'jquery') , WXACS_VERSION, true );
        wp_register_script( 'wxacs_range_js', WXACS_URL . '/assets/js/jquery.range-min.js', array( 'jquery') , WXACS_VERSION, true );
        wp_register_script( 'wxacs_admin_js', WXACS_URL . '/assets/js/wxacs_admin.js', array( 'wxacs_spectrum_js') , WXACS_VERSION, true );


        wp_enqueue_script( 'wxacs_datatables_js' );
        wp_enqueue_script( 'wxacs_spectrum_js' );
        wp_enqueue_script( 'wxacs_range_js' );
        wp_enqueue_script( 'wxacs_admin_js' );

        $wxacs_themes_list = $this->wxacs_get_themes_list();
        wp_localize_script( 'wxacs_admin_js', 'wxacs_admin_ajax',
            array(
                'url' => admin_url('admin-ajax.php'),
                'nonce' => wp_create_nonce("wxacs_admin_ajax"),
            )
        );
        wp_localize_script( 'wxacs_admin_js', 'wxacs_themes_data',
            array(
                'data' => json_encode( $wxacs_themes_list),
            )
        );
    }

    public function setup_cpt() {
        $theme_labels = array(
            'name' => 'Scrollbar',
            'singular_name' => 'Themes',
            'name_admin_bar' => 'Themes',
            'add_new' => 'Add New theme',
            'add_new_item' => 'Add New theme',
            'new_item' => 'New theme',
            'edit_item' => 'Edit theme',
            'view_item' => 'View theme',
            'all_items' => 'Themes',
            'search_items' => 'Search theme',
            'not_found' => 'No theme found.',
            'not_found_in_trash' => 'No themes found in Trash.'
        );
        $themes_args = array(
            'labels' => $theme_labels,
            'public' => false,
            'publicly_queryable' => false,
            'show_ui' => true,
            'show_in_menu' => true,
            'query_var' => false,

            'capability_type' => 'post',
            'taxonomies' => array(),
            'has_archive' => false,
            'hierarchical' => false,
            'menu_icon' => plugins_url('/assets/images/wxacs_scroll_icon_small.svg', WXACS_MAIN_FILE),
            'supports' => array(
                'title',
            ),
            'rewrite' => false
        );

        register_post_type('wxacs_theme', $themes_args);
    }
    public function add_selectors_menu(){
        add_submenu_page( 'edit.php?post_type=wxacs_theme', 'Add selectors', 'Add selector', 'manage_options', 'wxacs_selector', array($this,"wxacs_selector_view") );
    }
    public function wxacs_selector_view(){
        $wxacs_themes_list = $this->wxacs_get_themes_list();
        require_once ("admin/view/add_selector.php");
    }
    public function scrollbar_theme() {
        add_meta_box(
            'wxacs_scrollbar_theme',       // $id
            'Theme settings',                  // $title
            array($this,'scrollbar_theme_view'),  // $callback
            'wxacs_theme',                 // $page
            'normal',                  // $context
            'high'                     // $priority
        );
    }
    public function scrollbar_theme_view(){
        require_once ("admin/view/theme_options.php");
    }
    private function wxacs_get_themes_list(){
        $args = array(
            'post_type'   => 'wxacs_theme',
        );

        $themes_list = get_posts($args);
        $themes_data = array();
        foreach ($themes_list as $theme){
            $title = $theme->post_title;
            if($theme->post_title == ""){
                $title = "no title";
            }
            array_push($themes_data, array('id'=>$theme->ID, 'title'=> $title));
        }
        return $themes_data;
    }
    public static function get_instance() {
        if (null == self::$instance) {
            self::$instance = new self;
        }
        return self::$instance;
    }





}


