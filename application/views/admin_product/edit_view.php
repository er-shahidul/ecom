<div id="content-box">
	<div id="langbutton">
		<div id="titletext"><h2>Product: <?php echo isset( $id ) ? "Edit" : "Add"; ?></h2></div>
		<p>
			<a href="<?php echo base_url() . $this->router->fetch_class(); ?>">
				<img src="<?php echo base_url();?>/assets/images/back.png" title="Back" />
			</a>
			<br />Back
		</p>
	</div>
	
	<div class="flash_massage_cotainer">
		<?php if( $this->session->flashdata( 'flashError' )):?>
		<p class='flashMsg flashError'> <?php echo $this->session->flashdata('flashError'); ?> </p>
		<?php endif?>
	</div>
	
	<form action="<?php echo base_url() . $this->router->fetch_class(); ?>/add" method="post" id="langform" enctype="multipart/form-data">
		<fieldset id="langfieldset">
			
			<legend id="langlegend"><?php echo isset( $id ) ? "Edit" : "Add"; ?> Product:</legend>
			
			<?php if( validation_errors() ) { ?><div class="errorReport"> <?php echo validation_errors(); ?></div><?php } ?>
			
			<label>Category Name:</label>
			<div class="margin-form">
				<select name="id_category" id="id_category" required="required">
					<option value="">Select Category</option>
					<?php if( $category != '' ) foreach( $category as $cid => $cat_name ) echo "<option value='$cid' ".( isset( $id_category ) && $id_category == $cid ? "selected='selected'" : "" ).">$cat_name</option>"; ?>
				</select>
				<sup>*</sup>
			</div>
			<div class="clear"></div>
			
			<label>Subcategory Name:</label>
			<div class="margin-form">
				<select name="id_subcategory" id="id_subcategory" required="required">
					<option value="">Select Category</option>
					<?php if( $subcategory != '' ) foreach( $subcategory as $scid => $scat_name ) echo "<option value='$scid' ".( isset( $id_subcategory ) && $id_subcategory == $scid ? "selected='selected'" : "" ).">$scat_name</option>"; ?>
				</select>
				<sup>*</sup>
			</div>
			<div class="clear"></div>
			
			<label>Product Name:</label>
			<div class="margin-form">
				<input type="text"  name="product_name" id="product_name"  value="<?php if( isset( $product_name ) ) echo $product_name; ?>" style="width: 499px" required="required" /> 
				<sup>*</sup>
			</div>
			<div class="clear"></div>
			
			<label>Product Meta Title:</label>
			<div class="margin-form">
				<input type="text"  name="product_short" id="product_short"  value="<?php if( isset( $product_short ) ) echo $product_short; ?>" style="width: 499px" /> 
			</div>
			<div class="clear"></div>
			
			<label>Product Description:</label>
			<div class="margin-form">
				<textarea name="product_description"  id="product_description" required="required"><?php if( isset( $product_description ) ) echo $product_description; ?></textarea> 
				<sup>*</sup>
			</div>
			<div class="clear"></div>
			
			<label>Product Price:</label>
			<div class="margin-form">
				<input type="text"  name="product_price" id="product_price"  value="<?php if( isset( $product_price ) ) echo $product_price; ?>" style="width: 80px" required="required" /> 
				<sup>* USD Rate</sup>
			</div>
			<div class="clear"></div>
			
			<label>Product Image:</label>
			<div class="margin-form">
				<input type="file" name="phy_path" id="phy_path" /> 
			</div>
			<div class="clear"></div>
			
			<label>Product Statistics:</label>
			<div class="margin-form" style="margin-top: 4px;">
				<input type="checkbox" name="status_new" value="1" <?php if( isset( $status_new ) && $status_new == 1 ) echo "checked='checked'"; ?> /> New Released &nbsp; &nbsp; &nbsp; 
				<input type="checkbox" name="status_featured" value="1" <?php if( isset( $status_featured ) && $status_featured == 1 ) echo "checked='checked'"; ?> /> Featured &nbsp; &nbsp; &nbsp;
				<input type="checkbox" name="status_top" value="1" <?php if( isset( $status_top ) && $status_top == 1 ) echo "checked='checked'"; ?> /> Top Product 
			</div>
			<div class="clear"></div>
			
			<label> </label>
			<div class="margin-form">
				<input type="hidden" name="cmd" value="add" />
				<input type="hidden" name="id" value="<?php if(isset($id)){ echo $id;}?>" />
				<input type="submit" name="submit" value="Submit"  class="formsubmit"/>
			</div>
			<div class="clear"></div>
			
		</fieldset>
	</form>
	
	<?php if( isset( $phy_path )) echo "<div class='product_img'><img src='" . base_url() . "assets/product/" . ( $phy_path == "" ? "nopicture.png" : $phy_path ) . "' /></div>"; ?>
</div>