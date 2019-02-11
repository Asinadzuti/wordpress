<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
// Change number or products per row to 3
add_filter('loop_shop_columns', 'my_loop_columns', 99);
function my_loop_columns() {
		return 3; // 4 products per row
}
?>