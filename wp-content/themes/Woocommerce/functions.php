<?php
$smd_theme = wp_get_theme();


/*
 * Подключение настроек темы
 */
require get_template_directory() . '/includes/theme-settings.php';
/*
 * Подключение области виджетов
 */
require get_template_directory() . '/includes/widget-areas.php';
/*
 * Подключение скриптов и стилей
 */
require get_template_directory() . '/includes/enqueue-script-style.php';
/*
 * Вспомогательные функции
 */
require get_template_directory() . '/includes/helpers.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/includes/custom-header.php';
/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/includes/custom-footer.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/includes/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/includes/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/includes/customizer.php';
/**
 * Customizer additions.
 */
require get_template_directory() . '/includes/ajax.php';
/**
 * Customizer additions.
 */
require get_template_directory() . '/includes/navigations.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/includes/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	//require get_template_directory() . '/includes/woocommerce.php';
	require get_template_directory() . '/woocommerce/includes/wc-functions.php';
	require get_template_directory() . '/woocommerce/includes/wc-functions-cart.php';
	require get_template_directory() . '/woocommerce/includes/wc-functions-single.php';
	require get_template_directory() . '/woocommerce/includes/wc-function-archive.php';
	require get_template_directory() . '/woocommerce/includes/wc-functions-checkout.php';
}
add_theme_support( 'woocommerce', apply_filters( 'storefront_woocommerce_args', array(
	'single_image_width'    => 416,
	'thumbnail_image_width' => 324,
	'product_grid'          => array(
	'default_columns' => 3,
	'default_rows'    => 4,
	'min_columns'     => 1,
	'max_columns'     => 6,
	'min_rows'        => 1
	)
   ) ) );