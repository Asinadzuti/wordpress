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
<div class="container">

	<body <?php body_class(); ?>>
		<div id="page" class="site">
			<header id="masthead" class="site-header">
				<div class="loggin">
					<div class="row">
						<div class="col-lg-6">
							<span>USD</span>
							<span>English</span>
							<span>Help</span>
						</div>
						<div class="col-lg-6 text-right">
							<span>Login</span>
							<span>Registr</span>
						</div>
					</div>
				</div>
				<div class="site-branding">
					<div class="row">
						<div class="col-lg-4 ">
							<span>phone number</span>
						</div>
						<div class="col-lg-4 text-center">
							<?php
		the_custom_logo();?>
						</div>
						<div class="col-lg-4 text-right">
							<span>cart</span>
						</div>
					</div>
				</div><!-- .site-branding -->
				 <nav id="site-navigation" class="main-navigation">
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
							</nav><!-- #site-navigation -->
						</div>
			</header><!-- #masthead -->

			<div id="content" class="site-content">