<?php
include 'db/connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    // Hashing password
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    // Simpan ke database
    $stmt = $conn->prepare("INSERT INTO users (username, password, role) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $hashed_password, $role);

    if ($stmt->execute()) {
        echo "Pengguna berhasil ditambahkan!";
    } else {
        echo "Terjadi kesalahan: " . $stmt->error;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Pengguna</title>
</head>
<body>
    <form method="POST" action="">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" required>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required>
        <label for="role">Role:</label>
        <select name="role" id="role">
            <option value="admin">Admin</option>
            <option value="kepala_sekolah">Kepala Sekolah</option>
            <option value="petugas_tik">Petugas TIK</option>
        </select>
        <button type="submit">Tambah Pengguna</button>
    </form>
</body>
</html>
