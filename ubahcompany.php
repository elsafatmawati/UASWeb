<?php
include 'koneksi.php';
$id = $_GET['id'];

if (isset($_POST['company_name']) && isset($_POST['about'])) {

    $filename = $_FILES['image']['name'];
    $size = $_FILES['image']['size'];
    $tmp = $_FILES['image']['tmp_name'];

    $company_name = $_POST['company_name'];
    $about = $_POST['about'];

    $extention = ['jpg', 'jpeg', 'png'];
    $imageExtention = explode('.', $filename);
    $imageExtention = strtolower(end($imageExtention));
    if (!in_array($imageExtention, $extention)) {
        echo "<script> alert('Image Not Found or Not image file!'); </script>";
    }


    move_uploaded_file($tmp, 'image/' . $filename);
    $data = $conn->prepare("UPDATE `companies` SET `image` = '$filename' WHERE `companies`.`id_company` = $id ");
    if ($data->execute()) {
        echo "<script>alert('Gambar Berhasil di Ubah');</script>";
    }


    $data = $conn->prepare("UPDATE `companies` SET `company_name` = '$company_name' , `about` = '$about' WHERE `companies`.`id_company` = $id ");
    if ($data->execute()) {
        echo "<script>alert('Data Berhasil di Ubah');</script>";
        echo "<script>
        setTimeout(function () {
        window.location.href= 'halaman-menu-utama.php';
     
         },500);
        </script>";
    }
}
