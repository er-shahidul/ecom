<style>
	.item_show_div { margin: 10px; padding: 10px; border: 1px solid #DDDDDD; font-size: 14px; }
	.item_show_div img { max-width: 658px; max-height: 300px; }
</style>
<div class="width_1000 back_white">
	<div class="width_700 float_left">
		<div class="item_show_div">
			<?php 
			echo "<img src='" . base_url() ."assets/product/" . ( $product->phy_path == "" ? "nopicture.png" : $product->phy_path ) . "' title='$product->product_name' />";
			?>
			<table border="0" width="80%" cellpadding="5" cellspacing="5">
				<tr>
					<th width="10%">Title</th>
					<td><?php echo $product->product_name; ?></td>
				</tr>
				<tr>
					<th>Product</th>
					<td><?php echo $product->product_short; ?></td>
				</tr>
				<tr>
					<th>Description</th>
					<td><?php echo $product->product_description; ?></td>
				</tr>
				<tr>
					<th>Price</th>
					<td>$ <?php echo $product->product_price; ?></td>
				</tr>
				<tr>
					<td></td>
					<td><?php echo "<img src='" . base_url() ."assets/images/add_to_cart_blue.png' class='add_to_cart product_$product->id' />"; ?></td>
				</tr>
			</table>
		</div>
	</div>
	<?php if( $related != "" && count( $related ) ) { ?>
	<div class="width_300 float_right related">
		<?php
		foreach( $related as $row ) {
			echo "
		<a href='" . base_url() ."home/product/$row->id'>
			<img src='" . base_url() ."assets/product/$row->phy_path' title='$row->product_name' /> 
		</a>
			";
		}
		?>
	</div>
	<?php } else $this->load->view( 'home/right_view' ); ?>
	<div class="clear"></div>
</div>