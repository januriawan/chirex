<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "spkayam";

mysql_connect($server,$username,$password) or die("Koneksi gagal");
mysql_select_db($database) or die("Maaf, Database tidak bisa dibuka");
?>