<?php
/**
 * sammer functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package sammer
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}
   
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function sammer_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on sammer, use a find and replace
		* to change 'sammer' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'sammer', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*  
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/  
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-header' => esc_html__('Menu Header', 'sammer'),
			'menu-footer' => esc_html__('Menu Footer', 'sammer'),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'sammer_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'sammer_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function sammer_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'sammer_content_width', 640 );
}
add_action( 'after_setup_theme', 'sammer_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function sammer_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'sammer' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'sammer' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'sammer_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function sammer_scripts() {
	wp_enqueue_style( 'aos', get_template_directory_uri() . '/css/aos.css', array(), _S_VERSION );
	wp_enqueue_style( 'sammer-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'sammer-style', 'rtl', 'replace' );
	wp_enqueue_style( 'new', get_template_directory_uri() . '/css/new.css', array(), _S_VERSION );
	wp_deregister_script('jquery');
	wp_register_script('jquery', get_template_directory_uri() . '/js/jquery-3.6.0.min.js');
	//wp_enqueue_style('sammer-swiper', get_template_directory_uri() . '/css/swiper-bundle.min.css', array(), _S_VERSION);
	wp_enqueue_script( 'sammer-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	wp_enqueue_script('sammer-slick-js', get_template_directory_uri() . '/js/slick.min.js', array( 'jquery' ), _S_VERSION, true );
	
	wp_enqueue_script( 'aos', get_template_directory_uri() . '/js/aos.js', array(), _S_VERSION, true );
	wp_enqueue_script('sammer-nicescroll', get_template_directory_uri() . '/js/jquery.nicescroll.min.js', array( 'jquery' ), _S_VERSION, true );
	wp_enqueue_script( 'sammer-custom', get_template_directory_uri() . '/js/custom.js', array('jquery'), _S_VERSION, true );


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'sammer_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
* Function add Custom Post Type
*/
require_once(get_template_directory() . '/inc/cpt.php');

add_theme_support( 'post-thumbnails' );

function custom_admin_css() {
	echo '<style type="text/css">
  /* Main column width */
  .wp-block {
	 max-width: none;
  }
    
  /* Width of "wide" blocks */
	  .wp-block[data-align="wide"] {
	  max-width: none;
  }  
  
  /* Width of "full-wide" blocks */
  .wp-block[data-align="full"] {
	 max-width: none;
  }
  </style>';
  }
  add_action('admin_head', 'custom_admin_css');

  /*add_image_size('556x556', 556, 556, true);
  add_image_size('755x533', 755, 533, true);
  add_image_size('663x280', 663, 280, true);*/

  add_action('admin_menu', 'remove_admin_menu');
function remove_admin_menu() {
	remove_menu_page('edit-comments.php'); 
}

// Custom Wp-Admin Logo
function my_custom_login_logo()
{
	echo '<style  type="text/css"> h1 a {background-image:url('.get_bloginfo('template_directory').'/img/Logo.svg)  !important; height:51px !important;background-size: 245px 51px !important;width:245px !important;height:51px !important;} </style>';
	echo '<style type="text/css">body{background:#7391CB !important;} .login #backtoblog a, .login #nav a{color:#fff !important;} .privacy-policy-page-link a{color:#133B89 !important;}</style>';
}
add_action('login_head',  'my_custom_login_logo');

