<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "db_hotel";

$kon = mysqli_connect("localhost", "root", "", "db_hotel");

//cek kkoneksi
if(mysqli_connect_errno()){
    echo "koneksi database gagal: ". mysqli_connect_error();
}

?>