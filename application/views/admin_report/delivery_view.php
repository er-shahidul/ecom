<style> 
tr:nth-child(2n+1) {
    background: #FFFFFF;
}
</style>
<div id="content-box">
	<div id="langbutton">
		<div id="titletext"><h2>Delivary Report List:</h2></div>
	</div>
	
	<table border="0" cellspacing="2" cellpadding="0">
		<tr>
			<th>Sl</th>
			<th>Invoice No</th>
			<th>Date - Time</th>
			<th> </th>
			<th>Product Tilte</th>
			<th>Category</th>
			<th>Subcategory</th>
			<th>Charge</th>
			<th>Status</th>
			<th>Action</th>
		</tr>
<?php
if( count( $array ) > 0 )
{
	$total = 0;
	$admin = $this->get_contents->get_admins();
	foreach($array as $key => $obj )
	{
		$sl++;
		$total += $obj->price;
		$rowspan = count( $info[$key] );
		$url = base_url() . "admin_report/delivery/$offset/$obj->id";
		if( $obj->payment == "Denied" ) $action = "<a href='javascript:void(0);'>Denied</a>";
		else if( $obj->delivered == "Pending" ) $action ="<a href='$url/courierd'>Courierd</a> | <a href='$url/canceled'>Canceled</a>";
		else if( $obj->delivered == "Courierd" ) $action = "<a href='$url/delivered'>Delivered</a> | <a href='$url/returned'>Returned</a>";
		else $action = "<a href='javascript:void(0);'>$obj->delivered</a>";
		$print = "
		<tr>
			<td rowspan='$rowspan'>$sl</td>
			<td rowspan='$rowspan'>$obj->id</td>
			<td rowspan='$rowspan'>" . date( "Y-m-d h:i:s", $obj->date_time ) . "</td>
		";
		foreach( $info[$key] as $i => $row ) {
			$j = $i + 1;
			if( $i != 0 ) $print .= "<tr><td>$j</td><td>$row->product_name</td><td>" . $category[$row->id_category] . "</td><td>" . $subcategory[$row->id_subcategory] . "</td></tr>";
			else $print .= "<td>$j</td><td>$row->product_name</td><td>" . $category[$row->id_category] . "</td><td>" . $subcategory[$row->id_subcategory] . "</td><td rowspan='$rowspan' class='td_right'>$obj->price</td><td rowspan='$rowspan'>$obj->payment</td><td rowspan='$rowspan'>$action</td></tr>";
		}
		echo $print;
   }
   echo "<tr><td colspan='7'> </td><td class='td_right'>" . number_format( $total, 2 ). "</td><td colspan='2'> </td></tr>";
}
else echo "<tr><td colspan='10' class='td_center'>Delivary report is empty.</td></tr>";
?>
</table>
<?php if( count( $array ) > 0 && isset( $pagination )) echo "<div class='pagination'>$pagination</div>"; ?>