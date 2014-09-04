<?php
function email_terdaftar($email)
{
	$sql = "SELECT email 
		FROM mahasiswa
		WHERE email = '$email'";
	$Q = mysql_query($sql);
	if (mysql_num_rows($Q) > 0)
		return true;
	return false;
}
function update_siswa($nama, $alamat, $tlp, $email, $password)
{
	$sql = "UPDATE mahasiswa
		SET nama='$nama', alamat ='$alamat',tlp='$tlp',email='$email'";
	if ($password != '')
	{
		$sql .= ",password='".md5($password)."'";
	}
	$sql .= " WHERE nis='".$_SESSION['nis']."'";
	if (mysql_query($sql) or die(mysql_error()))
	{
	//	$_SESSION['nama'] 	= $nama;
	//	$_SESSION['email'] 	= $email;
		return true;
	}
	return false;
}
function get_detail_siswa($nis)
{
	$sql = "SELECT *
		FROM mahasiswa
		WHERE nis = '$nis'";
	$Q	= mysql_query($sql);
	return mysql_fetch_assoc($Q);
}
if ($_POST)
{
	$err = false;
	if ($_POST['nama'] == '')
	{
		$err = true;
		$err_nama = 'Nama harus diisi.';
	}
	else
	{
		$nama = filter_var($_POST['nama'], FILTER_SANITIZE_STRING);
	}
	if ($_POST['alamat'] == '')
	{
		$err = true;
		$err_alamat = 'Alamat harus diisi.';
	}
	else
	{
		$alamat = filter_var($_POST['alamat'], FILTER_SANITIZE_STRING);
	}
	if ($_POST['tlp'] == '')
	{
		$err = true;
		$err_tlp = 'Telepon harus diisi.';
	}
	elseif (!is_numeric($_POST['tlp']))
	{
		$err 		= true;
		$err_tlp 	= 'Telepon harus diisi dengan angka.';
	}
	else
	{
		$tlp = filter_var($_POST['tlp'], FILTER_SANITIZE_NUMBER_INT);
	}
	if ($_POST['email'] == '')
	{
		$err = true;
		$err_email = 'Email harus diisi.';
	}
	elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
	{
		$err = true;
		$err_email = 'Format Email salah.';
	}
	elseif ($_POST['email'] != $_SESSION['email'] && email_terdaftar($_POST['email']))
	{
		$err = true;
		$err_email = 'Email Anda sudah terdaftar.';
	}
	else
	{
		$email = $_POST['email'];
	}
	$password = $_POST['password'];
	if ($password != '' && strlen($password) < 6)
	{
		$err = true;
		$err_password = 'Password minimal 6 karakter.';
	}
	if (!$err)
	{
		$success 		= update_siswa($nama, $alamat, $tlp, $email, $password);
		if ($success)
		{
			echo '<script>alert("Data Anda berhasil diperbarui.");location="index.php?pg=siswa&do=edit"</script>';
		}
		else
		{
			echo '<script>alert("Data Anda berhasil diperbarui.");</script>';
		}
	}
}

$siswa = get_detail_siswa($_SESSION['nis']);
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
<h1>Edit Mahasiswa</h1>
<div class="templatemo_fullgraybox">
	<form action='' method='post'>
		<table width="100%" border="0" cellspacing="5" cellpadding="5" class="detail">
			<tr>
				<td width="20%" rowspan="6" valign="top"><img src="<?php echo $siswa['foto']; ?>" alt="Foto profil" class="profil"/></td>
				<td width="20%" valign="top">Nama Lengkap</td>
				<td width="2%" align="center" valign="top">:</td>
				<td width="66%" align="left">
					<input name="nama" type="text" id="nama" value="<?php echo (isset($_POST['nama'])) ? $_POST['nama'] : $siswa['nama']; ?>" size="55">
					<?php echo (isset($err_nama)) ? '<p class="error">'.$err_nama.'</p>' : ''; ?>
				</td>
			</tr>
					<tr>
						<td valign="top">Alamat</td>
						<td align="center" valign="top">:</td>
						<td align="left">
							<textarea name="alamat" id="alamat" cols="45" rows="5"><?php echo (isset($_POST['alamat'])) ? $_POST['alamat'] : $siswa['alamat']; ?></textarea>
							<?php echo (isset($err_alamat)) ? '<p class="error">'.$err_alamat.'</p>' : ''; ?>
						</td>
					</tr>
					<tr>
						<td valign="top">No telp / Hp</td>
						<td align="center" valign="top">:</td>
						<td align="left">
							<input name="tlp" type="text" value="<?php echo (isset($_POST['tlp'])) ? $_POST['tlp'] : $siswa['tlp']; ?>" id="tlp" size="55">
							<?php echo (isset($err_tlp)) ? '<p class="error">'.$err_tlp.'</p>' : ''; ?>
						</td>
					</tr>
					<tr>
						<td valign="top">*Email </td>
						<td align="center" valign="top">:</td>
						<td align="left">
							<input name="email" type="text" value="<?php echo (isset($_POST['email'])) ? $_POST['email'] : $siswa['email']; ?>" id="email" size="55">
							<?php echo (isset($err_email)) ? '<p class="error">'.$err_email.'</p>' : ''; ?>
						</td>
					</tr>
					<tr>
						<td valign="top">Password</td>
						<td align="center" valign="top">:</td>
						<td align="left">
							<input name="password" type="password" value="<?php echo (isset($_POST['password'])) ? $_POST['password'] : ''; ?>" id="password" size="55">							
							<?php echo (isset($err_password)) ? '<p class="error">'.$err_password.'</p>' : ''; ?>
						</td>
					</tr>
					
					<tr>
						<td colspan="3" align="center">
							<input type="submit" name="proses" id="proses" value="UPDATE"></td>
					</tr>
		</table>
	</form>
</div>