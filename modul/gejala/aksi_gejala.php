<?php

session_start();
if (!(isset($_SESSION['username']) && isset($_SESSION['password']))) {
    header('location:index.php');
    exit();
} else {
?>
<?php
session_start();
include "../../config/koneksi.php";

$module=$_GET[module];
$act=$_GET[act];

// Hapus gejala
if ($module=='gejala' AND $act=='hapus'){
  mysql_query("DELETE FROM gejala WHERE kode_gejala='$_GET[id]'");
  header('location:../../index.php?module='.$module);
}

// Input gejala
elseif ($module=='gejala' AND $act=='input'){
$nama_gejala=$_POST[nama_gejala];
mysql_query("INSERT INTO gejala(
			      nama_gejala) 
	                       VALUES(
				'$nama_gejala')");
header('location:../../index.php?module='.$module);
}

// Update gejala
elseif ($module=='gejala' AND $act=='update'){
$nama_gejala=$_POST[nama_gejala];
  mysql_query("UPDATE gejala SET
					nama_gejala   = '$nama_gejala'
               WHERE kode_gejala       = '$_POST[id]'");
  header('location:../../index.php?module='.$module);
 }
 
?>
<?php } ?>