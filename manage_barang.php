<?php
session_start();
include 'db/connection.php';

// Pastikan pengguna sudah login
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}

// Ambil data barang dari database
$result = $conn->query("SELECT * FROM barang");




?>

<!DOCTYPE html>
<html>
<head>
    <title>Daftar Barang</title>
    <link rel="stylesheet" href="_css/style.css">
</head>
<body>
    <!-- Tombol kembali ke dashboard -->
    <a href="dashboard.php" style="display: inline-block; padding: 10px 15px; background-color: #007bff; color: white; text-decoration: none; border-radius: 5px;">Kembali ke Dashboard</a>
    <!-- Tombol kembali -->
    <button onclick="history.back()">Kembali</button>

    <h1>Daftar Barang</h1>
    <a href="add_barang.php">Tambah Barang</a>
    <table border="1">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Kondisi</th>
                <th>Tanggal Pengadaan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include 'db/connection.php';
            $result = $conn->query("SELECT * FROM barang");
            if ($result->num_rows > 0):
                $no = 1;
                while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $row['nama_barang']; ?></td>
                        <td><?= $row['kondisi']; ?></td>
                        <td><?= $row['tanggal_pengadaan']; ?></td>
                        <td>
                            <a href="edit_barang.php?id=<?= $row['id']; ?>">Edit</a>
                            <a href="delete_barang.php?id=<?= $row['id']; ?>" onclick="return confirm('Yakin ingin menghapus?');">Hapus</a>
                        </td>
                    </tr>
                <?php endwhile;
            else: ?>
                <tr>
                    <td colspan="5">Tidak ada data barang.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>
