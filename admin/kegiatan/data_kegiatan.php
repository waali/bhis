<h1>Kegiatan</h1>
<a href="?pg=kegiatan/input_kegiatan" class="klik">Tambah Kegiatan</a><br/><br/>
<table width="650" border="1">
	<tr id="jtabel">
		<td width="45">No.</td>
		<td width="90">Nama</td>
		<td width="90">Gambar</td>
		<td width="145">Keterangan</td>
		<td width="198">Aksi</td>
	</tr>
	<?php
	$data	= mysql_query("SELECT * FROM kegiatan");
	$no 	= 1;
	while($tampil = mysql_fetch_array($data)){
	?>
	<tr>
		<td valign="top"><?php echo $no++;?></td>
		<td valign="top"><?php echo $tampil['judul'];?></td>
		<td valign="top"><img src="../images/kegiatan/<?php echo $tampil['gambar'];?>" width="160" height="100"/></td>
		<td valign="top"><?php echo $tampil['isi'];?></td>
		<td valign="top"><a href="?pg=kegiatan/ubah_kegiatan&id=<?php echo $tampil['id'];?>" class="klik">Ubah</a> <a href="?pg=kegiatan/hapus_kegiatan&id=<?php echo $tampil['id'];?>" class="klik" onclick="return confirm('Data Akan Dihapus?')">Hapus</a></td>
	</tr>
<?php } ?>
</table>