# Chirex.1.0
> Sistem Pakar Diagnosa Penyakit Pada Ayam Menggunakan Metode Certainty Factor Berbasis Website Responsive.

Berikut tampilan sistem yang di buat.

* Home

![alt text](https://github.com/januriawan/Chirex.1.0/blob/master/Home%201.png)
![alt text](https://github.com/januriawan/Chirex.1.0/blob/master/Home%202.png)
![alt text](https://github.com/januriawan/Chirex.1.0/blob/master/Home%203.png)
![alt text](https://github.com/januriawan/Chirex.1.0/blob/master/Home%205.png)

* Admin

![alt text](https://github.com/januriawan/Chirex.1.0/blob/master/Admin%201.png)
![alt text](https://github.com/januriawan/Chirex.1.0/blob/master/Admin%202.png)

## Configure

Use XAMPP v.3.2.2 With Php 5: Set your database name in config.php

```<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "spkayam";

mysql_connect($server,$username,$password) or die("Koneksi gagal");
mysql_select_db($database) or die("Maaf, Database tidak bisa dibuka");
?>
```
## Formula yang digunakan:
```
Certainty Factor (CF)
Posted by totoharyanto on November 25th, 2011 / totoharyanto.staff.ipb.ac.id/2011/11/25/certainty-factor-cf/

Certainty Factor (CF) merupakan salah satu teknik yang digunakan untuk mengatasi ketidakpastian dalam pengambilan keputusan. Certainty Factor (CF) dapat terjadi dengan berbagai kondisi. Diantara kondisi yang terjadi adalah terdapat beberapa antensenden (dalam rule yang berbeda) dengan satu konsekuen yang sama. Dalam kasus ini, kita harus mengagregasikan nilai CF keseluruhan dari setiap kondisi yang ada. Berikut formula yang digunakan:

CFc (CF1,CF2) = CF1 + CF2 (1- CF1)                            ; jika CF1 dan CF2 keduanya posistif

CFc (CF1,CF2) = CF1 + CF2 (1+ CF1)                            ; jika CF1 dan CF2 keduanya negative

CFc (CF1,CF2) = {CF1 + CF2} / (1-min{| CF1|,| CF2|})          ; jika salah satu negatif

Contoh :

[R1] : IF fever THEN thypus {cf : -0.40}

[R2] : IF amount of tromobsit low THEN thypus {cf : -0.50}

[R3] : IF body is weak THEN thypus {cf : 0.75}

[R4] :IF diarhea THEN thypus {cf : 0.60}

Tentukan Nilai dari CF gabungannya:

Jawab:
1.R1 dan R2 ::  CFc (CF1,CF2) = CF1 + CF2 (1+ CF1)

= -0,40 + (-0,50)(1+(-0,40))

= -0,40 + (-0,50)(0,60)

= -0,40 – 0,30

= -0,70  ………………………..………………………………….(a)

2. R3 dan R4 :: CFc (CF1,CF2) = CF1 + CF2 (1- CF1)

= 0,75 + 0,6 (1-0,75)

= 0,75 + 0,6. 0,25

= 0,75 + 0,15

= 0,9 …………………………………………………..(b)

3.Gabungkan (a) dan (b) :: CFc (CF1,CF2) = {CF1 + CF2} / (1-min{| CF1|,| CF2|})

= {-0,70+0,9}/(1-min{|-0,70|,|0,90|})

= 0,20 / ( 1-{0,70})

= 0,20 / 0,30

= 0,67

Kesimpulannya: Suatu penyakit thypus disebabkan oleh gejala-gejala tersebut di atas memiliki nilai Certainty Factor ( CF) sebesar 0,67
```

## Usage example

Semoga hasil karya ini dapat berguna serta bermanfaat bagi perkembangan Teknologi dan Informasi pada khususnya. Serta sebagai kajian bagi mahasiswa dalam pengambilan skripsi. .

_Di dedikasikan untuk bunga hati saya, semoga bahagia selalu dalam satu senti, semoga.. [Januriawan]._


## Release History

* 0.0.1
    * Work in progress

## Meta

Copyright – [@januriawan](https://twitter.com/januriawan) – januriawan@protonmail.com

Distributed under the XYZ license. See ``LICENSE`` for more information.

[https://github.com/januriawan](https://github.com/januriawan/)

## Disclaimer

* Dilarang keras di perjual-belikan, source ini saya publikasi untuk keperluan belajar saja.
    * Untuk yang mau file dokumentasi / skripsi bisa request dengan menghubungi saya.


