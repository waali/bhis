<?php
require '../inc/library/class.phpmailer.php';
require '../inc/library/class.smtp.php';
if (isset($_POST['pembayaran']) && $_POST['pembayaran'] == 'lunas')
{
	$data 	= mysql_query("select * from formulir where nomor_formulir = '$_POST[nomor_formulir]'");
	$tampil = mysql_fetch_array($data);
	$nis	= str_replace("FORM.", '', $tampil['nomor_formulir']);
	$password = md5($tampil['tanggal_lahir']);
	$sql 	= "INSERT INTO mahasiswa (nis , nama, foto, jenis_kelamin, agama, email, password, alamat, kota_lahir, tanggal_lahir, sekolah, jurusan, kelas, hobi, cita, tlp, ayah, ibu, pekerjaanayah, pekerjaanibu, tanggal_daftar)
		VALUES ('".$nis."', '".$tampil['nama']."', '".$tampil['foto']."', '".$tampil['jenis_kelamin']."', '".$tampil['agama']."', '".$tampil['email']."', '".$password."', '".$tampil['alamat']."', '".$tampil['kota_lahir']."', '".$tampil['tanggal_lahir']."', '".$tampil['sekolah']."', '".$tampil['jurusan']."', '".$tampil['kelas']."' '".$tampil['kelas']."', '".$tampil['hobi']."', '".$tampil['cita']."', '".$tampil['tlp']."', '".$tampil['ayah']."', '".$tampil['ibu']."', '".$tampil['pekerjaanayah']."', '".$tampil['pekerjaanibu']."', '".$tampil['tanggal_daftar']."')";
	mysql_query($sql) or die(mysql_error());
	mysql_query("UPDATE formulir SET lunas = '1' WHERE nomor_formulir = '".$tampil['nomor_formulir']."'");
	$body_mail = '<html><head><meta http-equiv="content-type" content="text/html; charset=utf-8" /></head><body>
		<h1>Terimakasih.</h1>
		<p>Saat ini anda sudah menjadi mahasiswa/siswa di AKPAR BHIS</p>
		<p>Segera lakukan login di ruang mahasiswa/siswa untuk melihat jadwal.</p>
		NIS : '.$nis.'<br/>
		Password: '.$tampil['tanggal_lahir'].'<br/>
		<p>Silahkan login <a href="http://akparbhis.com/?pg=siswa&do=login">disini</a>.</p>
		</body>
		</html>';
	$mail             = new PHPMailer();
	$mail->IsHTML(true);
	$mail->Body = $body_mail;
	$mail->IsSMTP();
	$mail->SMTPDebug  = 0;
	$mail->SMTPAuth   = true;
	//$mail->SMTPSecure  = "ssl"; //Secure conection
	//$mail->Port        = 465;
	//$mail->SMTPSecure = "ssl";
	$mail->Host       = "mail30.propanraya.com";
	//$mail->Port       = 465;
	$mail->Username   = "seto.elkahfi@propanraya.com";
	$mail->Password   = "fr6525";
	$mail->SetFrom('noreply@akparbhis.com', 'Akpar BHIS');
	$mail->Subject    = 'Aktivasi Akun - Akpar BHIS';
	$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!";
	$mail->AddAddress($tampil['email'], $tampil['nama']);
	//$mail->Send();		
	if ((isset($_SERVER['HTTP_HOST']) && ($_SERVER['HTTP_HOST'] == 'www.akparbhis.com' || $_SERVER['HTTP_HOST'] == 'akparbhis.com')) || $_SERVER['SERVER_NAME'] == 'www.akparbhis.com' || $_SERVER['SERVER_NAME'] == 'akparbhis.com')
	{					
		if(!$mail->Send())
		{
			echo "Mailer Error: " . $mail->ErrorInfo;
		}
	}
	else
	{
		echo '<script>alert("Maaf, saat ini sistem sedang offline. Sistem tidak bisa mengirim informasi login ke email Anda. Mohon cetak formulir Anda dan segera hubungi staf Akpar BHIS. Mohon maaf atas ketidaknyamanan Anda. Terimakasih.");</script><br/>';
	}				
	?>
	<script>
	alert('Data pendaftar berhasil diubah.');
	document.location = '?pg=pendaftaran/data_pendaftar';
	
	</script>	
	<?php
	//echo $nis;
}

$data 	= mysql_query("select * from formulir where nomor_formulir = '$_GET[id]'");
$tampil = mysql_fetch_array($data);
?>
<h1>Ubah Status Pendaftaran | <?php echo $_GET['id']; ?></h1>
<form action="" method="post" enctype="multipart/form-data" name="form1">
	<table width="441" border="1" align="center">
		<tr>
			<td width="314">Nama</td>
			<td width="8">:</td>
			<td width="97">
				<?php echo $tampil['nama'];?>
				<input type="hidden" name="nomor_formulir" value="<?php echo $_GET['id'];?>" />
			</td>
		</tr>
		<tr>
			<td>Email</td>
			<td>:</td>
			<td><?php echo $tampil['email'];?></td>
		</tr>
		<tr>
			<td>Tanggal</td>
			<td>:</td>
			<td><?php echo $tampil['tanggal_daftar']; ?></td>
		</tr>
		<tr>
			<td>Status Pembayaran</td>
			<td>:</td>
			<td>
				<select name="pembayaran" >
					<option value="lunas" >Lunas</option>
					<option value="belumlunas" selected>Belum Lunas</option>
				</select>
			</td>
		</tr>
		<tr>
		  <td height="42">&nbsp;</td>
		  <td>&nbsp;</td>
		  <td><input type="submit" name="button" class="klik" value="Simpan"></td>
		</tr>
	</table>
</form>