<?php 
// $_GET
$mahasiswa = [
    [
    "NIP" => "409473047",
    "nama" => "Kresnaaaa",
    "Gmail" => "australia@gmail.chindo",
    "Jurusan" => "Teknik makan",
    "gambar" => "bumi1.png"
    ],
        [
            "nama" => "Dyaksaaa",
            "NIP" => "409473047",
            "Gmail" => "jawir@gmail.chindo",
            "Jurusan" => "Teknik Mengetik",
            "Tugas" => [90,95,100],
            "gambar" => "roket.png"
            ],
                [
                    "nama" => "Royhan",
                    "NIP" => "23868459",
                    "Gmail" => "jatih@gmail.chindo",
                    "Jurusan" => "Teknik Manipulasi",
                    "gambar" => "bumi2.png"
                    ]

];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GET</title>
</head>
<body>
    <h1>Daftar Mahasiswa</h1>

<ul>
    <?php foreach( $mahasiswa as $mhs) : ?>
        <li>
            <a href="latihan2.php?nama=<?= $mhs["nama"]; ?>&NIP=<?= $mhs["NIP"];?>&Gmail=<?= $mhs["Gmail"];?>
            &<?= $mhs['Jurusan']; ?>&gambar=<?= $mhs['gambar']; ?>"><?= $mhs["nama"]; ?></a>
        </li>
    <?php endforeach; ?>
</ul>


</body>
</html>