<?php
include 'koneksi.php';
$id = $_GET['id'];

// $data = $conn->prepare('SELECT * FROM detail WHERE id_detail=:id');
// $data->execute(['id' => $id]);
// $detail = $data->fetch(PDO::FETCH_OBJ);
if (isset($_POST['tittle']) && isset($_POST['desc'])) {
    $id_company = $_POST['id_company'];
    $tittle = $_POST['tittle'];
    $desc = $_POST['desc'];
    $data = $conn->prepare("UPDATE `detail` SET `tittle` = '$tittle' , `desc` = '$desc' WHERE `detail`.`id_detail` = $id ");
    if ($data->execute()) {
        echo "<script>alert('Data Berhasil di Ubah');</script>";
        echo "<script>
        setTimeout(function () {
        window.location.href= 'halaman-ubah-detail.php?id=$id_company';
     
         },500);
        </script>";
    }
}
