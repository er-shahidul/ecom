<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title> <?php if(!empty($title)) { echo $title; } ?> </title>
	<link href="<?php echo base_url();?>assets/css/login.css" rel="stylesheet" type="text/css" />
	<?php if( file_exists( 'assets/js/login.js' )) { ?><script language="JavaScript" src="<?php echo base_url();?>assets/js/login.js" type="text/javascript"></script><?php } ?>
    
</head>
<body>   
	<div id="page">
		<div id="border-top" class="h_blue">
			<span class="title">Administration</span>
		</div>
		<div id="content-box">
			<div id="element-box" class="login">
				<div class="m wbg">
					<h1>Administration Login</h1>
					<div id="system-message-container"></div>
					<div id="section-box">
						<div class="m">
							<form action="<?php echo base_url();?>admin/login_action" method="post" id="form-login">
								<fieldset class="loginform">
									<table border="0">
										<?php if( isset( $massage )) echo "<tr><td colspan='2' style='color: #F10000;'>$massage</td></tr><tr><td colspan='2'></td>&nbsp;</tr>"; ?>
										<tr>
											<td class="label_td">
												<label id="mod-login-username-lbl" for="mod-login-username">Email ID</label>
											</td>
											<td class="input_td">
												<input name="username" id="login_username" type="email" class="inputbox" size="15" />
											</td> 
										</tr>
										<tr><td colspan="2"></td>&nbsp;</tr>
										<tr>
											<td class="label_td">
												<label id="mod-login-password-lbl" for="mod-login-password">Password</label>
											</td>
											<td class="input_td">
												<input name="password" id="login_password" type="password" class="inputbox" size="15" />
											</td> 
										</tr>
										<tr>
											<td class="label_td">&nbsp;</td>
											<td class="input_td">
												<input type="submit" class="hidebtn" value="Log in" />
											</td> 
										</tr>
									</table>        
									<div class="button-holder">
										<div class="button1">
											<div class="next"> </div>
										</div>
									</div>        
									<div class="clr"></div>            
								</fieldset>
							</form>					
						</div>
						<div class="clr"></div>
					</div>
					<p>Use a valid username and password to gain access to the administrator backend.</p>
					<p class="lin"><a href="<?php echo base_url();?>">Go to site home page.</a></p>
					<div id="lock"><img src="<?php echo base_url();?>/assets/images/lock.png" /></div>
				</div>
			</div>
			<noscript>Warning! JavaScript must be enabled for proper operation of the Administrator backend.</noscript>
		</div>
		<div id="footer"><p class="copyright"> Copyright Text Here............ </p></div>
	</div>
</body>
</html>