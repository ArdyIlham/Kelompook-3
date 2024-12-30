<?php
include 'db/connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_barang = $_POST['nama_barang'];
    $kondisi = $_POST['kondisi'];
    $tanggal_pengadaan = $_POST['tanggal_pengadaan'];

    // Masukkan data ke database
    $stmt = $conn->prepare("INSERT INTO barang (nama_barang, kondisi, tanggal_pengadaan) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $nama_barang, $kondisi, $tanggal_pengadaan);

    if ($stmt->execute()) {
        echo "Barang berhasil ditambahkan!";
    } else {
        echo "Gagal menambahkan barang: " . $stmt->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Barang</title>
</head>
<body>
    <button onclick="history.back()">Kembali</button>
    <h1>Tambah Barang</h1>
    <form method="POST" action="">
        <label for="nama_barang">Nama Barang:</label>
        <input type="text" name="nama_barang" id="nama_barang" required>
        <label for="kondisi">Kondisi:</label>
        <select name="kondisi" id="kondisi" required>
            <option value="Baik">Baik</option>
            <option value="Rusak">Rusak</option>
            <option value="Perlu Perbaikan">Perlu Perbaikan</option>
        </select>
        <label for="tanggal_pengadaan">Tanggal Pengadaan:</label>
        <input type="date" name="tanggal_pengadaan" id="tanggal_pengadaan" required>
        <button type="submit">Simpan</button>
    </form>
</body>
</html>
