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
 * @package Master
 */

 
get_header();
?>
<div class="container">
	<div class="row">
		<div class="col-lg-6">
			<img src="">
		</div>
		<div class="col-lg-6">
			<div class="block-first">
				<h2>OUR STORY</h2>
				<p>This is Photoshop's version of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin,
					lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet
					nibh vulputate cursus
					<br>
					<br>
					Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non mauris vitae erat
					consequat auctor eu in elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos
					himenaeos.</p>
				<button class="learn">
					Learn more
				</button>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<?php echo do_shortcode("[rev_slider alias=video]"); ?>
		</div>
	</div>
	<div class="row text-center">
		<div class="col-lg-12">
			<div class="title">
				<h2>MEET OUR AMAZING TEAM</h2>
				<p>Lorem ipsum dolor sit amet proin gravida nibh vel velit</p>
				<hr>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-4">
			<div class="panel text-center">
				<img src="" alt="">
				<h3>WEB DESIGN & DEVELOPMENT</h3>
				<p>This is Photoshop's version of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet Aenean.</p>
			</div>
		</div>

		<div class="vert_l">
		</div>
		<div class="col-lg-4">
			<div class="panel text-center">
				<img src="" alt="">
				<h3>WEB DESIGN & DEVELOPMENT</h3>
				<p>This is Photoshop's version of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet Aenean.</p>
			</div>
		</div>
		<div class="col-lg-4">
			<div class="panel text-center">
				<img src="" alt="">
				<h3>WEB DESIGN & DEVELOPMENT</h3>
				<p>This is Photoshop's version of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet Aenean.</p>
			</div>
		</div>
		<div class="vert_r">

		</div>
		<hr>
		<div class="col-lg-4">
			<div class="panel text-center">
				<img src="" alt="">
				<h3>WEB DESIGN & DEVELOPMENT</h3>
				<p>This is Photoshop's version of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet Aenean.</p>
			</div>
		</div>
		<div class="col-lg-4">
			<div class="panel text-center">
				<img src="" alt="">
				<h3>WEB DESIGN & DEVELOPMENT</h3>
				<p>This is Photoshop's version of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet Aenean.</p>
			</div>
		</div>
		<div class="col-lg-4">
			<div class="panel text-center">
				<img src="" alt="">
				<h3>WEB DESIGN & DEVELOPMENT</h3>
				<p>This is Photoshop's version of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet Aenean.</p>
			</div>
		</div>
		<hr>
	</div>
	<div class="row text-center">
		<div class="col-lg-12">
			<div class="title">
				<h2>MEET OUR AMAZING TEAM</h2>
				<p>Lorem ipsum dolor sit amet proin gravida nibh vel velit</p>
				<hr>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-3">
			<div class="card">
				<img class="card-img-top" src="">
				<div class="card-body">
					<h5 class="card-title"></h5>
					<p class="card-text"></p>
				</div>
			</div>
		</div>
		<div class="col-lg-3">
			<div class="card">
				<img class="card-img-top" src="">
				<div class="card-body">
					<h5 class="card-title">
						</h5>
					<p class="card-text">
						</p>
				</div>
			</div>
		</div>
		<div class="col-lg-3">
			<div class="card">
				<img class="card-img-top" src="">
				<div class="card-body">
					<h5 class="card-title"></h5>
					<p class="card-text"></p>
				</div>
			</div>
		</div>
		<div class="col-lg-3">
			<div class="card">
				<img class="card-img-top" src="">
				<div class="card-body">
					<h5 class="card-title"></h5>
					<p class="card-text"></p>
				</div>
			</div>
		</div>
		<div class="col-lg-12 text-center">
			<p>Become part of our dream team, let’s join us ! </p>
			<button class="learn">
				WE ARE HIRING
			</button>
		</div>
	</div>
	<div class="row text-center">
		<div class="col-lg-6">
			<h3>OUR WORKS</h3>

		</div>
		<div class="col-lg-6">
			<p>See All Project in dribbble ></p>
		</div>
	</div>
			<div class="gallery">
			<?php 

$images = get_field('gallery');

if( $images ): ?>
<div class="row">
<?php foreach( $images as $image ): ?>
        <div class="col-lg-2">
				<a href="<?php echo $image['url']; ?>">
                     <img src="<?php echo $image['sizes']['medInWium']; ?>" alt="<?php echo $image['alt']; ?>" />
                </a>
 
				</div>               <p><?php echo $image['caption']; ?></p>
        <?php endforeach; ?>
<?php endif; ?>
</div>
				<button class="learn">
					LOAD MORE
				</button>
			</div>
	<div class="row">
		<div class="col-lg-12">
			<?php echo do_shortcode("[rev_slider alias=quote]"); ?>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-6">
			<h2>GIVE US A GOOD NEWS</h2>
			<?php echo do_shortcode("[contact-form-7 id=41 title=Contact form 1]"); ?>
		</div>
		<div class="col-lg-6">
			<h2>OUR HAPPY CLIENT</h2>
			<div class="col-lg-6">
			</div>
			<div class="col-lg-6">
			<a target="_blank" href="<?php echo  $theme_options['twitter']; ?>"><i class="fab fa-twitter-square"></i></a>
			</div>
		</div>
	</div>
</div>
<?php
get_footer();