<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

add_action( 'widgets_init', 'estore_widgets_init' );
function estore_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'estore' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'estore' ),
		'before_widget' => '<section id="%1$s" class="widget  %2$s">',
		'after_widget'  => '</div></section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3><div c>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Сайдбар магазина', 'estore' ),
		'id'            => 'sidebar-shop',
		'description'   => esc_html__( 'Add widgets here.', 'estore' ),
		'before_widget' => '<section id="%1$s" class="widget  %2$s">',
		'after_widget'  => '</div></section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3><div class="widget_area">',
	) );
// widgets
register_sidebar( array(
	'name' => __( 'information', '' ),
	'id' => 'Information',
	'description' => __( 'Information', '' ),
	'before_widget' => '',
	'after_widget' => '',
	'before_title' => '<h2>',
	'after_title' => '</h2>',
) );

register_sidebar( array(
	'name' => __( 'My account', '' ),
	'id' => 'account',
	'before_widget' => '',
	'after_widget' => '',
	'before_title' => '<h2>',
	'after_title' => '</h2>',
) );

register_sidebar( array(
	'name' => __( 'Second information', '' ),
	'id' => 'second_nformation',
	'before_widget' => '',
	'after_widget' => '',
	'before_title' => '<h2>',
	'after_title' => '</h2>',
) );

register_sidebar( array(
	'name' => __( 'orders', '' ),
	'id' => 'orders',
	'before_widget' => '',
	'after_widget' => '',
	'before_title' => '<h2>',
	'after_title' => '</h2>',
) );
}
