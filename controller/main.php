<?php

$pg = isset($_GET['pg']) ? preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['pg']) : '';

if ($pg == '')
{
	include 'controller/home.php';
}
elseif ($pg == 'about')
{
	include 'controller/about.php';
}
elseif ($pg == 'jurusan')
{
	include 'controller/jurusan.php';
}
elseif ($pg == 'activity')
{
	include 'controller/activity.php';
}
elseif ($pg == 'pendaftaran')
{
	include 'controller/pendaftaran.php';
}
elseif ($pg == 'contact')
{
	include 'controller/contact.php';
}
else
{
	include 'controller/404.php';
}