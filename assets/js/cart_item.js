$(document).ready( function(){
	$('.delivery_method').click(function(e) {
		$.ajax({
			url: siteurl + 'cart_item/change_delivery_method',
			type: "POST",
			data:{ method_val:$(this).val() },
			success: function(data) {						 
				eval(data);
			}
		});
	});
});