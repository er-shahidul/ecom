<script type="text/javascript">
	$(document).ready(function(e) {
		$('.tr_name').hide();
		$('.tr_confirm').hide();
		$('a.user_link').hide();
		$('.tr_name input').removeAttr('Required');
		$('.tr_confirm input').removeAttr('Required');
		$('.reset_link').click(function(e) {
			$('.reset_link').hide();
			$('.tr_password').hide();
			$('.tr_confirm').hide();
			$('a.user_link').show();
			$('a.signup_link').show();
			$('.tr_name').show();
			$('h2.cms_title span').text( "Reset Password" );
			$('.tr_password input').removeAttr('Required');
			$('.tr_confirm input').removeAttr('Required');
			$('.tr_name input').attr('Required', true );
			$('.submit_type').val( 'reset' );
		});
		$('.signup_link').click(function(e) {
			$('.signup_link').hide();
			$('.tr_name').show();
			$('.tr_password').show();
			$('.tr_confirm').show();
			$('a.user_link').show();
			$('a.reset_link').show();
			$('h2.cms_title span').text( "New Signup" );
			$('.tr_name input').attr('Required', true );
			$('.tr_password input').attr('Required', true );
			$('.tr_confirm input').attr('Required', true );
			$('.submit_type').val( 'signup' );
		});
		$('.user_link').click(function(e) {
			$('.tr_name').hide();
			$('.tr_confirm').hide();
			$('a.user_link').hide();
			$('.tr_password').show();
			$('a.signup_link').show();
			$('a.reset_link').show();
			$('h2.cms_title span').text( "User Login" );
			$('.tr_name input').removeAttr('Required');
			$('.tr_confirm input').removeAttr('Required');
			$('.tr_password input').attr('Required', true );
			$('.submit_type').val( 'login' );
		});
		<?php if( isset( $submit_type ) && $submit_type != "" ) { if( $submit_type == "login" ) { ?>
		$('.tr_name').hide();
		$('.tr_confirm').hide();
		$('a.user_link').hide();
		$('.tr_password').show();
		$('a.signup_link').show();
		$('a.reset_link').show();
		$('h2.cms_title span').text( "User Login" );
		$('.tr_name input').removeAttr('Required');
		$('.tr_confirm input').removeAttr('Required');
		$('.tr_password input').attr('Required', true );
		$('.submit_type').val( 'login' );
		<?php } else if( $submit_type == "signup" ) { ?>
		$('.signup_link').hide();
		$('.tr_name').show();
		$('.tr_password').show();
		$('.tr_confirm').show();
		$('a.user_link').show();
		$('a.reset_link').show();
		$('h2.cms_title span').text( "New Signup" );
		$('.tr_name input').attr('Required', true );
		$('.tr_password input').attr('Required', true );
		$('.tr_confirm input').attr('Required', true );
		$('.submit_type').val( 'signup' );
		<?php } else if( $submit_type == "reset" ) { ?>
		$('.reset_link').hide();
		$('.tr_password').hide();
		$('.tr_confirm').hide();
		$('a.user_link').show();
		$('a.signup_link').show();
		$('.tr_name').show();
		$('h2.cms_title span').text( "Reset Password" );
		$('.tr_password input').removeAttr('Required');
		$('.tr_confirm input').removeAttr('Required');
		$('.tr_name input').attr('Required', true );
		$('.submit_type').val( 'reset' );
		<?php }} ?>
	});
</script>
<div class="width_1000 back_white">
	<div class="float_left width_700 border_right">
		<h2 class="cms_title">User Account : <span>User Login<span></h2>
		<div class="home_user">
			<form method="post" action="<?php echo base_url(); ?>home/user" name="user_action">
				<table width="100%" cellpadding="5" cellspacing="0" border="0">
					<?php if( isset( $error ) && $error != "" ) echo "<tr class='error'><td colspan='2'>$error</td></tr>"; ?>
					<tr class="tr_name">
						<td>Enter Your Full Name</td>
						<td>: <input type="text" name="name" value="" required="required" /></td>
					</tr>
					<tr>
						<td width="25%">Enter Your Email ID</td>
						<td>: <input type="email" name="email" value="" required="required" /></td>
					</tr>
					<tr class="tr_password">
						<td>Enter A Login Password</td>
						<td>: <input type="password" name="password" value="" required="required" /></td>
					</tr>
					<tr class="tr_confirm">
						<td>Confirm Login Password</td>
						<td>: <input type="password" name="cpassword" value="" required="required" /></td>
					</tr>
					<tr>
						<td> </td>
						<td>
							: 
							<input type="submit" name="submit" value="Submit" /> 
							<input type="button" name="cancel" value="Cancel" onclick="window.location.href='<?php echo base_url(); ?>'" />
							<input type="hidden" name="submit_type" value="login" class="submit_type" /> 
						</td>
					</tr>
					<tr>
						<td> </td>
						<td style="text-align: right;">
							<a href="javascript:void();" class="user_link">User Login</a>
							<a href="javascript:void();" class="signup_link">New Signup</a>
							<a href="javascript:void();" class="reset_link">Reset Password</a>
						</td>
					</tr>
				</table>
			</form>
		</div>
	</div>
	<?php $this->load->view( 'home/right_view' ); ?>
	<div class="clear"></div>
</div>
