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
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #333;
        }

        /* Form Container */
        form {
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }

        /* Heading */
        h1 {
            font-size: 24px;
            margin-bottom: 20px;
            color: #444;
        }

        /* Input Styling */
        ul {
            list-style: none;
        }

        li {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
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

        /* Button Styling */
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

        /* Image Styling */
        img {
            max-width: 300px;
            margin-bottom: 15px;
            border-radius: 50%;
        }
    </style>
</head>
<body>
    
    
    
    <form action="" method="post">
        <h1>Halaman Registrasi</h1>
        <img src="img/bg.png" alt="">
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