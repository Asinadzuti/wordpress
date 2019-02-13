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
add_filter( 'wc_product_sku_enabled', '__return_false' );
add_action( 'woocommerce_before_main_content', 'estore_add_sidebar_only_archive', 50 );
function estore_add_sidebar_only_archive() {
	if ( ! is_product() ) {
		woocommerce_get_sidebar();
	}
}

add_action( 'woocommerce_before_single_product', 'estore_wrapper_product_start', 5 );
function estore_wrapper_product_start() {
	?>

	<?php
}
add_action( 'woocommerce_after_single_product', 'estore_wrapper_product_end', 5 );
function estore_wrapper_product_end() {
	?>

	<?php
}
add_action( 'woocommerce_before_single_product_summary', 'estore_wrapper_product_image_start', 5 );
function estore_wrapper_product_image_start() {
	?>
	<div class="single-section">
		<div class="row">
	<div class="col-md-4 ">
	<?php
}
add_action( 'woocommerce_before_single_product_summary', 'estore_wrapper_product_image_end', 25 );
function estore_wrapper_product_image_end() {
	?>
	</div>
	<?php
}
add_action( 'woocommerce_before_single_product_summary', 'estore_wrapper_product_entry_start', 30 );
function estore_wrapper_product_entry_start() {
	?>
	<div class="col-md-8">
	<?php
}
add_action( 'woocommerce_after_single_product_summary', 'estore_wrapper_product_entry_end', 5 );
function estore_wrapper_product_entry_end() {
	?>
	</div>
</div>
</div>
	<?php
}