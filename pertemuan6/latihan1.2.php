<?php 
// $mahasiswa = [["dafin", "409473047", "kagiatan@gmail.com", "Design grafis"],
// ["dafin", "409985947", "kagiatan@gmail.com", "Design"],
// ["dafin", "409436547", "kagiatan@gmail.com", "Grafis"]];

// Array assosiative
// definisinnya sama seperti arrat munerik, kecuali
// key-nya adalah string yang kita buat sendiri
$mahasiswa = [
        [
        "NIP" => "409473047",
        "nama" => "Kresna",
        "Gmail" => "jawir@gmail.chindo",
        "Jurusan" => "Indonesia",
        "gambar" => "bumi1.png"
        ],
            [
                "nama" => "Kresna",
                "NIP" => "409473047",
                "Gmail" => "jawir@gmail.chindo",
                "Jurusan" => "Indonesia",
                "Tugas" => [90,95,100],
                "gambar" => "roket.png"
                ],

];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Daftar siswa</h1>


    <?php  foreach( $mahasiswa as $mhs ) : ?>
    <ul>
        <li>
            <img src="img/<?= $mhs["gambar"]; ?>">
        </li>
        <li>Nama :<?php echo $mhs["nama"];?></li>
        <li>NIP :<?php echo $mhs["NIP"];?></li>
        <li>Gmail :<?php echo $mhs["Gmail"];?></li>
        <li>Teknik :<?php echo $mhs["Jurusan"];?></li>
    </ul>
    <?php endforeach?>



</body>
</html>