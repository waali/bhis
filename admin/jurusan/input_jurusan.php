<?php
include 'slide/input_post_slide.php';
?>
<h1>Tambah Slide</h1>
<form action="" method="post" enctype="multipart/form-data" name="form1">
	<table width="441" border="1" align="center">
		<tr>
			<td width="50">Judul</td>
			<td width="8">:</td>
			<td width="97">
				<input name="judul" type="text" id="judul" size="40" class="required" value="<?php echo (isset($_POST['judul'])) ? $_POST['judul'] : ''; ?>" />
				<?php echo isset($e_judul) ? '<p class="error-message">'.$e_judul.'</p>' : ''; ?>
			</td>
		</tr>
		<tr>
			<td width="50">Keterangan</td>
			<td width="8">:</td>
			<td width="97">
				<input name="keterangan" type="text" id="keterangan" size="40" value="<?php echo (isset($_POST['keterangan'])) ? $_POST['keterangan'] : ''; ?>" />
				<?php echo isset($e_keterangan) ? '<p class="error-message">'.$e_keterangan.'</p>' : ''; ?>
			</td>
		</tr>
		<tr>
			<td width="50">Gambar</td>
			<td width="8">:</td>
			<td width="97">
				<input name="gambar" type="file" id="gambar" size="40" class="required"/>
				<?php echo isset($e_gambar) ? '<p class="error-message">'.$e_gambar.'</p>' : ''; ?>
			</td>
		</tr>
		<tr>
			<td valign="top">Link</td>
			<td valign="top">:</td>
			<td>
				<input name="link" type="text" id="link" size="40" value="<?php echo (isset($_POST['link'])) ? $_POST['link'] : ''; ?>" />
				<?php echo isset($e_link) ? '<p class="error-message">'.$e_link.'</p>' : ''; ?>
			</td>
		</tr>
		<tr>
			<td height="35">&nbsp;</td>
			<td>&nbsp;</td>
			<td>
				<input type="submit" name="button" class="klik" value="Simpan">
				<a href="?pg=admin/data_admin" class="klik">Kembali</a>
			</td>
		</tr>
	</table>
</form>