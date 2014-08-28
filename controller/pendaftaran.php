<?php
include 'inc/function/pendaftaran.php';

$action = (isset($_GET['action'])) ? $_GET['action'] : '';
if ($action == '') :

	if($_POST)
	{
		$err = false;
		// strip_tags() all post
		foreach($_POST as $key=>$value)
		{
			$_POST[$key] = strip_tags($_POST[$key]);
		}
		if ($_POST['nama'] == '')
		{
			$err = true;
			$err_nama = 'Nama harus diisi.';
		}
		else
		{
			$nama = filter_var($_POST['nama'], FILTER_SANITIZE_STRING);
		}
		
		if (isset($_POST['jenis_kelamin']))
		{
			$jenis_kelamin = $_POST['jenis_kelamin'];
		}
		else
		{
			$err = true;
			$err_jenis_kelamin = 'Pilih jenis kelamin.';
		}	
		
		if ($_POST['kota_lahir'] == '')
		{
			$err = true;
			$err_kota_lahir = 'Kota kelahiran harus diisi.';
		}
		else
		{
			$kota_lahir = filter_var($_POST['kota_lahir'], FILTER_SANITIZE_STRING);
		}
		
		if ($_POST['tanggal_lahir'] == '')
		{
			$err = true;
			$err_tanggal_lahir = 'Tanggal lahir harus diisi.';
		}
		else
		{
			$tanggal_lahir = filter_var($_POST['tanggal_lahir'], FILTER_SANITIZE_NUMBER_INT);
			if (!preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/", $tanggal_lahir))
			{
				$err = true;
				$err_tanggal_lahir = 'Format tanggal lahir harus yyyy-mm-dd.';
			}
		}
		
		if ($_POST['agama'] == '')
		{
			$err = true;
			$err_agama = 'Agama harus diisi.';
		}
		else
		{
			$agama = filter_var($_POST['agama'], FILTER_SANITIZE_STRING);
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
		
		if ($_POST['sekolah'] == '')
		{
			$err = true;
			$err_sekolah = 'Asal sekolah harus diisi.';
		}
		else
		{
			$sekolah = filter_var($_POST['sekolah'], FILTER_SANITIZE_STRING);
		}
		
		
		if ($_POST['sekolah'] == '')
		{
			$err = true;
			$err_sekolah = 'Asal sekolah harus diisi.';
		}
		else
		{
			$sekolah = filter_var($_POST['sekolah'], FILTER_SANITIZE_STRING);
		}
		if ($_POST['hobi'] == '')
		{
			$err = true;
			$err_hobi = 'Hobi harus diisi.';
		}
		else
		{	
			$hobi = filter_var($_POST['hobi'], FILTER_SANITIZE_STRING);
		}
		if ($_POST['cita'] == '')
		{
			$err = true;
			$err_cita = 'Cita-cita harus diisi.';
		}
		else
		{
			$cita = filter_var($_POST['cita'], FILTER_SANITIZE_STRING);
		}
		
		if ($_POST['ayah'] == '')
		{
			$err = true;
			$err_ayah = 'Nama ayah harus diisi.';
		}
		else
		{
			$ayah = filter_var($_POST['ayah'], FILTER_SANITIZE_STRING);
		}
		if ($_POST['ibu'] == '')
		{
			$err = true;
			$err_ibu = 'Nama ibu harus diisi.';
		}
		else
		{
			$ibu = filter_var($_POST['ibu'], FILTER_SANITIZE_STRING);
		}
		
		if ($_POST['pekerjaanayah'] == '')
		{
			$err = true;
			$err_pekerjaanayah = 'Pekerjaan Ayah harus diisi.';
		}
		else
		{
			$pekerjaanayah	= filter_var($_POST['pekerjaanayah'], FILTER_SANITIZE_STRING);
		}
		
		if ($_POST['pekerjaanibu'] == '')
		{
			$err = true;
			$err_pekerjaanibu = 'Pekerjaan Ibu harus diisi.';
		}
		else
		{
			$pekerjaanibu	= filter_var($_POST['pekerjaanibu'], FILTER_SANITIZE_STRING);
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
		elseif (email_terdaftar($_POST['email']))
		{
			$err = true;
			$err_email = 'Email Anda sudah terdaftar.';
		}
		else
		{
			$email = $_POST['email'];
		}
		
		$kelas = isset($_POST['kelas']) ? $_POST['kelas'] : '' ;
		if ($kelas == '')
		{
			$err = true;
			$err_kelas= 'Setidaknya pilih salah satu kelas.';
		}
		
		$tingkat = $_POST['tingkat'];
		$kode_tingkat = ($tingkat == 'SMA') ? '1' :'2';

		if ($_FILES['foto']['name'] == '')
		{
			$err 		= true;
			$err_foto 	= 'Mohon upload foto Anda.';
		}
		
		if (!$err)
		{
			$nomor_formulir	= 'FORM.'.date('y').'.'.$kode_tingkat.$kelas.'.'.get_no_urut();
			$success = simpan_formulir($nomor_formulir,$nama,$jenis_kelamin,$kota_lahir,$tanggal_lahir,$agama,$alamat,$tlp,$sekolah,$kelas,$hobi,$cita,$ayah,$ibu,$pekerjaanayah,$pekerjaanibu,$email,$tingkat);
			if ($success == true)
			{
				$uploads_dir 	= './uploads/foto';
				$tmp_name 		= $_FILES['foto']['tmp_name'];
				$name 			= $nomor_formulir.'-'.$_FILES['foto']['name'];
				if (move_uploaded_file($tmp_name, "$uploads_dir/$name"))
				{
					update_formulir($nomor_formulir, "$uploads_dir/$name");
				}
				else
				{
					echo '<script>alert("Sorry, can not upload photo.");</script>';
				}
				// freeup $_POST variables
				foreach($_POST as $key=>$value)
				{
					unset($_POST[$key]);
				}			
			}
		}	
	}
	?><style type="text/css">
<!--
body {
	background-color: #FFF;
}
-->
</style>
	<div class="main_content">
		<div class="wide_content">
			<h1>Formulir Pendaftaran BHIS</h1>
			<?php echo (isset($success) && $success == true) ? '<p>Pendaftaran kursus berhasil. Silahkan <a href="index.php?pg=pendaftaran&action=formprint&no='.$nomor_formulir.'" target="_blank">print formulir pendaftaran Anda</a>.</p>' : ''; ?>
			<?php echo (isset($success) && $success == false) ? '<p>Maaf pendaftaran gagal. Kesalahan sistem. Silahkan coba lagi.</p>' : ''; ?>
			<form action="" method="post" enctype="multipart/form-data" name="form1">
				<center>
				<table width="100%" border="0" cellspacing="5" cellpadding="5">
					<tr>
						<td width="32%" valign="top">Nama Lengkap</td>
						<td width="2%" align="center" valign="top">:</td>
						<td width="66%">
							<input name="nama" type="text" id="nama" value="<?php echo (isset($_POST['nama'])) ? $_POST['nama'] : ''; ?>" size="55">
							<?php echo (isset($err_nama)) ? '<p class="error">'.$err_nama.'</p>' : ''; ?>
						</td>
					</tr>
					<tr>
						<td>Jenis Kelamin</td>
						<td align="center">:</td>
						<td align="left">
							<input type="radio" name="jenis_kelamin" id="laki" value="Laki-laki" <?php echo (isset($_POST['jenis_kelamin']) && $_POST['jenis_kelamin'] == 'Laki-laki') ? 'checked' : ''; ?>> Laki-laki 
						
								<input type="radio" name="jenis_kelamin" id="cewe" value="Perempuan" <?php echo (isset($_POST['jenis_kelamin']) && $_POST['jenis_kelamin'] == 'Perempuan') ? 'checked' : ''; ?>> Perempuan
							
							<?php echo (isset($err_jenis_kelamin)) ? '<p class="error">'.$err_jenis_kelamin.'</p>' : ''; ?>
						</td>
					</tr>
					<tr>
						<td valign="top">Kota kelahiran</td>
						<td align="center" valign="top">:</td>
						<td>
							<input name="kota_lahir" type="text" value="<?php echo (isset($_POST['kota_lahir'])) ? $_POST['kota_lahir'] : ''; ?>" id="ttl" size="55">
							<?php echo (isset($err_kota_lahir)) ? '<p class="error">'.$err_kota_lahir.'</p>' : ''; ?>
						</td>
					</tr>
					<tr>
						<td valign="top">Tanggal lahir</td>
						<td align="center" valign="top">:</td>
						<td>
							<input name="tanggal_lahir" type="text" value="<?php echo (isset($_POST['tanggal_lahir'])) ? $_POST['tanggal_lahir'] : ''; ?>" id="datepicker" size="55" placeholder="yyyy-mm-dd">
							<?php echo (isset($err_tanggal_lahir)) ? '<p class="error">'.$err_tanggal_lahir.'</p>' : ''; ?>
						</td>
					</tr>
					<tr>
						<td valign="top">Agama</td>
						<td align="center" valign="top">:</td>
						<td>
							<input name="agama" type="text" value="<?php echo (isset($_POST['agama'])) ? $_POST['agama'] : ''; ?>" id="agama" size="55">
							<?php echo (isset($err_agama)) ? '<p class="error">'.$err_agama.'</p>' : ''; ?>
						</td>
					</tr>
					<tr>
						<td valign="top">Alamat</td>
						<td align="center" valign="top">:</td>
						<td>
							<textarea name="alamat" id="alamat" cols="45" rows="5"><?php echo (isset($_POST['alamat'])) ? $_POST['alamat'] : ''; ?></textarea>
							<?php echo (isset($err_alamat)) ? '<p class="error">'.$err_alamat.'</p>' : ''; ?>
						</td>
					</tr>
					<tr>
						<td valign="top">No telp / Hp</td>
						<td align="center" valign="top">:</td>
						<td>
							<input name="tlp" type="text" value="<?php echo (isset($_POST['tlp'])) ? $_POST['tlp'] : ''; ?>" id="tlp" size="55">
							<?php echo (isset($err_tlp)) ? '<p class="error">'.$err_tlp.'</p>' : ''; ?>
						</td>
					</tr>
					<tr>
						<td valign="top">Asal Sekolah</td>
						<td align="center" valign="top">:</td>
						<td>
							<input name="sekolah" type="text" value="<?php echo (isset($_POST['sekolah'])) ? $_POST['sekolah'] : ''; ?>" id="sekolah" size="55">
							<?php echo (isset($err_sekolah)) ? '<p class="error">'.$err_sekolah.'</p>' : ''; ?>
						</td>
					</tr>				
					<tr>
						<td width="32%">Tingkat</td>
						<td width="2%" align="center">:</td>
						<td width="66%">
							<select name="tingkat">
								<option value="SMA" <?php echo (isset($_POST['tingkat']) && $_POST['tingkat'] == '10') ? 'selected' : ''; ?>>SMA</option>
								<option value="SMK" <?php echo (isset($_POST['tingkat']) && $_POST['tingkat'] == '11') ? 'selected' : ''; ?>>SMK</option>
							</select>
						</td>
					</tr>
					<tr>
						<td valign="top">Hobi</td>
						<td align="center" valign="top">:</td>
						<td>
							<input name="hobi" type="text" value="<?php echo (isset($_POST['hobi'])) ? $_POST['hobi'] : ''; ?>" size="55">
							<?php echo (isset($err_hobi)) ? '<p class="error">'.$err_hobi.'</p>' : ''; ?>
						</td>
					</tr>
					<tr>
						<td valign="top">Cita - cita</td>
						<td align="center" valign="top">:</td>
						<td>
							<input name="cita" type="text" value="<?php echo (isset($_POST['cita'])) ? $_POST['cita'] : ''; ?>" size="55">
							<?php echo (isset($err_cita)) ? '<p class="error">'.$err_cita.'</p>' : ''; ?>
						</td>
					</tr>
					<tr>
						<td>Nama Orang Tua</td>
						<td align="center">&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td valign="top">a. Ayah</td>
						<td align="center" valign="top">:</td>
						<td>
							<input name="ayah" type="text" value="<?php echo (isset($_POST['ayah'])) ? $_POST['ayah'] : ''; ?>" size="55">
							<?php echo (isset($err_ayah)) ? '<p class="error">'.$err_ayah.'</p>' : ''; ?>
						</td>
					</tr>
					<tr>
						<td valign="top">b. Ibu</td>
						<td align="center" valign="top">:</td>
						<td>
							<input name="ibu" type="text" value="<?php echo (isset($_POST['ibu'])) ? $_POST['ibu'] : ''; ?>" id="ibu" size="55">
							<?php echo (isset($err_ibu)) ? '<p class="error">'.$err_ibu.'</p>' : ''; ?>
						</td>
					</tr>
					<tr>
						<td>Pekerjaan Orang Tua</td>
						<td align="center">&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td valign="top">a. Ayah</td>
						<td align="center" valign="top">:</td>
						<td>
							<input name="pekerjaanayah" type="text" value="<?php echo (isset($_POST['pekerjaanayah'])) ? $_POST['pekerjaanayah'] : ''; ?>" id="pekerjaanayah" size="55">							
							<?php echo (isset($err_pekerjaanayah)) ? '<p class="error">'.$err_pekerjaanayah.'</p>' : ''; ?>
						</td>
					</tr>
					<tr>
						<td valign="top">b. Ibu</td>
						<td align="center" valign="top">:</td>
						<td>
							<input name="pekerjaanibu" type="text" value="<?php echo (isset($_POST['pekerjaanibu'])) ? $_POST['pekerjaanibu'] : ''; ?>" id="pekerjaanibu" value="" size="55">
							<?php echo (isset($err_pekerjaanibu)) ? '<p class="error">'.$err_pekerjaanibu.'</p>' : ''; ?>
						</td>
					</tr>
					<tr>
						<td valign="top"><p>*Email </p></td>
						<td align="center" valign="top">:</td>
						<td>
							<input name="email" type="text" value="<?php echo (isset($_POST['email'])) ? $_POST['email'] : ''; ?>" id="email" size="55">
							<?php echo (isset($err_email)) ? '<p class="error">'.$err_email.'</p>' : ''; ?>
						</td>
					</tr>
					<tr>
						<td valign="top">Program yang Diambil</td>
						<td align="center" valign="top">:</td>
						<td>
							<label>
								<input type="radio" name="kelas" value="R" <?php echo (isset($_POST['kelas']) && $_POST['kelas'] == 'R') ? 'checked' : ''; ?>>Reguler
							</label> <br>
							<label>
								<input type="radio" name="kelas" value="E" <?php echo (isset($_POST['kelas']) && $_POST['kelas'] == 'E') ? 'checked' : ''; ?>>Executive
							</label><br>
							<?php echo (isset($err_kelas)) ? '<p class="error">'.$err_kelas.'</p>' : ''; ?>
						</td>
					</tr>
					<tr>
						<td valign="top">Upload Foto</td>
						<td align="center" valign="top">:</td>
						<td>
							<img id="foto" width="200" height="200" /></br>
							<input type="file" name="foto" id="upload" onChange="readURL(this);">
							<?php echo (isset($err_foto)) ? '<p class="error">'.$err_foto.'</p>' : ''; ?>
						</td>
					</tr>
					<tr>
						<td colspan="3" align="center"><label>
							<input type="submit" name="proses" id="proses" value="PROSES">
						</label></td>
					</tr>
				</table>
				</center>
			</form>
		</div>
		<!--End of wide_content-->
		<div class="clear"></div>
	</div>
	<!--End of main_content-->
	<script type="text/javascript">
	function readURL(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function (e) {
				$('#foto').attr('src', e.target.result);
			}
			reader.readAsDataURL(input.files[0]);
		}
	}
	$(function() {
		$( "#datepicker" ).datepicker( { dateFormat: "yy-mm-dd", changeYear: true } );
	});
	</script>
<?php
elseif ($action == 'formprint') :
	$no = isset($_GET['no']) ? $_GET['no'] : '';
	if ($no == '') :
		echo 'search formulir';
	else :
		echo '<script>location="print.php?pg=form&no='.$no.'";</script>' ;
	endif;
endif;