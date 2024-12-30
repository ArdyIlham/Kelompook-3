<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}

// Tentukan konten berdasarkan role
$role = $_SESSION['role'];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>
<h1>Selamat Datang di Dashboard</h1>
    <p>Anda login sebagai: <?php echo ucfirst($role); ?></p>

    <?php if ($role === 'admin'): ?>
        <h2>Menu Admin</h2>
        <ul>
            <li><a href="manage_users.php">Kelola Pengguna</a></li>
            <li><a href="manage_barang.php">Kelola Barang</a></li>
        </ul>
    <?php elseif ($role === 'kepala_sekolah'): ?>
        <h2>Menu Kepala Sekolah</h2>
        <ul>
            <li><a href="view_reports.php">Lihat Laporan</a></li>
            <li><a href="monitor_barang.php">Monitor Barang</a></li>
        </ul>
    <?php elseif ($role === 'petugas_tik'): ?>
        <h2>Menu Petugas TIK</h2>
        <ul>
            <li><a href="add_barang.php">Tambah Barang</a></li>
            <li><a href="update_barang.php">Update Barang</a></li>
        </ul>
    <?php endif; ?>

    <a href="dashboard.php" style="display: inline-block; padding: 10px 15px; background-color: #007bff; color: white; text-decoration: none; border-radius: 5px;">Kembali ke Dashboard</a>
    <a href="logout.php">Logout</a>
</body>
</html>
