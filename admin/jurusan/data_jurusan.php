<?php
$data	= mysql_query("SELECT * FROM jurusan");
$no 	= 1;
?>
<h1>Jurusan</h1>
<a href="?pg=jurusan/input_jurusan" class="klik">Tambah Jurusan</a><br/><br/>
<?php if (mysql_num_rows($data) > 0) : ?>
	<table width="650" border="1">
		<tr id="jtabel">
			<td width="45">No.</td>
			<td width="90">Nama</td>
			<td width="90">Gambar</td>
			<td width="145">Keterangan</td>
			<td width="198">Aksi</td>
		</tr>
		<?php
		while($tampil = mysql_fetch_array($data))
		{
		?>
		<tr>
			<td valign="top"><?php echo $no++;?></td>
			<td valign="top"><?php echo $tampil['judul'];?></td>
			<td valign="top"><img src="../images/jurusan/<?php echo $tampil['gambar'];?>" width="160" height="100"/></td>
			<td valign="top"><?php echo $tampil['isi'];?></td>
			<td valign="top"><a href="?pg=slide/ubah_slide&id=<?php echo $tampil['id'];?>" class="klik">Ubah</a> <a href="?pg=slide/hapus_slide&id=<?php echo $tampil['id'];?>" class="klik" onclick="return confirm('Data Akan Dihapus?')">Hapus</a></td>
		</tr>
	<?php } ?>
	</table>
<?php else : ?>
	<p>Belum ada data.</p>
<?php endif; ?>