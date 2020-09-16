<div class="content_full">
    <div class="content_full">
		<h2>Shopping Confirmation</h2>
		<h3>
			Thank You for Shopping From <a style="text-decoration: underline;" href="javascript:void(0);"><?php echo $setting->siteurl; ?></a>
		</h3>
		<h3>
			Your Payment Received By <a style="text-decoration: underline;" href="javascript:void(0);">"<?php echo $payment->pay_by == "cash" ? 'Cash On delivery' : ( $payment->pay_by == "bkash" ? "Mobile Banking - Bkash" : "$payment->pay_by Card" ); ?>"</a>
		</h3>
		<p>Our representative will contact you within 3 days.</p>
		<p>Best Regards</p>
		<p>Sales Team</p>
		<h4><?php echo $setting->sitename; ?></h4>
	</div>
</div>