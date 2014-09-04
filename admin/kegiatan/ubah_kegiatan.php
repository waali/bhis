<?php
include 'kegiatan/ubah_post_kegiatan.php';
$data 	= mysql_query("SELECT * FROM kegiatan WHERE id = '$_GET[id]'");
$tampil = mysql_fetch_array($data);
?>
<h1>Edit kegiatan</h1>
<form action="" method="post" enctype="multipart/form-data" name="form1">
	<table width="441" border="1" align="center">
		<tr>
			<td width="50">Judul</td>
			<td width="8">:</td>
			<td width="97">
				<input name="judul" type="text" id="judul" size="40" class="required" value="<?php echo (isset($_POST['judul'])) ? $_POST['judul'] : $tampil['judul']; ?>" />
				<input name="id" type="hidden" value="<?php echo $tampil['id']; ?>" />
				<?php echo isset($e_judul) ? '<p class="error-message">'.$e_judul.'</p>' : ''; ?>
			</td>
		</tr>
		<tr>
			<td width="50">Keterangan</td>
			<td width="8">:</td>
			<td width="97">
				<input name="keterangan" type="text" id="keterangan" size="40" value="<?php echo (isset($_POST['keterangan'])) ? $_POST['keterangan'] : $tampil['isi']; ?>" />
				<?php echo isset($e_keterangan) ? '<p class="error-message">'.$e_keterangan.'</p>' : ''; ?>
			</td>
		</tr>
		<tr>
			<td width="50" valign="top">Gambar</td>
			<td width="8" valign="top">:</td>
			<td width="97">
				<img src="../images/kegiatan/<?php echo $tampil['gambar']; ?>"  width="160" height="100"/><br/>
				<input name="gambar" type="file" id="gambar" size="40" />
				<input name="gambar" type="hidden" value="<?php echo $tampil['gambar']; ?>"/>
				<?php echo isset($e_gambar) ? '<p class="error-message">'.$e_gambar.'</p>' : ''; ?>
			</td>
		</tr>
		<tr>
			<td height="35">&nbsp;</td>
			<td>&nbsp;</td>
			<td>
				<input type="submit" name="button" class="klik" value="Simpan">
				<a href="?pg=kegiatan/data_kegiatan" class="klik">Kembali</a>
			</td>
		</tr>
	</table>
</form>