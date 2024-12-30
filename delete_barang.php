<?php
include 'db/connection.php';

$id = $_GET['id'];

// Hapus barang dari database
$stmt = $conn->prepare("DELETE FROM barang WHERE id = ?");
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    echo "Barang berhasil dihapus!";
    header("Location: manage_barang.php");
    exit;
} else {
    echo "Gagal menghapus barang: " . $stmt->error;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Hapus Barang</title>
</head>
<body>
    <button onclick="history.back()">Kembali</button>
    <h1>Konfirmasi Hapus Barang</h1>
    <p>Apakah Anda yakin ingin menghapus barang ini?</p>
    <a href="delete_barang.php?id=<?= $barang_id; ?>">Hapus</a>
</body>
</html>

