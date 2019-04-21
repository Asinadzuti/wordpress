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
<section class="local_stores">
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-4">
      <h4>London</h4>
      <h5>180-182 Regent Street, London, W1B 5BT</h5>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing esi elit. Vivamus at arcu sem. Vestibulum ornare eleifendit massa, nec tempor odio. Fusce posuere nunc iaculis ligula viverra iaculis. Aliquam erat volutpat.</p>
      <button>view details</button>
    </div>
    <div class="col-lg-4">
    <h4>London</h4>
      <h5>180-182 Regent Street, London, W1B 5BT</h5>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing esi elit. Vivamus at arcu sem. Vestibulum ornare eleifendit massa, nec tempor odio. Fusce posuere nunc iaculis ligula viverra iaculis. Aliquam erat volutpat.</p>
      <button>view details</button>
    </div>
    <div class="col-lg-4">
    <h4>London</h4>
      <h5>180-182 Regent Street, London, W1B 5BT</h5>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing esi elit. Vivamus at arcu sem. Vestibulum ornare eleifendit massa, nec tempor odio. Fusce posuere nunc iaculis ligula viverra iaculis. Aliquam erat volutpat.</p>
      <button>view details</button>
    </div>
  </div>
</div>
</section>
<?php
get_footer();
