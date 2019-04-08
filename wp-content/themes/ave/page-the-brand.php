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
<div class="container">
  <div class="row">
    <div class="col-lg-6">
        <img src="https://via.placeholder.com/227x180.jpg/#d7d7d7" alt="">

    </div>
    <div class="col-lg-6">
      <h4>hand designed clothing</h4>
      <h5>established in 2013, avenue fashion Sed dictum elit vel sapien luctus eras</h5>
      <p>Praesent feugiat malesuada tristique maecenas rhoncus diam eget quam vestibulim consectetur, id condimentum leo porttitor. Cum sociis natoque penatibus eta magnis disut parturient montes, nascetur ridiculus mus. Donec sem lorem laoreet tempor un risus vitae, rutrum sodales nibh suspendisse congue metus nunc, id viverra elit loreti rhoncus quis consecteur es. Donec pulvinar tempor lorem a pretium justo interdum.
</p>
<img src="https://via.placeholder.com/570x400.jpg/#d7d7d7" alt="">
    </div>
    <div class="col-lg-6">
        <img src="https://via.placeholder.com/570x400.jpg/#d7d7d7" alt="">
<h4>our values, vision and strategy</h4>
<h5>The above image would be a great place for an advertising video</h5>
<p>Cras maximus venenatis malesuada. Nulla sagittis elit felis, ac facilisis quam ornare aliquam. Etiam cursus odio vitae dui dignissim, sed tempus lacus tincidunt et donec sapien velit, rhoncus eu nulla a, molestie tempus mi maecenas sagittis ornare.
    Pellentesque sapien mi, tincidunt nec magna vitae, volutpat elementum odioni lorem Aliquam tempor massa vitae augue mattis tempor id in ante ut augue erat, luctus eil.
    </p>
    </div>
    <div class="col-lg-6">
        <h4>Ethical trading</h4>
      <h5>we oversee the working conditions of the people in the supply chain</h5>
      <p>Nullam dapibus consectetur neque, faucibus porttitor purus iaculis sed. Aenean eras dapibus augue, eget dignissim dui maecenas et rhoncus mim, vel semper arcu lorem
          Pellentesque congue justo esteir pellentesque aliquet massa eget posuere tincidunt. Cras viverra ullamcorper nunc accumsan hendrerit. A link 
          </p>
          <img src="" alt="">
          <img src="" alt="">
          <img src="" alt="">
    </div>
  </div>
</div>


<?php
get_footer();
