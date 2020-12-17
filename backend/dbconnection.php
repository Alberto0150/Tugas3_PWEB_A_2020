<?php

    $db = mysqli_connect("localhost", "root", "", "guest_book");
    if( !$db ){
        die("Gagal terhubung dengan database: " . mysqli_connect_error());
    }

    function getAllUser($query_sintax) {
        global $db;
        $all_result = mysqli_query($db, $query_sintax);

        dbclose();
        return $all_result;
    }

    function addGuest($request) {
        global $db;

        $nama = $_POST['nama'];
        $ktp = $_POST['ktp'];
        $telp = $_POST['telp'];
        $pembayaran = $_POST['pembayaran'];
        $biaya = $_POST['biaya'];
        

        mysqli_query($db, "INSERT INTO guest(G_NAMA, G_KTP, G_TELP, G_JENIS_BAYAR, G_BIAYA) VALUES('$nama', '$ktp', '$telp', '$pembayaran', '$biaya')");
        $status = mysqli_affected_rows($db);
        dbclose();
        return $status;
    }

    function updateGuest($request) {
        global $db;

        $id = $_POST['id'];
        $nama = $_POST['nama'];
        $ktp = $_POST['ktp'];
        $telp = $_POST['telp'];
        $pembayaran = $_POST['pembayaran'];
        $biaya = $_POST['biaya'];
        

        mysqli_query($db, "UPDATE guest SET G_NAMA = '$nama', G_KTP = '$ktp', G_TELP = '$telp', G_JENIS_BAYAR = '$pembayaran' , G_BIAYA = '$biaya' WHERE G_ID = '$id'");
        $status = mysqli_affected_rows($db);
        dbclose();
        return $status;
    }

    function deleteGuest($request){
        global $db;

        $ids = $_POST['userId'];

        mysqli_query($db, "DELETE FROM guest WHERE G_ID = $ids");
        $status = mysqli_affected_rows($db);
        dbclose();
        return $status;
    }

    function registerAdmin($request) {
        global $db;

        if(!$_FILES || !key_exists('file', $_FILES)){
            echo('File tidak terupload.');
        }
    
        $temporaryFile = $_FILES['file']['tmp_name'];
        $extension = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
        
        // Check the MIME type
        $supportedFormat = ['image/jpg', 'image/jpeg', 'image/png'];
        if(!in_array(mime_content_type($temporaryFile), $supportedFormat)){
            echo('Mohon hanya unggah file JPG, JPEG, atau PNG.');
        }
    
        // Cek ukuran gambar
        if(getimagesize($temporaryFile) == 0){
            echo('Ukuran tidak valid.');
        }
    
        // Upload gambar
        $filename = md5($temporaryFile).'.'.$extension;
        echo($filename);
        move_uploaded_file($temporaryFile, '../upload/'.$filename);

        $is_detected = shell_exec('cd face_detector; python3 main.py'.'../upload/'.$filename);
        if($is_detected)
        {
            echo("jalan");
        }
        else{
            echo("tidak");
        }
        // if($is_detected > 0){
        //     // $username = $_POST['username'];
        //     // $password = md5($_POST['password']);
        //     // $nama = $_POST['nama'];

        //     // mysqli_query($db, "INSERT INTO administrator(USERNAME_ADMIN, PASSWORD_ADMIN, NAMA_ADMIN) VALUES('$username', '$password', '$nama')");
        //     // $status = mysqli_affected_rows($db);
        //     $status = 1;
        //     // dbclose();
        // }else{
        //     unlink('../upload/'.$filename);
        //     $status = -1;
        // }

        // return $status;
        return 1;
    }

    function loginAdmin($request) {
        global $db;

        $username = $_POST['username'];
        $password = md5($_POST['password']);
        
        $status = mysqli_query($db, "SELECT * FROM administrator WHERE USERNAME_ADMIN = '$username' AND PASSWORD_ADMIN = '$password'");

        dbclose();
        return $status;
    }

    // function console_log( $data ){
    //     echo '<script>';
    //     echo 'console.log('. json_encode( $data ) .')';
    //     echo '</script>';
    // }

    function dbclose() {
        mysqli_close(mysqli_connect("localhost", "root", "", "guest_book"));
    }
?>