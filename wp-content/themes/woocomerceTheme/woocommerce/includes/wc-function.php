<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
// Change number or products per row to 3
add_filter('loop_shop_columns', 'my_loop_columns', 99);
function my_loop_columns() {
		return 3; // 4 products per row
}

remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );
remove_action( 'woocommerce_after_shop_loop', 'woocommerce_pagination', 10);

add_action( 'woocommerce_before_main_content', 'estore_add_sidebar_only_archive', 50 );
function estore_add_sidebar_only_archive() {
	if ( ! is_product() ) {
		woocommerce_get_sidebar();
	}
}