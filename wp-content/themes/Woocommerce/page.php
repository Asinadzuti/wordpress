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
			<div id="primary" class="content-area">
				<main id="main" class="site-main">
				<div class="row">
					<div class="col-lg-4">
						
				<?php echo do_shortcode("[rev_slider alias=hot_deals]"); ?>
					</div>
					<div class="col-lg-8">
					<?php echo do_shortcode("[rev_slider alias=shop_now]"); ?>
					</div>
		</div>
		<div class="row">
		<div class="col-lg-12">
		<?php echo do_shortcode("[wtcpl-product-cat]"); ?>
		</div>
		</div>
<div class="row">
	<div class="col-lg-6">
	<?php echo do_shortcode("[rev_slider alias=gallery]"); ?>
		
	</div>
</div>
				
				</main><!-- #main -->
			</div><!-- #primary -->
		</div>
	</div>
<?php
get_footer();
