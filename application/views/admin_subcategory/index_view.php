<div id="content-box">
	<div id="langbutton">
		<div id="titletext"><h2>Subcategory List:</h2></div>
		<?php $url = base_url().$this->router->fetch_class(); ?>
		<p class="add_new" ><a href="<?php echo $url; ?>/edit"><img src="<?php echo base_url();?>/assets/images/process-icon-new.png" /></a><br />Add New</p>
	</div>
	
	<div class="flash_massage_cotainer">
		<?php if( $this->session->flashdata( 'flashSuccess' )):?>
		<p class='flashMsg flashSuccess'> <?php echo $this->session->flashdata('flashSuccess'); ?> </p>
		<?php endif?>
	</div>
	
	<table border="0" cellspacing="2" cellpadding="0">
		<tr>
			<th>id</th>
			<th>Category</th>
			<th>Subcategory Name</th>
			<th>Subcategory Description</th>
            <th>Modified By</th>
            <th>Modified Time</th>
			<th class="td_center">Active</th>
			<th class="td_center">Actions</th>
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
			<td><?php if( isset( $category[$obj->id_category] )) echo $category[$obj->id_category]; ?></td>
			<td><?php echo $obj->subcategory_name; ?></td>
			<td><?php echo substr( $obj->subcategory_description, 0, 65 ) . " ..."; ?></td>
			<td><?php echo $admin[$obj->update_by]; ?></td>
			<td><?php echo date( "Y-m-d", $obj->update_date ); ?></td>
			<td class="td_center">
				<a href="<?php echo base_url() . $this->router->fetch_class() . '/alter_activation/' . $obj->id; ?>">
					<?php if( $obj->active == "1" ) { ?>
						<img src="<?php echo base_url();?>assets/images/enabled.gif" title="Enable" />
					<?php } else { ?>
						<img src="<?php echo base_url();?>assets/images/cross.png" title="Disable" />
					<?php } ?>
				</a> 
			</td>
			<td class="td_center">
				<a href="<?php echo base_url() . $this->router->fetch_class() . '/edit/' . $obj->id; ?>"><img src="<?php echo base_url();?>/assets/images/edit.png" title="Update"/></a> &nbsp;
				<a href="<?php echo base_url() . $this->router->fetch_class() . '/delete/' . $obj->id; ?>" onClick="return confirm('Are You sure to delete this item?');"><img src="<?php echo base_url();?>/assets/images/delete.gif" title="Delete"/></a>
			</td>
		</tr>
  <?php
   }
}
else echo "<tr><td colspan='7' class='td_center'><a href='$url/add'>Please add a subcategory first.</a></td></tr>";
?>
</table>
<?php if( count( $array ) > 0 && isset( $pagination )) echo "<div class='pagination'>$pagination</div>"; ?>