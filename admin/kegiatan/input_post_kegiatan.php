<?php
if ($_POST)
{
	$error = false;
	if ($_POST['judul'] == '')
	{
		$error 		= true;
		$e_judul	= 'Judul harus diisi.';
	}
	if ($_POST['keterangan'] == '')
	{
		$error 		= true;
		$e_keterangan	= 'Keterangan harus diisi.';
	}		
	if ($_FILES['gambar']['name'] == '')
	{	
		$error 		= true;
		$e_gambar 	= 'Gambar harus diisi.';
	}	
	if (!$error)
	{
		$tmp_name 		= $_FILES['gambar']['tmp_name'];
		$name 			= 'kegiatan-'.$_FILES['gambar']['name'];
		move_uploaded_file($tmp_name, '../images/kegiatan/'.$name);
		$simpan 	= mysql_query("INSERT INTO kegiatan (judul, isi, gambar)
			VALUES ('$_POST[judul]', '$_POST[keterangan]', '$name')");	

		if($simpan){
		?>
			<script type="text/javascript">
			alert('Data Berhasil Disimpan');
			document.location='?pg=kegiatan/data_kegiatan';
			</script>
		<?php
		}else{
		?>
			<script type="text/javascript">
			alert('Data Gagal Disimpan');
			document.location='?pg=kegiatan/data_kegiatan';
			</script>
		<?php
		}
	}
}