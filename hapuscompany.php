<?php
include 'koneksi.php';
$id = $_GET['id'];
$data = $conn->prepare("DELETE FROM `companies` WHERE `companies`.`id_company` = $id ");
if ($data->execute()) {
    echo "<script>alert('Data Berhasil di Hapus');</script>";
}
$data = $conn->prepare("ALTER TABLE `companies` AUTO_INCREMENT = $id ");
if ($data->execute()) {
    echo "<script>
    setTimeout(function () {
        window.location.href= 'halaman-menu-utama.php';
     
     },500);
    </script>";
}
