<?php 
require_once 'function.php';
$id=$_GET['id'];
$mhs = query("SELECT * FROM human WHERE id=$id");
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
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        h1 {
            color: #333;
            text-align: center;
            margin: 0 3rem 0 0;
        }

        form {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }

        ul {
            list-style: none;
            padding: 0;
        }

        li {
            margin-bottom: 15px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 15px;
            text-transform: uppercase;
            cursor: pointer;
            font-weight: bold;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #45a049;
        }

        button:active {
            background-color: #3e8e41;
        }
    </style>
</head>
<body>
<h1>Tambah Data Mahasiswa</h1>

<form action="" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= isset($mhs['id']) ? $mhs['id']: ''; ?>">
    <input type="hidden" name="gambarLama" value="<?= isset($mhs['gambar']) ? $mhs['gambar'] : ''; ?>">

    <ul>
        <li>
            <label for="nrp">NRP : </label>
            <input type="text" name="nrp" id="nrp" require value="<?=$mhs[0]['nrp']?>">
        </li>
        <li>
            <label for="name">Nama : </label>
            <input type="text" name="name" id="name" require value="<?=$mhs[0]['name']?>">
        </li>
        <li>
            <label for="email">Email : </label>
            <input type="text" name="email" id="email" require value="<?=$mhs[0]['email']?>">
        </li>
        <li>
            <label for="gambar">Gambar : </label>
            <img src="img/<?= !empty($mhs[0]['gambar']) ? $mhs[0]['gambar'] : 'default.png'; ?>" alt="">
            <input type="file" name="gambar" id="gambar">
        </li>
        <li>
            <label for="jurusan">Jurusan : </label >
            <input type="text" name="jurusan" id="jurusan" require value="<?=$mhs[0]['jurusan']?>">
        </li>
        <li>
            <button type="submit" name="submit">Ubah Data!</button>
        </li>
    </ul>
</form>
</body>
</html>