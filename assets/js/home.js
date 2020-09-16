$(document).ready( function(){
	$('.home_slide_featured .slide_item li').hide();
	$('.home_slide_featured .slide_item li:first-child').show();
	$('.home_slide_featured .slide_menu p:first-child').addClass('active');
	$('.home_slide_featured .slide_menu p').click(function(){
		var class_name = $(this).attr("class");
		$('.home_slide_featured .slide_item li').hide();
		$('.home_slide_featured .slide_item li.' + class_name ).show();
		$('.home_slide_featured .slide_item li.' + class_name + ' div' ).show();
		$('.home_slide_featured .slide_item li.' + class_name + ' ul.album_block li' ).show();
		$('.home_slide_featured .slide_menu p').removeClass('active');
		$('.home_slide_featured .slide_menu p.' + class_name ).addClass('active');
	});
	$('.home_slide_featured .slide_item li div').click(function(){
		var class_name = $(this).parent().attr("class");
		album_id = class_name.substr(6);
		window.location.href = siteurl + 'album/' + album_id;
	});
	$('.home_slide_featured .slide_item ul.album_block li').show();
	$('.home_slide_featured .slide_item ul.album_block li').click(function(){
		var class_name = $(this).attr("class");
		album_id = class_name.substr(6);
		$('.home_slide_featured .slide_item li div').hide();
		$('.home_slide_featured .slide_item li div.album_' + album_id).show();
	});
	
	$('.home_top_chart_header').hide();
	$('.home_top_chart_body div').hide();
	$('.home_top_chart .track_header').show();
	$('.home_top_chart_body div.track_body').show();
	$('.home_top_chart_track').addClass(' active');
	$('.home_top_chart ul.chart_header li a').click(function(e) {
		var class_name = $(this).attr("class");
		var show_name = class_name.substr(15);
		$('.home_top_chart ul.chart_header li a').removeClass(' active');
		$(this).addClass(' active');
		$('.home_top_chart_header').hide();
		$('.home_top_chart .' + show_name + '_header').show();
		$('.home_top_chart_body div').hide();
		$('.home_top_chart_body div.' + show_name + '_body').show();
	});
});




