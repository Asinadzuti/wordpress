<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
// ajax search
function codyshop_ajax_search(){ 	
	$args = array( 
		'post_type'        => 'any', 
		'post_status'      => 'publish', 
		'order'            => 'DESC', 
		'orderby'          => 'date', 
		's'                => $_POST['term'], 
		'posts_per_page'   => 5 
	); 
	$query = new WP_Query( $args ); 
	if($query->have_posts()){ 
	while ($query->have_posts()) { $query->the_post();?> 
<li>    
	<?php if(!empty($codyshop_url)) {
		the_post_thumbnail('codyshop-mini-thumbnail');
	} else{ ?>
		<span><img src="<?php echo esc_url(get_template_directory_uri().'/assets/images/default-mini.gif'); ?>" alt=""></span>
	<?php } ?>
	<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
	<?php the_excerpt();?>
 </li> 
<?php } }else{ ?>
	<li><a href="#">Ничего не найдено, попробуйте другой запрос</a></li>
<?php } exit;
}
add_action('wp_ajax_nopriv_codyshop_ajax_search','codyshop_ajax_search');
add_action('wp_ajax_codyshop_ajax_search','codyshop_ajax_search');
