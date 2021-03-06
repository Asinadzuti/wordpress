<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

add_action( 'woocommerce_before_main_content', 'estore_archive_wrapper_start', 40 );
function estore_archive_wrapper_start(){
?>

		<div class="container">
			<div class="row">
<?php
}
add_action( 'woocommerce_after_main_content', 'estore_archive_wrapper_end', 30 );
function estore_archive_wrapper_end(){
?>
			</div>
		</div>
	<?php
}

add_action( 'woocommerce_before_main_content', 'estore_archive_content_wrapper_start', 60 );
function estore_archive_content_wrapper_start(){
	?>
	<div class="col-md-12">
	<?php
}
add_action( 'woocommerce_after_main_content', 'estore_archive_content_wrapper_end', 25 );
function estore_archive_content_wrapper_end(){
	?>
	</div>
	<?php
}
add_filter( 'product_cat_class', 'estore_add_classes_product_cat' );
function estore_add_classes_product_cat($classes){
	$classes[] = 'col-md-4';
return $classes;
}

add_filter( 'woocommerce_show_page_title', 'estore_hide_title_shop' );
function estore_hide_title_shop( $hide ) {
	if ( is_shop() ) {
		$hide = false;
	}
	
	return $hide;
}

add_filter( 'post_class', 'estore_add_class_loop_item' );
function estore_add_class_loop_item($clasess){
	if(is_shop() || is_product_taxonomy()){
		$clasess[] = 'col-md-4';
	}

	return $clasess;
}

add_filter( 'post_class', 'estore_add_class_loop_item_cross' );
function estore_add_class_loop_item_cross($clasess){
	if(is_cart()){
		if ( in_array( 'product', $clasess ) ) {
			$clasess[] = 'col-md-4';
		}
	}

	return $clasess;
}

remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10);
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5);

add_action( 'woocommerce_before_shop_loop_item', 'estore_loop_product_div_open' , 5);
function estore_loop_product_div_open(){
	?>
	<?php
}

add_action( 'woocommerce_after_shop_loop_item', 'estore_loop_product_div_close' , 20);
function estore_loop_product_div_close(){
	?>
	<?php
}
add_action( 'woocommerce_before_shop_loop_item_title', 'estore_loop_product_div_image_open', 5 );
function estore_loop_product_div_image_open(){
?>
	<div class="hs-wrapper hs-wrapper2">
	<?php
}
add_action( 'woocommerce_before_shop_loop_item_title', 'estore_loop_product_div_image_close', 30);
function estore_loop_product_div_image_close(){
	global $product;
	$attachment_ids = $product->get_gallery_image_ids();
	
	if ( $attachment_ids && has_post_thumbnail() ) {
		foreach ( $attachment_ids as $attachment_id ) {
			echo wp_get_attachment_image( $attachment_id, 'shop_catalog');
		}
	}
	?>
		<?php woocommerce_show_product_loop_sale_flash(); ?>
		<ul>
			<li>
				<a href="#" data-toggle="modal" data-target="#modal-product" data-product-id="<?php echo $product->get_id();?>" class="modal-product-link">
					<span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
				</a>
			</li>
		</ul>
	</div>
	<?php
}
remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title',10 );
add_action( 'woocommerce_shop_loop_item_title', 'estore_template_loop_product_title' , 10);
function estore_template_loop_product_title(){
	echo '<h5><a href="'. get_permalink() .'">' . get_the_title() . '</a></h5>';
}
add_action( 'woocommerce_after_shop_loop_item_title', 'estore_loop_product_div_price_open', 7 );
function estore_loop_product_div_price_open(){
	?>
	<?php
}
add_action( 'woocommerce_after_shop_loop_item', 'estore_loop_product_div_price_close', 15 );
function estore_loop_product_div_price_close(){
	?>
	<?php
}

add_filter( 'woocommerce_loop_add_to_cart_args', 'estore_add_class_add__to_cart' );
function estore_add_class_add__to_cart($args){
	
	$args['class'] =  $args['class'] . ' w3ls-cart';

	return $args;
}
remove_filter( 'woocommerce_before_shop_loop', 'woocommerce_result_count',20  );
remove_filter( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering',30  );

add_action( 'woocommerce_before_shop_loop', 'estore_wrapper_count_and_ordering_start', 15 );
function estore_wrapper_count_and_ordering_start(){
	?>
		<?php woocommerce_result_count();?>
	<?php
}

add_action( 'woocommerce_before_shop_loop', 'estore_wrapper_count_and_ordering_close', 35 );
function estore_wrapper_count_and_ordering_close(){
	?>
		<?php woocommerce_catalog_ordering();?>
	<?php
}
