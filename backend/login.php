<?php session_start();
include "../backend/dbconnection.php";
$A_USERNAME=$_POST['A_USERNAME'];
$A_PASSWORD=md5($_POST['A_PASSWORD']);

$query=mysqli_query($db,"SELECT * 
    FROM admin 
    WHERE A_USERNAME = '$A_USERNAME'
    AND A_PASSWORD = '$A_PASSWORD'");

$cek=mysqli_num_rows($query);

if($cek){
    $_SESSION['A_USERNAME']=$A_USERNAME;
    ?>Anda berhasil login. silahkan menuju menu utama<a href="../view.php"> Homepage admin </a><?php
}
else{
    ?>Anda gagal login. silahkan kembali <a href="../index.php"> Homepage</a><?php
    // echo mysqli_error();
}
?>