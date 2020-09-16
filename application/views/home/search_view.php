<style>
.search_result { padding: 10px 20px; min-height: 450px; }
.search_result p { padding: 2px 10px; }
.search_result p.success { padding: 5px 0px; }
.search_result p span { margin: 0px 5px; color: #444; }
.search_result p a { color: #777; text-decoration: none; }
</style>
<div class="search_result">
	<h2>Search Result</h2>
<?php
if( count( $result ) > 0 ) {
	echo "<p class='success'>Total " . count( $result ) . " items found by the search <b>'$search'</b></p>";
	$i = 0;
	foreach( $result as $row ) {
		$i++;
		
		echo "
	<p>
		$i. <a href='" . base_url() . "home/product/$row->id'>$row->product_name</a>
		<span>Subcategory: <a href='" . base_url() . "home/content/subcategory/$row->id_subcategory'>". $subcategory[$row->id_subcategory] . "</a></span>
		<span>Category: <a href='" . base_url() . "home/content/category/$row->id_category'>". $category[$row->id_category] . "</a></span>
	</p>
		";
	}
}
else echo "<p class='error'>No result found by the search <b>'$search'</b></p>";
?>
























</div>
