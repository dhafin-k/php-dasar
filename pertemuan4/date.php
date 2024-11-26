<?php 
// Date
// untuk menampilkan tanggal dengan format tertentu
//     echo date("l, d-m-y");

// Time
// UNIX Timestamp / EPOCH TIME
// detikk yang di hitung sejak tahun 1 januari 1970
// echo time();
// echo date("d M Y", time()+172800);

// mktime
// membuat sendiri detik
// mktime(0,0,0,0,0,0)
// jam,menit,detik,bulan,tanggal,tahun
// echo date("l", mktime(0,0,0,23,4,2008));

// strtotime
// echo date("l", strtotime("20 july 2007"));