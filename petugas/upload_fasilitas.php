<?php
require '../koneksi.php';

if (isset($_POST["proses"])) {
    $nama_fasilitas = $_POST["nama_fas"];
    $keterangan_fasilitas = $_POST["ket_fas"];

    if ($_FILES["gambar"]["error"] == 4) {
        echo
        "<script> alert('Image Does Not Exist'); </script>";
    } else {
        $fileName = $_FILES["gambar"]["name"];
        $fileSize = $_FILES["gambar"]["size"];
        $tmpName = $_FILES["gambar"]["tmp_name"];

        $validImageExtension = ['jpg', 'jpeg', 'png'];
        $imageExtension = explode('.', $fileName);
        $imageExtension = strtolower(end($imageExtension));
        if (!in_array($imageExtension, $validImageExtension)) {
            echo
            "<script> alert('Invalid Image Extension'); </script>";
        } elseif ($fileSize > 1000000) {
            echo
            "<script> alert('Image Size Is Too Large'); </script>";
        } else {
            $newImageName = uniqid();
            $newImageName .= '.' . $imageExtension;

            move_uploaded_file($tmpName, '../img/fasilitas/' . $newImageName);
            $query = "INSERT INTO fasilitas  VALUES('', '$nama_fasilitas', '$keterangan_fasilitas' , '$newImageName')";
            mysqli_query($kon, $query);
            echo
            "<script> 
                alert('Sucessfully Added');
                document.location.href = 'admin.php?page=fasilitas';
            </script>";
        }
    }
}
