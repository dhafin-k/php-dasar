<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table border="1" callpading="10" cellspacing="0">
        <?php 
            for( $i = 1; $i <= 3; $i++) : ?>
                <tr>
                    <?php for( $j =1; $j <=5; $j++) { ?>
                        <td><?php echo"$i, $j"; ?></td>
                    
                    <?php } ?>
                </tr>
            
        <?php endfor; ?>  
    </table>
</body>
</html>
















<?php 
// Pengulangan
// for
// while
// do.. while
// foreach :pengulangan khusus array

// for( $i = 0; $i < 5;  $i++) {
//     echo "hello world! ";
//     // Terulang 5 kali
// }
// $i = 0;
// while ( $i < 5 ) {
//     echo "Hello World! <br>";
//     $i++;
// }

// $i= 10;
// do {
//     echo "Hello world!";
// } while( $i < 5
// );
