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

  $module = $_GET[module];
  $act = $_GET[act];

// Hapus penyakit
  if ($module == 'penyakit' AND $act == 'hapus') {
    mysqli_query($conn,"DELETE FROM penyakit WHERE kode_penyakit='$_GET[id]'");
    header('location:../../index.php?module=' . $module);
  }

// Input penyakit
  elseif ($module == 'penyakit' AND $act == 'input') {
    $nama_penyakit = $_POST[nama_penyakit];
    $det_penyakit = $_POST[det_penyakit];
    $srn_penyakit = $_POST[srn_penyakit];
    $fileName = $_FILES['gambar']['name'];
    move_uploaded_file($_FILES['gambar']['tmp_name'], "../../gambar/penyakit/" . $_FILES['gambar']['name']);
    mysqli_query($conn,"INSERT INTO penyakit(
			      nama_penyakit,det_penyakit,srn_penyakit,gambar) 
	                       VALUES(
				'$nama_penyakit','$det_penyakit','$srn_penyakit','$fileName')");

    header('location:../../index.php?module=' . $module);
  }

// Update penyakit
  elseif ($module == 'penyakit' AND $act == 'update') {
    $nama_penyakit = $_POST[nama_penyakit];
    $det_penyakit = $_POST[det_penyakit];
    $srn_penyakit = $_POST[srn_penyakit];

    $fileName = $_FILES['gambar']['name'];
    if ($fileName) {
      move_uploaded_file($_FILES['gambar']['tmp_name'], "../../gambar/penyakit/" . $_FILES['gambar']['name']);

      mysqli_query($conn,"UPDATE penyakit SET
					nama_penyakit   = '$nama_penyakit',
					det_penyakit   = '$det_penyakit',
					srn_penyakit   = '$srn_penyakit',
                      gambar   = '$fileName'
               WHERE kode_penyakit       = '$_POST[id]'");
    } else {
      mysqli_query($conn,"UPDATE penyakit SET
					nama_penyakit   = '$nama_penyakit',
					det_penyakit   = '$det_penyakit',
					srn_penyakit   = '$srn_penyakit'
               WHERE kode_penyakit       = '$_POST[id]'");
    }
    header('location:../../index.php?module=' . $module);
  }
  ?>
<?php } ?>