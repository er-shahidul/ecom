		</div>
		<div class="footer">
			<div class="footer_content">
				<div class="footer_menu">
					<?php
					$fotter_menu = $this->get_contents->get_data_items( "cms", "status", "1", "*", $order_by = "id", $order_type = "ASC" );
					foreach( $fotter_menu as $i => $menu ) {
						echo "<a href='" . base_url() . "home/cms/$menu->id'>$menu->title</a>";
						if( count( $fotter_menu ) - 1 != $i ) echo " | ";
					}
					?>
				</div>
				<div class="partners">
					
				</div>
				<div class="clear"> </div>
			</div>
		</div>
		<div class="powered_contnet">
			<div class="copyright">&copy; Online Sales. <?php echo date( "Y" );?>  </div>
			<div class="powered">Powered And Shahidul BY <a href="http://www.shahidul.com/" target="_blank">www.shahidul.com</a></div>
			<div class="clear"> </div>
		</div>
	</div>
</body>
</html>