<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>	<?php if(!empty($title)) { echo $title; } ?></title>
	<link href="<?php echo base_url();?>assets/css/admin.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url();?>assets/css/base/jquery.ui.all.css" rel="stylesheet" type="text/css" >
	
	<script language="javascript" type="text/javascript">var siteurl='<?php echo base_url();?>';</script>
	<script src="<?php echo base_url();?>assets/js/jquery-1.8.2.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>assets/js/jquery-ui-1.9.1.custom.js" type="text/javascript"></script>
	<script   src="<?php echo base_url();?>assets/js/ui/jquery.ui.widget.js" type="text/javascript"></script>
	<script   src="<?php echo base_url();?>assets/js/ui/jquery.ui.accordion.js" type="text/javascript"></script>
	<script   src="<?php echo base_url();?>assets/js/ui/jquery.ui.datepicker.js" type="text/javascript"></script>
	<script   src="<?php echo base_url();?>assets/js/ui/jquery.ui.tabs.js" type="text/javascript"></script>
	<script   src="<?php echo base_url();?>assets/js/ui/jquery.ui.tooltip.js" type="text/javascript"></script>
	<script   src="<?php echo base_url();?>assets/js/admin.js" type="text/javascript"></script>
	
	<?php if( $this->router->fetch_class() == "admin_cms" ) { ?>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/tinymce/jscripts/tiny_mce/jquery.tinymce.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/tinymce.js"></script>
	<?php } ?>

	<?php if( file_exists( 'assets/css/'.$this->router->fetch_class().'.css' )) { ?>
		<link href="<?php echo base_url();?>assets/css/<?php echo $this->router->fetch_class(); ?>.css" rel="stylesheet" type="text/css" />
	<?php } ?>
	<?php if( file_exists( 'assets/js/'.$this->router->fetch_class().'.js' )) { ?>
		<script   src="<?php echo base_url();?>assets/js/<?php echo $this->router->fetch_class(); ?>.js" type="text/javascript"></script>
	<?php } ?>
</head>
<?php
$id_admin = $this->session->userdata( "id_admin" );
$admins_info = $this->get_contents->get_data_items( "employee", "id", $id_admin, "id_profiles" );
$id_profiles = $admins_info[0]->id_profiles;
?>
<body>
	<div id="page">
		<div id="border-top" class="h_blue"><a href="<?php echo base_url();?>admin/dashboard"><span class="title">Administration</span> </a></div>
		<div id="header-box">
			<div id="module-menu">
				<ul id="menu" >
					<?php if( $id_profiles != 3 ) { ?>
					<li><a href="<?php echo base_url();?>admin_category">Category</a></li>
					<li><a href="<?php echo base_url();?>admin_subcategory">Subcategory</a></li>
					<li><a href="<?php echo base_url();?>admin_product">Products</a></li>
					<?php } if( $id_profiles != 2 ) { ?>
					<li><a href="<?php echo base_url();?>admin_user">User</a></li>
					<li><a href="<?php echo base_url();?>admin_payment">Payment</a></li>
					<li><a href="<?php echo base_url();?>admin_report/delivery">Delivery Report</a></li>
					<?php } if( $id_profiles == 1 ) { ?>
					<li><a href="<?php echo base_url();?>admin_cms">CMS</a></li>
					<li><a href="<?php echo base_url();?>admin_employee">Employee</a></li>
					<li><a href="<?php echo base_url();?>admin_setting">Setting</a></li>
					<?php } ?>
				</ul>
		</div>
		<div id="module-status"><span class="viewsite"><a href="<?php echo base_url(); ?>" target="_blank">View Site</a></span><span class="logout"><a href="<?php echo base_url();?>admin/logout">Log out</a></span> </div>
			<div class="clr"></div>
		</div>