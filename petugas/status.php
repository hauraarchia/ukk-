<?php
include '../koneksi.php';
$id = $_GET['id_pemesanan'];
$status = $_POST['status'];

mysqli_query($kon, "UPDATE pemesanan SET status = '$status' WHERE id_pemesanan = $id");
header("location:resepsionis.php?page=reservasi");
