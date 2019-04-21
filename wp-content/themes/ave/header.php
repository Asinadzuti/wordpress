<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Ave
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
	<div class="container-fluid no-gutters">
	
	<div id="page" class="site">
				<header id="masthead" class="site-header">
					<div class="site-branding">
						<div class="preheader">
						<div class="row no-gutters text-center">
							<div class="col-lg-6">
								<div class="currency">
									<span>currency</span>
								</div>
							</div>
							<div class="col-lg-3">
								<div class="login">
								<?php wp_nav_menu( [ 
		'theme_location'  => 'Login menu'
	] ); ?>
									<?php global $woocommerce; ?>

								</div>
							</div>
							<div class="col-lg-3 text-left">
								
								<a class="cart-contents" href="<?php echo $woocommerce->cart->get_cart_url(); ?>" title="<?php _e('View your shopping cart', 'woothemes'); ?>">
									<?php echo sprintf(_n('%d item', '%d items', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count);?>
									-
									<?php echo $woocommerce->cart->get_cart_total(); ?>

								</a>

							</div>
						</div>
						</div>
		<div class="row no-gutters">
						<div class="col-lg-6">
							<?php
			the_custom_logo();
			if ( is_front_page() && is_home() ) :
				?>
							<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"
									rel="home"><?php bloginfo( 'name' ); ?></a></h1>
							<?php
			else :
				?>
							<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"
									rel="home"><?php bloginfo( 'name' ); ?></a></p>
							<?php
			endif;
			$ave_description = get_bloginfo( 'description', 'display' );
			if ( $ave_description || is_customize_preview() ) :
				?>
							<p class="site-description"><?php echo $ave_description; /* WPCS: xss ok. */ ?></p>
							<?php endif; ?>
						</div><!-- .site-branding -->
					<div class="col-lg-4">
					
						<nav id="site-navigation" class="main-navigation">
						<?php wp_nav_menu( [ 
		'container_class' => 'menu-header',
		'theme_location'  => 'Main menu'
	] ); ?>
							
						</nav><!-- #site-navigation -->
					</div>
					<div class="col-lg-2">
					<div class="search">
									<?php get_search_form(); ?>
								</div>
					</div>
				</div>
				</header><!-- #masthead -->

			</div>
		</div>
		<div id="content" class="site-content">