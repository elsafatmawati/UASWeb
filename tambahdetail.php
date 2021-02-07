<?php
include 'koneksi.php';
if (isset($_POST['id_company'])) {
    $id = $_POST['id_company'];
    $tittle = $_POST['tittle'];
    $desc = $_POST['desc'];
    $data = $conn->prepare("INSERT INTO `detail` (`id_company`, `id_detail`, `tittle`, `desc`) VALUES ('$id', NULL, '$tittle', '$desc')");
    if ($data->execute()) {
        header("Location: halaman-ubah-detail.php?id=$id");
    }
}
