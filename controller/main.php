<?php
$pg = isset($_GET['pg']) ? preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['pg']) : 'home';

if (file_exists('controller/'.$pg.'.php'))
{
	include 'controller/'.$pg.'.php';
}
else
{
	include 'controller/404.php';
}