<?php
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "spkayam";

   $conn = mysqli_connect($server, $username, $password, $database);
   if (mysqli_connect_errno()) {
    echo "Koneksi gagal: " . mysqli_connect_error();
    exit();
  } else {
      echo "Koneksi success";
  }
  
?> 



