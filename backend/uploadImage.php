<?php
    include 'dbconnection.php';
    session_start();
    
    if(mysqli_num_rows(uploadFile(isset($_POST['Submit']))) == 1){
        // $_SESSION["sukses"] = "Berhasil melakukan register";
        // header('Location: ../login.php');
    }else {
        $_SESSION["gagal"] = "Gagal melakukan upload";
        header('Location: ../file_upload.php');
    }

    exit();
?>