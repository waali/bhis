<?php
session_start();

$server	= "localhost";
$user	= "root";
$pass	= "";
$db		= "skripsi_wali";

//Koneksi dan memilih database di server
mysql_connect($server,$user,$pass) or die("Gagal");
mysql_select_db($db) or die("Database tidak bisa dibuka");