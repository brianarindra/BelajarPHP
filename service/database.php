<?php

$hostname = "localhost";
$username = "root";
$password = "";
$database_name = "buku_tamu";

$db = mysqli_connect($hostname, $username, $password, $database_name);

if($db->connect_error) {
        echo "Koneksi database rusak";
        die("error!");
}


//echo "Koneksi Berhasil";
?>