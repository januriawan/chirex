<?php

session_start();
include "../../config/koneksi.php";

$module = $_GET[module];
$act = $_GET[act];

// Hapus post
if ($module == 'post' AND $act == 'hapus') {
    mysql_query("DELETE FROM post WHERE kode_post='$_GET[id]'");
    header('location:../../index.php?module=' . $module);
}

// Input post
elseif ($module == 'post' AND $act == 'input') {
    $nama_post = $_POST[nama_post];
    $det_post = $_POST[det_post];
    $srn_post = $_POST[srn_post];
    $fileName = $_FILES['gambar']['name'];
    move_uploaded_file($_FILES['gambar']['tmp_name'], "../../gambar/" . $_FILES['gambar']['name']);
    mysql_query("INSERT INTO post(
			      nama_post,det_post,srn_post,gambar) 
	                       VALUES(
				'$nama_post','$det_post','$srn_post','$fileName')");

    header("location:../../index.php?module=" . $module);
}

// Update post
elseif ($module == 'post' AND $act == 'update') {
    $nama_post = $_POST[nama_post];
    $det_post = $_POST[det_post];
    $srn_post = $_POST[srn_post];

    $fileName = $_FILES['gambar']['name'];
    if ($fileName){
    move_uploaded_file($_FILES['gambar']['tmp_name'], "../../gambar/" . $_FILES['gambar']['name']);

    mysql_query("UPDATE post SET
					nama_post   = '$nama_post',
					det_post   = '$det_post',
					srn_post   = '$srn_post',
					gambar   = '$fileName'
               WHERE kode_post       = '$_POST[id]'");
    } else {
        mysql_query("UPDATE post SET
					nama_post   = '$nama_post',
					det_post   = '$det_post',
					srn_post   = '$srn_post'
               WHERE kode_post       = '$_POST[id]'");
    }
    header('location:../../index.php?module=' . $module);
}
?>