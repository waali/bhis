<style>
.theme-default #slider {
   margin-right: auto;
   margin-left: auto;
   width:618px; /* Make sure your images are the same size */
   height:246px; /* Make sure your images are the same size */
}
</style>
<?php
$Q_home	= mysql_query("SELECT * FROM home");
$home 	= mysql_fetch_array($Q_home);

$Q_slide= mysql_query("SELECT * FROM slide");
;
?>
<h1><?php echo $home['judul']; ?></h1>
<?php if (mysql_num_rows($Q_slide) > 0) : ?>
	<div class="slider-wrapper theme-default">
		<div id="slider" class="nivoSlider">
			<?php while ($slide = mysql_fetch_array($Q_slide)) : ?>
				<?php if ($slide['link'] == '') : ?>
					<img src="images/slide/<?php echo $slide['gambar']; ?>" alt="" width="100%" alt="<?php echo $slide['judul']; ?>" title="<?php echo $slide['keterangan']; ?>"/>
				<?php else : ?>
					<a href="<?php echo $slide['link']; ?>"><img src="images/slide/<?php echo $slide['gambar']; ?>" alt="<?php echo $slide['judul']; ?>" title="<?php echo $slide['keterangan']; ?>" /></a>
				<?php endif; ?>
			<?php endwhile; ?>
		</div>
	</div>
<?php endif; ?>
<div>
<?php
	echo $home['isi'];
?>
</div>
<div class="more_button"><a href="index.php?pg=pendaftaran">Pendaftaran</a></div>
<script type="text/javascript">
$(window).load(function() {
    $('#slider').nivoSlider();
});
</script>