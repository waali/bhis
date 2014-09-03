<?php
if (isset($_GET['id']))
{
	include 'controller/jurusan_detail.php';
}
else
{
	include 'controller/jurusan_index.php';
}