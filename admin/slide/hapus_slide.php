<?php
$data 	= mysql_query("SELECT gambar FROM slide WHERE id = '$_GET[id]'");
$tampil = mysql_fetch_array($data);

unlink('../images/slide/'.$tampil['gambar']);
$hapus = mysql_query("DELETE FROM slide
	WHERE id = '$_GET[id]'") or die(mysql_error());

if($hapus){
?>
	<script type="text/javascript">
    alert('Data Berhasil Dihapus');
    document.location='?pg=slide/data_slide';
    </script>
	<?php
    }else{
    ?>
	<script type="text/javascript">
    alert('Data Gagal Dihapus');
    document.location='?pg=slide/data_slide';
    </script>
<?php
}
?>