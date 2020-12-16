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

    function checkphoto($fileFoto)
    {
        $command = escapeshellcmd("python3.7/var/www/prg/doAPI.py".$fileFoto);
        $output = shell_exec($command);

        $hasil = array('msg'=>$output);
        return $hasil;
    }

    function registerAdmin($request) {
        global $db;

        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $nama = $_POST['nama'];
        $fileFoto = (object) @$_FILES['file'];
        $folderUpload = __DIR__ . "/assets/uploads";

        if ($fileFoto->size > 1000 * 2000) {
            die("File tidak boleh lebih dari 2MB");}
        
        if ($fileFoto->type !== 'image/jpeg') {
            die("File ktp harus jpeg!");}
        # periksa apakah folder sudah ada
        if (!is_dir($folderUpload))
        {
        # jika tidak maka folder harus dibuat terlebih dahulu
        # mode : owner only
        mkdir($folderUpload, 0700, $rekursif = true);
        # simpan masing-masing file ke dalam array
        # dan casting menjadi objek :)
        };


        # mulai upload file
        $uploadFotoSukses = move_uploaded_file(
            $fileFoto->tmp_name, "{$folderUpload}/{$fileFoto->name}"
        );

        if ($uploadFotoSukses) {
            $link = "{$folderUpload}/{$fileFoto->name}";
            echo "Sukses Upload Foto: <a href='{$link}'>{$fileFoto->name}</a>";
            echo "<br>";
        };

        
        #call check photo function
        $hasil = checkphoto($fileFoto);
        #if $hasil have face in it
        if ($hasil)
        {
            mysqli_query($db, "INSERT INTO administrator(USERNAME_ADMIN, PASSWORD_ADMIN, NAMA_ADMIN) VALUES('$username', '$password', '$nama')");
        }
        $status = mysqli_affected_rows($db);

        dbclose();
        return $status;
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