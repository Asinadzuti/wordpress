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
			<section class="badge_column">
				<div class="row">
					<div class="col-lg-3">
						<div class="card_info">
						<i class="fas fa-car-side"></i>
							<h2>
								Free Shipping
								<span>all order</span>
							</h2>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="card_info">
						<i class="fas fa-headphones"></i>
							<h2>
								24/7 customer
								<span>support</span>
							</h2>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="card_info">
						<i class="fas fa-arrow-left"></i>
							<h2>
								money back
								<span>guaranteey</span>
							</h2>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="card_info">
						<i class="fas fa-bullhorn"></i>
							<h2>MEMBER DISCOUNT
								<span>first oredr</span>
							</h2>

						</div>
					</div>
				</div>
			</section>
			<section class="free">
				<div class="row">
					<div class="col-lg-6">
						<div class="sofa text-left">
							<h6>guest room
								<span>sofa</span>
							</h6>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="chair text-center ">
							<h6>office chair
								<span>collection</span></h6>
						</div>
						<div class="collection text-right">
							<h6><strong>special</strong> collection
								<span>save up 45% of furniture</span>
							</h6>
						</div>
					</div>
				</div>
			</section>
			<div class="row">
				<div class="col-lg-12">
				<div class="product_cat">
					<h2>new furniture</h2>
				<?php echo do_shortcode("[wtcpl-product-cat]"); ?>
				</div>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-6">
					<h2 class="gallery">furniture gallery</h2>
					<hr>
					<?php echo do_shortcode("[rev_slider alias=gallery]"); ?>

				</div>
				<div class="col-lg-6">
					<div class="bedroom">
						<h6>
							<span> FROM $50.80</span>
							Bedroom Bed
							<button class="shop">
								Shop now
							</button>

						</h6>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<div class="brand-icon">
					<hr>
					<?php echo do_shortcode("[rev_slider alias=brand]"); ?>
					<hr>
					</div>
				</div>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->
</div>
</div>
<?php
get_footer();