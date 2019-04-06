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
	<div class="container-fluid no-gutters">
<body <?php body_class(); ?>>
<div id="page" class="site">
	<header id="masthead" class="site-header">
		<div class="site-branding">	<div class="preheader">
						<div class="row no-gutters text-center">
							<div class="col-lg-6">
								<div class="currency">
									<span>currency</span>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="login">
									<span>register</span>
									<span>Sign in</span>									
									<?php global $woocommerce; ?>

										<a class="cart-contents" href="<?php echo $woocommerce->cart->get_cart_url(); ?>" title="<?php _e('View your shopping cart', 'woothemes'); ?>">
											<?php echo sprintf(_n('%d item', '%d items', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count);?>
											-
											<?php echo $woocommerce->cart->get_cart_total(); ?>

										</a>

								</div>
							</div>
						</div>
            </div>
		</div><!-- .site-branding -->
		
		        <div class="header-banner">
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
							<!-- <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'ave' ); ?></button> -->
											<?php
							wp_nav_menu( array(
								'theme_location' => 'menu-1',
								'menu_id'        => 'primary-menu',
							) );	
							?>
							
						</nav><!-- #site-navigation -->
					</div>
					<div class="col-lg-2">
					<div class="search">
									<?php get_search_form(); ?>
								</div>
          </div>
<a href=""><button>shop men’s collection</button></a>
        </div>
      </div>
    </div>
					</div>

	</header><!-- #masthead -->
 </div>
	<div id="content" class="site-content">
