<?php 
require '../function.php';

$keyword = $_GET["keyword"];

$query = "SELECT * FROM human
                 WHERE
            name LIKE '%$keyword%' OR
            nrp LIKE '%$keyword%' OR
            email LIKE '%$keyword%' OR
            jurusan LIKE '%$keyword%' 
            ";
$mahasiswa = query($query);
?>

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