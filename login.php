<?php
// login.php
// Halaman form login SellMate

session_start();

// Jika sudah login, langsung ke dashboard
if (isset($_SESSION['id_user'])) {
    header("Location: dashboard.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login - SellMate</title>
</head>
<body>

    <h2>SellMate</h2>
    <p>Sistem Manajemen Penjualan</p>

    <!-- Form login -->
    <form action="proses_login.php" method="POST">

        <label>Username</label><br>
        <input type="text" name="username" required>
        <br><br>

        <label>Password</label><br>
        <input type="password" name="password" required>
        <br><br>

        <button type="submit">Login</button>

    </form>

    <!-- Menampilkan pesan error jika ada -->
    <?php if (isset($_GET['pesan'])): ?>

        <?php if ($_GET['pesan'] == 'gagal'): ?>
            <p style="color:red;">
                Username atau password salah!
            </p>
        <?php endif; ?>

        <?php if ($_GET['pesan'] == 'kosong'): ?>
            <p style="color:red;">
                Username dan password harus diisi!
            </p>
        <?php endif; ?>

    <?php endif; ?>

</body>
</html>