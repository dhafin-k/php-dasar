<?php
// Koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "tugas");

// Fungsi untuk menjalankan query
function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

// Fungsi untuk menambahkan data ke database
function tambah($data) {
    global $conn;

    // Filter data input dari pengguna
    $nrp = htmlspecialchars($data["nrp"]);
    $nama = htmlspecialchars($data["name"]);
    $email = htmlspecialchars($data["email"]);
    $jurusan = htmlspecialchars($data["jurusan"]);

    // Proses upload gambar
    $gambar = upload();
    if (!$gambar) {
        return false; // Jika gambar gagal diupload
    }

    // Query untuk memasukkan data ke tabel human
    $query = "INSERT INTO human (nrp, name, email, jurusan, gambar) 
                VALUES ('$nrp', '$nama', '$email', '$jurusan', '$gambar')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

// Fungsi untuk mengunggah gambar
function upload() {
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    // Cek apakah gambar tidak dipilih
    if ($error === 4) {
        echo "<script>
                alert('Pilih gambar terlebih dahulu');
              </script>";
        return false;
    }

    // Validasi ekstensi gambar
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>
                alert('Yang Anda upload bukan gambar');
              </script>";
        return false;
    }

    // Validasi ukuran gambar
    if ($ukuranFile > 5000000) {
        echo "<script>
                alert('Ukuran gambar terlalu besar');
              </script>";
        return false;
    }

    // Generate nama file baru untuk menghindari tabrakan nama file
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.' . $ekstensiGambar;

    // Pindahkan file gambar ke direktori tujuan
    move_uploaded_file($tmpName, 'img/' . $namaFileBaru);
    return $namaFileBaru;
}

// Fungsi untuk menghapus data dari database
function hapus($id) {
    global $conn;
    mysqli_query($conn, "DELETE FROM human WHERE id = $id");
    return mysqli_affected_rows($conn);
}

// Fungsi untuk mengupdate data di database
function update($data, $id) {
    global $conn;

    $nrp = htmlspecialchars($data["nrp"]);
    $nama = htmlspecialchars($data["name"]);
    $email = htmlspecialchars($data["email"]);
    $jurusan = htmlspecialchars($data["jurusan"]);
    $gambarLama = htmlspecialchars($data["gambarLama"]);

    // Cek apakah gambar baru diunggah
    if ($_FILES['gambar']['error'] === 4) {
        $gambar = $gambarLama;
    } else {
        $gambar = upload();
    }

    // Query untuk mengupdate data
    $query = "UPDATE human SET 
                nrp = '$nrp',
                name = '$nama',
                email = '$email',
                jurusan = '$jurusan',
                gambar = '$gambar'
              WHERE id = $id";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

// Fungsi untuk mencari data berdasarkan kata kunci
function cari($keyword) {
    $query = "SELECT * FROM human 
              WHERE name LIKE '%$keyword%' OR 
                    nrp LIKE '%$keyword%' OR 
                    email LIKE '%$keyword%' OR 
                    jurusan LIKE '%$keyword%'";
    return query($query);
}

// Fungsi untuk registrasi user
function registrasi($data) {
    global $conn;

    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    // Periksa jika username sudah terdaftar
    $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");
    if (mysqli_fetch_assoc($result)) {
        echo "<script>
                alert('Username sudah terdaftar');
              </script>";
        return false;
    }

    // Periksa jika password tidak cocok
    if ($password !== $password2) {
        echo "<script>
                alert('Password tidak sesuai');
              </script>";
        return false;
    }

    // Enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // Tambahkan pengguna baru ke database
    $query = "INSERT INTO user VALUES (null, '$username', '$password')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
?>
