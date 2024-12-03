<?php 
require_once 'function.php';
$id=$_GET['id'];
$mhs = query("SELECT * FROM human WHERE id=$id")[0];
// var_dump($mahasiswa);
// Jangan lupa menambahkan Require untuk Terkoneksi
if(isset($_POST["submit"]) ) {
    if (update($_POST, $id) > 0) {
        echo "<script> 
                alert('data Berhasil diubah!');
                document.location.href = 'index.php';
             </script>
             ";
    }else {
        echo "<script>
                alert('data Gagal diubah!');
                document.location.href = 'index.php';
             </script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to right, #6a11cb, #2575fc);
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        h1 {
            color: #fff;
            text-align: center;
            margin: 0 2rem 0 0;
        }

        form {
            background: #fff;
            padding: 20px 30px;
            border-radius: 10px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
            max-width: 450px;
            width: 100%;
        }

        ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        li {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 8px;
            color: #444;
        }

        input[type="text"], input[type="file"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
            color: #555;
        }

        input[type="file"] {
            padding: 5px;
        }

        img {
            display: block;
            margin-top: 10px;
            max-width: 100%;
            border-radius: 5px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 15px;
            font-size: 14px;
            cursor: pointer;
            font-weight: bold;
            border-radius: 5px;
            width: 100%;
            text-transform: uppercase;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        button:hover {
            background-color: #45a049;
            transform: scale(1.02);
        }

        button:active {
            background-color: #3e8e41;
        }
    </style>
</head>
<body>
<h1>Tambah Data Mahasiswa</h1>

<form action="" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $mhs['id']; ?>">
    <input type="hidden" name="gambarLama" value="<?= $mhs['gambar']; ?>">

    <ul>
        <li>
            <label for="nrp">NRP : </label>
            <input type="text" name="nrp" id="nrp" require value="<?=$mhs['nrp']?>">
        </li>
        <li>
            <label for="name">Nama : </label>
            <input type="text" name="name" id="name" require value="<?=$mhs['name']?>">
        </li>
        <li>
            <label for="email">Email : </label>
            <input type="text" name="email" id="email" require value="<?=$mhs['email']?>">
        </li>
        <li>
            <label for="gambar">Gambar : </label>
            <img src="img/<?= $mhs["gambar"]; ?>" alt="" width="150">
            <input type="file" name="gambar" id="gambar" value="<?= $mhs["gambar"]; ?>">
        </li>
        <li>
            <label for="jurusan">Jurusan : </label >
            <input type="text" name="jurusan" id="jurusan" require value="<?=$mhs['jurusan']?>">
        </li>
        <li>
            <button type="submit" name="submit">Ubah Data!</button>
        </li>
    </ul>
</form>
</body>
</html>