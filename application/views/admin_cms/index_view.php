<div id="content-box">
	<div id="langbutton">
		<div id="titletext"><h2>CMS: List</h2></div>
		<?php $url = base_url().$this->router->fetch_class(); ?>
		<p class="add_new" ><a href="<?php echo $url; ?>/add"><img src="<?php echo base_url();?>/assets/images/process-icon-new.png" /></a><br />Add New</p>
	</div>
	
	<table border="0" cellspacing="2" cellpadding="0">
		<tr>
            <th width="20%">CMS Title</th>
            <th>CMS Content</th>
            <th class="td_center" width="10%">Active</th>
			<th class="td_center" width="10%">Actions</th>
		</tr>
<?php
if( count( $array ) > 0 )
{	
	foreach($array as $row)
	{
?>
		<tr>
			<td><?php echo $row->title;?></td>
			<td>
				<?php
					if( strlen( $row->content ) < 50 ) echo $row->content;
					else echo substr( $row->content, 0, 50 ) . "...";
				?>
			</td>
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
   else echo "<tr><td colspan='4' class='td_center null_td_massage'><a href='$url/add'>Please add a service first.</a></td></tr>";
?>
	</table>
	<?php if( count( $array ) > 0 && isset( $pagination )) echo "<div class='pagination'>$pagination</div>"; ?>
</div>