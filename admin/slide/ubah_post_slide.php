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
		$file = $_FILES['gambar']['name'];
		if(empty($file))
		{
			$ubah = mysql_query("UPDATE slide
				SET judul = '$_POST[judul]', 
					keterangan = '$_POST[keterangan]',
					link = '$_POST[link]'
				WHERE id = '$_POST[id]'");
		}
		else
		{
			$tmp_name 		= $_FILES['gambar']['tmp_name'];
			$name 			= 'slide-'.$_FILES['gambar']['name'];
			if (move_uploaded_file($tmp_name, '../images/slide/'.$name))
			{
				unlink('../images/slide/'.$_POST['gambar']);
			}
			else
			{
				?>
				<script type="text/javascript">
				alert('Kesalahan sistem. Gambar tidak terunggah.');
				</script>
				<?php
			}
			$ubah = mysql_query("UPDATE slide
				SET judul = '$_POST[judul]', 
					gambar = '$name', 
					keterangan = '$_POST[keterangan]',
					link = '$_POST[link]'
				WHERE id = '$_POST[id]'");
		}

		if($ubah){
		?>
		<script type="text/javascript">
			alert('Data Berhasil Diubah');
			document.location='?pg=slide/data_slide';
		</script>
		<?php
		}
		else
		{
			?>
			<script type="text/javascript">
			alert('Data Gagal Diubah');
			document.location='?pg=slide/data_slide';
			</script>
			<?php
		}
		
	}
}