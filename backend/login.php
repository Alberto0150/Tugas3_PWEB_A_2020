<?php session_start();
include "koneksi.php";
$nama_admin=$_POST['nama_admin'];
$password=md5($_POST['password']);

$query=mysqli_query($db,"SELECT * 
    FROM data_admin 
    WHERE nama_admin = '$nama_admin'
    AND PASSWORD = '$password'");

$cek=mysqli_num_rows($query);

if($cek){
    $_SESSION['nama_admin']=$nama_admin;
    ?>Anda berhasil login. silahkan menuju menu utama<a href="../view.php"> Homepage admin </a><?php
}
else{
    ?>Anda gagal login. silahkan kembali <a href="../index.php"> Homepage</a><?php
    // echo mysqli_error();
}
?>