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
    <?php 
    session_start();
    if (isset($_SESSION["sukses"]))
    {
        echo '<div class="toast toast-success">';
        echo '<button class="btn btn-clear float-right"></button>';
        echo $_SESSION["sukses"];
        echo '</div>';

        unset($_SESSION["sukses"]);
    }
    if (isset($_SESSION["gagal"]))
    {
        echo '<div class="toast toast-warning">';
        echo '<button class="btn btn-clear float-right"></button>';
        echo $_SESSION["gagal"];
        echo '</div>';

        unset($_SESSION["gagal"]);
    }
    ?>
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
                echo "<form method='POST' action='backend/deleteFunction.php'>
                    <input name='userId' value=".$user['G_ID']." hidden/>
                    <td><button type='submit' class='btn btn-error'>
                        <i class='fa fa-trash' aria-hidden='true'> Hapus</i>
                    </button></td>
                </form>";
                echo "<td class='tableItem'><button class='btn btn-primary'>
                    <i class='fa fa-pencil' aria-hidden='true'> Update</i>
                </button></td>";
                echo "</tr>";
            }
            echo "</tbody>";
            echo "</table>";
        ?>
    </div>
    <div class="addGuest">
        <a class="btn btnAddGuest" href="#modal-id">Tambah Guest</a>
    </div>

    <div class="modal" id="modal-id">
        <a href="#close" class="modal-overlay" aria-label="Close"></a>
        <div class="modal-container">
            <div class="modal-header">
                <a href="#close" class="btn btn-clear float-right" aria-label="Close"></a>
            <div class="modal-title h5">Tambah Guest</div>
            </div>
            <div class="modal-body">
            <form action="backend/addfunction.php" method="POST">
                <div class="content">
                    <div class="form-group">
                        <label class="form-label" for="nama">Nama</label>
                        <input class="form-input" type="text" id="nama" name="nama" placeholder="Nama Guest" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="ktp">No KTP</label>
                        <input class="form-input" type="text" id="ktp" name="ktp" placeholder="Nomor KTP" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="telp">Nomor Telepon</label>
                        <input class="form-input" type="text" id="telp" name="telp" placeholder="Nomor Telepon" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="input-example-3">Jenis Pembayaran</label>
                        <select class="form-select" id="pembayaran" name="pembayaran" required>
                            <option value="CASH">CASH</option>
                            <option value="DEBIT BCA">DEBIT BCA</option>
                            <option value="DEBIT MANDIRI">DEBIT MANDIRI</option>
                            <option value="DEBIT BRI">DEBIT BRI</option>
                            <option value="DEBIT BNI">DEBIT BNI</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="biaya">Biaya</label>
                        <input class="form-input" type="text" id="biaya" name="biaya" placeholder="Biaya" required>
                    </div>
                </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>