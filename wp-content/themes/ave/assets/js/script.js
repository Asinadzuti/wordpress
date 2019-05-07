jQuery(document).ready(function($){
	$('.search-field').keypress(function(eventObject){
		var searchTerm = $(this).val();
		if(searchTerm.length > 2){
			$.ajax({
				url : '/wordpress/wp-admin/admin-ajax.php',
				type: 'POST',
				data:{
					'action':'codyshop_ajax_search',
					'term'  :searchTerm
				},
				success:function(result){
					$('.codyshop-ajax-search').fadeIn().html(result);
				}
			});
		}
	});
});
