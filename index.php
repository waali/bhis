<?php
include 'inc/config.php';
include 'inc/general.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>BHIS School</title>
		<meta name="keywords" content="" />
		<meta name="description" content="" />
		<link href="assets/css/style.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" type="text/css" href="assets/css/ui-lightness/jquery-ui-1.9.2.custom.min.css" />
		<script type="text/javascript" src="assets/js/jquery-1.8.3.js"></script>
		<script type="text/javascript" src="assets/js/jquery-ui-1.9.2.custom.min.js"></script>
	<style type="text/css">
<!--
body {
	background-color: #900;
}
body,td,th {
	color: #000;
}
-->
</style></head>
	<body>
		<div id="templatemo_container">
			<div id="templatemo_topbar">
				<div id="languagebox">
					<a href="#"><img src="assets/images/engflag.gif" alt="English" /></a>
					<a href="#"><img src="assets/images/frenchflag.gif" alt="French" /></a>
					<a href="#"><img src="assets/images/germanyflag.gif" alt="Germany" /></a>
					<a href="#"><img src="assets/images/japanflag.gif" alt="Japan" /></a>
				</div>
			</div>
			<div id="templatemo_header">
				<div id="templatemo_logo">
				  <img src="assets/images/logo.png" alt="Logo" />
				  <div id="templatemo_sitetitle"></div>
				</div>				
				<div id="templatemo_login">
					<form method="post" action="index.php?pg=login">
						<label>Email:</label><input class="inputfield" name="email_address" type="text" id="email_address"/>
						<label>Password:</label><input class="inputfield" name="password" type="password" id="password"/>
						<input class="button" type="submit" name="Submit" value="Login" />
					</form>
				</div>
			</div>
			<div id="templatemo_menu">
				<ul>
					<li><a href="index.php">Home</a></li>
					<li><a href="index.php?pg=about">Tentang Kami</a></li>
					<li><a href="index.php?pg=jurusan">Jurusan</a></li>
					<li><a href="index.php?pg=pendaftaran">Pendaftaran</a></li>               
					<li><a href="index.php?pg=contact" class="lastmenu">Hubungi Kami</a></li>            
				</ul>  
			</div>			
			<div id="templatemo_banner">
				<?php include 'controller/main.php'; ?>
		  </div>
			<div id="templatemo_light_blue_row">
			  <div class="templatemo_gallery"><?php echo render_footer_left(); ?></div>
				<div class="templatemo_partners">
					<?php echo render_footer_right(); ?>
				</div>
			</div>
			<div id="templatemo_footer">
				Copyright © <?php echo date('Y'); ?> <a href="#"><strong>BHIS School</strong></a> | Developed by <a href="http://www.twitter.com/Waali Rizqi" target="_parent">Waali Rizqi</a>
			</div>
		</div>
	</body>
</html>