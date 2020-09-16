<style>
	.content_sorting { text-align: center; padding: 10px 0; margin: 0 auto; width: 360px; }
	.content_sorting ul { text-align: center; margin: 0px; padding: 0px; float: left; }
	.content_sorting ul li { text-align: center; margin: 0px 10px; padding: 0px; width: 100px; float: left; list-style: none; }
	.content_sorting ul li a { display: block; padding: 10px 20px; background: #036; color: #CCC; text-align: center; font-size: 12px; text-decoration: none; border-radius: 5px; }
	.content_sorting ul li a:hover, .content_sorting ul li a.active { background: #003; color: #FFF; } 
	.horizental_display { padding: 10px; width: 680px; }
	.horizental_display .normal_block { margin: 10px 0px; padding: 10px !important; width: 640px; background: #EFEFEF; border-radius: 3px; border: 5px solid #EAEAEA !important; cursor: pointer; }
	.horizental_display .normal_block img { float: left; width: 80px; height: 70px; margin-right: 20px; border: 2px solid #DDD; }
	.horizental_display .normal_block p { float: left; width: 530px; text-align: left; height: 50px; }
	.horizental_display .normal_block p span { text-align: right; float: right; margin-right: 10px; }
	.horizental_display .item_display_container { height: 700px; }
</style>
<div class="width_1000 back_white">	
	<div class="float_left width_700 border_right">
		<div class="item_display">
			<div class='item_display_container item_display_1'>
				<div class='item_display_container_block'>
			<?php
			if( $all_product != '' && count( $all_product ) > 0 )
			{
				
				echo "
				";
				$i = 0; $j = 1;
				foreach( $all_product as $product )
				{
					$i++;
					$product_name = $product->product_short == "" ? $product->product_name : $product->product_short;
					echo "
				<div class='item_display_block_content'>	
					<a href='" . base_url() ."home/product/$product->id'>
						<img src='" . base_url() ."assets/product/" . ( $product->phy_path == "" ? "nopicture.png" : $product->phy_path ) . "' title='$product->product_name' /> 
					</a>
					<p>" . ( strlen( $product_name ) > 80 ? ( substr( $product_name, 0, 80 ) . "..") : $product_name  ) . "</p>
					<p class='price_p'>$ $product->product_price</p>
					<img src='" . base_url() ."assets/images/add_to_cart_blue.png' class='add_to_cart product_$product->id' />
				</div>
					";
					if( $i % 12 == 0 ) {
						$j++;
						echo "</div></div><div class='item_display_container item_display_$j'><div class='item_display_container_block'>";
					}
					else if( $i % 4 == 0 ) {
						echo "</div><div class='item_display_container_block'>";
					}
				}
				echo "
				";
			}
			?>
				</div>
			</div>
		</div>
		<?php if( count( $all_product ) > 12 ) { ?>
		<div class="item_display_nav">
			<ul>
				<?php
				for( $i = 1; $i <= ceil( count( $all_product ) / 12 ); $i++ ) echo "<li class='item_display_nav_$i'><img src='" . base_url() . "assets/images/featured_item_block_nav.png' /></li>";
				?>
			</ul>
		</div>
		<?php } ?>
	</div>
	<?php $this->load->view( 'home/right_view' ); ?>
	<div class="clear"></div>
</div>
