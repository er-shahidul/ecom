<div id="content-box">
	<div id="langbutton">
		<div id="titletext"><h2>User Payment: List</h2></div>
	</div>
	
	<table border="0" cellspacing="2" cellpadding="0">
		<tr>
            <th>Date</th>
            <th>Name</th>
            <th>E-mail</th>
            <th>Phone No</th>
            <th>Payment By</th>
            <th>Amount</th>
		</tr>
<?php
if( count( $array ) > 0 )
{	
	foreach($array as $row)
	{
?>
		<tr>
			<td><?php echo date( 'd M, Y', $row->date_time );?></td>
			<td><?php echo $row->fullname;?></td>
			<td><?php echo $row->email;?></td>
			<td><?php echo $row->phone_no;?></td>
			<td><?php echo $row->pay_by ?></td>
			<td><?php echo $row->price ?></td>
		</tr>
<?php
	}
}
   else echo "<tr><td colspan='6' class='td_center null_td_massage'>Payment list is empty yet.</td></tr>";
?>
	</table>
	<?php if( count( $array ) > 0 && isset( $pagination )) echo "<div class='pagination'>$pagination</div>"; ?>
</div>