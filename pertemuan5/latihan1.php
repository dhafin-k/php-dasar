<?php 
// array
// variabel yang dapat memiliki banyak 
// elemen pada array boleh memiliki tipe data yag berbeda
// pasangan antara key dan value
// keynya adalah index,yang di mulai dari 0



//  cara lama
$hari = array("senin","selasa","Rabu");
// cara baru
$bulan = ["januari","february","maret"];
$arr1 = [123,"tulisan",false];

// Menampilkan array
// var_dump () / print_r()
// var_dump($hari);
// echo "<br>";
// print_r($bulan);
// echo"<br>";

// menampilkan 1 elemen pada array
// echo $arr1[0];
// echo"br";
// echo $bulan[1];

// menambahkan elemen baru pada array
var_dump($hari);
$hari[] = "Kamis";
$hari[] = "Jum'at";
echo "<br>";
var_dump($hari);