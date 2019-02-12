<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
add_action( 'woocommerce_before_main_content', 'estore_archive_wrapper_start', 40 );
function estore_archive_wrapper_start(){
?>
	<div class="container">
		<div class="row">
			<div class="w3ls_mobiles_grids">
<?php
}
add_action( 'woocommerce_after_main_content', 'estore_archive_wrapper_end', 30 );
function estore_archive_wrapper_end(){
?>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<?php
}

add_action( 'woocommerce_before_main_content', 'estore_archive_content_wrapper_start', 60 );
function estore_archive_content_wrapper_start(){
	?>
	<div class="col-lg-8">
	<?php
}
add_action( 'woocommerce_after_main_content', 'estore_archive_content_wrapper_end', 25 );
function estore_archive_content_wrapper_end(){
	?>
	</div>
	<?php
}