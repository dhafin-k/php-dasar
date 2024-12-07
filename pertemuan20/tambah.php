<?php 
session_start();
if( !isset($_SESSION["login"]) ) {
    header("Location: login.php");
    exit;
}
// koneksi ke DBMS (Data Base Management System)
// $conn = mysqli_connect("localhost", "root","","tugas");

// cek apakah tombol submit sudah di tekan atau belum
if(isset ($_POST["submit"]) ) {
    // ambil data dari tiap element dalam form
    // $nrp = $_POST["nrp"];
    // $nama = $_POST["name"];
    // $email = $_POST["email"];
    // $jurusan = $_POST["jurusan"];
    // $gambar = $_POST["gambar"];

    // Query insert Data
    // $query = "INSERT INTO human (nrp, name, email, jurusan, gambar) 
    //             VALUES
    //             ('$nrp','$nama','$email','$jurusan','$gambar')";
    // mysqli_query($conn,$query);

    // cek Apakah berhasil di tambah
    // if(mysqli_affected_rows($conn) > 0) {
    //     echo "Berhasil!";
    // } else {
    //     echo"Gagal!";
    //     echo "<br>";
    //     echo mysqli_error($conn);
    // }
    // cek apakah tanda submit sudah di tekan

    require_once 'function.php';
    // Jangan lupa menambahkan Require untuk Terkoneksi
    if (tambah($_POST) > 0) {
        echo "<script>
                alert('data Berhasil ditambahkan!');
                document.location.href = 'index.php';
             </script>
             ";
    }else {
        echo "<script>
                alert('data Gagal  ditambahkan!');
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
    <title>Tambah Data Mahasiswa</title>
    <style>
        /* Styling body */
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        /* Styling kontainer utama */
        form {
            background-color: #fff;
            padding: 20px 40px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }

        h1 {
            text-align: center;
            margin: 0px 3rem 0 0;
            color: #333;
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
            color: #555;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button {
            display: block;
            width: 100%;
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    

    <h1>Tambah Data Mahasiswa</h1>

    <form action="" method="post" enctype="multipart/form-data">
        <ul>
            <li>
                <label for="nrp">NRP : </label>
                <input type="text" name="nrp" id="nrp" require>
            </li>
            <li>
                <label for="name">Nama : </label>
                <input type="text" name="name" id="name" require>
            </li>
            <li>
                <label for="email">Email : </label>
                <input type="text" name="email" id="email" require>
            </li>
            <li>
                <label for="gambar">Gambar : </label>
                <input type="file" name="gambar" id="gambar" require>
            </li>
            <li>
                <label for="jurusan">Jurusan : </label >
                <input type="text" name="jurusan" id="jurusan" require>
            </li>
            <li>
                <button type="submit" name="submit">Tambah Data!</button>
            </li>
        </ul>
    </form>

</body>
</html>

