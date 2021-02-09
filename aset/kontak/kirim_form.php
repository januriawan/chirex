<?php
if(isset($_POST['contactFrmSubmit']) && !empty($_POST['nama']) && !empty($_POST['email']) && (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) && !empty($_POST['pesan'])){

    // data form yang dikirimkan
    $nama   = $_POST['nama'];
    $email  = $_POST['email'];
    $pesan= $_POST['pesan'];

    /*
     * Kirim email ke alamat dibawah ini
     */
    $ke     = 'demo@codingan.com';
    $subjek= 'Nyoba Contact Form';

    $kontenHtml = '
    <h4>permintaan kontak telah disampaikan pada Codingan, berikut ini rinciannya.</h4>
    <table cellspacing="0" style="width: 300px; height: 200px;">
        <tr>
            <th>Nama:</th><td>'.$nama.'</td>
        </tr>
        <tr style="background-color: #e0e0e0;">
            <th>Email:</th><td>'.$email.'</td>
        </tr>
        <tr>
            <th>Pesan:</th><td>'.$pesan.'</td>
        </tr>
    </table>';

    // Mengatur header content-type untuk mengirim email HTML
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

    // header tambahan
    $headers .= 'From: '.$nama.'<'.$email.'>' . "\r\n";

    // Kirim email
    if(mail($ke,$subjek,$kontenHtml,$headers)){
        $status = 'ok';
    }else{
        $status = 'err';
    }

    // status output
    echo $status;die;
}