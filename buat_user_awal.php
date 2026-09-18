<?php
//buat_user_awal.php
//jalankan file ini satu kali saja lewat browser untuk membuat user awal
include 'config/koneksi.php';

$nama = 'Administator';
$username = 'admin';
$password = password_hash('admin123', PASSWORD_DEFAULT);
$role = 'admin';

$sql = "INSERT INTO tbl_user(nama_lengkap,username,password,role)";
$sql .= "VALUES('$nama','$username','$password','$role')";

if (mysqli_query($koneksi, $sql)) {
    echo 'User admin berhasil dibuat, silakan hapus file ini';
} else{
    echo 'Gagal memuat user: '. mysqli_error($koneksi);
}
?>