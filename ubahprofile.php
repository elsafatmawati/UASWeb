<?php
include 'koneksi.php';
$id = $_SESSION['id'];

// $data = $conn->prepare('SELECT * FROM detail WHERE id_detail=:id');
// $data->execute(['id' => $id]);
// $detail = $data->fetch(PDO::FETCH_OBJ);
if (isset($_POST['Username']) || isset($_POST['Password']) || isset($_POST['Email'])) {
    $Username = $_POST['Username'];
    $Password = $_POST['Password'];
    $Email = $_POST['Email'];
    $data = $conn->prepare("UPDATE `user` SET `username` = '$Username', `password` = '$Password', `email` = '$Email' WHERE `user`.`id_user` = $id;");
    if ($data->execute()) {
        echo "<script>alert('Data Berhasil di Ubah');</script>";
        echo "<script>
        setTimeout(function () {
        window.location.href= 'halaman-menu-utama.php';
         },500);
        </script>";
    }
}
