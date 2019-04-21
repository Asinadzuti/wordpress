<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}


/*
 * Wrappers single product
 */
add_action( 'woocommerce_before_main_content', 'estore_add_breadcrumbs', 20 );
function estore_add_breadcrumbs(){
	?>

<div class="container-fluid">
<div class="row no-gutters text-center">
					<div class="col-lg-12">
						<div class="title">
							<h1>Product view</h1>
							<h2><?php woocommerce_breadcrumb(); ?></h2>
						</div>
					</div>
				</div>

	<?php
}
add_action( 'woocommerce_before_single_product', 'estore_wrapper_product_start', 5 );
function estore_wrapper_product_start() {
	?>
	<div class="single-section">
	<?php
}

add_action( 'woocommerce_after_single_product', 'estore_wrapper_product_end', 5 );
function estore_wrapper_product_end() {
	?>
		</div>
	<?php
}

add_action( 'woocommerce_before_single_product_summary', 'estore_wrapper_product_image_start', 5 );
function estore_wrapper_product_image_start() {
	?>
	<div class="col-md-5">
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
	<div class="col-md-7 text">
	<?php
}

add_action( 'woocommerce_after_single_product_summary', 'estore_wrapper_product_entry_end', 5 );
function estore_wrapper_product_entry_end() {
	?>
	</div>
	<div class="clearfix"></div>
	<?php
}

/*
 * Tabs single product
 */
add_filter( 'woocommerce_short_description', 'estore_short_description', 10 );
function estore_short_description( $content ) {
	?>
	<div class="description">
		<?php echo $content; ?>
	</div>
	<?php
}

add_filter( 'woocommerce_get_availability', 'wcs_custom_get_availability', 1, 2);
function wcs_custom_get_availability( $availability, $_product ) {
    
    // Change In Stock Text
    if ( $_product->is_in_stock() ) {
        $availability['availability'] = __('Availability: In stock', 'woocommerce');
    }
    // Change Out of Stock Text
    if ( ! $_product->is_in_stock() ) {
        $availability['availability'] = __('Availability: Sold Out', 'woocommerce');
    }
    return $availability;
}
