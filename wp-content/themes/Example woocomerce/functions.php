<?php
/**
 * Example theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Example_theme
 */

if ( ! function_exists( 'mytheme_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function mytheme_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Example theme, use a find and replace
		 * to change 'mytheme' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'mytheme', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'mytheme' ),
		) );
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'mytheme_custom_background_args', array(
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
				add_theme_support( 'woocommerce' );
		add_theme_support( 'wc-product-gallery-zoom' );
		add_theme_support( 'wc-product-gallery-lightbox' );
		add_theme_support( 'wc-product-gallery-slider' );
	
	}
endif;
add_action( 'after_setup_theme', 'mytheme_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function mytheme_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'mytheme_content_width', 640 );
}
add_action( 'after_setup_theme', 'mytheme_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function mytheme_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'mytheme' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'mytheme' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'mytheme_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function mytheme_scripts() {
	wp_enqueue_style( 'mytheme-style', get_stylesheet_uri() );

	wp_enqueue_script( 'mytheme-navigation', get_template_directory_uri() . 'assets/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'mytheme-skip-link-focus-fix', get_template_directory_uri() . 'assets/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'mytheme_scripts' );

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
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}
/**
* Woocommerce parts
*/
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/woocommerce/includes/wc-functions.php';
	require get_template_directory() . '/woocommerce/includes/wc-functions-cart.php';
	require get_template_directory() . '/woocommerce/includes/wc-functions-single.php';
	require get_template_directory() . '/woocommerce/includes/wc-function-archive.php';
    require get_template_directory() . '/woocommerce/includes/wc-functions-checkout.php';
}

/*
* Scripts
*/

add_action( 'wp_enqueue_scripts', 'estore_scripts' );
function estore_scripts() {
	wp_enqueue_style( 'estore-style', get_stylesheet_uri(), array('bootstrap-style') , 'all');
	wp_enqueue_style('bootstrap-style', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array() , 'all');
	wp_enqueue_style('font-awesome', get_template_directory_uri() . '/assets/css/all.min.css', array() , 'all');
	wp_enqueue_style('countdown', get_template_directory_uri() . '/assets/css/jquery.countdown.css', array() , 'all');
	wp_enqueue_style('popuo-box', get_template_directory_uri() . '/assets/css/popuo-box.css', array() , 'all');
	wp_enqueue_style('fasthover', get_template_directory_uri() . '/assets/css/fasthover.css', array() , 'all');
	wp_enqueue_style('fonts', 'https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet', array() , 'all');

}

add_action( 'wp_enqueue_scripts', 'estore_styles' );
function estore_styles() {
	
	wp_enqueue_script( 'estore-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), true );
	
	wp_enqueue_script( 'estore-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), true );
	
	wp_enqueue_script('bootstrap-script' , get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), true);
	wp_enqueue_script('imagezoom' , get_template_directory_uri() . '/assets/js/imagezoom.js', array('jquery'), true);
	wp_enqueue_script('countdown' , get_template_directory_uri() . '/assets/js/jquery.countdown.js', array('jquery'), true);
	wp_enqueue_script('easyResponsiveTabs' , get_template_directory_uri() . '/assets/js/easyResponsiveTabs.js', array('jquery'), true);
	wp_enqueue_script('magnific-popup' , get_template_directory_uri() . '/assets/js/jquery.magnific-popup.js', array('jquery'), true);
	wp_enqueue_script('minicart' , get_template_directory_uri() . '/assets/js/minicart.js', array('jquery'), true);
	wp_enqueue_script('easyTabs' , get_template_directory_uri() . '/assets/js/easyResponsiveTabs.js', array('jquery'), true);
	wp_enqueue_script('ajax-search' , get_template_directory_uri() . '/assets/js/ajax-search.js', array('jquery'), true);
	wp_localize_script('ajax-search', 'search_form' , array(
		'url' => admin_url( 'admin-ajax.php' ),
		'nonce' => wp_create_nonce('search-nonce')
	));
	wp_enqueue_script('ajax-quick' , get_template_directory_uri() . '/assets/js/ajax-quick-veiw.js', array('jquery'), true);
	wp_localize_script('ajax-quick', 'ajax_quick' , array(
		'url' => admin_url( 'admin-ajax.php' ),
		'nonce' => wp_create_nonce('quick-nonce')
	));
	wp_enqueue_script('script' , get_template_directory_uri() . '/assets/js/script.js', array('jquery'));
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	wp_dequeue_style( 'wcqi-css' );
}

// removes Order Notes Title - Additional Information
add_filter( 'woocommerce_enable_order_notes_field', '__return_false' );



//remove Order Notes Field
add_filter( 'woocommerce_checkout_fields' , 'remove_order_notes' );

function remove_order_notes( $fields ) {
		 unset($fields['order']['order_comments']);
	unset($fields['billing']['billing_company']);
		 return $fields;
		 
}
add_filter('woocommerce_enable_order_notes_field', '__return_false');
