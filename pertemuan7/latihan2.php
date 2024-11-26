<?php 
// Cek apakah tidak ada daya di $_GET
if (!isset($_GET["nama"]) &&
    !isset($_GET["NIP"]) &&
    !isset($_GET["Gmail"]) &&
    !isset($_GET["Jurusan"]) &&
    !isset($_GET["gambar"]) ) 
    {
    // redirect 
    header("Location: Latihan1.php" );
    exit;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Mahasiswa</title>
</head>
<body>
    <ul>
        <li><img src="img/<?= $_GET["gambar"]; ?> "></li>
        <li><?= $_GET["nama"];  ?></li>
        <li><?= $_GET["NIP"];  ?></li>
        <li><?= $_GET["Gmail"];  ?></li>
        <li><?= $_GET['Jurusan'];  ?></li>
    </ul>    

<a href="latihan1.php">Kembali</a>

</body>
</html>