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
    <link rel="stylesheet" href="css/main.css"/>
</head>
<body>
    <?php
        session_start();
        if(isset($_SESSION['username'])){
    ?>

    <header>
        <div id="section-a">
            <img src="image/gear.png">
        </div>

        <div id="section-b">
            <h1>
                Guest Book Bengkel Sukamaju
            </h1>
        </div> 
        
        <div id="section-c">
            <img src="image/gear.png">
        </div>

    </header>
    <main>
        <?php
            $filecounter="./file_counter.txt";
            $fl=fopen($filecounter,"r+");
            $hit=fread($fl,filesize($filecounter));
            echo("<table width=250 align=center border=1 cellspacing=0 cellpadding=0
            bordercolor=#0000FF><tr>");
            echo("<td width=250 valign=middle align=center>");
            echo("<font face=verdana size=2 color=#FF0000><b>");
            echo("Anda pengunjung yang ke:");
            echo($hit);
            echo("</b></font>");
            echo("</td>");
            echo("</tr></table>");
            fclose($fl);            
        ?>
        <div class="kelompok">
            <h3>Anggota Kelompok </h3>
            <ul>
                <li>Iqbaal Pratama Putra</li>
                <li>Alberto Sanjaya</li>
                <li>Syubban Fakhriya</li>
            </ul>
        </div>
        <form method="POST" action="backend/logout.php">
            <button type="submit" class="btn">Keluar</button>
        </form>
        
        <?php 
        
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
        
        <div class='tableContainer'>
            <?php        
                echo "<table class='table table-striped table-hover table-scroll'>";
                echo("
                <thead>
                    <tr>
                        <th>ADMIN_ID</th>
                        <th>ADMIN_USERNAME</th>
                        <th>TANGGAL</th>
                    </tr>
                </thead>
                ");
                
                echo "<tbody>";
                //ambil record
                while($user = mysqli_fetch_array($all_user)){?>
                    <tr>
                    <td><?php echo $user['ADMIN_ID']; ?></td>
                    <td><?php echo $user['ADMIN_USERNAME']; ?></td>
                    <td><?php echo $user['TANGGAL']; ?></td>
                    </tr>
                <?php 
                    }
                ?>     
                </tbody>
                </table>
        </div>
    </main>
    <div class="addGuest">
        <div class="btn">  
            <a  href="#modal-id">Tambah Guest</a>
        </div>
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

    <?php
        } else {
            $_SESSION["gagal"] = "Belum melakukan login";
            header('Location: login.php');
        }
    ?>
</body>
</html>