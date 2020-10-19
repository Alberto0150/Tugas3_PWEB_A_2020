<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View</title>
</head>
<body>
        <?php 
            // ambil file php
            require("dbconnection.php");
            //hubungkan db WAJIB
            $link=open_connection();
            //pilih tabel
            $tablename="guest";
            // perintah select
            $sqlstr ="select * from $tablename";
            // eksekusi perintah
            $result = mysql_query ($sqlstr) or die ("Kesalahan pada perintah SQL");
            //putus koneksi WAJIB
            mysql_close($link);
            
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
            while($row = mysql_fetch_object($result))
            {
                //ambil isi kolom
                $ID = $row->G_ID;
                $NAMA = $row->G_NAMA;
                $KTP = $row->G_KTP;
                $TELP = $row->G_TELP;
                $JENIS_BAYAR = $row->G_JENIS_BAYAR;
                $BIAYA = $row->G_BIAYA;

                //isi di layar
                echo("
                <tr>
                    <td>$ID</td>
                    <td>$NAMA</td>
                    <td>$KTP</td>
                    <td>$TELP</td>
                    <td>$JENIS_BAYAR</td>
                    <td>$BIAYA</td>
                </tr>
                ");
            }
            echo("</table>");
        ?>
</body>
</html>