<?php
// <!-- pertemuan 2 -->
// <!-- sintaks php -->

// <!-- standar output -->
// <!-- echo,print -->
// <!-- print_r -->
// <!-- var_dump -->

echo "ini echo <br>";
// untuk echo untuk anga saja tidak perlu sebuah tanda kutip "
print_r("ini print <br>");
var_dump("ini vardump <br>");
echo '(11): Menunjukkan panjang string, yaitu 11 karakter. Dalam hal ini, ini vardump terdiri dari 11 karakter, termasuk spasi. <hr>';

// penulisan sintaks php
// 1. PHP di dalam html
// 2. HTML di dalam PHP

// Variabel dan tipe data
// variabel
// Tidak boleh diawali dengan angka,tapi boleh mengandung angka
// tidak boleh memakai spasi tapi pakai underscore(_)
$nama = "Fine fine";
echo"sekarang aku $nama aja <br>";

// Operator PHP :
// aritmatika
// + - * / %
$x = 10;
$y = 20;
echo $x * $y;
echo "<br>";

$nama_1 ="Tsukasa";
$nama_2 ="Tsukuyomi";
echo $nama_1 ."". $nama_2;
echo "<br>";

// Assignment
// =,+=,-=,*=,/=,%=,.=
$x= 1;
$x -=5;
echo $x;
echo "<br>";

// perbandingan
// <,>,<=,>=,==,!=
var_dump( 1 == "1");
echo "<br>";

// identitas
// ===,!==
var_dump(1 === "1");
echo "<br>";
// Logika
// &&,||,!
$c = 30;
var_dump($c < 20 && $c %2 ==0);