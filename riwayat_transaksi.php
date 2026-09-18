<?php 
//riwayat_transaksi.php
include 'includes/cek_session.php';
include 'config/koneksi.php';

$sql = "SELECT t.id_transaksi, t.no_transaksi, t.tanggal, t.total_bayar,";
$sql .="u.nama_lengkap AS nama_kasir "; 
$sql .="FROM tbl_transaksi t ";
$sql .="JOIN tbl_user u ON t.id_kasir = u.id_user ";
$sql .="ORDER BY t.tanggal DESC ";
$hasil = mysqli_query($koneksi, $sql);
?>
<!DOCTYPE html>
<html>
    <head>
    <title>Riwayat Transaksi - SellMate</title>

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
            margin: 0 0 30px;
            text-align: center;
            color: #5b21b6;
            font-size: 32px;
        }

        /* Tabel */
        table {
            width: 100%;
            max-width: 1000px;
            margin: 0 auto 25px;
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

        /* Baris selang-seling */
        tr:nth-child(even) {
            background-color: #faf5ff;
        }

        /* Hover */
        tr:hover {
            background-color: #f3e8ff;
        }

        /* Kolom total bayar */
        td:nth-child(4) {
            font-weight: bold;
            color: #6d28d9;
        }

        /* Tombol Cetak */
        td a {
            display: inline-block;
            padding: 8px 15px;
            background-color: #a78bfa;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-size: 13px;
            font-weight: bold;
            transition: 0.3s;
        }

        td a:hover {
            background-color: #7c3aed;
            transform: translateY(-2px);
            box-shadow: 0 4px 10px rgba(124, 58, 237, 0.25);
        }

        /* Tombol kembali */
        body > p {
            max-width: 1000px;
            margin: 20px auto;
        }

        body > p a {
            display: inline-block;
            padding: 11px 20px;
            background-color: #c084fc;
            color: white;
            text-decoration: none;
            border-radius: 9px;
            font-weight: bold;
            transition: 0.3s;
        }

        body > p a:hover {
            background-color: #9333ea;
            transform: translateY(-2px);
            box-shadow: 0 5px 12px rgba(147, 51, 234, 0.25);
        }

        /* Responsive untuk HP */
        @media (max-width: 768px) {
            body {
                padding: 20px 10px;
            }

            h1 {
                font-size: 26px;
                margin-bottom: 20px;
            }

            table {
                display: block;
                overflow-x: auto;
                white-space: nowrap;
            }

            th,
            td {
                padding: 10px;
                font-size: 13px;
            }

            body > p {
                text-align: center;
            }
        }
    </style>
</head>

    <body>
        <h1>Riwayat Transaksi</h1>
        <table border="1" cellpadding="6">
            <tr><th>No. Transaksi</th><th>Tanggal</th><th>Kasir</th>
                <th>Total Bayar</th><th>Aksi</th></tr>
            <?php while ($row = mysqli_fetch_assoc($hasil)) { ?>
            <tr>
                <td><?php echo $row['no_transaksi']; ?></td>
                <td><?php echo $row['tanggal']; ?></td>
                <td><?php echo $row['nama_kasir']; ?></td>
                <td><?php echo number_format($row['total_bayar'], 0,',','.'); ?></td>
                <td><a href="struk.php?id=<?php echo $row['id_transaksi']; ?>">Cetak</a></td>
            </tr>
            <?php } ?>
        </table>
        <p><a href="dashboard.php">Kembali ke Dashboard</a></p>
    </body>
</html>