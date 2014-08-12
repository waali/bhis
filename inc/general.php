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
	return '<h1>Jurusan</h1>
					<div class="gp_row">
						<img src="assets/images/building_150x70_03.gif" alt="image" />
						<p>In hac habitasse platea dictumst. Aenean cursus. Maecenas aliquam, ligula id egestas suscipit, nisi sapien dignissim nibh. <a href="index.php?pg=jurusan&id=1">detail ...</a>                </p>
					</div>
					<div class="gp_row">
					  <img src="assets/images/building_150x70_02.gif" alt="image" />
						<p>Praesent varius egestas velit. Donec a massa ut pede pulvinar vulputate.  Aenean eget tortor eget ipsum aliquet porta. V  <a href="index.php?pg=jurusan&id=2">detail...</a>                </p>
					</div>';
}

function render_footer_right()
{
	return '<h1>Kegiatan</h1>
					<div class="gp_row">
						<img src="assets/images/templatemo.gif" alt="image" />
						<p>Mauris blandit vehicula neque. Proin consectetuer. Donec venenatis. Cras urna metus, feugiat non, consectetuer quis, pretium quis, nunc. <a href="index.php?pg=activity&id=1" target="_parent">more...</a>
						</p>
					</div>
					<div class="gp_row">
						<img src="assets/images/flashmo.gif" alt="image" />
						<p>Nullam pede purus, tempor a, imperdiet in, porttitor at, nulla. Aliquam elit risus, volutpat quis, mattis ac, elementum eget, mauris. <a href="index.php?pg=activity&id=2" target="_parent">more...</a>
						</p>
					</div>
					<div class="gp_row">
						<img src="assets/images/webdesignmo.gif" alt="image" />
						<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Nunc quis sem nec tellus blandit tincidunt. Duis vitae velit sed dui malesuada dignissim. <a href="index.php?pg=activity&id=3" target="_parent"> more...</a>
						</p>
					</div>
					<div class="more_button"><a href="index.php?pg=activity">Semua Kegiatan</a></div>';
}