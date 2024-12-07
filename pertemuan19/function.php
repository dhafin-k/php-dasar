
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
    // $gambar = htmlspecialchars($data["gambar"]);
    // Upload gambar
    $gambar = upload();
    if( $gambar ) {
        return false;
    }


    $query = "INSERT INTO human (nrp, name, email, jurusan, gambar) 
                VALUES
                ('$nrp','$nama','$email','$jurusan','$gambar')";
    mysqli_query($conn,$query);

    return mysqli_affected_rows($conn);
}
function upload() {
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    // cek apakah tidak ada gambar yang diupload
    if($error === 4) {
        echo "<script>
                alert('Pilih Gambar Terlebih Dahulu');
            </script>";
        return false;
    }

    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if(!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>
                alert('Yang Anda Upload Bukan Gambar');
            </script>";
        return false;
    }

    /// cek jika ukurannya terlalu besar
    if($ukuranFile > 1000000) {
        echo "<script>
                alert('Ukuran Terlalu Besar');
            </script>";
    }

    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;


    // lolos pengecekan
    move_uploaded_file($tmpName, 'img/' . $namaFileBaru);
    return $namaFileBaru;
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
    $gambarLama =htmlspecialchars($data["gambarLama"]);
    // cel apakah user memilih file baru
    if($_FILES['gambar']['error'] === 4) {
        $gambar = $gambarLama;
    } else {
        $gambar = upload();
    }
    // $gambar = htmlspecialchars($data["gambar"]);


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

function registrasi($data) {
    global $conn;

    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn,$data["password"]);
    $password2 = mysqli_real_escape_string($conn,$data["password2"]);
    // cekk username sudah ada atau belum
    $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");
    if(mysqli_fetch_assoc($result ) ) {
        echo "<script>
            alert('username sudah terdaftar')
            </script>";
        return false;
    }

    // Cek konsfirmasi Password 
    if( $password !== $password2 ) {
        echo "<script>
            alert('Password Tidak Sesuai!')
        </script>";
        return false;
    }
    // enkripsi Password
    $password = password_hash($password, PASSWORD_DEFAULT); 
    // $password= md5($password);


    // Tambahkan Userbaru ke databases
    $query = "INSERT INTO user VALUES(null,'$username', '$password')";
    mysqli_query($conn,  $query);
    
    return mysqli_affected_rows($conn);

}

?>