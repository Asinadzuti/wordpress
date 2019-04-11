<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

// add_action( 'widgets_init', 'estore_widgets_init' );

	register_sidebar( array(
		'name'          => 'First footer section',
		'id'            => 'footer-1',
		'before_widget' => '<section id="%1$s" class="widget info %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h6 class="widget-title">',
		'after_title'   => '</h6>',
	) );
	register_sidebar( array(
		'name'          => 'Second footer section',
		'id'            => 'footer-2',
		'before_widget' => '<section id="%1$s" class="widget info %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h6 class="widget-title">',
		'after_title'   => '</h6>',
	) );
	register_sidebar( array(
		'name'          => 'Third footer section',
		'id'            => 'footer-3',
		'before_widget' => '<section id="%1$s" class="widget info %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h6 class="widget-title">',
		'after_title'   => '</h6>',
	) );
	register_sidebar( array(
		'name'          => 'Fourth footer section',
		'id'            => 'footer-4',
		'before_widget' => '<section id="%1$s" class="widget info %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h6 class="widget-title">',
		'after_title'   => '</h6>',
	) );
	register_sidebar( array(
		'name'          => 'Award Winner',
		'id'            => 'award',
		'before_widget' => '<section id="%1$s" class="widget info %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h6 class="widget-title">',
		'after_title'   => '</h6>',
	) );
	register_sidebar( array(
		'name'          => 'Social information',
		'id'            => 'social',
		'before_widget' => '<section id="%1$s" class="widget info %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h6 class="widget-title">',
		'after_title'   => '</h6>',
	) );
