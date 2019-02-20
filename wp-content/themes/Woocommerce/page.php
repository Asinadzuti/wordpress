<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package estore
 */
get_header(); ?>
	<div class="container single-section">
		<div class="row">
			<div id="primary" class="content-area col-md-12">
				<main id="main" class="site-main">
				<?php dynamic_sidebar( 'posts' ); ?>
				
				</main><!-- #main -->
			</div><!-- #primary -->
		</div>
	</div>
<?php
get_footer();
