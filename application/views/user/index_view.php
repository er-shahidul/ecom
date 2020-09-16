<script>
	$(document).ready(function(e) {

		function fresh(){
			$('#MyAccountDetails, #MyCartDetails, #MyOrderDetails, #MyReviewDetails, #MyRatingsDetails, #MySonglistDetails').hide();
		}
		function presenting(id){
			id.show('fast');
		}
		fresh();
			$('#MyAccountDetails').show();
			$('ul.user_menu li').click(function(){
			$('ul.user_menu li').removeClass(' on').addClass(' off');
			$(this).removeClass(' off').addClass(' on');
			fresh();
			presenting($('#'+$(this).attr("id")+'Details'));
		});
		
		$('.my_account_details > div').hide();
		var menus = $('#PersonalInformation, #ChangePassword, #DeliveryAddress');
		<?php
		if( $user_menu == "password" ) echo "$('#ChangePasswordDetails').show();menus.removeClass('active').addClass('inactive');$('#ChangePassword').removeClass('inactive').addClass('active');";
		else if( $user_menu == "address" ) echo "$('#DeliveryAddressDetails ').show();menus.removeClass('active').addClass('inactive');$('#DeliveryAddress').removeClass('inactive').addClass('active');";
		else echo "$('#PersonalInformationDetails').show();";
		?>
		menus.click(function()
		{ 
			$('.my_account_details > div').removeClass('expanded').addClass('collapsed').hide();
			menus.removeClass('active').addClass('inactive');
			$(this).removeClass('inactive').addClass('active');
			var target = $('#'+$(this).attr("id")+'Details');
			target.removeClass('collapsed').addClass('expanded');
			presenting(target);
			$('div.error').remove();
			$('div.success').remove();
		});
	});
</script>

<div class="content_full">
	<div class="my_account_left_column">
		<ul class="user_menu">
		<li id="MyAccount" class="on">Account Info</li>
		<li id="MyCart">View Cart</li>
		<li id="MyOrder">Order Summury</li>
		<li id="MyReview" style="display:none">My Review</li>
		<li id="MyRatings" style="display:none">My Ratings</li>
		<li id="MySonglist" style="display:none">My Song list</li>
		<li onclick="window.location.href='<?php echo base_url() . "user/signout"; ?>'">Sigout</li>
		</ul>
	</div>
	<div class="my_account_right_column">
		<div id="MyAccountDetails">
			<div class="my_account_menu">
				<div class="menu_separator"></div><div id="PersonalInformation" class="active">Personal Information</div>
				<div class="menu_separator"></div><div id="ChangePassword" class="inactive">Change Password</div>
				<div class="menu_separator"></div><div id="DeliveryAddress" class="inactive">Delivery Address</div>
				<div class="menu_separator last"></div>
			</div>
			
			<?php if( validation_errors() || ( isset( $error ) && $error != "" )) { ?><div class="error clear" style="padding-top: 20px; margin-bottom: -25px;"> <?php if( validation_errors() ) echo validation_errors(); if( isset( $error ) && $error != "" ) echo $error; ?></div><?php } ?>
			<?php if( $this->session->userdata( "massage" )) { echo '<div class="success clear" style="padding-top: 20px; margin-bottom: -25px;"><p>Successfull updated <b>' . $this->session->userdata( "massage" ) . '<b></p></div>'; $this->session->unset_userdata( "massage" ); } ?>
			<div class="my_account_details clear">
				<div id="PersonalInformationDetails" class="expanded">
					<form action="<?php echo base_url();?>user/update" name="form_details" method="post">
						<div class="clear"><div class="label"></div><div></div><div id="pif_note" class="notif"></div></div>
						<div class="clear"><div class="label">Full Name</div><div>:</div><div><input type="text" name="fullname" class="fullname" id="fullname" value="<?php echo $user['fullname']; ?>" required="required" /></div></div>
						<div class="clear"><div class="label">Phone No</div><div>:</div><div><input type="text" name="phone_no" class="phone_no" id="phone_no" value="<?php echo $user['phone_no']; ?>" required="required" /></div></div>
						<div class="clear"><div class="label">E-mail</div><div>:</div><div><input type="text" name="email" class="email" id="email" value="<?php echo $user['email']; ?>" required="required" /></div></div>
						<div class="clear"><div class="label">Address</div><div>:</div><div><textarea name="address" class="address" id="address" required="required"><?php echo $user['address']; ?></textarea></div></div>
						<div class="clear"><div class="label">City</div><div>:</div><div><input type="text" name="city" class="city" id="city" value="<?php echo $user['city']; ?>" required="required" /></div></div>
						<div class="clear"><div class="label">State</div><div>:</div><div><input type="text" name="state" class="state" id="state" value="<?php echo $user['state']; ?>" required="required" /></div></div>
						<div class="clear">
							<div class="label">Country</div><div>:</div>
							<div>
								<select name="id_country" id="id_country" required="required">
									<option value="">Select Country</option>
									<?php foreach( $country as $row ) { ?>
									<option value = "<?php echo $row->id;?>" <?php if( $row->id == $user['id_country'] ) echo ' selected = "selected"';?>><?php echo $row->name;?></option>
									<?php } ?>
								</select>
							</div>
						</div>
						<div class="clear"><input type="submit" name="submit_details" class="sub_button" value="Submit" /></div>
					</form>
				</div>
				<div id="ChangePasswordDetails" class="expanded">
					<form action="<?php echo base_url();?>user/update" name="form_password" method="post">
						<div class="clear"><div class="label"></div><div></div><div id="password_note" class="notif"></div></div>
						<div class="clear"><div class="label">Old Password</div><div>:</div><div><input type="password" name="old_password" class="old_password" id="old_password" value="" required="required" /></div><div id="check_old"></div></div>
						<div class="clear"><div class="label">New Password</div><div>:</div><div><input type="password" name="new_password" class="new_password" id="new_password" value="" required="required" /></div></div>
						<div class="clear"><div class="label">Confirm Password</div><div>:</div><div><input type="password" name="retype_password" class="retype_password" id="retype_password" value="" required="required" /></div><div id="check_new"></div></div>
						<div class="clear">&nbsp;&nbsp;<input type="submit" name="submit_password" class="sub_button" value="Submit" /></div>
					</form>
				</div>
				<div id="DeliveryAddressDetails" class="expanded">
					<form action="<?php echo base_url();?>user/update" name="form_address" method="post">
						<div class="clear"><div class="label"></div><div></div><div id="address_note" class="notif"></div></div>
						<div class="clear"><div class="label">Full Name</div><div>:</div><div><input type="text" name="fullname" class="fullname" id="fullname" value="<?php echo $user_address != "" ? $user_address['fullname'] : ""; ?>" required="required" /></div></div>
						<div class="clear"><div class="label">Phone No</div><div>:</div><div><input type="text" name="phone_no" class="phone_no" id="phone_no" value="<?php echo $user_address != "" ? $user_address['phone_no'] : ""; ?>" required="required" /></div></div>
						<div class="clear"><div class="label">E-mail</div><div>:</div><div><input type="text" name="email" class="email" id="email" value="<?php echo $user_address != "" ? $user_address['email'] : ""; ?>" required="required" /></div></div>
						<div class="clear"><div class="label">Address</div><div>:</div><div><textarea name="address" class="address" id="address" required="required"><?php echo $user_address != "" ? $user_address['address'] : ""; ?></textarea></div></div>
						<div class="clear"><div class="label">City</div><div>:</div><div><input type="text" name="city" class="city" id="city" value="<?php echo $user_address != "" ? $user_address['city'] : ""; ?>" required="required" /></div></div>
						<div class="clear"><div class="label">State</div><div>:</div><div><input type="text" name="state" class="state" id="state" value="<?php echo $user_address != "" ? $user_address['state'] : ""; ?>" required="required" /></div></div>
						<div class="clear">
							<div class="label">Country</div><div>:</div>
							<div>
								<select name="id_country" id="id_country" required="required">
									<option value="">Select Country</option>
									<?php  foreach( $country as $row ) { ?>
									<option value = "<?php echo $row->id;?>" <?php if( $user_address != "" && $row->id == $user_address['id_country'] ) echo ' selected = "selected"';?>><?php echo $row->name;?></option>
									<?php } ?>
								</select>
							</div>
						</div>
						<div class="clear"><input type="submit" name="submit_address" class="sub_button" value="Submit" /></div>
					</form>
				</div>
			</div>
		</div>
		<div id="MyCartDetails">My Cart</div>
		<div id="MyOrderDetails">My Order</div>
		<div id="MyReviewDetails">My Review</div>
		<div id="MyRatingsDetails">My Ratings</div>
		<div id="MySonglistDetails">My Song list</div>     
	</div>
	<div class="clear"></div>
</div>