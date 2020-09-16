$(document).ready( function(){
	
	$('.menu ul').on( 'mouseenter', function() {
		$('.menu li.actvie').addClass('inactvie');
		$('.menu li.inactvie').removeClass('actvie');
	});
	$('.menu ul').on( 'mouseleave', function() {
		$('.menu li.inactvie').addClass('actvie');
		$('.menu li.actvie').removeClass('inactvie');
	});
	
	$('.featured_item_block_full').hide();
	$('.featured_item_block_container .featured_item_block_full:first-child').show();
	$('.featured_item_block_nav ul li').click( function() {
		$(this).parent('ul').children('li').children('img').attr('src', siteurl + 'assets/images/featured_item_block_nav.png');
		$(this).children('img').attr('src', siteurl + 'assets/images/featured_item_block_nav_over.png');
		$(this).closest('.featured_item_block').children('.featured_item_block_container').children('.featured_item_block_full').hide();
		var block_name = $(this).attr("class");
		var block_id = block_name.substr(13);
		var block_view = "featured_item_" + block_id;
		$(this).closest('.featured_item_block').children('.featured_item_block_container').children('.' + block_view ).show();
		//alert( block_id );
	});
	
	$('.item_display_container').hide();
	$('.item_display_1').show();
	$('.item_display_nav ul li:first-child img').attr('src', siteurl + 'assets/images/featured_item_block_nav_over.png');
	$('.item_display_nav ul li').click( function() {
		$(this).parent('ul').children('li').children('img').attr('src', siteurl + 'assets/images/featured_item_block_nav.png');
		$(this).children('img').attr('src', siteurl + 'assets/images/featured_item_block_nav_over.png');
		$('.item_display_container').hide();
		var block_name = $(this).attr("class");
		var block_id = block_name.substr(17);
		var block_view = "item_display_" + block_id;
		$('.' + block_view ).show();
	});
	
	$('.top_ten_item .top_ten_content').hide();
	$('.top_ten_item').height('30');
	$('.top_ten_item:last-child').height('120');
	$('.top_ten_item:last-child .top_ten_content').show();
	$('.top_ten_item .top_ten_title').click( function() {
		$('.top_ten_item .top_ten_content').hide();
		$('.top_ten_item').height('30');
		$(this).parent('.top_ten_item').height('120');
		$(this).parent('.top_ten_item').children('.top_ten_content').show();
	});
	
	$('.menu .header_search .header_search_input').click( function() {
		$(this).width('120');
		$('.menu li a').css('width', '50px');
	});
	
	$('.menu .header_search .header_search_input').focusout(function() {
		$(this).width('90');
		$('.menu li a').css();
	});
	
	$('.music_player').hide();
	
	$('.login_my_account').live('submit',function(e){
		e.preventDefault();   
		var login_email = $('.login_email').val();
		var login_password = $('.login_password').val();
		if( login_email == '' ) {
			alert( 'Valid Email Required' );
			$('.login_email').focus();
			return false;
		}
		else if( login_password == '' ) {
			alert( 'Password Required' );
			$('.login_password').focus();
			return false;
		}
		$.ajax({
			url: siteurl + 'my_account/login_check',
			type: "POST",
			data:{ login_email:login_email,login_password:login_password },
			
			success: function(data) {
				if( data == 1 )
				{
					var url = siteurl+'my_account/index';
					$(location).attr('href',url);
				}
				else if( data == 2 ) $('.popup_massage_view').html( "Account password doesn't match with this email address." );
				else if( data == 3 ) $('.popup_massage_view').html( "This email address doesn't exit. You can create an account by this email." );
				else if( data == 4 ) $('.popup_massage_view').html( "This account is blocked by administrator. Contact us." );
				else if( data == 5 ) $('.popup_massage_view').html( "This account is deleted by administrator. Contact us or create new account." );
			}
		});
	});
	
	$('.forgot_my_account').live('submit',function(e){
		e.preventDefault();
		var forgot_email = $('.forgot_email').val();
		if( forgot_email == '' ) {
			alert( 'Valid Email Required' );
			$('.forgot_email').focus();
			return false;
		}
		$.ajax({
			url: siteurl + 'my_account/forgot_check',
			type: "POST",
			data:{ forgot_email:forgot_email },
			
			success: function(data) {
				if( data != 2 && data != 3 && data != 4 )
				{
					$('.popup_massage_view').html( data );
					//$('.popup_massage_view').html( "Please check inbox of this email for recover password link." );
				}
				else if( data == 2 ) $('.popup_massage_view').html( "This email address doesn't exit. You can create an account by this email." );
				else if( data == 3 ) $('.popup_massage_view').html( "This account is blocked by administrator. Contact us." );
				else if( data == 4 ) $('.popup_massage_view').html( "This account is deleted by administrator. Contact us or create new account." );
			}
		});
	});
	
	$('.signup_my_account').live('submit',function(e){
		e.preventDefault();   
		var signup_full_name = $('.signup_full_name').val();
		var signup_email_address = $('.signup_email_address').val();
		var signup_password = $('.signup_password').val();
		var signup_cpassword = $('.signup_cpassword').val();
		var signup_phone_no = $('.signup_phone_no').val();
		var signup_address = $('.signup_address').val();
		var signup_zip_code = $('.signup_zip_code').val();
		var signup_state = $('.signup_state').val();
		var signup_country = $('.signup_country').val();
		var signup_accept_terms = 0;
		if( $('.signup_accept_terms').is(':checked') ) signup_accept_terms = 1;
		
		if( signup_full_name == '' )
		{
			alert( 'Full Name Required' );
			$('.signup_full_name').focus();
			return false;
		}
		else if( signup_email_address == '' ) {
			alert( 'Valid Email Required' );
			$('.signup_email_address').focus();
			return false;
		}
		else if( signup_password == '' ) {
			alert( 'Password Required' );
			$('.signup_password').focus();
			return false;
		}
		else if( signup_cpassword == '' ) {
			alert( 'Confirm Password Required' );
			$('.signup_cpassword').focus();
			return false;
		}
		else if( signup_cpassword != signup_password ) {
			alert( 'Password & Confirm Password Dose Not Match' );
			$('.signup_cpassword').focus();
			return false;
		}
		else if( signup_phone_no == '' ) {
			alert( 'Phone Number Required' );
			$('.signup_phone_no').focus();
			return false;
		}
		else if( signup_address == '' ) {
			alert( 'Address Required' );
			$('.signup_address').focus();
			return false;
		}
		else if( signup_zip_code == '' ) {
			alert( 'Zip/Post Code Required' );
			$('.signup_zip_code').focus();
			return false;
		}
		else if( signup_state == '' ) {
			alert( 'State/District Required' );
			$('.signup_state').focus();
			return false;
		}
		else if( signup_country == '' ) {
			alert( 'Country Required' );
			$('.signup_country').focus();
			return false;
		}
		else if( signup_accept_terms == 0 ) {
			alert( 'Please Accept Terms & Condition' );
			$('#signup_accept_terms').focus();
			return false;
		}
		$.ajax({
			url: siteurl + 'my_account/signup_check',
			type: "POST",
			data:{
				signup_full_name:signup_full_name,
				signup_email_address:signup_email_address,
				signup_password:signup_password,
				signup_phone_no:signup_phone_no,
				signup_address:signup_address,
				signup_zip_code:signup_zip_code,
				signup_state:signup_state,
				signup_country:signup_country
			},
			success: function(data) {						 
				if( data == 'success' )
				{
					var url=siteurl + 'user_account/index';
					$(location).attr('href',url);
				}
				else $('.popup_massage_view').html(data);
			}
		});
	});
	
	$('.play_checked').click(function(e) {
		$('.submit_form').submit();
	});
	
	$('.cart_details').hide();
	
	$('.cart_block').mouseenter(function(e) {
		show_item();
	});
	$('.cart_block').mouseleave(function(e) {
		$('.cart_details').hide();
	});
	$('.cart_details').mouseenter(function(e) {
		$('.cart_details').show();
	});
	$('.cart_details').mouseleave(function(e) {
		$('.cart_details').slideUp(300,0,0);
	});
	
	$('.add_to_cart a').click(function(e) {
		var items = $('.cart_block .cart_item').text();
		var items_now = 1 + items * 1;
		$('.cart_block .cart_item').text(items_now);
		var class_name = $(this).attr("class");
		var album_id = class_name.substr(9);
		$.ajax({
			url: siteurl + 'cart_item/add_item',
			type: "POST",
			data:{ album_id:album_id },
			success: function(data) {						 
				eval(data);
			}
		});
	});
	
	$('.header_search_button').click(function(e) {
		var herader_search_val = $('.header_search_input').val();
		if( herader_search_val != null ) {
			window.location.href = siteurl + "home/search/" + herader_search_val;
		}
	});
	
	function show_item() {
		$.ajax({
			url: siteurl + 'cart_item/show_item',
			type: "POST",
			data:{ show_item:1 },
			success: function(data) {						 
				if( data != '' ) {
					$('.cart_details').html(data);
					$('.cart_details').slideDown(500,0,0);
				}
			}
		});
	}
	
	$('.add_to_cart').click(function(e) {
		window.location.href = siteurl + 'cart/add_item/' + $(this).attr("class").substr(20);
	});
	
});

