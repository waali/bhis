<?php
require '../inc/library/class.phpmailer.php';
require '../inc/library/class.smtp.php';
if ($_POST)
{
	$error = false;
	if ($_POST['pesan'] == '')
	{
		$error = true;
		$e_pesan = 'Pesan harus diisi';
	}
	if (!$error)
	{
		$mail             = new PHPMailer();
		$mail->IsHTML(true);
		$mail->Body = $_POST['pesan'];
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
		$mail->Subject    = 'Reply: '.$_POST['nama'].' - AKPAR BHIS';
		$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!";
		$mail->AddAddress($_POST['email'], $_POST['nama']);
		//$mail->Send();
		if ((isset($_SERVER['HTTP_HOST']) && ($_SERVER['HTTP_HOST'] == 'www.akparbhis.com' || $_SERVER['HTTP_HOST'] == 'akparbhis.com')) || $_SERVER['SERVER_NAME'] == 'www.akparbhis.com' || $_SERVER['SERVER_NAME'] == 'akparbhis.com')
		{
			if(!$mail->Send())
			{
				die("Mailer Error: " . $mail->ErrorInfo);
			}
		}
		else
		{
			echo '<script>alert("Maaf, saat ini sistem sedang offline..");location="index.php?pg=kontak/data_kontak";</script>';
		}
	}
}
?>
<h1>Lihat Buku Tamu</h1>
<?php
$data = mysql_query("select * from buku_tamu where id = '$_GET[id]';");
$no = 1;
while($tampil = mysql_fetch_array($data))
{
?>	  
	<style>
	table {
		border:#666 1px solid;}
	</style>
	<form action="" method="post">
	  <table width="441" border="1" align="center">
		<tr>
		  <td width="111">Nama</td>
		  <td width="3">:</td>
		  <td width="305"><?php echo $tampil['nama'];?><input type="hidden" name="nama" value="<?php echo $tampil['nama'];?>" /></td>
		</tr>
		<tr>
		  <td>Email</td>
		  <td>:</td>
		  <td><?php echo $tampil['email'];?><input type="hidden" name="email" value="<?php echo $tampil['email'];?>" /></td>
		</tr>
		<tr>
		  <td>Tanggal</td>
		  <td>:</td>
		  <td><?php echo $tampil['tanggal'];?></td>
		</tr>
		<tr>
		  <td>No. Hp</td>
		  <td>:</td>
		  <td><?php echo $tampil['telepon'];?> </td>
		</tr>
		<tr>
		  <td valign="top">Pesan</td>
		  <td valign="top">:</td>
		  <td><?php echo $tampil['pesan'];?></td>
		</tr>
		<tr>
		  <td valign="top">Balas</td>
		  <td valign="top">:</td>
		  <td><textarea name="pesan" id="pesan" cols="45" rows="5"><br><br><br><br>     
  -------------------------------------------------------------------------------------------------------<br> 
  <?php echo $tampil['pesan'];?>"</textarea>
				<?php echo isset($e_pesan) ? '<p class="error-message">'.$e_pesan.'</p>' : ''; ?></td>
		</tr>
		<tr>
		  <td height="32">&nbsp;</td>
		  <td>&nbsp;</td>
		  <td><input type="submit" value="Balas"class="klik">&nbsp;<a href="?pg=kontak/data_kontak" class="klik">Kembali</a></td>
		</tr>
	  </table>
	</form>
<?php } ?>