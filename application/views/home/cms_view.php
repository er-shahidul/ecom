<div class="width_1000 back_white">
	<div class="float_left width_700 border_right">
	<?php
	echo "
	<h2 class='cms_title'>$cms->title</h2>
	<div class='cms_content'>$cms->content</div>
	";
	?>
	</div>
	<?php $this->load->view( 'home/right_view' ); ?>
	<div class="clear"></div>
</div>
