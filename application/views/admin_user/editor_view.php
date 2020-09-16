<div id="content-box">
	<div id="langbutton">
		<div id="titletext"><h2>User: <?php echo isset( $row['id'] ) ? "Edit" : "Add"; ?></h2></div>
		<?php $url = base_url(). $this->router->fetch_class(); ?>
		<p class="back_list" ><a href="<?php echo $url; ?>"><img src="<?php echo base_url();?>/assets/images/back.png" title="Back" /></a><br />Back</p>
	</div>	

	<form action="<?php echo isset( $row['id'] ) ? "$url/edit/$row[id]" : "$url/add"; ?>" method="post" id="langform">
		<fieldset id="langfieldset">
			<legend id="langlegend"><?php echo isset( $row['id'] ) ? "Edit" : "Add"; ?> User:</legend>			

			<?php if( validation_errors() ) { ?><div class="errorReport"> <?php echo validation_errors(); ?></div><?php } ?>
			<div class="errorReport"> <?php if( isset( $error_message )) echo $error_message; ?></div>			

			<label>Email ID:</label>
			<div class="margin-form">
				<input type="email" name="email" value="<?php if( isset( $row['email'] ) ) echo $row['email']; ?>" required="required" /> 
				<sup>*</sup>
			</div>
			<div class="clear"></div>			

			<label>Login Password:</label>
			<div class="margin-form">
				<input type="password" name="password" <?php echo isset( $row['id'] ) ? '' : 'required="required"'; ?> /> 
				<sup>*</sup>
			</div>
			<div class="clear"></div>			

			<label>Full Name:</label>
			<div class="margin-form">
				<input type="text" name="fullname" value="<?php if( isset( $row['fullname'] ) ) echo $row['fullname']; ?>" /> 
				<sup>*</sup>
			</div>
			<div class="clear"></div>			

			<label>Phone No:</label>
			<div class="margin-form">
				<input type="text" name="phone_no" value="<?php if( isset( $row['phone_no'] ) ) echo $row['phone_no']; ?>" required="required" />
				<sup>*</sup>
			</div>
			<div class="clear"></div>			

			<label>Address:</label>
			<div class="margin-form">
				<input type="text" name="address" value="<?php if( isset( $row['address'] ) ) echo $row['address']; ?>" />
				<sup>*</sup>
			</div>
			<div class="clear"></div>			

			<label>City/Town Name:</label>
			<div class="margin-form">
				<input type="text" name="city" value="<?php if( isset( $row['city'] ) ) echo $row['city']; ?>" />
				<sup>*</sup>
			</div>
			<div class="clear"></div>			

			<label>State/Region Name:</label>
			<div class="margin-form">
				<input type="text" name="state" value="<?php if( isset( $row['state'] ) ) echo $row['state']; ?>" />
				<sup>*</sup>
			</div>
			<div class="clear"></div>			

			<label>Country Name:</label>
			<div class="margin-form">
				<select  name="country" id="country" required="required">
					<option value="">Select Country</option>
					<?php if( $countries != '' ) foreach( $countries as $country_name ) echo "<option value='$country_name' ".( isset( $row['country'] ) && $row['country'] == $country_name ? "selected='selected'" : "" ).">$country_name</option>"; ?>
				</select>
				<sup>*</sup>
			</div>
			<div class="clear"></div>			

			<label>Zip Code:</label>
			<div class="margin-form">
				<input type="text" name="zip_code" value="<?php if( isset( $row['zip_code'] ) ) echo $row['zip_code']; ?>" required="required" />
				<sup>*</sup>
			</div>
			<div class="clear"></div>

			<label> </label>
			 <div class="margin-form">
				<input type="hidden" name="cmd" value="add" />
				<input type="submit" value="Submit"  class="formsubmit"/>
			</div>
			<div class="clear"></div>		

		</fieldset>
    </form>
</div>