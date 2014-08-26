<?php
$data 	= mysql_query("select * from home");
$no 	= 1;
$tampil = mysql_fetch_array($data);
echo '<h1>'.$tampil['judul'].'</h1>';
echo $tampil['isi'];
?>
<div class="more_button"><a href="index.php?pg=pendaftaran">Pendaftaran</a></div>