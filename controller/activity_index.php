<style>
.theme-default #slider {
   margin-right: auto;
   margin-left: auto;
   width:618px; /* Make sure your images are the same size */
   height:246px; /* Make sure your images are the same size */
}
</style>
<?php
$Q 		= mysql_query("SELECT * FROM kegiatan");
?>
<h1>Kegiatan AKPAR BHIS</h1>
<?php if (mysql_num_rows($Q) > 0) : ?>
	<div class="slider-wrapper theme-default">
		<div id="slider" class="nivoSlider">
			<?php while ($slide = mysql_fetch_array($Q)) : ?>
					<img src="images/kegiatan/<?php echo $slide['gambar']; ?>" alt="<?php echo $slide['judul']; ?>" title="<?php echo $slide['judul']; ?>"/>
			<?php endwhile; ?>
		</div>
	</div>
<?php
$Q 		= mysql_query("SELECT * FROM kegiatan");
?>	
	<div>
	<?php while ($slide = mysql_fetch_array($Q)) : ?>
		<?php $view = substr($slide['isi'],0,120); ?>
		<h2><?php echo $slide['judul']; ?></h2>
		<?php echo $view; ?> <a href="index.php?pg=activity&id=<?php echo $slide['id']; ?>"> detail ...</a><br/><br/>
	<?php endwhile; ?>
	</div>
<?php endif; ?>
<script type="text/javascript">
$(window).load(function() {
    $('#slider').nivoSlider();
});
</script>