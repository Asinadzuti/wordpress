<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
// Change number or products per row to 3
add_filter('loop_shop_columns', 'my_loop_columns', 99);
function my_loop_columns() {
		return 4; // 4 products per row
}
add_action( 'woocommerce_before_main_content', 'estore_add_sidebar_only_archive', 100 );
function estore_add_sidebar_only_archive() {
	if ( ! is_product() ) {
		woocommerce_get_sidebar();
	}
}