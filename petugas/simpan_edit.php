<?php
require '../koneksi.php';

if (isset($_POST["proses"])) {
    $id_kamar = $_POST['id'];
    $nama_kamar = $_POST["nama_kamar"];
    $fasilitas_kamar = $_POST["fasilitas_kamar"];
    $jumlah = $_POST["jumlah"];
    $harga = $_POST["harga"];

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

            move_uploaded_file($tmpName, '../img/' . $newImageName);
            $query = "UPDATE kamar SET nama_kamar='$nama_kamar',fasilitas_kamar='$fasilitas_kamar',
            jumlah_kasur='$jumlah', harga='$harga', gambar_kamar='$newImageName' where id_kamar ='$id_kamar'";
            mysqli_query($kon, $query);
            echo
            "<script> 
                alert('Sucessfully Added');
                document.location.href = 'admin.php?page=kamar';
            </script>";
        }
    }
}
?>