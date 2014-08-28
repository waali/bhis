<?php
include 'content/ubah_post_content.php';
$data 	= mysql_query("SELECT * FROM tentang");
$tampil = mysql_fetch_array($data);
?>
<h1>Tentang Kami</h1><form action="" method="post" name="form1">
	<table width="441" border="1" align="center">
		<tr>
			<td width="314">Judul</td>
			<td width="8">:</td>
			<td width="97">
				<input type="text" name="judul" id="judul" value="<?php echo $tampil['judul'];?>">
				<input type="hidden" name="id" value="<?php echo $tampil['id'];?>">
				<?php echo isset($e_judul) ? '<p class="error-message">'.$e_judul.'</p>' : ''; ?>
			</td>
		</tr>
		<tr>
			<td valign="top">Isi</td>
			<td valign="top">:</td>
			<td>
				<textarea name="isi" rows="20"><?php echo $tampil['isi']; ?></textarea>
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