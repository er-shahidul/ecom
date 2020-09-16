<div id="content-box">
	<div id="langbutton">
		<div id="titletext"><h2>Home Banner</h2></div>
		<?php $url = base_url(). $this->router->fetch_class() . "/home_banner"; ?>
	</div>
	<style> input[type="text"] { width: 200px; } input[type="file"] { width: auto; } .margin-form img { width: 250px; }</style>
	<form action="<?php echo $url; ?>" method="post" id="langform" enctype="multipart/form-data">
		<fieldset id="langfieldset">
			<legend id="langlegend">Banner Image List:</legend>	
			
			<?php
			if( isset( $banner[0] )) {
				foreach( $banner as $baner ) echo "
					<label>Image Info:</label>
					<div class='margin-form'>
						<img src='" . base_url() . "assets/banner/$baner->url'><br /><br />
						<a href='$url/$baner->id' title='Edit This'>Image No: $baner->id &nbsp;&nbsp;&nbsp; Title: $baner->title " . ( isset( $product[$baner->id_product] ) ? ( "&nbsp;&nbsp;&nbsp; Product: " . $product[$baner->id_product] ) : "" ) . "&nbsp;&nbsp;&nbsp; Display Status: " . ( $baner->status == 0 ? "Hide" : "Show" ) . "</a> " . ( $baner->link != "" ? "&nbsp;&nbsp;&nbsp; <a href='$baner->link'>Direct Link: $baner->link</a>" : "" ) . "
						&nbsp;&nbsp;&nbsp; 
						<a href='" . base_url() . "admin_setting/banner_delete/$baner->id' onclick=\"return confirm( 'Are you sure want to delete this?' );\">Delete This Banner</a>
					</div>
					<div class='clear'></div>
				";
			}
			?>
		</fieldset>
    </form>
	
	<form action="<?php echo $url; ?>" method="post" id="langform" enctype="multipart/form-data">
		<fieldset id="langfieldset">
			<legend id="langlegend">Banner Image Edit:</legend>	
			
			<label>Image Info:</label>
			<div class="margin-form">
				<input type="text" name="title" value="<?php if( isset( $item )) echo $item->title ?>" /> 
				<input type="file" name="file" /> <br /><br />
				<?php if( isset( $item )) echo "<img src='". base_url() . "assets/banner/$item->url' /><br /><br />Image No: $item->id"; ?>
			</div>
			<div class="clear"></div>

			<label>Product Link:</label>
			<div class="margin-form">
				<select name="link">
					<option value=""> Select </option>
					<?php
					if( isset( $product ) && count( $product ) > 0 )
						foreach( $product as $id_product => $product_name )
							echo "<option value='$id_product'" . ( isset( $item ) && $item->id_product == $id_product ? "selected='selected'" : "" ) . "> $product_name </option>";
					?>
				</select>
			</div>
			<div class="clear"></div>

			<label>Direct Link:</label>
			<div class="margin-form">
				<input type="text" name="direct_link" value="<?php if( isset( $item )) echo $item->link; ?>" />
			</div>
			<div class="clear"></div>

			<label>Display Status:</label>
			<div class="margin-form">
				<input type="radio" name="status" value="0" <?php if( isset( $item ) && $item->status == 0 ) echo "checked='checked'"; ?> /> Hide
				<input type="radio" name="status" value="1" <?php if( !isset( $item ) || $item->status == 1 ) echo "checked='checked'"; ?> /> Show
			</div>
			<div class="clear"></div>

			<label> </label>
			 <div class="margin-form">
				<input type="hidden" name="cmd" value="add" />
				<?php if( isset( $item )) echo "<input type='hidden' name='id' value='$item->id' />"; ?>
				<input type="submit" name="submit" value="Submit"  class="formsubmit"/>
			</div>
			<div class="clear"></div>		

		</fieldset>
    </form>
</div>