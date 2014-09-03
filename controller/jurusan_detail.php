<?php
$Q 		= mysql_query("SELECT * FROM jurusan WHERE id='".$_GET['id']."'");
$data 	= mysql_fetch_assoc($Q)
?>
<h1>Jurusan AKPAR BHIS - <?php echo $data['judul']; ?></h1>
<?php if (mysql_num_rows($Q) > 0) : ?>
	<div>
		<div class="slider-wrapper theme-default">
			<img src="images/jurusan/<?php echo $data['gambar']; ?>" alt="<?php echo $data['judul']; ?>" title="<?php echo $data['judul']; ?>"/>
		</div>
		<?php echo $data['isi']; ?><br/><br/>
	</div>
<?php endif; ?>
<div class="more_button"><a href="index.php?pg=jurusan">Kembali</a></div>