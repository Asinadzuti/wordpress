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

<div class="container-fluid">
<div class="row no-gutters text-center">
					<div class="col-lg-12">
						<div class="title">
							<h1><?php single_post_title(); ?></h1>
							<h2></h2>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
					<?php dynamic_sidebar( 'footer-4' ); ?>
					<?php dynamic_sidebar( 'category' ); ?>
						<?php echo do_shortcode("[products limit=8 columns=4 visibility=featured]"); ?>
					<div class="col-md-6">
					<div class="poster">
							<h2>Win a new look!</h2>
							<h5>get the look for under £200!</h5>
							<p>We invited actress Jane Marshall to join us 
					for the day and choose her perfect outfit from 
					our vast range of womens fashion.
					<br>
					This is of course not true as this is just a design 
					for a website and this is simply filler text.
					</p>
					<button>view now</button>
					
						</div>
					</div>
						<div class="poster2">
				
								<h2>Win a new look!</h2>
								<h5>add looks or items to your lookbook for a chance of winning </h5>
								<p>See an item or a complete look you like, click the  button to add it to your 
					lookbook and you’ll be automatically entered to our monthly draw where 
					one winner gets a £300 gift voucher to spend on our website!  
					<br>
					<br>
					Terms: No purchase necessary. Vouchers are non-transferable and no 
					cash alternative is ofered. Competition is for members only.
					
					</p>
					<button>Shop now</button>
					<h3 class="text-right">Win a new look</h3>
					
						</div>
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
<?php echo do_shortcode("[products limit=1 columns=1 best_selling=true]"); ?>
						<?php echo do_shortcode("[products limit=1 columns=1 orderby=id order=DESC visibility=visible]"); ?>

<?php
get_footer();
