<div id="content-box">
	<div id="langbutton">
		<div id="titletext"><h2>User: List</h2></div>
		<?php $url = base_url().$this->router->fetch_class(); ?>
	</div>	

	<table border="0" cellspacing="2" cellpadding="0">
		<tr>
            <th>E-mail</th>
            <th>Name</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Address 2</th>
            <th>City</th>
            <th>State</th>
            <th>Country</th>
            <th>Zip Code</th>
            <th class="td_center">Active</th>
			<th class="td_center">Actions</th>
		</tr>
<?php
if( count( $array ) > 0 )
{	
	foreach($array as $row)
	{
?>
		<tr>
			<td><?php echo $row->email;?></td>
			<td><?php echo $row->fullname;?></td>
			<td><?php echo $row->phone_no;?></td>
			<td><?php echo $row->address;?></td>
			<td><?php echo $row->address2;?></td>
			<td><?php echo $row->city;?></td>
			<td><?php echo $row->state;?></td>
			<td><?php echo $row->name;?></td>
			<td><?php echo $row->zip_code;?></td>
			<td class="td_center">
				<a href="<?php echo base_url() . $this->router->fetch_class() . '/status/' . $row->id; ?>">
					<?php if( $row->status == "1" ) { ?>
						<img src="<?php echo base_url();?>assets/images/enabled.gif" title="Enable" />
					<?php } else { ?>
						<img src="<?php echo base_url();?>assets/images/cross.png" title="Disable" />
					<?php } ?>
				</a> 
			</td>
			<td class="td_center">
				<a href="<?php echo base_url() . $this->router->fetch_class() . '/edit/' . $row->id; ?>"><img src="<?php echo base_url();?>/assets/images/edit.png" title="Update"/></a> &nbsp;
				<a href="<?php echo base_url() . $this->router->fetch_class() . '/delete/' . $row->id; ?>" onClick="return confirm('Are You sure to delete this item?');"><img src="<?php echo base_url();?>/assets/images/delete.gif" title="Delete"/></a>
			</td>
		</tr>
<?php
	}
}
   else echo "<tr><td colspan='11' class='td_center null_td_massage'><a href='$url/add'>Please add an user info first.</a></td></tr>";
?>
	</table>
	<?php if( count( $array ) > 0 && isset( $pagination )) echo "<div class='pagination'>$pagination</div>"; ?>
</div>