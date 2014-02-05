<?php
/**
 * _s functions and definitions
 *
 * @package unite
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 730; /* pixels */
}

if ( ! function_exists( 'unite_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function unite_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on _s, use a find and replace
	 * to change 'unite' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'unite', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	add_image_size( 'unite-featured', 730, 410, true );
	add_image_size( 'tab-small', 60, 60 , true); // Small Thumbnail

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'unite' ),
		'footer-links' => __( 'Footer Links', 'unite' ) // secondary nav in footer
	) );

	// Enable support for Post Formats.
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'unite_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // unite_setup
add_action( 'after_setup_theme', 'unite_setup' );

/**
 * Register widgetized area and update sidebar with default widgets.
 */
function unite_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'unite' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar(array(
    	'id' => 'home1',
    	'name' => 'Homepage Widget 1',
    	'description' => 'Used only on the homepage page template.',
    	'before_widget' => '<div id="%1$s" class="widget %2$s">',
    	'after_widget' => '</div>',
    	'before_title' => '<h3 class="widgettitle">',
    	'after_title' => '</h3>',
    ));

    register_sidebar(array(
      'id' => 'home2',
      'name' => 'Homepage Widget 2',
      'description' => 'Used only on the homepage page template.',
      'before_widget' => '<div id="%1$s" class="widget %2$s">',
      'after_widget' => '</div>',
      'before_title' => '<h3 class="widgettitle">',
      'after_title' => '</h3>',
    ));

    register_sidebar(array(
      'id' => 'home3',
      'name' => 'Homepage Widget 3',
      'description' => 'Used only on the homepage page template.',
      'before_widget' => '<div id="%1$s" class="widget %2$s">',
      'after_widget' => '</div>',
      'before_title' => '<h3 class="widgettitle">',
      'after_title' => '</h3>',
    ));	

    register_widget( 'unite_popular_posts_widget' );
}
add_action( 'widgets_init', 'unite_widgets_init' );

include(get_template_directory() . "/inc/popular-posts-widget.php");

/**
 * adding the unite search form (created in extra.php)
 */

add_filter( 'get_search_form', 'unite_wpsearch' );


/**
 * Enqueue scripts and styles.
 */
function unite_scripts() {

    wp_enqueue_style( 'unite-bootstrap', get_template_directory_uri() . '/inc/css/bootstrap.min.css' );

    wp_enqueue_style( 'unite-icons', get_template_directory_uri().'/inc/css/font-awesome.min.css' );

	wp_enqueue_style( 'unite-style', get_stylesheet_uri() );

	wp_enqueue_script('unite-bootstrapjs', get_template_directory_uri().'/inc/js/bootstrap.min.js', array('jquery') );

	wp_enqueue_script( 'unite-functions', get_template_directory_uri() . '/inc/js/main.min.js', array('jquery') );

	wp_enqueue_script( 'unite-skip-link-focus-fix', get_template_directory_uri() . '/inc/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'unite_scripts' );

/*
 * Loads the Options Panel
 *
 * If you're loading from a child theme use stylesheet_directory
 * instead of template_directory
 */

define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/inc/admin/' );
require_once dirname( __FILE__ ) . '/inc/admin/options-framework.php';

/**
 * Implement the Custom Header feature.
 */
// require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load custom nav walker
 */

require get_template_directory() . '/inc/navwalker.php';

