<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
// Change number or products per row to 3
add_filter('loop_shop_columns', 'my_loop_columns', 99);
function my_loop_columns() {
		return 3; // 4 products per row
}
add_filter( 'woocommerce_output_related_products_args', 'bbloomer_change_number_related_products', 9999 );
 
function bbloomer_change_number_related_products( $args ) {
 $args['posts_per_page'] = 4; // # of related products
 $args['columns'] = 4; // # of columns per row
 return $args;
}
// img size
add_filter( 'woocommerce_get_image_size_thumbnail', function( $size ) {
return array(
'width' => 262,
'height' => 260,
'crop' => 0,
);
} ); 
// cart
add_filter( 'woocommerce_loop_add_to_cart_args', 'estore_add_class_add__to_cart' );
function estore_add_class_add__to_cart($args){
	
	$args['class'] =  $args['class'] . ' w3ls-cart';

	return $args;
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
add_action( 'wp_footer', 'estore_modal_window' );
function estore_modal_window(){
	?>
	<div class="modal video-modal fade" id="modal-product" tabindex="-1" role="dialog" aria-labelledby="modal-product">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				</div>
				<section>
				
				</section>
			</div>
		</div>
	</div>
	<?php
}

add_action( 'post_class', function ($classes ){
	if ( wc_get_loop_prop( 'is_shortcode' ) ) {
		$classes[] = 'col-md-4';
	}

	return $classes;
} );

