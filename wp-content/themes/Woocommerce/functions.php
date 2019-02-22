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
include_once get_template_directory().'/admin/admin-init.php';
// add empty stars after title
add_action( 'woocommerce_after_shop_loop_item_title', 'empty_stars', 5 );
function empty_stars() {
    global $product;
    if ( get_option( 'woocommerce_enable_review_rating' ) === 'no' || $product->post->comment_status === 'closed' ) {
        return;
    }
    else {
        $rating_count = $product->get_rating_count();
        $review_count = $product->get_review_count();
        $average      = $product->get_average_rating();

        if ( $rating_count === 0 ) : ?>
            <div class="woocommerce-product-rating" itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating">
                <div class="star-rating" title="<?php printf( __( 'Rated %s out of 5', 'woocommerce' ), $average ); ?>">
                    <span style="width:<?php echo ( ( $average / 5 ) * 100 ); ?>%">
                        <strong itemprop="ratingValue" class="rating"><?php echo esc_html( $average ); ?></strong> <?php printf( __( 'out of %s5%s', 'woocommerce' ), '<span itemprop="bestRating">', '</span>' ); ?>
                        <?php printf( _n( 'based on %s customer rating', 'based on %s customer ratings', $rating_count, 'woocommerce' ), '<span itemprop="ratingCount" class="rating">' . $rating_count . '</span>' ); ?>
                    </span>
                </div>
            </div>
        <?php endif;
    }
}