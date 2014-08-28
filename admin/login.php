<?php
include '../inc/config.php';

if (isset($_SESSION['my_user']))
	header('Location:index.php');

include 'ver.php';
?>
<!doctype html>
<html>
	<head>
		<title>Login Administrator</title>
		<style type="text/css">
		body{font-family:calibri;}
		form{margin:100px 0 0 0;}
		table{text-align:center; border-collapse:collapse; border:#09F 1px solid; }
		#judul{background-color:#f90; color:#FFF;font-size:18px;height:40px;}
		input[name]{height:30px; padding:0;}
		#button{background-color:#f90; border:#F90 1px solid; color:#FFF; height:30px; width:100px; margin:5px;}
		#button:hover{background-color:#0CF;}
		.error {background: red;}
		body {
			background-color: #03F;
			background-image: url(../images/10322702_1438165476456770_484905134234674308_n.jpg);
		}
		</style>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"></head>
	<body>
		<form id="form1" name="form1" method="post" action="">
			<table width="244" border="0" align="center">
				<tr>
					<td width="236" align="center" id="judul">Login Administrator
					<?php echo isset($err_login) ? '<p class="error">'.$err_login.'</p>' : ''; ?>
					</td>
				</tr>
				<tr>
					<td>Username</td>
				</tr>
				<tr>
					<td>
						<input name="username" type="text" id="username" size="35" />
						<?php echo isset($err_uname) ? '<p class="error">'.$err_uname.'</p>' : ''; ?>
					</td>
				</tr>
				<tr>
					<td>Password</td>
				</tr>
				<tr>
					<td>
						<input name="password" type="password" id="password" size="35" />				
						<?php echo isset($err_pass) ? '<p class="error">'.$err_pass.'</p>' : ''; ?>
					</td>
				</tr>
				<tr>
					<td><input type="submit" name="button" id="button" value="Masuk" /></td>
				</tr>
			</table>
		</form>
	</body>
</html>