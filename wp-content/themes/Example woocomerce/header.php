<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package woocomerce
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div class="container-fluid">
		<div id="page" class="site">
			<header id="masthead" class="site-header">
				<div class="loggin">
				<div class="container">
					<div class=" row">
						<div class="col-lg-6">
							<span>USD</span>
							<span>English</span>
							<span>Help</span>
						</div>
						<div class="col-lg-6 text-right">
							<i class="fa fa-user" aria-hidden="true"></i><span><?php echo do_shortcode("[ultimatemember form_id=357]"); ?></span>
							<i class="fas fa-lock"></i><span><?php echo do_shortcode("[ultimatemember form_id=356]"); ?></span>
						</div>
					</div>
					</div>
				</div>
				<div class=" site-branding">
				<div class="container">
					<div class=" row">
						<div class="col-lg-4  ">
							<span class="number ">2300 - 3560 - 222</span>
						</div>
						<div class="col-lg-4 text-center">
							<?php
		the_custom_logo();?>
						</div>
						<div class="col-lg-4 text-right">
							<?php global $woocommerce; ?>

							<a class="cart-contents" href="<?php echo $woocommerce->cart->get_cart_url(); ?>" title="<?php _e('View your shopping cart', 'woothemes'); ?>">
								<?php echo sprintf(_n('%d item', '%d items', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count);?>
								-
								<?php echo $woocommerce->cart->get_cart_total(); ?>

							</a>


						</div>
					</div>
					</div>
				</div><!-- .site-branding -->
				<nav id="site-navigation" class="main-navigation ">
					<div class="container">
						<div class="row">
							<div class="col-lg-6">
								<div class="search">
									<?php get_search_form(); ?>
								</div>
							</div>
							<div class="col-lg-6">

								<?php
						wp_nav_menu( array(
							'theme_location' => 'menu-1',
							'menu_id'        => 'primary-menu',
						) );
						?>
							</div>

						</div>
					</div>
				</nav><!-- #site-navigation -->
		</div>
	</div>
	</header><!-- #masthead -->

	<div id="content" class="site-content">