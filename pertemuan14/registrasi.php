<?php
require'function.php';
if(isset($_POST["register"]) ) {
    if( registrasi($_POST) > 0) {
        echo"<script>
        alert('user baru telah di tambahkan');
        </script>";
    } else {
        echo mysqli_error($conn);
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #6e8efb, #a777e3);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #333;
        }
        h1 {
            text-align: center;
            margin: 0 2rem 0 0;
            color: #fff;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);
        }
        form {
            background: #fff;
            padding: 20px 30px;
            border-radius: 10px;
            box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 400px;
        }
        ul {
            list-style: none;
            padding: 0;
        }
        li {
            margin-bottom: 15px;
        }
        label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }
        input {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            transition: border-color 0.3s;
        }
        input:focus {
            border-color: #6e8efb;
            outline: none;
            box-shadow: 0 0 8px rgba(110, 142, 251, 0.5);
        }
        button {
            background: #6e8efb;
            color: #fff;
            border: none;
            padding: 10px 15px;
            font-size: 16px;
            font-weight: bold;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s, transform 0.2s;
        }
        button:hover {
            background: #a777e3;
            transform: scale(1.05);
        }
        button:active {
            transform: scale(1);
        }
    </style>
</head>
<body>
    
<h1>Halaman Registrasi</h1>


    <form action="" method="post">
        <ul>
            <li>
                <label for="username">Username :</label>
                <input type="text" name="username" id="username">
            </li>
            <li>
                <label for="password">password :</label>
                <input type="password" name="password" id="password">
            </li>
            <li>
                <label for="password2">Konfirmasi :</label>
                <input type="password" name="password2" id="password2">
            </li>
            <li>
                <button type="submit" name="register">Register</button>
            </li>
        </ul>
    </form>


</body>
</html>