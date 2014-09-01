<?php
if ($_POST)
{
	$error = false;
	if ($_POST['judul'] == '')
	{
		$error 		= true;
		$e_judul	= 'Judul harus diisi.';
	}		
	if ($_FILES['gambar']['name'] == '')
	{	
		$error 		= true;
		$e_gambar 	= 'Gambar harus diisi.';
	}	
	if (!$error)
	{
		$tmp_name 		= $_FILES['gambar']['tmp_name'];
		$name 			= 'slide-'.$_FILES['gambar']['name'];
		move_uploaded_file($tmp_name, '../images/slide/'.$name);
		$simpan 	= mysql_query("INSERT INTO slide (judul, keterangan, gambar, link)
			VALUES ('$_POST[judul]', '$_POST[keterangan]', '$name', '$_POST[link]')");	

		if($simpan){
		?>
			<script type="text/javascript">
			alert('Data Berhasil Disimpan');
			document.location='?pg=slide/data_slide';
			</script>
		<?php
		}else{
		?>
			<script type="text/javascript">
			alert('Data Gagal Disimpan');
			document.location='?pg=slide/data_slide';
			</script>
		<?php
		}
	}
}