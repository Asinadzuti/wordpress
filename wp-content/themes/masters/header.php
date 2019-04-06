<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Master
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
	<div id="page" class="site">
  <div class="header-back">
		<div class="container">
			<header id="masthead" class="site-header">
				<div class="row">
					<div class="col-lg-4 offset-1">
						<div class="site-branding">
							
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
				?>
						</div><!-- .site-branding -->
					</div>
					<div class="col-lg-7">
						<nav id="site-navigation" class="main-navigation">
							<!-- <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'master' ); ?></button> -->
							<?php
			wp_nav_menu( array(
				'theme_location' => 'menu-1',
				'menu_id'        => 'primary-menu',
			) );
			?>
						</nav><!-- #site-navigation -->
					</div>
				</div>
			</header><!-- #masthead -->
  </div>
  <?php echo do_shortcode("[rev_slider alias=agency]"); ?>
 </div>
		<div id="content" class="site-content">