<div class="width_1000 back_white">
	<?php if( isset( $banner[0] )) { ?>
	<link href="<?php echo base_url(); ?>assets/css/js-image-slider.css" rel="stylesheet" type="text/css" />
    <script src="<?php echo base_url(); ?>assets/js/js-image-slider.js" type="text/javascript"></script>
    <div class="home_banner">
		<div id="sliderFrame">
			<div id="slider">
				<?php
				foreach( $banner as $baner ) 
					echo "
						<a href='" . ( $baner->id_product != 0 ? ( base_url() . "home/product/$baner->id_product" ) : ( $baner->link != "" ? $baner->link : "javascript:void(0)" ) ) . "'>
							<img src='" . base_url() . "assets/banner/$baner->url' class='call_me_$baner->id'" . ( $baner->title != "" ? " alt='$baner->title'" : "" ) . " />
						</a>
					";
				?>
			</div>
			<!--Custom navigation buttons on both sides-->
			<div class="group1-Wrapper">
				<a onclick="imageSlider.previous()" class="group1-Prev"></a>
				<a onclick="imageSlider.next()" class="group1-Next"></a>
			</div>
		</div>
	</div>
	<?php } ?>
	<div class="float_left width_700 border_right">
		<div class="featured_item">
			<div class="featured_item_block">
				<div class="featured_item_block_title">Top Items <a href="<?php echo base_url() ."home/topitems"; ?>">More...</a></div>
				<div class="featured_item_block_container">
				<?php
				if( $topitems != '' && count( $topitems ) > 0 )
				{
					$i = 0; $j = 1;
					echo "<div class='featured_item_block_full featured_item_$j'><div class='featured_item_block_4_item'>";
					foreach( $topitems as $latest )
					{
						$i++;
						$latest_product_name = $latest->product_short == "" ? $latest->product_name : $latest->product_short;
						echo "
						<div class='featured_item_block_content'>	
							<a href='" . base_url() ."home/product/$latest->id'>
								<img src='" . base_url() ."assets/product/" . ( $latest->phy_path == "" ? "nopicture.png" : $latest->phy_path ) . "' title='$latest->product_name' /> 
							</a>
							<p>" . ( strlen( $latest_product_name ) > 80 ? ( substr( $latest_product_name, 0, 80 ) . "..") : $latest_product_name  ) . "</p>
							<p class='price_p'>$ $latest->product_price</p>
							<img src='" . base_url() ."assets/images/add_to_cart_blue.png' class='add_to_cart product_$latest->id' />
						</div>
						";
						if( $i % 8 == 0 ) {
							$j++;
							echo "</div></div><div class='featured_item_block_full featured_item_$j'><div class='featured_item_block_4_item'>";
						}
						else if( $i % 4 == 0 ) {
							echo "</div><div class='featured_item_block_4_item'>";
						}
					}
					echo "</div></div>";
				}
				?>
				</div>
				<div class="featured_item_block_nav">
				<?php
				if( $topitems != '' && count( $topitems ) > 8 )
				{
					echo "<ul>";
					$nav1 = ceil( count( $topitems ) / 8 );
					for( $k = 1; $k <= $nav1; $k++ ) echo "<li style='padding: 0px 2px;' class='featured_nav_$k'><img src='" . base_url() . "assets/images/featured_item_block_nav" . ( $k == 1 ? "_over" : "" ) . ".png' /></li>";
					echo "</ul>";
				}
				?>
				</div>
			</div>
		</div>
		<div class="featured_item">
			<div class="featured_item_block">
				<div class="featured_item_block_title">New Release <a href="<?php echo base_url() ."home/released"; ?>">More...</a></div>
				<div class="featured_item_block_container">
				<?php
				if( $release != '' && count( $release ) > 0 )
				{
					$i = 0; $j = 6;
					echo "<div class='featured_item_block_full featured_item_$j'><div class='featured_item_block_4_item'>";
					foreach( $release as $latest )
					{
						$i++;
						$latest_product_name = $latest->product_short == "" ? $latest->product_name : $latest->product_short;
						echo "
						<div class='featured_item_block_content'>	
							<a href='" . base_url() ."home/product/$latest->id'>
								<img src='" . base_url() ."assets/product/" . ( $latest->phy_path == "" ? "nopicture.png" : $latest->phy_path ) . "' title='$latest->product_name' /> 
							</a>
							<p>" . ( strlen( $latest_product_name ) > 80 ? ( substr( $latest_product_name, 0, 80 ) . "..") : $latest_product_name  ) . "</p>
							<p class='price_p'>$ $latest->product_price</p>
							<img src='" . base_url() ."assets/images/add_to_cart_blue.png' class='add_to_cart product_$latest->id' />
						</div>
						";
						if( $i % 8 == 0 ) {
							$j++;
							echo "</div></div><div class='featured_item_block_full featured_item_$j'><div class='featured_item_block_4_item'>";
						}
						else if( $i % 4 == 0 ) {
							echo "</div><div class='featured_item_block_4_item'>";
						}
					}
					echo "</div></div>";
				}
				?>
				</div>
				<div class="featured_item_block_nav">
				<?php
				if( $release != '' && count( $release ) > 8 )
				{
					echo "<ul>";
					$nav1 = ceil( count( $release ) / 8 ) + 5;
					for( $k = 6; $k <= $nav1; $k++ ) echo "<li style='padding: 0px 2px;' class='featured_nav_$k'><img src='" . base_url() . "assets/images/featured_item_block_nav" . ( $k == 1 ? "_over" : "" ) . ".png' /></li>";
					echo "</ul>";
				}
				?>
				</div>
			</div>
		</div>
		<div class="featured_item" style="padding-bottom: 0px;">
			<div class="featured_item_block">
				<div class="featured_item_block_title">Featured<a href="<?php echo base_url() ."home/featured"; ?>">More...</a></div>
				<div class="featured_item_block_container">
				<?php
				if( $featured != '' && count( $featured ) > 0 )
				{
					$i = 0; $j = 11;
					echo "<div class='featured_item_block_full featured_item_$j'><div class='featured_item_block_4_item'>";
					foreach( $featured as $latest )
					{
						$i++;
						$latest_product_name = $latest->product_short == "" ? $latest->product_name : $latest->product_short;
						echo "
						<div class='featured_item_block_content'>	
							<a href='" . base_url() ."home/product/$latest->id'>
								<img src='" . base_url() ."assets/product/" . ( $latest->phy_path == "" ? "nopicture.png" : $latest->phy_path ) . "' title='$latest->product_name' /> 
							</a>
							<p>" . ( strlen( $latest_product_name ) > 80 ? ( substr( $latest_product_name, 0, 80 ) . "..") : $latest_product_name  ) . "</p>
							<p class='price_p'>$ $latest->product_price</p>
							<img src='" . base_url() ."assets/images/add_to_cart_blue.png' class='add_to_cart product_$latest->id' />
						</div>
						";
						if( $i % 8 == 0 ) {
							$j++;
							echo "</div></div><div class='featured_item_block_full featured_item_$j'><div class='featured_item_block_4_item'>";
						}
						else if( $i % 4 == 0 ) {
							echo "</div><div class='featured_item_block_4_item'>";
						}
					}
					echo "</div></div>";
				}
				?>
				</div>
				<div class="featured_item_block_nav">
				<?php
				if( $featured != '' && count( $featured ) > 8 )
				{
					echo "<ul>";
					$nav2 = ceil( count( $featured ) / 8 ) + 10;
					for( $k = 11; $k <= $nav2; $k++ ) echo "<li style='padding: 0px 2px;' class='featured_nav_$k'><img src='" . base_url() . "assets/images/featured_item_block_nav" . ( $k == 6 ? "_over" : "" ) . ".png' /></li>";
					echo "</ul>";
				}
				?>
				</div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="featured_item">
			<div class="featured_item_block">
				<div class="featured_item_block_title">Others <a href="<?php echo base_url() ."home/others"; ?>">More...</a></div>
				<div class="featured_item_block_container">
				<?php
				if( $otehritems != '' && count( $otehritems ) > 0 )
				{
					$i = 0; $j = 16;
					echo "<div class='featured_item_block_full featured_item_$j'><div class='featured_item_block_4_item'>";
					foreach( $otehritems as $latest )
					{
						$i++;
						$latest_product_name = $latest->product_short == "" ? $latest->product_name : $latest->product_short;
						echo "
						<div class='featured_item_block_content'>	
							<a href='" . base_url() ."home/product/$latest->id'>
								<img src='" . base_url() ."assets/product/" . ( $latest->phy_path == "" ? "nopicture.png" : $latest->phy_path ) . "' title='$latest->product_name' /> 
							</a>
							<p>" . ( strlen( $latest_product_name ) > 80 ? ( substr( $latest_product_name, 0, 80 ) . "..") : $latest_product_name  ) . "</p>
							<p class='price_p'>$ $latest->product_price</p>
							<img src='" . base_url() ."assets/images/add_to_cart_blue.png' class='add_to_cart product_$latest->id' />
						</div>
						";
						if( $i % 8 == 0 ) {
							$j++;
							echo "</div></div><div class='featured_item_block_full featured_item_$j'><div class='featured_item_block_4_item'>";
						}
						else if( $i % 4 == 0 ) {
							echo "</div><div class='featured_item_block_4_item'>";
						}
					}
					echo "</div></div>";
				}
				?>
				</div>
				<div class="featured_item_block_nav">
				<?php
				if( $otehritems != '' && count( $otehritems ) > 8 )
				{
					echo "<ul>";
					$nav1 = ceil( count( $otehritems ) / 8 ) + 15;
					for( $k = 16; $k <= $nav1; $k++ ) echo "<li style='padding: 0px 2px;' class='featured_nav_$k'><img src='" . base_url() . "assets/images/featured_item_block_nav" . ( $k == 1 ? "_over" : "" ) . ".png' /></li>";
					echo "</ul>";
				}
				?>
				</div>
			</div>
		</div>
	</div>
	<?php $this->load->view( 'home/right_view' ); ?>
	<div class="clear"></div>
</div>
