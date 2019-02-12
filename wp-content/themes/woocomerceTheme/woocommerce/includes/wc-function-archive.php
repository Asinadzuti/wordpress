<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

add_action( 'woocommerce_before_main_content', 'estore_archive_wrapper_start', 40 );
function estore_archive_wrapper_start(){
?>
		<div class="row">
<?php
}
add_action( 'woocommerce_after_main_content', 'estore_archive_wrapper_end', 30 );
function estore_archive_wrapper_end(){
?>
	</div>
	<?php
}
add_action( 'woocommerce_before_main_content', 'estore_archive_content_wrapper_start', 60 );
function estore_archive_content_wrapper_start(){
	?>
	<div class="col-md-8">
	<?php
}
add_action( 'woocommerce_after_main_content', 'estore_archive_content_wrapper_end', 25 );
function estore_archive_content_wrapper_end(){
	?>
	</div>
	<?php
}