<?php

// konek ke databases
$conn = mysqli_connect("localhost", "root","","tugas");

// Ambil data dari tabel mahasiswa / query data mahasiswa
$result = mysqli_query($conn, "SELECT * FROM human");

// ambil data (fetch) mahasiswa dari objek result
// mysqli_fetch_row() //mengembalikan array numerik
// mysqli_fetch_assoc() // mengembalikan array associative
// mysqli_fetch_array() // mengembalikan keduanya
// mysqli_fetch_object() //

// while($mhs = mysqli_fetch_assoc($result) ){

// var_dump($mhs);
// }
?>