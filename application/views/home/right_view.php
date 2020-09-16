<div class="float_right width_295">
	<div class="right_block">
		<div class="top_ten">
			<div class="top_ten_item">
				<div class="top_ten_title">Top Salse Products</div>
				<div class="top_ten_content">
					<?php
					$top_downloads = $this->get_contents->get_data_items( "product", "status_top", "1", "*", "id", "DESC", 10, "active", 1 );
					if( $top_downloads != "" ) {
						echo "<ul>";
						foreach( $top_downloads as $top_prod ) echo "<li><a href='" . base_url() . "home/product/$top_prod->id' title='$top_prod->product_name'>" . ( strlen( $top_prod->product_name ) > 15 ? substr( $top_prod->product_name, 0, 15 ) . ".." : $top_prod->product_name) . "</a></li>";
						echo "</ul>";
					}
					else echo "<p>No List Available<p>";
					?>
				</div>
			</div>
			<div class="top_ten_item">
				<div class="top_ten_title">Client Most Viewed</div>
				<div class="top_ten_content">
					<?php
					$top_downloads = $this->get_contents->get_data_items( "product", "status_featured", "1", "*", "id", "DESC", 10, "active", 1 );
					if( $top_downloads != "" ) {
						echo "<ul>";
						foreach( $top_downloads as $top_prod ) echo "<li><a href='" . base_url() . "home/product/$top_prod->id' title='$top_prod->product_name'>" . ( strlen( $top_prod->product_name ) > 15 ? substr( $top_prod->product_name, 0, 15 ) . ".." : $top_prod->product_name) . "</a></li>";
						echo "</ul>";
					}
					else echo "<p>No List Available<p>";
					?>
				</div>
			</div>
			<div class="top_ten_item">
				<div class="top_ten_title">Our Top List</div>
				<div class="top_ten_content">
					<?php
					$top_downloads = $this->get_contents->get_data_items( "product", "status_top", "1", "*", "id", "ASC", 10, "active", 1 );
					if( $top_downloads != "" ) {
						echo "<ul>";
						foreach( $top_downloads as $top_prod ) echo "<li><a href='" . base_url() . "home/product/$top_prod->id' title='$top_prod->product_name'>" . ( strlen( $top_prod->product_name ) > 15 ? substr( $top_prod->product_name, 0, 15 ) . ".." : $top_prod->product_name) . "</a></li>";
						echo "</ul>";
					}
					else echo "<p>No List Available<p>";
					?>
				</div>
			</div>
		</div>
	</div>
</div>