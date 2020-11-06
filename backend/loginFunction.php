<?php
    include 'dbconnection.php';
    session_start();
    
    if(mysqli_num_rows(loginAdmin(isset($_POST['Submit']))) == 1){
        $_SESSION["username"] = true;
        header('Location: ../view.php');
    }else {
        $_SESSION["gagal"] = "Gagal melakukan login";
        header('Location: ../login.php');
    }

    exit();
?>