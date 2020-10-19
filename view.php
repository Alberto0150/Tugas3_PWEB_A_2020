<?php
    require './backend/dbconnection.php';
    $all_user = getAllUser("SELECT * FROM guest");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View</title>
</head>
<body>
        <?php             
            //Bagian tampilan
            echo("<table>");
            echo("
            <tr>
                <td>ID</td>
                <td>NAMA</td>
                <td>KTP</td>
                <td>TELP</td>
                <td>JENIS PEMBAYARAN</td>
                <td>BIAYA</td>
            </tr>
            ");

            //ambil record
            while($user = mysqli_fetch_array($all_user)){
                //isi di layar
                echo "<tr>";
                echo "<td>".$user['G_NAMA']."</td>";
                echo "<td>".$user['G_KTP']."</td>";
                echo "<td>".$user['G_TELP']."</td>";
                echo "<td>".$user['G_JENIS_BAYAR']."</td>";
                echo "<td>".$user['G_BIAYA']."</td>";
                echo "</tr>";
            }
            echo("</table>");
        ?>
</body>
</html>