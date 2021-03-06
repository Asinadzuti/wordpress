<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );
// remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15);
// remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 );
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);
remove_action( 'woocommerce_after_shop_loop', 'woocommerce_pagination', 10 );
remove_filter( 'woocommerce_review_before_comment_meta', 'woocommerce_review_display_rating', 10 );

remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
add_filter( 'wc_product_sku_enabled', '__return_false' );
add_filter( 'woocommerce_product_get_rating_html', 'filter_woocommerce_product_get_rating_html', 10, 3 ); 
