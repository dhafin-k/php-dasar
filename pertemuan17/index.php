<?php 
session_start();
if( !isset($_SESSION["login"]) ) {
    header("Location: login.php");
    exit;
}
require 'function.php';
$mahasiswa = query("SELECT * FROM human ORDER BY id ASC");

// tombol cari di tekan
if(isset($_POST["cari"]) ) {
    $mahasiswa = cari($_POST["keyword"]);
}
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
            background-color: #f4f7fa;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        /* Styling untuk tombol */
        a {
            text-decoration: none;
            color: white;
            background-color: #007BFF;
            padding: 10px 15px;
            border-radius: 5px;
            margin: 5px;
            transition: background-color 0.3s ease;
        }

        a:hover {
            background-color: #0056b3;
        }

        .but-logout {
            background-color: #dc3545;
        }

        .but-logout:hover {
            background-color: #c82333;
        }

        .but-add {
            background-color: #28a745;
        }

        .but-add:hover {
            background-color: #218838;
        }

        .center-container {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 20px;
        }

        .search-form {
            text-align: center;
            margin: 10px 0 10px 0;
        }

        .search-form input[type="text"] {
            padding: 10px;
            width: 250px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .search-form button {
            padding: 10px 15px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .search-form button:hover {
            background-color: #0056b3;
        }

        /* Styling untuk tabel */
        table {
            width: 90%;
            margin: 0 auto;
            border-collapse: collapse;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: #fff;
            border-radius: 10px;
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
    </style>
</head>
<body>
    
    <h1>Daftar Mahasiswa</h1>
    <div class="center-container">
        <a href="tambah.php" class="but-add">Tambah data Mahasiswa</a>
        <a href="logout.php" class="but-logout">Log Out</a>
    </div>
        
    <form action="" method="post" class="search-form">
        <input type="text" name="keyword" autofocus placeholder="Cari data.." autocomplete="off">
        <button type="submit" name="cari">Cari!</button>
    </form>

    
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No.</th>
            <th>Aksi</th>
            <th>Gambar</th>
            <th>Nama</th>
            <th>Email</th>
            <th>NRP</th>
            <th>Jurusan</th>
        </tr>
        <?php $i = 1;?>
         <?php foreach($mahasiswa as $row):?>

        <tr>
            <td><?= $i;?></td>
            <td>
                <a href="update.php?id=<?php echo $row["id"]; ?>">ubah</a>
                <a href="hapus.php?id=<?php echo $row["id"]; ?>"  style="background-color: #dc3545;" onclick="return confirm('Yakin?');">hapus</a>
            </td>
            <td><img src="img/<?php echo $row["gambar"]; ?>" alt=""></td>
            <td><?php echo $row["name"]; ?></td>
            <td><?php echo $row["email"]; ?></td>
            <td><?php echo $row["nrp"]; ?></td>
            <td><?php echo $row["jurusan"]; ?></td>
        </tr>   
            <?php $i++; ?>
        <?php endforeach;?>
    </table>

</body>
</html>