<?php
include 'content/ubah_post_content.php';
// echo date('Y-m-d');
?>
<form action="" method="post" enctype="multipart/form-data" name="form1">
	<table width="441" border="1" align="center">
		<?php
		$data = mysql_query("select * from artikel where id_artikel = '$_GET[id]'");
		$tampil = mysql_fetch_array($data);
		?>
		<tr>
			<td colspan="3">Ubah Content</td>
		</tr>
		<tr>
			<td width="314" valign="top">Judul</td>
			<td width="8" valign="top">:</td>
			<td width="97">
				<input type="text" name="nama" id="nama" value="<?php echo $tampil['judul_artikel'];?>">
				<input type="hidden" name="id" value="<?php echo $tampil['id_artikel']; ?>">
				<?php echo isset($e_nama) ? '<p class="error-message">'.$e_nama.'</p>' : ''; ?>
			</td>
		</tr>
		<tr>
			<td valign="top">Gambar</td> 
			<td valign="top">:</td>
			<td>
				<?php if ($tampil['gambar'] != '') : ?>
					<img src="../uploads/gambar/<?php echo $tampil['gambar'];?>" width="100" height="100" /><br>
				<?php endif; ?>
				<input type="file" name="gambar" id="gambar"></td>
		</tr>
		<tr>
			<td valign="top">Isi</td>
			<td valign="top">:</td>
			<td>
				<textarea name="isi" id="isi" cols="45" rows="5"><?php echo $tampil['isi_artikel'];?></textarea>
				<?php echo isset($e_isi) ? '<p class="error-message">'.$e_isi.'</p>' : ''; ?>
			</td>
		</tr>
		<tr>
			<td height="34">&nbsp;</td>
			<td>&nbsp;</td>
			<td><input type="submit" name="button" class="klik" value="Simpan"></td>
		</tr>
	</table>
</form>