<?php
$do = isset($_GET['do']) ? $_GET['do'] : 'profil';

if (file_exists('controller/siswa_'.$do.'.php'))
{
	include 'controller/siswa_'.$do.'.php';
}
else
{
	include 'controller/404.php';
}