<?php 
//data_pelanggan.php
include 'includes/cek_session.php';
include 'config/koneksi.php';

$sql = "SELECT * FROM tbl_pelanggan ORDER BY nama_pelanggan ASC";
$hasil = mysqli_query($koneksi, $sql);
?>
<!DOCTYPE html>
<html>
    <head><title>Data Pelanggan - SellMate</title>
<style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 40px;
            min-height: 100vh;
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #e9d5ff, #ddd6fe, #c4b5fd);
            color: #4c1d95;
        }

        /* Judul */
        h1 {
            margin: 0 0 20px;
            text-align: center;
            color: #5b21b6;
            font-size: 32px;
        }

        /* Navigasi */
        p {
            max-width: 1000px;
            margin: 0 auto 25px;
            padding: 15px 20px;
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(91, 33, 182, 0.12);
        }

        p a {
            color: #7c3aed;
            text-decoration: none;
            font-weight: bold;
            transition: 0.3s;
        }

        p a:hover {
            color: #4c1d95;
            text-decoration: underline;
        }

        /* Tombol Tambah Pelanggan */
        p a:last-child {
            background-color: #a78bfa;
            color: white;
            padding: 10px 16px;
            border-radius: 8px;
            margin-left: 10px;
        }

        p a:last-child:hover {
            background-color: #8b5cf6;
            text-decoration: none;
        }

        /* Tabel */
        table {
            width: 100%;
            max-width: 1000px;
            margin: auto;
            border-collapse: collapse;
            background-color: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(91, 33, 182, 0.18);
            border: none;
        }

        /* Header tabel */
        th {
            padding: 15px 12px;
            background-color: #8b5cf6;
            color: white;
            text-align: center;
            font-size: 14px;
        }

        /* Isi tabel */
        td {
            padding: 14px 12px;
            text-align: center;
            border-bottom: 1px solid #ede9fe;
            color: #4c1d95;
        }

        /* Kolom alamat */
        td:nth-child(3) {
            text-align: left;
        }

        /* Baris selang-seling */
        tr:nth-child(even) {
            background-color: #faf5ff;
        }

        /* Efek hover */
        tr:hover {
            background-color: #f3e8ff;
        }

        /* Tombol Edit */
        td a:first-child {
            display: inline-block;
            padding: 7px 12px;
            background-color: #a78bfa;
            color: white;
            border-radius: 7px;
            text-decoration: none;
            font-size: 13px;
            font-weight: bold;
            transition: 0.3s;
        }

        td a:first-child:hover {
            background-color: #7c3aed;
        }

        /* Tombol Hapus */
        td a:last-child {
            display: inline-block;
            padding: 7px 12px;
            background-color: #f0a8c0;
            color: white;
            border-radius: 7px;
            text-decoration: none;
            font-size: 13px;
            font-weight: bold;
            transition: 0.3s;
        }

        td a:last-child:hover {
            background-color: #e11d48;
        }

        /* Responsive HP */
        @media (max-width: 768px) {
            body {
                padding: 20px 10px;
            }

            h1 {
                font-size: 26px;
            }

            p {
                font-size: 14px;
            }

            table {
                display: block;
                overflow-x: auto;
                white-space: nowrap;
            }

            th,
            td {
                padding: 10px;
            }

            td:nth-child(3) {
                text-align: left;
                white-space: normal;
                min-width: 200px;
            }
        }
    </style>
    </head>

    <body>
        <h1>Data Pelanggan</h1>
        <p><a href="dashboard.php">Kembali ke Dashboard</a> |
           <a href="tambah_pelanggan.php">Tambah Pelanggan</a></p>
        <table border="1" cellpadding="6">
            <tr><th>Nama Pelanggan</th><th>No.Hp</th><th>Alamat</th><th>Aksi</th></tr>
            <?php while ($row = mysqli_fetch_assoc($hasil)) { ?>
            <tr>
                <td><?php echo $row['nama_pelanggan'] ?></td>
                <td><?php echo $row['no_hp'] ?></td>
                <td><?php echo $row['alamat'] ?></td>
                <td>
                    <a href="edit_pelanggan.php?id=<?php echo $row['id_pelanggan']; ?>">Edit</a> |
                    <a href="hapus_pelanggan.php?id=<?php echo $row['id_pelanggan']; ?>"
                     onclick="return confirm('Yakin hapus pelanggan ini?');">Hapus</a>
                </td>
            </tr>
            <?php } ?>
        </table>
    </body>
</html>