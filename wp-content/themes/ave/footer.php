<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Ave
 */

?>

	</div><!-- #content -->
<div class="container">
	<div class="row">
		<div class="col-lg-3">
		<?php dynamic_sidebar( 'footer-1' ); ?>
		</div>
		<div class="col-lg-3">
		<?php dynamic_sidebar( 'footer-2' ); ?>
		</div>
		<div class="col-lg-3">
		<?php dynamic_sidebar( 'footer-3' ); ?>
		</div>
		<div class="col-lg-3">
		<?php dynamic_sidebar( 'footer-4' ); ?>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-3 offset-3">
			<?php dynamic_sidebar( 'award' ); ?>
		</div>
		<div class="social col-lg-3">
			<?php dynamic_sidebar( 'social' ); ?>
		</div>
	</div>
</div>
	<?php wp_footer(); ?>

</body>
</html>
