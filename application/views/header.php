<!DOCTYPE HTML>
<html>
<head>
	<?php $title = $this->get_contents->get_title(); ?>
	<script src="<?php echo base_url();?>assets/js/html5shiv.js" type="text/javascript"></script>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title><?php if(!empty($title)) { echo $title; } ?></title>
	<link href="<?php echo base_url();?>assets/css/popup.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url();?>assets/css/ddsmoothmenu.css" rel="stylesheet" type="text/css" />
    <!--[if IE]>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/ie_style.css" />
    <![endif]-->
	<script type="text/javascript">var siteurl='<?php echo base_url();?>';</script>
	<script src="<?php echo base_url();?>assets/js/jquery-1.8.2.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>assets/js/popup.js" type="text/javascript"></script>
	<?php if( file_exists( 'assets/css/'.$this->router->fetch_class().'.css' )) { ?>
		<link href="<?php echo base_url();?>assets/css/<?php echo $this->router->fetch_class(); ?>.css" rel="stylesheet" type="text/css" />
	<?php } ?>
	<?php if( file_exists( 'assets/js/'.$this->router->fetch_class().'.js' )) { ?>
		<script src="<?php echo base_url();?>assets/js/<?php echo $this->router->fetch_class(); ?>.js" type="text/javascript"></script>
	<?php } ?>
	<script src="<?php echo base_url();?>assets/js/core.js" type="text/javascript"></script>
	<!--[if IE 7]>
	  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/caliographic-ie7.css">
	<![endif]-->
	<script src="<?php echo base_url();?>assets/js/ddsmoothmenu.js" type="text/javascript"></script>
	<script type="application/javascript">
		ddsmoothmenu.init({
			mainmenuid: "smoothmenu",
			orientation: 'h',
			classname: 'ddsmoothmenu',
			contentsource: "markup"
		});
	</script>
</head>
<body>
	<div id="wrapper">
		<div class="header">
            <div class="banner">
				<div class="site_name"><a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>assets/images/logo.png" ></a></div>
				<div class="banner_right">
					<div class="top_right_nav">
					<a href="<?php echo base_url(); ?>home/user" class="top_nav_account">Account</a> | 
					<a href="<?php echo base_url(); ?>cart" class="top_nav_cart">Cart</a>
					</div>
					<div class="top_right_block"><span>Hot Line:</span> 01915646596</div>
					<div class="top_right_hotline">
						<ul>
							<!-- <li class="sk_icon">kamrul979</li> -->
							<li class="tw_icon"></li>
							<!-- <li class="ka_icon">hmk070916</li> -->
							<li class="fb_icon"></li>
						</ul>
						<div class="clear"> </div>
					</div>
				</div>
				<div class="clear"> </div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="menu">
			<div id="smoothmenu" class="ddsmoothmenu">
				<ul>
					<li class="<?php if( isset( $menu_active ) && $menu_active == "home" ) echo "actvie"?>"><a href="<?php echo base_url(); ?>">Home</a></li>
					<?php
					$category_nav = $this->get_contents->get_data_items( "category", "active", "1", "*" );
					if( $category_nav != "" ) {
						foreach( $category_nav as $nav ) {
							echo "<li class='" . ( isset( $menu_active ) && $menu_active == $nav->category_name ? "actvie" : "" ) . "'><a href='" . base_url() . "home/content/category/$nav->id/'>$nav->category_name</a>";
							$subcategory_nav = $this->get_contents->get_data_items( "subcategory", "id_category = $nav->id AND active = ", 1, "*" );
							if( $subcategory_nav != "" ) {
								echo "<ul>";
								foreach( $subcategory_nav as $nav_sub ) echo "<li class='" . ( isset( $menu_subactive ) && $menu_subactive == $nav_sub->subcategory_name ? "actvie_sub" : "" ) . "'><a href='" . base_url() . "home/content/subcategory/$nav_sub->id/'>$nav_sub->subcategory_name</a>";
								echo "</ul>";
							}
							echo "</li>";
						}
					}
					?>
				</ul>
			</div>
			<div class="header_search">
				<input type="button" name="header_search_button" class="header_search_button" value=" " />
				<input type="text" name="header_search_input" class="header_search_input" value="" />
			</div>
			<div class="clear"></div>
		</div>
		<div class="content">
			<?php if( !isset( $banner )) { ?>
			<div class="width_1000 back_white" style="text-align: right; height: 20px;"><br>&nbsp;</div>
			<?php } ?>