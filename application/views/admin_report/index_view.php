<div id="content-box">
	<div id="langbutton">
		<div id="titletext"><h2>Payment Report List:</h2></div>
	</div>
	
	<table border="0" cellspacing="2" cellpadding="0">
		<tr>
			<th>id</th>
			<th>User's Name</th>
			<th>User's Email</th>
            <th>User's Phone No</th>
            <th>User's Address</th>
            <th>Creation Time</th>
			<th>Song Info</th>
		</tr>
<?php
if( count( $array ) > 0 )
{
	$admin = $this->get_contents->get_admins();
	foreach($array as $obj )
	{
?>
		<tr>
			<td><?php echo $obj->id; ?></td>
			<td><?php echo $obj->user_name; ?></td>
			<td><?php echo $obj->user_email; ?></td>
			<td><?php echo $obj->user_phone_no; ?></td>
			<td><?php echo $obj->user_address; ?></td>
			<td><?php echo date( "Y-m-d", $obj->create_date ); ?></td>
			<td><?php echo $obj->id_song; ?></td>
  <?php
   }
}
else echo "<tr><td colspan='7' class='td_center'>Payment report is empty.</td></tr>";
?>
</table>
<?php if( count( $array ) > 0 && isset( $pagination )) echo "<div class='pagination'>$pagination</div>"; ?>