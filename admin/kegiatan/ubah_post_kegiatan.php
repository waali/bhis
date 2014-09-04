<?php
if ($_POST)
{
	$error = false;
	if ($_POST['judul'] == '')
	{
		$error		= true;
		$e_judul 	= 'Judul harus diisi.';
	}
	if ($_POST['keterangan'] == '')
	{
		$error			= true;
		$e_keterangan	= 'Deskripsi harus diisi.';
	}
	if (!$error)
	{
		$file 		= $_FILES['gambar']['tmp_name'];
		if(empty($file))
		{
			$ubah = mysql_query("UPDATE kegiatan
				SET judul = '$_POST[judul]', 
					isi = '$_POST[keterangan]'
				WHERE id = '$_POST[id]'");
		}
		else
		{
			$tmp_name 		= $_FILES['gambar']['tmp_name'];
			$name 			= 'kegiatan-'.$_FILES['gambar']['name'];
			move_uploaded_file($tmp_name, '../images/kegiatan/'.$name);
			unlink('../images/slide/'.$_POST['gambar']);
			$ubah = mysql_query("UPDATE kegiatan
				SET judul = '$_POST[judul]', 
					gambar = '$name', 
					isi = '$_POST[keterangan]'
				WHERE id = '$_POST[id]'");
		}

		if($ubah){
		?>
		<script type="text/javascript">
			alert('Data Berhasil Diubah');
			document.location='?pg=kegiatan/data_kegiatan';
		</script>
		<?php
		}
		else
		{
			?>
			<script type="text/javascript">
			alert('Data Gagal Diubah');
			document.location='?pg=kegiatan/data_kegiatan';
			</script>
			<?php
		}
	}
}