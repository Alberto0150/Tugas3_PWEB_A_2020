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
    <link rel="stylesheet" href="https://unpkg.com/spectre.css/dist/spectre.min.css">
    <link rel="stylesheet" href="https://unpkg.com/spectre.css/dist/spectre-exp.min.css">
    <link rel="stylesheet" href="https://unpkg.com/spectre.css/dist/spectre-icons.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="css\main.css"/>
</head>
<body>
    <ul class="nav">
        <li class="nav-item">
            <a href="#">Simple CRUD Guest Book</a>
        </li>
    </ul>
    <div class="kelompok">
        <div>Iqbaal Pratama Putra</div>
        <div>Alberto Sanjaya</div>
        <div>Syubban Fakhriya</div>
    </div>
    <div class='tableContainer'>
        <?php        
            echo "<table class='table table-striped table-hover table-scroll'>";
            echo("
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NAMA</th>
                    <th>KTP</th>
                    <th>TELP</th>
                    <th>JENIS PEMBAYARAN</th>
                    <th>BIAYA</th>
                    <th>HAPUS</th>
                    <th>PERBAHARUI</th>
                </tr>
            </thead>
            ");
            
            echo "<tbody>";
            //ambil record
            while($user = mysqli_fetch_array($all_user)){
                //isi di layar
                echo "<tr>";
                echo "<td>".$user['G_ID']."</td>";
                echo "<td>".$user['G_NAMA']."</td>";
                echo "<td>".$user['G_KTP']."</td>";
                echo "<td>".$user['G_TELP']."</td>";
                echo "<td>".$user['G_JENIS_BAYAR']."</td>";
                echo "<td>".$user['G_BIAYA']."</td>";
                echo "<td class='tableItem'><button class='btn btn-error'>
                    <i class='fa fa-trash' aria-hidden='true'> Hapus</i>
                </button></td>";
                echo "<td><button class='btn btn-primary'>
                    <i class='fa fa-pencil' aria-hidden='true'> Update</i>
                </button></td>";
                echo "</tr>";
            }
            echo "</tbody>";
            echo "</table>";
        ?>
    </div>
    <div class="addGuest">
        <div class="btn btnAddGuest">Tambah Guest</div>
    </div>
</body>
</html>