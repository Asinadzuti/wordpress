<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Master
 */

?>

	</div><!-- #content -->
<div class="container">
	
<footer id="colophon" class="site-footer">
		<div class="site-info">
			<div class="row">
				<div class="col-lg-4">
				<?php dynamic_sidebar( 'Information' ); ?>
				</div>
				<div class="col-lg-4">
				<?php dynamic_sidebar( 'studio' ); ?>
				</div>
				<div class="col-lg-4">
				<?php dynamic_sidebar( 'touch' ); ?>
				</div>
			</div>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
