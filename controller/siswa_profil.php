<?php
//var_dump($_SESSION);
function get_detail_siswa($nis)
{
	$sql = "SELECT *
		FROM siswa
		WHERE nis = '$nis'";
	$Q	= mysql_query($sql);
	return mysql_fetch_assoc($Q);
}

$siswa = get_detail_siswa($_SESSION['nis']);
?>
<style>
.templatemo_fullgraybox {
    border: 1px solid #cccccc;
    clear: both;
    float: left;
    margin: 0px 0px 25px;
    padding: 25px;
    width: 790px;
}
</style>
<h1>Profil Mahasiswa</h1>
<div class="templatemo_fullgraybox">
	<img src="assets/images/image_200x200.gif" alt="project" />
	<p>
		This is a free CSS website template provided by <a href="http://www.templatemo.com" target="_parent">TemplateMo.com</a>. Feel free to modify and use this layout for your websites. Lorem ipsum nunc quis sem dolor sit amet, consectetuer adipiscing elit.</p>
		<p>
        Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Nunc quis sem nec tellus blandit tincidunt. Duis vitae velit sed dui malesuada dignissim. Donec mollis aliquet ligula. Maecenas adipiscing elementum ipsum. Pellentesque vitae magna. Sed nec est. Suspendisse a nibh tristique justo rhoncus volutpat. Suspendisse vitae neque eget ante tristique vestibulum.
        </p>
        <ul>
            <li>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. <a href="#">more...</a></li>
            <li>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. <a href="#">more...</a></li>
        </ul>
</div>