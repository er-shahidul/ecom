<div id="content-box">
	<div id="langbutton">
		<div id="titletext"><h2>CMS : Add</h2></div>
		<?php $url = base_url(). $this->router->fetch_class(); ?>
		<p class="back_list" ><a href="<?php echo $url; ?>"><img src="<?php echo base_url();?>/assets/images/back.png" title="Back" /></a><br />Back</p>
	</div>
	 
	<form action="<?php echo "$url/add/"; ?>" method="post" id="langform">
		<fieldset id="langfieldset">
			<legend id="langlegend">Add CMS:</legend>
			
			<?php if( isset( $error ) ) { ?><div class="errorReport"> <?php echo validation_errors(); ?></div><?php } ?>
			<div class="errorReport"> <?php if( isset( $error_message )) echo $error_message; ?></div>
			
			<label>CMS Title:</label>
			<div class="margin-form">
				<input type="text" name="title" value="<?php if( isset( $row['title'] )) echo $row['title']; ?>" required="required" /> 
			</div>
			<div class="clear"></div>
			
			<label>CMS Content:</label>
			<div class="margin-form">
				<textarea id="mcontent" name="content"  class="tinymce"><?php if( isset( $row['content'] )) echo $row['content']; ?></textarea>
			</div>
			<div class="clear"></div>
			
			<label> </label>
			 <div class="margin-form">
			 	<input type="submit" value="Submit"  class="formsubmit"/>
			</div>
			<div class="clear"></div>
		
		</fieldset>    
    </form>
</div>