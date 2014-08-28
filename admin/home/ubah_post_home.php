<?php
if ($_POST)
{
	$error = false;
	
	if ($_POST['judul'] == '')
	{
		$error		= true;
		$e_judul 	= 'Judul harus diisi.';
	}
	
	if ($_POST['isi'] == '')
	{
		$error	= true;
		$e_isi	= 'Deskripsi harus diisi.';
	}
	
	if (!$error)
	{
		$ubah = mysql_query("UPDATE home
			SET judul = '$_POST[judul]', 
				isi = '$_POST[isi]'");

		if($ubah)
		{
		?>
			<script type="text/javascript">
				alert('Data Berhasil Diubah');
				document.location='?pg=home/data_home';
			</script>
		<?php
		}
		else
		{
			?>
			<script type="text/javascript">
			alert('Data Gagal Diubah');
			document.location='?pg=home/data_home';
			</script>
			<?php
		}
	}
}