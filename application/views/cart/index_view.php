<div class="content_full">
    <h2>Cart Item</h2>
    <div class="manage_cart">
		<table border="0" cellspacing="0" cellpadding="0" class="cart_table" width="100%">
			<tr>
				<th>SN</th>
				<th class="left_align">Preview</th>
				<th class="left_align">Name/Title</th>
				<th>Browse</th>
				<th>Price</th>
				<th>Qty.</th>
				<th>Total</th>
				<th></th>
			</tr>
			<?php
			if( count( $cart ) > 0 )
			{
				$qry = $total = $i = 0;
				foreach( $cart as $detail ) {
					$row = $product[$detail['id']];
					$i++;
					$total += $price = number_format( $row->product_price * $detail['qty'], 2, '.', '' );
					$qry += $detail['qty'];
					echo "
			<tr class='" . ( $i % 2 == 0 ? "even" : "odd" ) . "_row'>
				<td>$i</td>
				<td class='left_align><a href='home/product/$row->id'><img src='" . base_url() ."assets/product/" . ( $row->phy_path == "" ? "nopicture.png" : $row->phy_path ) . "' title='$row->product_name' width='30' /></a></td>
				<td class='left_align'><a href='" . base_url() . "home/product/$row->id'>$row->product_name</a></td>
				<td class='left_align'>
					<a href='" . base_url() . "home/content/category/$row->id_category'>" . ( $category[$row->id_category] ) . "</a> 
					- 
					<a href='" . base_url() . "home/content/subcategory/$row->id_subcategory/'>" . ( $subcategory[$row->id_subcategory] ) . "</a>
				</td>
				<td class='right_align'>$ $row->product_price</td>
				<td>
					<a href='" . base_url() . "cart/remove_item/$row->id/1' title='Remove One'><img src='" . base_url() . "assets/images/quantity_down.gif' /></a>
					$detail[qty]
					<a href='" . base_url() . "cart/add_item/$row->id' title='Add One'><img src='" . base_url() . "assets/images/quantity_up.gif' /></a>
				</td>
				<td class='right_align'>$ $price</td>
				<td><a href='" . base_url() . "cart/remove_item/$row->id/all' title='Remove This'><img src='" . base_url() . "assets/images/cart_cross_small.png' /></a></td>
			</tr>
					";
				}
				echo "
			<tr>
				<td colspan='5' class='right_align'><h4>All Total</h4></td>
				<td>$qry</td>
				<td class='right_align'>$ " . number_format( $total, 2, '.', '' ) . "</td>
				<td><a href='" . base_url() . "cart/remove_all' title='Remove All'><img src='" . base_url() . "assets/images/cart_cross_small.png' /></a></td>
			</tr>
				";
			}
			?>
		</table>
		<div class="page_link">
			<p>
				<a style="float: left; margin-top: -10px;" href="#" onclick="history.go(-1);" >Continue Shopping</a>
				<a href="<?php echo base_url() . "cart/checkout"; ?>">Checkout</a>
			</p>
		</div>
	</div>
</div>