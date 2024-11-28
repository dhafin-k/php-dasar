
<?php 
$conn = mysqli_connect("localhost", "root","","tugas");

function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row =mysqli_fetch_assoc($result) ) {
        $rows[] =$row;
    }
    return $rows;
}

function tambah($data) {
    global $conn;

    $nrp = htmlspecialchars($data["nrp"]);
    $nama = htmlspecialchars($data["name"]);
    $email = htmlspecialchars($data["email"]);
    $jurusan = htmlspecialchars($data["jurusan"]);
    $gambar = htmlspecialchars($data["gambar"]);


    $query = "INSERT INTO human (nrp, name, email, jurusan, gambar) 
                VALUES
                ('$nrp','$nama','$email','$jurusan','$gambar')";
    mysqli_query($conn,$query);

    return mysqli_affected_rows($conn);
}

function hapus($id) {
    global $conn;
    mysqli_query($conn, "DELETE FROM human WHERE id = $id");
    return mysqli_affected_rows($conn);
}


function update($data, $id) {
    global $conn;

    // $id = $data["id"];
    $nrp = htmlspecialchars($data["nrp"]);
    $nama = htmlspecialchars($data["name"]);
    $email = htmlspecialchars($data["email"]);
    $jurusan = htmlspecialchars($data["jurusan"]);
    $gambar = htmlspecialchars($data["gambar"]);


    $query = "UPDATE human SET
                nrp = '$nrp',
                name = '$nama',
                email = '$email',
                jurusan = '$jurusan',
                gambar = '$gambar'
                WHERE id = $id";
    mysqli_query($conn,$query);
    // mysqli_query($conn, "UPDATE FROM human WHERE id = $id");
    return mysqli_affected_rows($conn);
}


function cari($keyword) {
    
    $query = "SELECT * FROM human
                 WHERE
            name LIKE '%$keyword%' OR
            nrp LIKE '%$keyword%' OR
            email LIKE '%$keyword%' OR
            jurusan LIKE '%$keyword%' 
                 ";
    return query($query);
}

if (isset($_POST["cari"]) && !empty($_POST["keyword"])) {
    $mahasiswa = cari($_POST["keyword"]);
}    



?>