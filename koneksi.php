<?php


session_start(); // ini adalah kode untuk memulai session
$host = "localhost";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$host; dbname=UAS", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //echo "berhasil terkoneksi ke database";
    return $conn;
} catch (PDOException $e) {
    echo "ERROR : " . $e->getMessage();
}
