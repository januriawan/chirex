<?php
if ($module == ""){
include "modul/welcome.php";
}elseif ($module == "tentang"){
include "modul/tentang.php";
}elseif ($module == "bantuan"){
include "modul/bantuan.php";
}elseif ($module == "harga"){
include "modul/harga.php";
}elseif ($module == "diagnosa"){
include "modul/diagnosa/diagnosa.php";
}elseif ($module == "penyakit"){
include "modul/penyakit/penyakit.php";
}elseif ($module == "post"){
include "modul/post/post.php";
}elseif ($module == "admin"){
include "modul/admin/admin.php";
}elseif ($module == "gejala"){
include "modul/gejala/gejala.php";
}elseif ($module == "pengetahuan"){
include "modul/pengetahuan/pengetahuan.php";
}elseif ($module == "password"){
include "modul/password/password.php";
}elseif ($module == "keterangan"){
include "modul/keterangan.php";
}elseif ($module == "riwayat"){
include "modul/riwayat/riwayat.php";
}elseif ($module == "riwayat-detail"){
include "modul/riwayat/detail.php";
}elseif ($module == "formlogin"){
include "modul/formlogin.php";
}
?>