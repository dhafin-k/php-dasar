<?php 
session_start();
// cek cookie

if(isset($_COOKIE['id']) && isset($_COOKIE['key']) ) {
  $id = $_COOKIE['id'];
  $key = $_COOKIE['key'];

//   ambil username berdasarkan id
    $result =mysqli_query($conn, "SELECT username FROM user WHERE id = $id");
    $row = mysqli_fetch_assoc($result);

    // cek cookie dan username
    if( $key === hash('sha256', $row['username']) ) {
        $_SESSION['login'] = true;
    } 
}

if(isset($_SESSION["login"]) ) {
    header("Location: index.php");
    exit;
}


require 'function.php';
if (isset($_POST["login"]) ) {

    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

    // cek Username
    if( mysqli_num_rows($result) ===1 ) {
        // Cek Password
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"] ) ) {
            $_SESSION["login"] = true;

            // check remember me
        if(isset($_POST['remember']) ) {
            // buat cookie

            setcookie('id',$row['id'], time() +60);
            setcookie('key', hash('sha256', $row['username']),
                time()+60 );
        }

            header("Location: index.php");
            exit;
        }
    }

    $error = true;

}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>halaman Login</title>
    <style>
        /* Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Body Styling */
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(135deg, #6e8efb, #a777e3);
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        /* Container Styling */
        .container {
            display: flex;
            align-items: center;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
            overflow: hidden;
            width: 800px;
            max-width: 90%;
        }

        /* Image Styling */
        .container img {
            width: 50%;
            height: auto;
            object-fit: cover;
        }

        /* Form Styling */
        .form-container {
            padding: 30px;
            width: 50%;
        }

        h1 {
            font-size: 24px;
            margin-bottom: 20px;
            text-align: center;
            color: #444;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        ul {
            list-style: none;
        }

        li {
            margin-bottom: 15px;
        }

        label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
            color: #555;
        }

        input {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            transition: border-color 0.3s, box-shadow 0.3s;
        }

        input:focus {
            border-color: #6e8efb;
            outline: none;
            box-shadow: 0 0 8px rgba(110, 142, 251, 0.3);
        }

        .error-message {
            color: #d9534f; /* Merah untuk menonjolkan error */
            font-style: italic;
            font-size: 14px;
            background: #fbe3e4;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
            border: 1px solid #f5c6cb;
        }

        button {
            width: 100%;
            padding: 12px;
            font-size: 16px;
            font-weight: bold;
            color: #fff;
            background: #6e8efb;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s ease, transform 0.2s ease;
        }

        button:hover {
            background: #a777e3;
            transform: translateY(-3px);
        }

        button:active {
            background: #6e8efb;
            transform: translateY(0);
        }
        /* Container Checkbox */
        .checkbox-container {
            display: flex;
            align-items: center;
            gap: 10px; /* Jarak antara checkbox dan label */
            margin-bottom: 15px;
        }

        /* Checkbox */
        .checkbox-container input[type="checkbox"] {
            width: 18px;
            height: 18px;
            cursor: pointer; /* Tampilkan pointer saat di-hover */
            accent-color: #6e8efb; /* Warna checkbox sesuai tema */
        }

        /* Label */
        .checkbox-container label {
            font-size: 14px;
            color: #555;
            cursor: pointer; /* Tampilkan pointer saat di-hover */
        }
    </style>
</head>
<body>
    
    <div class="container">
      <img src="img/bg_login1.png" alt="">

        <div class="form-container">
            <h1>Halaman Login</h1>
                <?php if(isset($error) ) : ?>
                    <p class="error-message">Password salah</p>
                <?php endif; ?>    
            <form action="" method="post">

                <ul>
                    <li>
                        <label for="username">Username :</label>
                        <input type="text" name="username" id="username">
                    </li>
                    <li>
                        <label for="password">Password :</label>
                        <input type="password" name="password" id="password">
                    </li>
                    <li class="checkbox-container">
                        <input type="checkbox" name="remember" id="remember">
                        <label for="remember">Remember me:</label>
                    </li>
                    <li>
                        <button type="submit" name="login">Login</button>
                    </li>
                </ul>

            </form>
        </div>

    </div>


</body>
</html>