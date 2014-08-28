<?php
if ($_POST)
{
	$error = false;
	if ($_POST['judul'] == '')
	{
		$error 	= true;
		$e_nama = 'Judul harus diisi.';
	}
	
	if ($_POST['isi'] == '')
	{
		$error 	= true;
		$e_isi 	= 'Isi artikel harus diisi.';
	}
	
	if (!$error)
	{
		$ubah = mysql_query("UPDATE tentang
			SET judul = '$_POST[judul]',
				isi = '$_POST[isi]'");
		if($ubah)
		{
		?>
			<script type="text/javascript">
				alert('Data Berhasil Diubah');
				document.location='?pg=content/data_content';
			</script>
		<?php
		}else{
			?>
			<script type="text/javascript">
			alert('Data Gagal Diubah');
			document.location='?pg=content/data_content';
			</script>
			<?php
		}
	}
}