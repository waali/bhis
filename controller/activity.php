<?php
if (isset($_GET['id']))
{
	include 'controller/activity_detail.php';
}
else
{
	include 'controller/activity_index.php';
}