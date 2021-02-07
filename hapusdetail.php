<?php

include 'koneksi.php';
$id = $_GET['id'];
$id_company = $_GET['id_company'];
$data = $conn->prepare("DELETE FROM `detail` WHERE `detail`.`id_detail` = $id ");
if ($data->execute()) {
    echo "<script>alert('Data Berhasil di Hapus');</script>";
    echo "<script>
    setTimeout(function () {
    window.location.href= 'halaman-ubah-detail.php?id=$id_company';
 
     },500);
    </script>";
}
