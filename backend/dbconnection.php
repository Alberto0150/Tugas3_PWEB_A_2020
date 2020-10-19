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

    function dbclose() {
        mysqli_close(mysqli_connect("localhost", "root", "", "guest_book"));
    }
?>