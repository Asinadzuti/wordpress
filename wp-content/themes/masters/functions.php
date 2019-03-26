<?php
/**
 * Master functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Master
 */

if ( ! function_exists( 'master_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function master_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Master, use a find and replace
		 * to change 'master' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'master', get_template_directory() . '/languages' );

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
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'master' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'master_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'master_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function master_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'master_content_width', 640 );
}
add_action( 'after_setup_theme', 'master_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
add_action( 'widgets_init', 'master_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function master_scripts() {
	wp_enqueue_style('bootstrap.min-style', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array() , 'all');

	wp_enqueue_style('font-awesome', get_template_directory_uri() . '/assets/css/fontawesome.min.css', array() , 'all');

	wp_enqueue_style('all', get_template_directory_uri() . '/assets/css/all.min.css', array() , 'all');

	wp_enqueue_style( 'master-style', get_stylesheet_uri() );

	wp_enqueue_script( 'master-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'master-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'estore_styles' );
function estore_styles() {
	wp_enqueue_script('bootstrap-script' , get_template_directory_uri() . '/assets/js/bootstrap-3.1.1.min.js', array('jquery'), true);
}
add_action( 'wp_enqueue_scripts', 'master_scripts' );

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

require get_template_directory() . '/inc/widget-areas.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}
// Carbon fields
use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', 'crb_attach_theme_options' );
function crb_attach_theme_options() {
    Container::make( 'theme_options', __( 'Theme Options' ) )
		->add_tab( __( 'Social' ), array(
			Field::make( 'text', 'crb_email', __( 'Notification Email' ) ),
			Field::make( 'text', 'crb_phone', __( 'Phone Number' ) ),
			
	) )	
	->add_tab( __( 'Gallery' ), array(
		Field::make( 'media_gallery', 'crb_media_gallery', __( 'Media Gallery' ) )
    ->set_type( array( 'image' ) )

) );
Container::make( 'post_meta', 'Custom Data' )
    ->where( 'post_id', '=', get_option( 'page_on_front' ) )
    ->add_tab( __( 'Profile' ), array(
			Field::make( 'image', 'crb_image', __( 'Image' ) )
			->set_width(50),
			Field::make( 'text', 'crb_last_name', __( 'First Name' ) )
			->set_width(25),
			Field::make( 'text', 'crb_position', __( 'Position' ) )
			->set_width(25),
			Field::make( 'image', 'crb_image2', __( 'Image' ) )
			->set_width(50),
			Field::make( 'text', 'crb_last_name2', __( 'First Name' ) )
			->set_width(25),
			Field::make( 'text', 'crb_position2', __( 'Position' ) )
			->set_width(25),
			Field::make( 'image', 'crb_image3', __( 'Image' ) )
			->set_width(50),
			Field::make( 'text', 'crb_last_name3', __( 'First Name' ) )
			->set_width(25),
			Field::make( 'text', 'crb_position3', __( 'Position' ) )
			->set_width(25),
			Field::make( 'image', 'crb_image4', __( 'Image' ) )
			->set_width(50),
			Field::make( 'text', 'crb_last_name4', __( 'First Name' ) )
			->set_width(25),
			Field::make( 'text', 'crb_position4', __( 'Position' ) )
			->set_width(25),
	) )
	->add_tab( __( 'Gallery' ), array(
		Field::make( 'media_gallery', 'crb_media_gallery', __( 'Media Gallery' ) )
    ->set_type( array( 'image' ) )


	));
}

add_action( 'after_setup_theme', 'crb_load' );
function crb_load() {
    require_once( 'vendor/autoload.php' );
    \Carbon_Fields\Carbon_Fields::boot();
}
