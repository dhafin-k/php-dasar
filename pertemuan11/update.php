<?php 
require_once 'function.php';
$id=$_GET['id'];
$mahasiswa = query("SELECT * FROM human WHERE id=$id");
// var_dump($mahasiswa);
// Jangan lupa menambahkan Require untuk Terkoneksi
if(isset($_POST["submit"]) ) {
    if (update($_POST) > 0) {
        echo "<script>
                alert('data Berhasil diubah!');
                document.location.href = 'index.php';
             </script>
             ";
    }else {
        echo "<scrit>
                alert('data Gagal diubah!');
                document.location.href = 'index.php';
             </scrit>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah</title>
</head>
<body>
<h1>Tambah Data Mahasiswa</h1>

<form action="" method="post">
    <ul>
        <li>
            <label for="nrp">NRP : </label>
            <input type="text" name="nrp" id="nrp" require value="<?=$mahasiswa[0]['nrp']?>">
        </li>
        <li>
            <label for="name">Nama : </label>
            <input type="text" name="name" id="name" require value="<?=$mahasiswa[0]['name']?>">
        </li>
        <li>
            <label for="email">Email : </label>
            <input type="text" name="email" id="email" require value="<?=$mahasiswa[0]['email']?>">
        </li>
        <li>
            <label for="gambar">Gambar : </label>
            <input type="text" name="gambar" id="gambar" require value="<?=$mahasiswa[0]['gambar']?>">
        </li>
        <li>
            <label for="jurusan">Jurusan : </label >
            <input type="text" name="jurusan" id="jurusan" require value="<?=$mahasiswa[0]['jurusan']?>">
        </li>
        <li>
            <button type="submit" name="submit">Ubah Data!</button>
        </li>
    </ul>
</form>
</body>
</html>