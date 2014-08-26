<?php
$data = mysql_query("select * from tentang");
$no = 1;
$tampil = mysql_fetch_array($data);
echo '<h1>'.$tampil['judul'].'</h1>';
echo $tampil['isi'];
?>