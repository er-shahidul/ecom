<div id="content-box">
	<div id="langbutton">
		<div id="titletext"><h2>Setting: Edit</h2></div>
		<?php $url = base_url(). $this->router->fetch_class(); ?>
		<p class="add_new" ><a href="<?php echo $url; ?>/home_banner"><img src="<?php echo base_url();?>/assets/images/process-icon-new.png" /></a><br />Home Banner Images</p>
	</div>

	<form action="<?php echo base_url(). $this->router->fetch_class(); ?>" method="post" id="langform" enctype="multipart/form-data">
		<fieldset id="langfieldset">
			<legend id="langlegend"><?php echo isset( $row['id'] ) ? "Edit" : "Add"; ?> Setting:</legend>			

			<?php if( validation_errors() ) { ?><div class="errorReport"> <?php echo validation_errors(); ?></div><?php } ?>
			<div class="errorReport"> <?php if( isset( $error_message )) echo $error_message; ?></div>
			

			<label>Site Title:</label>
			<div class="margin-form">
				<input type="text" name="title" value="<?php echo $row['title']; ?>" required="required" style="width: 200px;" />
			</div>
			<div class="clear"></div>			

			<label>Delivery Notification Emails:</label>
			<div class="margin-form">
				<input type="text" name="emails" value="<?php echo $row['emails']; ?>" style="width: 200px;" />
			</div>
			<div class="clear"></div>		

			<label>Mobile Bank No:</label>
			<div class="margin-form">
				<input type="text" name="bkash_mobile" value="<?php echo $row['bkash_mobile']; ?>" required="required" />
			</div>
			<div class="clear"></div>

			<label>Mobile Bank User Name:</label>
			<div class="margin-form">
				<input type="text" name="bkash_username" value="<?php echo $row['bkash_username']; ?>" required="required" />
			</div>
			<div class="clear"></div>

			<label>Mobile Bank Password:</label>
			<div class="margin-form">
				<input type="text" name="bkash_password" value="<?php echo $row['bkash_password']; ?>" required="required" />
			</div>
			<div class="clear"></div>

			<label>Mobile Bank Url:</label>
			<div class="margin-form">
				<input type="text" name="bkash_url" value="<?php echo $row['bkash_url']; ?>" required="required" style="width: 500px;" />
			</div>
			<div class="clear"></div>

			<label>Site Logo:</label>
			<div class="margin-form">
				<input type="file" name="phy_path" /> <span style="margin-left: 30px;"> Image Validation:- Width Max 250px, Height Max 90px, Image File PNG </span>
				<br /><br />
				<img src="<?php echo base_url(); ?>assets/images/logo.png" width="100" /> Current Logo
			</div>
			<div class="clear"></div>

			<label> </label>
			 <div class="margin-form">
				<input type="hidden" name="cmd" value="add" />
				<input type="submit" name="submit" value="Submit"  class="formsubmit"/>
			</div>
			<div class="clear"></div>		

		</fieldset>
    </form>
</div>