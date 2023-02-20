<?php
/**
 * Africa functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Africa
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
function africa_setup() {
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

	// Register theme location.
	register_nav_menus(    
		array(
			'Header' => esc_html__( 'Primary', 'africa' ),
			'Header_blog_menu' => esc_html__( 'Primary blog', 'africa' ),
			'Footer' => esc_html__( 'Footer menu', 'africa' ),
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
			'africa_custom_background_args',
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

  //load_theme_textdomain( 'africa', get_template_directory().'/languages' );

}
add_action( 'after_setup_theme', 'africa_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function africa_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'africa_content_width', 640 );
}
add_action( 'after_setup_theme', 'africa_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function africa_widgets_init() {
	add_theme_support('widgets');
	register_sidebar(
		array(
			'name'          => esc_html__( 'Blog sidebar left', 'africa' ),
			'id'            => 'blog-left-sidebar',
			'description'   => esc_html__( 'Add widgets here.', 'africa' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Blog sidebar bottom', 'africa' ),
			'id'            => 'blog-bottom-sidebar',
			'description'   => esc_html__( 'Add widgets here.', 'africa' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		)
	);
}
add_action( 'widgets_init', 'africa_widgets_init' );


/**
 * Enqueue scripts and styles.
 */
function africa_scripts() {
	wp_enqueue_style( 'africa-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_enqueue_style( 'africa-icomoon-style', get_template_directory_uri() . "/assets/fonts/icomoon/style.css", array(), _S_VERSION );
	wp_enqueue_style( 'africa-flaticon
		', get_template_directory_uri() . "/assets/fonts/flaticon/font/flaticon.css");
	wp_enqueue_style( 'africa-bootstrap.min', get_template_directory_uri() . "/assets/css/bootstrap.min.css");
	wp_enqueue_style( 'africa-magnific-popup', get_template_directory_uri() . "/assets/css/magnific-popup.css");
	wp_enqueue_style( 'africa-jquery-ui', get_template_directory_uri() . "/assets/css/jquery-ui.css");
	wp_enqueue_style( 'africa-owl.carousel.min', get_template_directory_uri() . "/assets/css/owl.carousel.min.css");
	wp_enqueue_style( 'africa-owl.theme.default.min', get_template_directory_uri() . "/assets/css/owl.theme.default.min.css");
	wp_enqueue_style( 'africa-bootstrap-datepicker', get_template_directory_uri() . "/assets/css/bootstrap-datepicker.css");
	wp_enqueue_style( 'africa-aos', get_template_directory_uri() . "/assets/css/aos.css");
	wp_enqueue_style( 'africa-castom-blog-style', get_template_directory_uri() . "/assets/css/castom-blog-style.css");
	wp_enqueue_style( 'africa-404-style', get_template_directory_uri() . "/assets/css/404style.css");
	wp_enqueue_style( 'africa-main-style', get_template_directory_uri() . "/assets/css/style.css");
  
	//wp_deregister_script('jquery');
	//wp_deregister_script('jquery-ui');
	wp_enqueue_script( 'africa-jquery-3.3.1.min', get_template_directory_uri() . '/assets/js/jquery-3.3.1.min.js', array(),'1.0', true);
    wp_enqueue_script( 'africa-jquery-ui', get_template_directory_uri() . '/assets/js/jquery-ui.js', array(),'1.0', true);
    wp_enqueue_script( 'africa-popper', get_template_directory_uri() . '/assets/js/popper.min.js', array(),'1.0', true);
    wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array(),'1.0', true);
    wp_enqueue_script( 'owl.carousel', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array(),'1.0', true);
    wp_enqueue_script( 'magnific-popup', get_template_directory_uri() . '/assets/js/jquery.magnific-popup.min.js', array(),'1.0', true);
    wp_enqueue_script( 'sticky', get_template_directory_uri() . '/assets/js/jquery.sticky.js', array(),'1.0', true);
    wp_enqueue_script( 'waypoints.min', get_template_directory_uri() . '/assets/js/jquery.waypoints.min.js', array(),'1.0', true);
    wp_enqueue_script( 'animateNumber.min', get_template_directory_uri() . '/assets/js/jquery.animateNumber.min.js', array(),'1.0', true);
    wp_enqueue_script( 'aos', get_template_directory_uri() . '/assets/js/aos.js', array(),'1.0', true);
    

    wp_enqueue_script( 'africa-main', get_template_directory_uri() . '/assets/js/main.js', array(),'1.0', true);

 

	//wp_style_add_data( 'africa-style', 'rtl', 'replace' );

	//wp_enqueue_script( 'africa-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'africa_scripts' );

//FONTS
/*
function add_google_fonts(){
		//wp_enqueue_style('google_web_fonts','https://fonts.googleapis.com/css?family=Nunito:300,400,700|Anton');		
}
	add_action( 'wp_enqueue_scripts', 'add_google_fonts' );

*/



/* menu anchor*/

function africa_add_link_atts($atts,$menu_item, $args) {
	if($args->theme_location=='Header'){
	  $atts['class'] = "nav-link";
	}
  return $atts;
}
add_filter( 'nav_menu_link_attributes', 'africa_add_link_atts',10,3);

	
/* Castom search*/

add_filter( 'use_widgets_block_editor', '__return_false' );    // отключаем редактор виджетов
/*function roots_get_search_form($form) {
  //$form = "Hello";
  //echo gettype($form);
  $form.locate_template('/searchform.php', true, false);    //file_get_contents()
  return $form;
}
add_filter( 'get_search_form', 'roots_get_search_form' );
*/
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




//  TGM plagin

require get_template_directory() .'/inc/class-tgm-plugin-activation.php';   
require get_template_directory().'/inc/tgm_register.php';


function remove_core_updates() {
		global $wp_version;
		return(object) array('last_checked'=> time(),'version_checked'=> $wp_version,);
	}
	add_filter('pre_site_transient_update_core','remove_core_updates');
	add_filter('pre_site_transient_update_plugins','remove_core_updates');
	add_filter('pre_site_transient_update_themes','remove_core_updates');



// remove  url field from comments form
function remove_website_field( $fields ) {
    unset( $fields['url'] );
    return $fields;
}
 
add_filter( 'comment_form_default_fields', 'remove_website_field' );


