<?php 
// konek ke databases
// $conn = mysqli_connect("localhost", "root","","tugas");

// Ambil data dari tabel mahasiswa / query data mahasiswa
// $result = mysqli_query($conn, "SELECT * FROM human");

// ambil data (fetch) mahasiswa dari objek result
// mysqli_fetch_row() //mengembalikan array numerik
// mysqli_fetch_assoc() // mengembalikan array associative
// mysqli_fetch_array() // mengembalikan keduanya
// mysqli_fetch_object() //

// while($mhs = mysqli_fetch_assoc($result) ){

// var_dump($mhs);
// }



require 'function.php';
$mahasiswa = query("SELECT * FROM human");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
    <style>
        /* Styling untuk keseluruhan halaman */
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        /* Styling untuk tabel */
        table {
            width: 90%;
            margin: 0 auto;
            border-collapse: collapse;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }

        table th, table td {
            padding: 15px;
            text-align: center;
            border: 1px solid #ddd;
        }

        table th {
            background-color: #4CAF50;
            color: white;
            text-transform: uppercase;
        }

        table tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        table tr:hover {
            background-color: #f1f1f1;
        }

        /* Styling untuk tombol */
        a {
            text-decoration: none;
            color: white;
            background-color: #007BFF;
            padding: 5px 10px;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }

        a:hover {
            background-color: #0056b3;
        }

        /* Styling untuk gambar */
        img {
            width: 50px;
            height: 50px;
            border-radius: 1rem;
            object-fit: cover;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }

        /* Tambahan margin untuk lebih estetis */
        table tr td:first-child {
            width: 5%;
        }

        table tr td:nth-child(2) {
            width: 15%;
        }

        table tr td img {
            display: block;
            margin: 0 auto;
        }
         img{
            width: 5rem;
            height: 5rem;
         }
    </style>
</head>
<body>
    
    <h1>Daftar Mahasiswa</h1>

    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No.</th>
            <th>Aksi</th>
            <th>Gambar</th>
            <th>NRP</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Jurusan</th>
        </tr>

         <?php foreach($mahasiswa as $row):?>

        <tr>
            <td>1</td>
            <td>
                <a href="">ubah</a> |
                <a href="" style="background-color: #dc3545;">hapus</a>
            </td>
            <td><img src="img/<?php echo $row["gambar"]; ?>" alt=""></td>
            <td><?php echo $row["name"]; ?></td>
            <td><?php echo $row["email"]; ?></td>
            <td><?php echo $row["nrp"]; ?></td>
            <td><?php echo $row["jurusan"]; ?></td>
        </tr>
        <?php endforeach;?>
    </table>

</body>
</html>