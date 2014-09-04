<?php
//var_dump($_SESSION);
function get_detail_siswa($nis)
{
	$sql = "SELECT m.nama, m.nis, m.foto, j.judul AS jurusan, j.jadwal AS hari, k.nama AS kelas, k.jam
		FROM mahasiswa AS m
			INNER JOIN jurusan AS j ON m.jurusan = j.id
			INNER JOIN kelas AS k ON m.kelas = k.id
		WHERE m.nis = '$nis'";
	$Q	= mysql_query($sql) or die(mysql_error());;
	return mysql_fetch_assoc($Q);
}
$siswa = get_detail_siswa($_SESSION['nis']);
?>
<style>
.templatemo_fullgraybox {
    border: 1px solid #cccccc;
    clear: both;
    float: left;
    margin: 0px 0px 25px;
    padding: 25px;
    width: 790px;
}
img.profil {
	display: block;
}
table.detal {
	display: inline;
	float: left;
}
</style>
<h1>Jadwal Siswa</h1>
<div class="templatemo_fullgraybox">
	<table width="100%" border="0" cellspacing="5" cellpadding="5" class="detail">
		<tr>
			<td width="20%" rowspan="19" valign="top"><img src="<?php echo $siswa['foto']; ?>" alt="Foto profil" class="profil"/></td>
			<td width="20%" valign="top">Nama Lengkap</td>
			<td width="2%" align="center" valign="top">:</td>
			<td width="66%"><?php echo $siswa['nama']; ?>
			</td>
		</tr>
		<tr>
			<td width="20%" valign="top">NIS</td>
			<td width="2%" align="center" valign="top">:</td>
			<td width="66%"><?php echo $siswa['nis']; ?>
			</td>
		</tr>
		<tr>
			<td width="20%" valign="top">Kelas</td>
			<td width="2%" align="center" valign="top">:</td>
			<td width="66%"><?php echo $siswa['kelas']; ?>
			</td>
		</tr>
		<tr>
			<td width="20%" valign="top">Jurusan</td>
			<td width="2%" align="center" valign="top">:</td>
			<td width="66%"><?php echo $siswa['jurusan']; ?>
			</td>
		</tr>
		<tr>
			<td width="20%" valign="top">Jadwal</td>
			<td width="2%" align="center" valign="top">:</td>
			<td width="66%"><?php echo $siswa['hari'].' '.$siswa['jam']; ?>
			</td>
		</tr>
	</table>
</div>