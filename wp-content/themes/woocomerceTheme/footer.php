<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package woocomerce
 */

?>

</div><!-- #content -->

<footer id="colophon" class="site-footer">
	<div class="site-info">
		<div class="widgets">
<div class="row">
	<div class="col-lg-3">  <?php dynamic_sidebar( 'Information' ); ?></div>
	<div class="col-lg-3">  <?php dynamic_sidebar( 'account' ); ?></div>
	<div class="col-lg-3">  <?php dynamic_sidebar( 'second_nformation' ); ?></div>
	<div class="col-lg-3">  <?php dynamic_sidebar( 'orders' ); ?></div>
</div>
		</div>
		<div class="coopyright">
			<div class="row">
				<div class="col-lg-7 text-right"	>
					<span>©Copyright 2016 Bazar | All Rights Reserved</span>
				</div>
				<div class="col-lg-4">
					<div class="social">
						<a href="">social</a>
					</div>
				</div>
			</div>
		</div>
	</div><!-- .site-info -->
</footer><!-- #colophon -->
</div><!-- #page -->
</div> <!-- container -->
</div>
<?php wp_footer(); ?>

</body>

</html>