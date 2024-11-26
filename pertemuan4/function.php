<?php 
    function salam($waktu = "sore",$nama = "dafinn") {
        return "selamat $waktu,kak $nama";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2><?= salam();?> </h2>
</body>
</html>