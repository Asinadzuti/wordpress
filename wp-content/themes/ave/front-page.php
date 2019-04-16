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
 * @package Ave
 */
if(is_page(23)) {
 get_header('home');
}
else {
 get_header();
}
 wp_head();
?>
<div class="container-fluid ">
	<div class="row">
		<div class="col-lg-12">
			<?php echo do_shortcode("[wtcpl-product-cat]"); ?>
		</div>
	</div>
		<div class="row">
			<div class="col-lg-4 text-right ">
				<div class="view">
				<h2>men’s
					lookbook</h2>
				<p>Lorem ipsum dolor sit amet eras facilisis
					consectetur adipiscing elit lor, integer lorem consecteur dignissim laciniqui.
					Elementum metus facilisis ut phasellu.
				</p>
				<button>view now</button>
				</div>
			</div>
			<div class="col-lg-4 text-right ">
<div class="view">
<h2>men’s
					lookbook</h2>
				<p>Lorem ipsum dolor sit amet eras facilisis
					consectetur adipiscing elit lor, integer lorem consecteur dignissim laciniqui.
					Elementum metus facilisis ut phasellu.
				</p>
				<button>view now</button>
				</div>
			</div>

			<div class="col-lg-4 text-right ">
				<div class="view">
				<h2>men’s
					lookbook</h2>
				<p>Lorem ipsum dolor sit amet eras facilisis
					consectetur adipiscing elit lor, integer lorem consecteur dignissim laciniqui.
					Elementum metus facilisis ut phasellu.
				</p>
				<button>view now</button></div>
			</div>
		</div>
</div>


<?php
get_footer();