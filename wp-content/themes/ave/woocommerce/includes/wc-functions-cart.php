<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if ( ! function_exists( 'estore_woocommerce_cart_link_fragment' ) ) {
	/**
	 * Cart Fragments.
	 *
	 * Ensure cart contents update when products are added to the cart via AJAX.
	 *
	 * @param array $fragments Fragments to refresh via AJAX.
	 * @return array Fragments to refresh via AJAX.
	 */
	add_filter( 'woocommerce_add_to_cart_fragments', 'estore_woocommerce_cart_link_fragment' );
	function estore_woocommerce_cart_link_fragment( $fragments ) {
		ob_start();
		estore_woocommerce_cart_link();
		$fragments['a.cart-contents'] = ob_get_clean();
		
		return $fragments;
	}
}


