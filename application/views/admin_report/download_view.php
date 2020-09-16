<style> 
tr:nth-child(2n+1) {
    background: #FFFFFF;
}
</style>
<div id="content-box">
	<div id="langbutton">
		<div id="titletext"><h2>Download Report List:</h2></div>
	</div>
	
	<table border="0" cellspacing="2" cellpadding="0">
		<tr>
			<th>Sl</th>
			<th>Invoice No</th>
			<th>Date</th>
			<th>Time</th>
			<th> </th>
			<th>Song Title</th>
			<th>Artists</th>
			<th>Album Name</th>
			<th>Label</th>
			<th>Charge</th>
			<th>Status</th>
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
		$print = "
		<tr>
			<td rowspan='$rowspan'>$sl</td>
			<td rowspan='$rowspan'>$obj->id</td>
			<td rowspan='$rowspan'>" . date( "Y-m-d", $obj->date_time ) . "</td>
			<td rowspan='$rowspan'>" . date( "h:i:s", $obj->date_time ) . "</td>
		";
		foreach( $info[$key] as $i => $row ) {
			$j = $i + 1;
			$artist_arr = explode( ",", $row->id_artist );
			$artist_name = array();
			foreach( $artist_arr as $id_name ) $artist_name[] = $artist[$id_name]->artist_name;
			$artist_name = implode( ", ", $artist_name );
			if( $i != 0 ) $print .= "<tr><td>$j</td><td>$row->song_name</td><td>$artist_name</td><td>$row->album_name</td><td>$row->copyright</td></tr>";
			else $print .= "<td>$j</td><td>$row->song_name</td><td>$artist_name</td><td>$row->album_name</td><td>$row->copyright</td><td rowspan='$rowspan' class='td_right'>$obj->price</td><td rowspan='$rowspan'>$obj->download</td></tr>";
		}
		echo $print;
   }
   echo "<tr><td colspan='9'> </td><td class='td_right'>" . number_format( $total, 2 ). "</td><td> </td></tr>";
}
else echo "<tr><td colspan='11' class='td_center'>Download report is empty.</td></tr>";
?>
</table>
<?php if( count( $array ) > 0 && isset( $pagination )) echo "<div class='pagination'>$pagination</div>"; ?>