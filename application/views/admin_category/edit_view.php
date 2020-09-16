<div id="content-box">
	<div id="langbutton">
		<div id="titletext"><h2>Category: <?php echo isset( $id ) ? "Edit" : "Add"; ?></h2></div>
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
	
	<form action="<?php echo base_url() . $this->router->fetch_class(); ?>/add" method="post" id="langform" onsubmit="return checkRequired();">
		<fieldset id="langfieldset">
			
			<legend id="langlegend"><?php echo isset( $id ) ? "Edit" : "Add"; ?> Category:</legend>
			
			<?php if( validation_errors() ) { ?><div class="errorReport"> <?php echo validation_errors(); ?></div><?php } ?>
			
			<label>Category Name:</label>
			<div class="margin-form">
				<input type="text"  name="category_name" id="category_name"  value="<?php if( isset( $category_name ) ) echo $category_name; ?>" required="required" /> 
				<sup>*</sup>
			</div>
			<div class="clear"></div>
			
			<label>Category Description:</label>
			<div class="margin-form">
				<textarea name="category_description"  id="category_description" required="required"><?php if( isset( $category_description ) ) echo $category_description; ?></textarea> 
				<sup>*</sup>
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
</div>