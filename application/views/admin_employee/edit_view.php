<div id="content-box">
	<div id="langbutton">
		<div id="titletext"><h2>Employee: <?php echo isset( $id ) ? "Edit" : "Add"; ?></h2></div>
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
			
			<legend id="langlegend"><?php echo isset( $id ) ? "Edit" : "Add"; ?> Employes:</legend>
			
			<?php if( validation_errors() ) { ?><div class="errorReport"> <?php echo validation_errors(); ?></div><?php } ?>
			
			<label>First Name:</label>
			<div class="margin-form">
				<input type="text"  name="firstname" id="firstname"  value="<?php if( isset( $firstname ) ) echo $firstname; ?>" required="required" /> 
				<sup>*</sup>
			</div>
			<div class="clear"></div>
			
			<label>Last Name:</label>
			<div class="margin-form">
				<input type="text"  name="lastname"  id="lastname" value="<?php if( isset( $lastname ) ) echo $lastname; ?>" required="required" /> 
				<sup>*</sup>
			</div>
			<div class="clear"></div>
			
			<label>Email ID:</label>
			<div class="margin-form">
				<input type="email"  name="email"  id="email" value="<?php if( isset( $email ) ) echo $email; ?>" required="required" /> 
				<sup>*</sup>
			</div>
			<div class="clear"></div>
			
			<label>Password:</label>
			<div class="margin-form">
				<input type="password" id="password" name="password" pattern=".{6,12}" title="Min Lenght 6 Max Length 12" <?php if( !isset( $id )) { ?> required="required" <?php } ?> />
				<sup>*</sup>
			</div>
			<div class="clear"></div>
			
			<label>Employee Type:</label>
			<div class="margin-form">
				<select name="id_profiles"  id="id_profiles" required="required">
					<option value="">Select</option>
					<?php foreach( $res as $key => $obj ) { ?>
					<option value="<?php echo $key; ?>" <?php if(isset($id_profiles)){if($key==$id_profiles){echo "selected";}}?>><?php echo $obj; ?></option>
					<?php } ?>
				</select> 
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