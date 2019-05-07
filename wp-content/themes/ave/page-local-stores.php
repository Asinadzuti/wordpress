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
                  <h2>Find a store near you</h2>
                </div>
              </div>
            </div>
<section class="local_stores">
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-3 offset-2">
      <h4>London</h4>
      <h5>180-182 Regent Street, London, W1B 5BT</h5>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing esi elit. Vivamus at arcu sem. Vestibulum ornare eleifendit massa, nec tempor odio. Fusce posuere nunc iaculis ligula viverra iaculis. Aliquam erat volutpat.</p>
      <button>view details</button>
    </div>
    <div class="col-lg-3">
    <h4>London</h4>
      <h5>180-182 Regent Street, London, W1B 5BT</h5>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing esi elit. Vivamus at arcu sem. Vestibulum ornare eleifendit massa, nec tempor odio. Fusce posuere nunc iaculis ligula viverra iaculis. Aliquam erat volutpat.</p>
      <button>view details</button>
    </div>
    <div class="col-lg-3">
    <h4>London</h4>
      <h5>180-182 Regent Street, London, W1B 5BT</h5>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing esi elit. Vivamus at arcu sem. Vestibulum ornare eleifendit massa, nec tempor odio. Fusce posuere nunc iaculis ligula viverra iaculis. Aliquam erat volutpat.</p>
      <button>view details</button>
    </div>
  </div>
  <div class="row padding_zero">
<div class="info_addres">
  <div class="col-md-8 padding_zero">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d18602.51472012725!2d38.24360893271087!3d54.35142613291051!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4135cd64bef04fc5%3A0x85c9365fe8c06b56!2z0JLQtdC90LXQsiwg0KLRg9C70YzRgdC60LDRjyDQvtCx0Lsu!5e0!3m2!1sru!2sru!4v1555860001254!5m2!1sru!2sru" width="100%" height="530" frameborder="0" style="border:0" allowfullscreen></iframe>
  </div>
  <div class="col-md-4 ">
      <h4>London</h4>
      <h5>180-182 Regent Street, London, W1B 5BT</h5>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing esi elit. Vivamus at arcu sem. Vestibulum ornare eleifendit massa, nec tempor odio. Fusce posuere nunc iaculis ligula viverra iaculis. Aliquam erat volutpat.</p>
      <ul>
        <li><i class="fas fa-map-marker-alt"></i> 180-182 Regent Street, London, W1B 5BT</li>
        <li><i class="fas fa-phone"></i>0123-456-789</li>
        <li><i class="fas fa-sync-alt"></i>www.yourwebsite.com</li>
        <li><i class="far fa-envelope"></i>support@yourwebsite.com</li>
        <li><i class="far fa-envelope"></i>Monday-Friday: 9am to 6pm  Saturday: 10am to 6pm  Sunday: 10am to 2pm</li>
      </ul>
      <div class="social_icons">
          <i class="fab fa-facebook-f"></i>
          <i class="fab fa-twitter"></i>
        <i class="fab fa-instagram"></i>
        <i class="fab fa-pinterest"></i>
      </div>
  </div>
</div>
  </div>
</div>
</section>
<?php
get_footer();
