<?php
$id_admin = $this->session->userdata( "id_admin" );
$admins_info = $this->get_contents->get_data_items( "employee", "id", $id_admin, "id_profiles" );
$id_profiles = $admins_info[0]->id_profiles;
?>
<div id="content-box">
	<div id="element-box">
		<div id="system-message-container"></div>
		<div class="m">
			<div class="adminform">
				<div class="cpanel-left">
					<div class="cpanel">
						<?php if( $id_profiles != 3 ) { ?>
						<div class="icon-wrapper">
							<div class="icon"><a href="<?php echo base_url();?>admin_category"><img src="<?php echo base_url();?>/assets/images/admin/categories-icon.png" alt=""  /><span>Category</span></a></div>
						</div>
						<div class="icon-wrapper">
							<div class="icon"><a href="<?php echo base_url();?>admin_subcategory"><img src="<?php echo base_url();?>/assets/images/admin/categories-icon.png" alt=""  /><span>Sub-Category</span></a></div>
						</div>
						<div class="icon-wrapper">
							<div class="icon"><a href="<?php echo base_url();?>admin_product"><img src="<?php echo base_url();?>/assets/images/admin/categories-icon.png" alt=""  /><span>Product</span></a></div>
						</div>
						<?php } if( $id_profiles != 2 ) { ?>
						<div class="icon-wrapper">
							<div class="icon"><a href="<?php echo base_url();?>admin_user"><img src="<?php echo base_url();?>/assets/images/admin/User.png" alt=""  /><span>User</span></a></div>
						</div>
						<div class="icon-wrapper">
							<div class="icon"><a href="<?php echo base_url();?>admin_payment"><img src="<?php echo base_url();?>/assets/images/admin/Payment-Methods-Card-in-use-icon.png" alt=""  /><span>Payment</span></a></div>
						</div>
						<div class="icon-wrapper">
							<div class="icon"><a href="<?php echo base_url();?>admin_report/delivery"><img src="<?php echo base_url();?>/assets/images/traveller_icon.png" alt=""  /><span>Delivary Report</span></a></div>
						</div>
						<?php } if( $id_profiles == 1 ) { ?>
						<div class="icon-wrapper">
							<div class="icon"><a href="<?php echo base_url();?>admin_cms"><img src="<?php echo base_url();?>/assets/images/cms_icon.png" alt=""  /><span>CMS Manager</span></a></div>
						</div>
						<div class="icon-wrapper">
							<div class="icon"><a href="<?php echo base_url();?>admin_employee"><img src="<?php echo base_url();?>/assets/images/admin/provider.png" alt=""  /><span>Employee</span></a></div>
						</div>
						<div class="icon-wrapper">
							<div class="icon"><a href="<?php echo base_url();?>admin_setting"><img src="<?php echo base_url();?>/assets/images/admin/Setting-icon.png" alt=""  /><span>Setting</span></a></div>
						</div>
						<?php } ?>
					</div>
				</div>
			</div>
			<div class="clr"></div>
		</div>
	</div>
</div>
