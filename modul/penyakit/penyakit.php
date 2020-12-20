<title>Penyakit - Chirexs 1.0</title>
<?php

session_start();
if (!(isset($_SESSION['username']) && isset($_SESSION['password']))) {
  header('location:index.php');
  exit();
} else {
  ?>
  <script type="text/javascript">
    function Blank_TextField_Validator()
    {
      if (text_form.nama_penyakit.value == "")
      {
        alert("Nama Penyakit tidak boleh kosong !");
        text_form.nama_penyakit.focus();
        return (false);
      }
      return (true);
    }
    function Blank_TextField_Validator_Cari()
    {
      if (text_form.keyword.value == "")
      {
        alert("Isi dulu keyword pencarian !");
        text_form.keyword.focus();
        return (false);
      }
      return (true);
    }
    -- >
  </script>
  <?php

  include "config/fungsi_alert.php";
  $aksi = "modul/penyakit/aksi_penyakit.php";
  switch ($_GET[act]) {
    // Tampil penyakit
    default:
      $offset = $_GET['offset'];
      //jumlah data yang ditampilkan perpage
      $limit = 15;
      if (empty($offset)) {
        $offset = 0;
      }
      $tampil = mysqli_query($conn,"SELECT * FROM penyakit ORDER BY kode_penyakit");
      echo "<form method=POST action='?module=penyakit' name=text_form onsubmit='return Blank_TextField_Validator_Cari()'>
          <br><br><table class='table table-bordered'>
		  <tr><td><input class='btn bg-olive margin' type=button name=tambah value='Tambah Penyakit' onclick=\"window.location.href='penyakit/tambahpenyakit';\"><input type=text name='keyword' style='margin-left: 10px;' placeholder='Ketik dan tekan cari...' class='form-control' value='$_POST[keyword]' /> <input class='btn bg-olive margin' type=submit value='   Cari   ' name=Go></td> </tr>
          </table></form>";
      $baris = mysqli_num_rows($tampil);
      if ($_POST[Go]) {
        $numrows = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM penyakit where nama_penyakit like '%$_POST[keyword]%'"));
        if ($numrows > 0) {
          echo "<div class='alert alert-success alert-dismissible'>
                <h4><i class='icon fa fa-check'></i> Sukses!</h4>
                Penyakit yang anda cari di temukan.
              </div>";
          $i = 1;
          echo" <table class='table table-bordered' style='overflow-x=auto' cellpadding='0' cellspacing='0'>
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Penyakit</th>
			  <th>Detail Penyakit</th>
			  <th>Saran Penyakit</th>
              <th>Aksi</th>
            </tr>
          </thead>
		  <tbody>";
          $hasil = mysqli_query($conn,"SELECT * FROM penyakit where nama_penyakit like '%$_POST[keyword]%'");
          $no = 1;
          $counter = 1;
          while ($r = mysqli_fetch_array($hasil)) {
            if ($counter % 2 == 0)
              $warna = "dark";
            else
              $warna = "light";
            echo "<tr class='" . $warna . "'>
			 <td align=center>$no</td>
			 <td>$r[nama_penyakit]</td>
			 <td>$r[det_penyakit]</td>
			 <td>$r[srn_penyakit]</td>
			 <td align=center><a type='button' class='btn btn-block btn-success' href=penyakit/editpenyakit/$r[kode_penyakit]><i class='fa fa-pencil-square-o' aria-hidden='true'></i> Ubah </a> &nbsp;
	          <a type='button' class='btn btn-block btn-danger' href=\"JavaScript: confirmIt('Anda yakin akan menghapusnya ?','$aksi?module=penyakit&act=hapus&id=$r[kode_penyakit]','','','','u','n','Self','Self')\" onMouseOver=\"self.status=''; return true\" onMouseOut=\"self.status=''; return true\"> <i class='fa fa-trash-o' aria-hidden='true'></i> Hapus</a>
             </td></tr>";
            $no++;
            $counter++;
          }
          echo "</tbody></table>";
        }
        else {
          echo "<div class='alert alert-danger alert-dismissible'>
                <h4><i class='icon fa fa-ban'></i> Gagal!</h4>
                Maaf, Penyakit yang anda cari tidak ditemukan , silahkan inputkan dengan benar dan cari kembali.
              </div>";
        }
      } else {

        if ($baris > 0) {
          echo" <table class='table table-bordered' style='overflow-x=auto' cellpadding='0' cellspacing='0'>
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Penyakit</th>
			  <th>Detail Penyakit</th>
			  <th>Saran Penyakit</th>
              <th>Aksi</th>
            </tr>
          </thead>
		  <tbody>
		  ";
          $hasil = mysqli_query($conn,"SELECT * FROM penyakit ORDER BY kode_penyakit limit $offset,$limit");
          $no = 1;
          $no = 1 + $offset;
          $counter = 1;
          while ($r = mysqli_fetch_array($hasil)) {
            if ($counter % 2 == 0)
              $warna = "dark";
            else
              $warna = "light";
            echo "<tr class='" . $warna . "'>
			 <td align=center>$no</td>
			 <td>$r[nama_penyakit]</td>
			 <td>$r[det_penyakit]</td>
			 <td>$r[srn_penyakit]</td>
			 <td align=center>
			 <a type='button' class='btn btn-block btn-success' href=penyakit/editpenyakit/$r[kode_penyakit]><i class='fa fa-pencil-square-o' aria-hidden='true'></i> Ubah </a> &nbsp;
	          <a type='button' class='btn btn-block btn-danger' href=\"JavaScript: confirmIt('Anda yakin akan menghapusnya ?','$aksi?module=penyakit&act=hapus&id=$r[kode_penyakit]','','','','u','n','Self','Self')\" onMouseOver=\"self.status=''; return true\" onMouseOut=\"self.status=''; return true\">
			  <i class='fa fa-trash-o' aria-hidden='true'></i> Hapus</a>
             </td></tr>";
            $no++;
            $counter++;
          }
          echo "</tbody></table>";
          echo "<div class=paging>";

          if ($offset != 0) {
            $prevoffset = $offset - 10;
            echo "<span class=prevnext> <a href=index.php?module=penyakit&offset=$prevoffset>Back</a></span>";
          } else {
            echo "<span class=disabled>Back</span>"; //cetak halaman tanpa link
          }
          //hitung jumlah halaman
          $halaman = intval($baris / $limit); //Pembulatan

          if ($baris % $limit) {
            $halaman++;
          }
          for ($i = 1; $i <= $halaman; $i++) {
            $newoffset = $limit * ($i - 1);
            if ($offset != $newoffset) {
              echo "<a href=index.php?module=penyakit&offset=$newoffset>$i</a>";
              //cetak halaman
            } else {
              echo "<span class=current>" . $i . "</span>"; //cetak halaman tanpa link
            }
          }

          //cek halaman akhir
          if (!(($offset / $limit) + 1 == $halaman) && $halaman != 1) {

            //jika bukan halaman terakhir maka berikan next
            $newoffset = $offset + $limit;
            echo "<span class=prevnext><a href=index.php?module=penyakit&offset=$newoffset>Next</a>";
          } else {
            echo "<span class=disabled>Next</span>"; //cetak halaman tanpa link
          }

          echo "</div>";
        } else {
          echo "<br><b>Data Kosong !</b>";
        }
      }
      break;

    case "tambahpenyakit":
      echo "<form name=text_form method=POST action='$aksi?module=penyakit&act=input' onsubmit='return Blank_TextField_Validator()' enctype='multipart/form-data'>
          <br><br><table class='table table-bordered'>
		  <tr><td width=120>Nama Penyakit</td><td><input autocomplete='off' type=text placeholder='Masukkan penyakit baru...' class='form-control' name='nama_penyakit' size=30></td></tr>
		  <tr><td width=120>Detail Penyakit</td><td> <textarea rows='4' cols='50' class='form-control' name='det_penyakit'type=text placeholder='Masukkan detail penyakit baru...'></textarea></td></tr>
		  <tr><td width=120>Saran Penyakit</td><td><textarea rows='4' cols='50' class='form-control' name='srn_penyakit'type=text placeholder='Masukkan saran penyakit baru...'></textarea></td></tr>
          <tr><td width=120>Gambar Post</td><td>Upload Gambar (Ukuran Maks = 1 MB) : <input type='file' class='form-control' name='gambar' required /></td></tr>		  
          <tr><td></td><td><input class='btn btn-success' type=submit name=submit value='Simpan' >
		  <input class='btn btn-danger' type=button name=batal value='Batal' onclick=\"window.location.href='?module=penyakit';\"></td></tr>
          </table></form>";
      break;

    case "editpenyakit":
      $edit = mysqli_query($conn,"SELECT * FROM penyakit WHERE kode_penyakit='$_GET[id]'");
      $r = mysqli_fetch_array($edit);
      if ($r[gambar]) {
        $gambar = 'gambar/penyakit/' . $r[gambar];
      } else {
        $gambar = 'gambar/noimage.png';
      }

      echo "<form name=text_form method=POST action='$aksi?module=penyakit&act=update' onsubmit='return Blank_TextField_Validator()' enctype='multipart/form-data'>
          <input type=hidden name=id value='$r[kode_penyakit]'>
          <br><br><table class='table table-bordered'>
		  <tr><td width=120>Nama Penyakit</td><td><input autocomplete='off' type=text class='form-control' name='nama_penyakit' size=30 value=\"$r[nama_penyakit]\"></td></tr>
		  <tr><td width=120>Detail Penyakit</td><td><textarea rows='4' cols='50' type=text class='form-control' name='det_penyakit'>$r[det_penyakit]</textarea></td></tr>
		  <tr><td width=120>Saran Penyakit</td><td><textarea rows='4' cols='50' type=text class='form-control' name='srn_penyakit'>$r[srn_penyakit]</textarea></td></tr>
          <tr><td width=120>Gambar Post</td><td>Upload Gambar (Ukuran Maks = 1 MB) : <input id='upload' type='file' class='form-control' name='gambar' required /></td></tr>
          <tr><td></td><td><img id='preview' src='$gambar' width=200></td></tr>          
          <tr><td></td><td><input class='btn btn-success' type=submit name=submit value='Simpan' >
		  <input class='btn btn-danger' type=button name=batal value='Batal' onclick=\"window.location.href='?module=penyakit';\"></td></tr>
          </table></form>";
      break;
  }
  ?>
<?php } ?>

  <script>
    function readURL(input) {

      if (input.files &&
              input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
          $('#preview').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
      }
    }

    $("#upload").change(function () {
      readURL(this);
    });

    


  </script>
