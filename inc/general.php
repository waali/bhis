<?php

function tanggal_indonesia($mysql_date)
{
	$bulan_string = array('Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
	list($tahun, $bulan, $tanggal) = explode('-',$mysql_date);
	$index = intval($bulan)-1;;
	return $tanggal.' '.$bulan_string[$index].' '.$tahun;
}

function render_footer_left()
{
	
	$Q	= mysql_query("SELECT * FROM jurusan LIMIT 3");
	$html = '<h1>Jurusan</h1>';
	
	while ($data = mysql_fetch_array($Q))
	{
		$isi	= substr($data['isi'],0,120);
		$html 	.= '<div class="gp_row">
						<img src="images/jurusan/'.$data['gambar'].'" alt="image" />
						<p>'.$isi.'<a href="index.php?pg=jurusan&id='.$data['id'].'"> detail ...</a></p>
					</div>';
	}
	$html .= '<div class="more_button"><a href="index.php?pg=jurusan">Semua Jurusan</a></div>';
	return $html;
}

function render_footer_right()
{
	$Q	= mysql_query("SELECT * FROM kegiatan	 LIMIT 3");
	$html = '<h1>Kegiatan</h1>';
	
	while ($data = mysql_fetch_array($Q))
	{
		$isi	= substr($data['isi'],0,125);
		$html 	.= '<div class="gp_row">
						<img src="images/kegiatan/'.$data['gambar'].'" alt="image" />
						<p>'.$isi.'<a href="index.php?pg=activity&id='.$data['id'].'"> detail ...</a></p>
					</div>';
	}
	$html .= '<div class="more_button"><a href="index.php?pg=activity">Semua Kegiatan</a></div>';
	return $html;
}