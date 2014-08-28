<?php
//var_dump($_SESSION);
function do_login($nis, $password)
{
	$sql = "SELECT * FROM siswa
		WHERE nis = '$nis'
			AND password = '$password'";
	$Q = mysql_query($sql);
	if (mysql_num_rows($Q) > 0)
	{
		$data 				= mysql_fetch_assoc($Q);
		$_SESSION['nis'] 	= $data['nis'];
		$_SESSION['nama'] 	= $data['nama'];
		?>
		<script>
		alert('Thanks for logging in.');
		location = '?pg=siswa';
		</script>
		<?php
	}
	else
	{
		?>
		<script>
		alert('Password atau Nis anda salah. Silahkan coba lagi.');
		</script>
		<?php
	}
}

if($_POST)
{
	$err = false;
	foreach($_POST as $key=>$value)
	{
		$_POST[$key] = strip_tags($_POST[$key]);
	}
	
	if($_POST['nis'] == '')
	{
		$err 		= true;
		$err_nis 	= 'NIS harus diisi.';
	}
	else
	{
		$nama = filter_var($_POST['nis'], FILTER_SANITIZE_STRING);
	}
	
	if($_POST['password'] == '')
	{
		$err 			= true;
		$err_password	= 'Password harus diisi.';
	}
	else
	{
		$password = md5($_POST['password']);
	}
	
	if (!$err)
	{
		do_login($_POST['nis'], $password);
	}
}
?>
<style>
.templatemo_fullgraybox {
    border: 1px solid #cccccc;
    clear: both;
    float: left;
    margin: 0px 0px 25px;
    padding: 25px;
    width: 790px;
}
</style>
<h1>Profil Mahasiswa</h1>
<div class="templatemo_fullgraybox">
					
				<div id="templatemo_login">
					<form method="post" action="index.php?pg=siswa&do=login">
						<label>Email:</label><input class="inputfield" name="email_address" type="text" id="email_address"/>
						<label>Password:</label><input class="inputfield" name="password" type="password" id="password"/>
						<input class="button" type="submit" name="Submit" value="Login" />
					</form>
				</div>
	<img src="assets/images/image_200x200.gif" alt="project" />
	</div>