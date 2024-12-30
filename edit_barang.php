<?php
include 'db/connection.php';

$id = $_GET['id'];

// Ambil data barang berdasarkan ID
$stmt = $conn->prepare("SELECT * FROM barang WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$barang = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_barang = $_POST['nama_barang'];
    $kondisi = $_POST['kondisi'];
    $tanggal_pengadaan = $_POST['tanggal_pengadaan'];

    // Update data barang
    $stmt = $conn->prepare("UPDATE barang SET nama_barang = ?, kondisi = ?, tanggal_pengadaan = ? WHERE id = ?");
    $stmt->bind_param("sssi", $nama_barang, $kondisi, $tanggal_pengadaan, $id);

    if ($stmt->execute()) {
        echo "Barang berhasil diupdate!";
    } else {
        echo "Gagal mengupdate barang: " . $stmt->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Barang</title>
</head>
<body>
    <button onclick="history.back()">Kembali</button>
    <h1>Edit Barang</h1>
    <form method="POST" action="">
        <label for="nama_barang">Nama Barang:</label>
        <input type="text" name="nama_barang" value="<?= $barang['nama_barang']; ?>" required>
        <label for="kondisi">Kondisi:</label>
        <select name="kondisi" required>
            <option value="Baik" <?= $barang['kondisi'] == 'Baik' ? 'selected' : ''; ?>>Baik</option>
            <option value="Rusak" <?= $barang['kondisi'] == 'Rusak' ? 'selected' : ''; ?>>Rusak</option>
            <option value="Perlu Perbaikan" <?= $barang['kondisi'] == 'Perlu Perbaikan' ? 'selected' : ''; ?>>Perlu Perbaikan</option>
        </select>
        <label for="tanggal_pengadaan">Tanggal Pengadaan:</label>
        <input type="date" name="tanggal_pengadaan" value="<?= $barang['tanggal_pengadaan']; ?>" required>
        <button type="submit">Update</button>
    </form>
</body>
</html>

