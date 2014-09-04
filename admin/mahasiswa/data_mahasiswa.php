<h1>Data Mahasiswa</h1>
<table width="650" border="1">
	<tr id="jtabel">
		<td width="40">No.</td>
		<td width="52">No. Formulir</td>
		<td width="150">Nama</td>
		<td width="180">Kelas</td>
		<td width="180">Jurusan</td>
		<td width="206">Aksi</td>
	</tr>
	<?php
	$data = mysql_query("SELECT m.*, j.judul AS jurusan, k.nama AS kelas
		FROM mahasiswa AS m
			INNER JOIN jurusan AS j ON m.jurusan = j.id
			INNER JOIN kelas AS k ON m.kelas = k.id") or die(mysql_error());
	$no = 1;
	while($tampil = mysql_fetch_array($data))
	{
	?>
	<tr>
		<td><?php echo $no++;?></td>
		<td><?php echo $tampil['nis'];?></td>
		<td><?php echo $tampil['nama']; ?></td>
		<td><?php echo $tampil['kelas'];?></td>
		<td><?php echo $tampil['jurusan'];?></td>
		<td>
			<a href="?pg=mahasiswa/lihat_mahasiswa&id=<?php echo $tampil['nis'];?>" class="klik" >Lihat</a>
		</td>
	</tr>
<?php 
	} 
?>
</table>