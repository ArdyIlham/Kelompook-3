<?php
$host = "localhost";
$username = "root"; // Username MySQL Anda
$password = "";     // Password MySQL Anda
$database = "ruang_tik_db";

$conn = new mysqli($host, $username, $password, $database);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
