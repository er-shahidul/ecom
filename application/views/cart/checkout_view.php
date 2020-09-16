<script type="text/javascript">
	$(document).ready(function(e) {
		$('#password').hide();
		$('.checkout_password').click(function(e) {
			$('#password').show();
			$('.password').attr('required', true);
		});
		$('.checkout_guest').click(function(e) {
			$('#password').hide();
			$('.password').removeAttr('required');
		});
		$('.payment_content div').hide();
		$('.payment_content div:last-child').show();
		$('.payment_nav li').click(function(e) {
			var payment_name = $(this).attr("class");
			var payment_name_view = payment_name + "_view";
			$('.payment_content div').hide();
			$('.payment_content div.' + payment_name_view).show();
			$('.payment_nav li').removeClass('payment_active');
			$(this).addClass('payment_active');
		});
		$('.billing_details').hide();
		$('.billing_status_same').click(function(e) {
			$('.billing_details').hide();
			$('.billing_details input').removeAttr('required');
			$('.billing_details textarea').removeAttr('required');
		});
		$('.billing_status_new').click(function(e) {
			$('.billing_details').show();
			$('.billing_details input').attr('required', true);
			$('.billing_details textarea').attr('required', true);
			$('.billing_details input[type="submit"]').removeAttr('required');
		});
		$('.bkash_radio').click(function(e) {
			$('.billing_details').show();
			$(this).parent().parent('.bkash_payment_view').children('div.bkash_payment_form').show();
		});
		var bkash_view = 0;
		<?php if( $payment == "bkash" ) echo "bkash_view = 1;"; ?>
		if( bkash_view == 1 ) {
			$('.payment_nav li:last-child').addClass('payment_active');
			$('.payment_content div.bkash_payment_view').show();
			$('div.bkash_payment_form').show();
			$('.payment_view_massage').hide();
			$('.bkash_radio').attr('checked', true);
		}
	});
</script>
<?php
if( isset( $view ) && $view != 'email' ) $country = $this->get_contents->get_data_items( "country", "", "", "*", "name" );
?>
<div class="content_full">
    <div class="checkout">
		<div class="float_left">
			<div class="checkout_title">Checkout</div>
			<div class="checkout_left">
				<div class="checkout_nav">
					<ul>
						<li <?php if( $view == 'email' ) echo 'class="active_checkout"'; ?>>
							<a href="<?php echo base_url() . "cart/checkout/email"; ?>">Email Or Login</a>
						</li>
						<li <?php if( $view == 'delivery' ) echo 'class="active_checkout"'; ?>>
							<a href="<?php echo base_url() . "cart/checkout" . ( $delivery != "" ? "/delivery" : "" ); ?>">Delivery Address</a>
						</li>
						<li <?php if( $view == 'payment' ) echo 'class="active_checkout"'; ?>>
							<a href="<?php echo base_url() . "cart/checkout" . ( $payment != "" ? "/payment" : "" ); ?>">Payment Details</a>
						</li>
					</ul>
					<div class="clear"> </div>
				</div>
				<div class="checkout_content">
					<?php
					$error = $this->session->userdata( "error" );
					if( $error != '' && $payment != "bkash" ) {
						echo '<div class="error">' . $this->session->userdata( "error" ) . '</div>';
						$this->session->unset_userdata( "error" );
					}
					if( $view == 'email' ) {
					?>
					<div class="checkout_login">
						<form action="<?php echo base_url(); ?>cart/login" method="post">
							<table width="100%" cellpadding="5" cellspacing="0" border="0">
								<tr>
									<td width="35%" align="right">Enter your email address <br /><span>(required)</span></td>
									<td><input type="email" name="email" value="<?php echo isset( $email ) ? $email : ""; ?>" required="required" /></td>
								</tr>
								<tr>
									<td> </td>
									<td><input type="radio" name="status" value="yes" class="checkout_password" <?php echo $user != "" ? " checked='checked'" : ""; ?> required="required" /> Continue with a password<br/><span>(Sign in to your account for a faster checkout)</span></td>
								</tr>
								<tr id="password">
									<td></td>
									<td>Password <input type="password" name="password" value="" class="password" /><br /> <a href="#">Forgot Password</a></td>
								</tr>
								<tr>
									<td></td>
									<td><input type="radio" name="status" value="no" class="checkout_guest" <?php echo $user == "" && $email != "" ? " checked='checked'" : ""; ?> required="required" /> Continue as a guest<br/><span>(No password or registration required)</span></td>
								</tr>
								<tr>
									<td></td>
									<td><input type="submit" value="Continue" /></td>
								</tr>
							</table>
						</form>
					</div>
					<?php } else if( $view == 'delivery' ) { ?>
					<div class="checkout_delivery">
						<form action="<?php echo base_url(); ?>cart/delivery" method="post">
							<table width="100%" cellpadding="5" cellspacing="0" border="0">
								<tr>
									<td width="25%">Enter Full Name</td>
									<td><input type="text" name="name" value="<?php if( isset( $delivery['name'] )) echo $delivery['name']; ?>" required="required" /></td>
								</tr>
								<tr>
									<td>Enter Phone No.</td>
									<td><input type="text" name="phone" value="<?php if( isset( $delivery['phone'] )) echo $delivery['phone']; ?>" required="required" /></td>
								</tr>
								<tr>
									<td>Alternate Phone</td>
									<td><input type="text" name="mobile" value="<?php if( isset( $delivery['mobile'] )) echo $delivery['mobile']; ?>" required="required" /></td>
								</tr>
								<tr>
									<td>Country</td>
									<td>
										<style> select option { width: 160px; } </style>
										<select name="country" required="required">
											<option value=""> Select </option>
											<?php if( count( $country ) > 0) foreach( $country as $countr ) echo "<option value='$countr->name' " . ( isset( $delivery['country'] ) && $delivery['country'] == $countr->name ? ' selected="selected"' : "" ) . ">$countr->name</option>"; ?>
										</select>
									</td>
								</tr>
								<tr>
									<td>State/District</td>
									<td><input type="text" name="state" value="<?php if( isset( $delivery['state'] )) echo $delivery['state']; ?>" required="required" /></td>
								</tr>
								<tr>
									<td>City/Upazila</td>
									<td><input type="text" name="city" value="<?php if( isset( $delivery['city'] )) echo $delivery['city']; ?>" required="required" /></td>
								</tr>
								<tr>
									<td>Landmark</td>
									<td><input type="text" name="landmark" value="<?php if( isset( $delivery['landmark'] )) echo $delivery['landmark']; ?>" required="required" /></td>
								</tr>
								<tr>
									<td>Zip/Post Code</td>
									<td><input type="text" name="postcode" value="<?php if( isset( $delivery['postcode'] )) echo $delivery['postcode']; ?>" required="required" /></td>
								</tr>
								<tr>
									<td>Address</td>
									<td><textarea required="required" name="address"><?php if( isset( $delivery['address'] )) echo $delivery['address']; ?></textarea></td>
								</tr>
								<tr>
									<td></td>
									<td><input type="submit" value="Continue" /></td>
								</tr>
							</table>
						</form>
					</div>
					<?php } else if( $view == 'payment' ) { ?>
					<div class="checkout_payment">
						<div class="float_left payment_nav">
							<ul>
								<li class="cash_payment">Cash-On-Delivery</li>
								<!-- <li class="credit_payment">Credit Card</li>
								<li class="debit_payment">Debit Card</li>
								<li class="bkash_payment">Mobile Banking</li> -->
							</ul>
						</div>
						<div class="float_left payment_content">
							<div class="cash_payment_view">
								<form method="post" action="<?php echo base_url(); ?>cart/payment/cash">
									<p class="small_text gray">With our Cash On Delivery Option, you can pay directly to the courier. No advance payment required now.</p><br />
									<p>Amount Payable on Delivery BDT<?php $total = $this->session->userdata( "total" ); echo $total; ?></p><br />
									<p>Your contact number: <?php echo $delivery['phone']; ?></p>
									<p class="small_text gray">(You will receive a call from our customer care to confirm the order)</p><br /><br />
									<p style="text-align: center;"><input type="submit" value="Continue" /></p>
								</form>
							</div>
							<div class="credit_payment_view">
								<form method="post" action="<?php echo base_url(); ?>cart/payment/credit">
									<p>
										Pay using Credit Card. 
										<input type="radio" name="card" value="visa" required="required" /> <img src="<?php echo base_url(); ?>assets/images/visa-icon.jpg" />
										<input type="radio" name="card" value="mastercard" required="required" /> <img src="<?php echo base_url(); ?>assets/images/mastercard-icon.jpg" />
										<input type="radio" name="card" value="ddbl" required="required" /> <img src="<?php echo base_url(); ?>assets/images/dbbl.jpg" /> 
									</p><br />
									<p>Amount Payable on Credit Card BDT<?php $total = $this->session->userdata( "total" ); echo $total; ?></p><br />
									<table width="100%" cellpadding="5" cellspacing="0" border="0">
										<tr>
											<td >Name on Card</td>
											<td><input type="text" name="card_name" value="<?php if( isset( $pay_details ) ) echo $pay_details['card_name']; ?>" /></td>
										</tr>
										<tr>
											<td>Card Number</td>
											<td><input type="text" name="card_number" value="<?php if( isset( $pay_details ) ) echo $pay_details['card_number']; ?>" /></td>
										</tr>
										<tr>
											<td>CVV No.</td>
											<td><input type="text" name="cvv_no" value="<?php if( isset( $pay_details ) ) echo $pay_details['cvv_no']; ?>" /></td>
										</tr>
										<tr>
											<td>Expiry Date</td>
											<td>
												<select name="expiry_month" style="width: 95px;">
													<option value="">Month</option>
													<option value="01">Jan (1)</option>
													<option value="02">Feb (2)</option>
													<option value="03">Mar (3)</option>
													<option value="04">Apr (4)</option>
													<option value="05">May (5)</option>
													<option value="06">Jun (6)</option>
													<option value="07">Jul (7)</option>
													<option value="08">Aug (8)</option>
													<option value="09">Sep (9)</option>
													<option value="10">Oct (10)</option>
													<option value="11">Nov (11)</option>
													<option value="12">Dec (12)</option>
												</select> 
												<select name="expiry_year" style="width: 92px;">
													<option value="">Year</option>
													<?php for( $i = date( "Y", strtotime( "-1 year" ) ); $i <= date( "Y", strtotime( "10 year" ) ); $i++ ) echo "<option value='$i'>$i</option>"; ?>
												</select>
											</td>
										</tr>
										<tr>
											<td>Issuer Bank Name</td>
											<td><input type="text" name="bank_name" value="<?php if( isset( $pay_details ) ) echo $pay_details['bank_name']; ?>" /></td>
										</tr>
									</table>
									<p class="billing_info">
										Billing Address | 
										<input type="radio" name="billing_status" class="billing_status_same"value="same" <?php if( isset( $pay_details ) && $pay_details['billing_status'] == "same" ) echo ' checked="checked"'; ?> /> As Like Delivery 
										<input type="radio" name="billing_status" class="billing_status_new" value="new" <?php if( isset( $pay_details ) && $pay_details['billing_status'] == "same" ) echo ' checked="checked"'; ?> /> Different Address
									</p>
									<table width="100%" cellpadding="5" cellspacing="0" border="0" class="billing_details">
										<tr>
											<td width="55%">Enter Full Name</td>
											<td><input type="text" name="name" value="<?php if( isset( $billing['name'] )) echo $billing['name']; ?>" /></td>
										</tr>
										<tr>
											<td>Enter Phone No.</td>
											<td><input type="text" name="phone" value="<?php if( isset( $billing['phone'] )) echo $billing['phone']; ?>" /></td>
										</tr>
										<tr>
											<td>Alternate Phone</td>
											<td><input type="text" name="mobile" value="<?php if( isset( $billing['mobile'] )) echo $billing['mobile']; ?>" /></td>
										</tr>
										<tr>
											<td>Country</td>
											<td>
												<style> select option { width: 160px; } </style>
												<select name="country" required="required">
													<option> Select </option>
													<?php if( count( $country ) > 0) foreach( $country as $countr ) echo "<option value='$countr->name'>$countr->name</option>"; ?>
												</select>
											</td>
										</tr>
										<tr>
											<td>State/District Name</td>
											<td><input type="text" name="state" value="<?php if( isset( $billing['state'] )) echo $billing['state']; ?>" /></td>
										</tr>
										<tr>
											<td>City/Upazila Name</td>
											<td><input type="text" name="city" value="<?php if( isset( $billing['city'] )) echo $billing['city']; ?>" /></td>
										</tr>
										<tr>
											<td>Landmark</td>
											<td> <input type="text" name="landmark" value="<?php if( isset( $billing['landmark'] )) echo $billing['landmark']; ?>" /></td>
										</tr>
										<tr>
											<td>Postcode</td>
											<td> <input type="text" name="postcode" value="<?php if( isset( $billing['postcode'] )) echo $billing['postcode']; ?>" /></td>
										</tr>
										<tr>
											<td>Address</td>
											<td><textarea name="address"><?php if( isset( $billing['address'] )) echo $billing['address']; ?></textarea></td>
										</tr>
									</table>
									<br /><p style="text-align: center;"><input type="submit" value="Pay Now" disabled="disabled" /></p>
								</form>
								<br />
								<p class="card_payment_rule_head">Next steps</p>
								<ul class="card_payment_rule_nav">
									<li>After clicking on the "Pay Now" button you might be taken to your bank's website for 3D secure authentication using a pop-up window.</li>
									<li>Follow the payment steps as mentioned on the bank's website.</li>
									<li>After successful payment completion, you will be redirected back to Order-summary page at G-Series.</li>
									<li>You can view, save and print Order-summary page for further communication.</li>
								</ul>
							</div>
							<div class="debit_payment_view">
								<form method="post" action="<?php echo base_url(); ?>cart/payment/debit">
									<p>
										Pay using Debit Card. 
										<input type="radio" name="card" value="visa" required="required" /> <img src="<?php echo base_url(); ?>assets/images/visa-icon.jpg" />
										<input type="radio" name="card" value="mastercard" required="required" /> <img src="<?php echo base_url(); ?>assets/images/mastercard-icon.jpg" />
										<input type="radio" name="card" value="ddbl" required="required" /> <img src="<?php echo base_url(); ?>assets/images/dbbl.jpg" /> 
									</p><br />
									<p>Amount Payable on Debit Card BDT<?php $total = $this->session->userdata( "total" ); echo $total; ?></p><br />
									<table width="100%" cellpadding="5" cellspacing="0" border="0">
										<tr>
											<td >Name on Card</td>
											<td><input type="text" name="card_name" value="<?php if( isset( $pay_details ) ) echo $pay_details['card_name']; ?>" /></td>
										</tr>
										<tr>
											<td>Card Number</td>
											<td><input type="text" name="card_number" value="<?php if( isset( $pay_details ) ) echo $pay_details['card_number']; ?>" /></td>
										</tr>
										<tr>
											<td>CVV No.</td>
											<td><input type="text" name="cvv_no" value="<?php if( isset( $pay_details ) ) echo $pay_details['cvv_no']; ?>" /></td>
										</tr>
										<tr>
											<td>Expiry Date</td>
											<td>
												<select name="expiry_month" style="width: 95px;">
													<option value="">Month</option>
													<option value="01">Jan (1)</option>
													<option value="02">Feb (2)</option>
													<option value="03">Mar (3)</option>
													<option value="04">Apr (4)</option>
													<option value="05">May (5)</option>
													<option value="06">Jun (6)</option>
													<option value="07">Jul (7)</option>
													<option value="08">Aug (8)</option>
													<option value="09">Sep (9)</option>
													<option value="10">Oct (10)</option>
													<option value="11">Nov (11)</option>
													<option value="12">Dec (12)</option>
												</select> 
												<select name="expiry_year" style="width: 92px;">
													<option value="">Year</option>
													<?php for( $i = date( "Y", strtotime( "-1 year" ) ); $i <= date( "Y", strtotime( "10 year" ) ); $i++ ) echo "<option value='$i'>$i</option>"; ?>
												</select>
											</td>
										</tr>
										<tr>
											<td>Issuer Bank Name</td>
											<td><input type="text" name="bank_name" value="<?php if( isset( $pay_details ) ) echo $pay_details['bank_name']; ?>" /></td>
										</tr>
									</table>
									<p class="billing_info">
										Billing Address | 
										<input type="radio" name="billing_status" class="billing_status_same"value="same" <?php if( isset( $pay_details ) && $pay_details['billing_status'] == "same" ) echo ' checked="checked"'; ?> /> As Like Delivery 
										<input type="radio" name="billing_status" class="billing_status_new" value="new" <?php if( isset( $pay_details ) && $pay_details['billing_status'] == "same" ) echo ' checked="checked"'; ?> /> Different Address
									</p>
									<table width="100%" cellpadding="5" cellspacing="0" border="0" class="billing_details">
										<tr>
											<td width="55%">Enter Full Name</td>
											<td><input type="text" name="name" value="<?php if( isset( $billing['name'] )) echo $billing['name']; ?>" /></td>
										</tr>
										<tr>
											<td>Enter Phone No.</td>
											<td><input type="text" name="phone" value="<?php if( isset( $billing['phone'] )) echo $billing['phone']; ?>" /></td>
										</tr>
										<tr>
											<td>Alternate Phone</td>
											<td><input type="text" name="mobile" value="<?php if( isset( $billing['mobile'] )) echo $billing['mobile']; ?>" /></td>
										</tr>
										<tr>
											<td>Country</td>
											<td>
												<style> select option { width: 160px; } </style>
												<select name="country" required="required">
													<option> Select </option>
													<?php if( count( $country ) > 0) foreach( $country as $countr ) echo "<option value='$countr->name'>$countr->name</option>"; ?>
												</select>
											</td>
										</tr>
										<tr>
											<td>State/District Name</td>
											<td><input type="text" name="state" value="<?php if( isset( $billing['state'] )) echo $billing['state']; ?>" /></td>
										</tr>
										<tr>
											<td>City/Upazila Name</td>
											<td><input type="text" name="city" value="<?php if( isset( $billing['city'] )) echo $billing['city']; ?>" /></td>
										</tr>
										<tr>
											<td>Landmark</td>
											<td> <input type="text" name="landmark" value="<?php if( isset( $billing['landmark'] )) echo $billing['landmark']; ?>" /></td>
										</tr>
										<tr>
											<td>Postcode</td>
											<td> <input type="text" name="postcode" value="<?php if( isset( $billing['postcode'] )) echo $billing['postcode']; ?>" /></td>
										</tr>
										<tr>
											<td>Address</td>
											<td><textarea name="address"><?php if( isset( $billing['address'] )) echo $billing['address']; ?></textarea></td>
										</tr>
									</table>
									<br /><p style="text-align: center;"><input type="submit" value="Pay Now" disabled="disabled" /></p>
								</form>
								<br />
								<p class="card_payment_rule_head">Next steps</p>
								<ul class="card_payment_rule_nav">
									<li>After clicking on the "Pay Now" button you might be taken to your bank's website for 3D secure authentication using a pop-up window.</li>
									<li>Follow the payment steps as mentioned on the bank's website.</li>
									<li>After successful payment completion, you will be redirected back to Order-summary page at G-Series.</li>
									<li>You can view, save and print Order-summary page for further communication.</li>
								</ul>
							</div>
							<div class="bkash_payment_view">
								<p>
									Pay using mobile banking. 
									<input type="radio" name="card" class="bkash_radio" value="bkash" /> <img style="top: 0px;" src="<?php echo base_url(); ?>assets/images/bkash.png" />
								</p><br />
								<div class="bkash_payment_form">
									<form method="post" action="<?php echo base_url(); ?>cart/payment/bkash">
										<ul>
											<li>Go to bKash Menu by dialing *247#</li>
											<li>Choose "Payment" option by pressing "3"</li>
											<li>Enter our business wallet number : <?php echo $setting->bkash_mobile;?></li>
											<li>Enter BDT <?php $total = $this->session->userdata( "total" ); echo $total; ?> amount you have to pay.</li>
											<li>Enter a reference about this transaction: 1</li>
											<li>Enter counter number: 1</li>
											<li>Now enter your bKash Mobile PIN</li>
											<li>Get the trxid code from return sms and put it below </li>
										</ul>
										<br />
										<?php 
										if( $error != '' && $payment == "bkash" ) {
											echo '<p class="error">' . $this->session->userdata( "error" ) . '</p>';
											$this->session->unset_userdata( "error" );
										}
										?>
										<p style="text-align: center;">
											<input type="text" name="trxid" required="required" style="width: 120px;" />
											<input type="submit" value="Continue" />
										</p>
									</form>
								</div>
							</div>
							<div class="payment_view_massage">Select a payment method from left..</div>
						</div>
						<p class="small_text gray" style="text-align:right">By placing this order, you have agree our Terms & Conditions and Privacy Policy</p>
						<div class="clear"> </div>
					</div>
					<?php } ?>
				</div>
			</div>
		</div>
		<div class="float_right width_350">
			<div class="checkout_title">Order Summary</div>
			<table width="100%" cellpadding="5" cellspacing="0" border="0" class="order_summery">
				<tr bgcolor="#E1E1E1">
					<th>Product</th>
					<th>Price</th>
					<th>Qty</th>
					<th>Sub Total</th>
				</tr>
				<?php
				$qry = $total = 0;
				foreach( $cart as $row ) {
					$price = number_format( $row['qty'] * $product[$row['id']]->product_price, 2, '.', '' );
					$total += $price;
					$qry += $row['qty'];
					echo "
				<tr>
					<td>
						<a href='" . base_url() ."home/product/$row[id]'><img src='" . base_url() ."assets/product/" . ( $product[$row['id']]->phy_path == "" ? "nopicture.png" : $product[$row['id']]->phy_path ) . "' title='" . $product[$row['id']]->product_name . "' width='30' /> </a><br />
						" . $product[$row['id']]->product_name . "<br />
						" . $category[$product[$row['id']]->id_category] . " - 
						" . $subcategory[$product[$row['id']]->id_subcategory] . "
					</td>
					<td>$ " . $product[$row['id']]->product_price . "</td>
					<td>$row[qty]</td>
					<td align='right'>$ $price</td>
				</tr>
					";	
				}
				if( $setting->delivarycost > 0 ) {
					$total += $setting->delivarycost;
					echo "
					<tr>
						<td align='left' colspan='3'>Delivary Product Genaral Charge</td>
						<td align='right'>$ $setting->delivarycost</td>
					</tr>
					";
				}
				$total = number_format( $total, 2, '.', '' );
				$this->session->set_userdata( array( "total" => $total ));
				echo "
				<tr>
					<th align='right' colspan='2'> All Total</th>
					<th>$qry</th>
					<th align='right'>$ $total</th>
				</tr>
				";
				?>
			</table>
			<?php if( $delivery != '' && $view == "payment" ) { ?>
			<br />
			<table width="100%" cellpadding="5" cellspacing="0" border="0" class="order_summery">
				<tr bgcolor="#E1E1E1">
					<th>Delivery Details </th>
					<th align="right"><a href="<?php echo base_url() . "cart/checkout/delivery"; ?>">Edit</a></th>
				</tr>
				<?php
				echo "
				<tr><td>$delivery[name]</td></tr>
				<tr>
					<td>
						$delivery[address] <br />
						$delivery[city] <br />
						$delivery[state] <br />
					</td>
				</tr>
				<tr><td>$delivery[phone]</td></tr>
				";
				?>
			</table>
			<?php } ?>
		</div>
	</div>
	<div class="clear"> </div>
</div>