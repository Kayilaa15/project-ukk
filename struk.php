<?php
// struk.php
include "includes/cek_session.php";
include "config/koneksi.php";

$id_transaksi = $_GET['id'];

$sql_header  = "SELECT t.*, u.nama_lengkap AS nama_kasir, p.nama_pelanggan";
$sql_header .= " FROM tbl_transaksi t";
$sql_header .= " JOIN tbl_user u ON t.id_kasir = u.id_user";
$sql_header .= " LEFT JOIN tbl_pelanggan p ON t.id_pelanggan = p.id_pelanggan";
$sql_header .= " WHERE t.id_transaksi = '$id_transaksi'";

$transaksi = mysqli_fetch_assoc(mysqli_query($koneksi, $sql_header));

$sql_detail  = "SELECT d.jumlah, d.subtotal, b.nama_barang, b.harga_satuan";
$sql_detail .= " FROM tbl_detail_transaksi d";
$sql_detail .= " JOIN tbl_barang b ON d.id_barang = b.id_barang";
$sql_detail .= " WHERE d.id_transaksi = '$id_transaksi'";

$detail = mysqli_query($koneksi, $sql_detail);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Struk Transaksi - Warung ABC</title>
    
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 40px 20px;
            min-height: 100vh;
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #e9d5ff, #ddd6fe, #c4b5fd);
            color: #4c1d95;
        }

        /* Card struk */
        body > h2,
        body > p,
        body > table {
            width: 100%;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        body > h2 {
            margin-top: 0;
            margin-bottom: 0;
            padding: 25px 25px 10px;
            background-color: white;
            color: #5b21b6;
            text-align: center;
            font-size: 28px;
            border-radius: 18px 18px 0 0;
        }

        /* Informasi transaksi */
        body > h2 + p {
            margin-top: 0;
            margin-bottom: 0;
            padding: 15px 25px 20px;
            background-color: white;
            color: #6b21a8;
            line-height: 1.8;
            font-size: 14px;
            border-bottom: 2px dashed #d8b4fe;
        }

        /* Tabel */
        table {
            border-collapse: collapse;
            background-color: white;
            box-shadow: 0 10px 30px rgba(91, 33, 182, 0.18);
            overflow: hidden;
        }

        /* Header tabel */
        th {
            padding: 12px 10px;
            background-color: #8b5cf6;
            color: white;
            font-size: 13px;
            text-align: center;
        }

        /* Isi tabel */
        td {
            padding: 12px 10px;
            border-bottom: 1px solid #ede9fe;
            color: #4c1d95;
            font-size: 13px;
        }

        /* Kolom harga dan angka */
        td:nth-child(2),
        td:nth-child(3),
        td:nth-child(4) {
            text-align: center;
        }

        /* Baris selang-seling */
        tr:nth-child(even) {
            background-color: #faf5ff;
        }

        /* Baris total */
        tr:last-child {
            background-color: #ede9fe;
            font-weight: bold;
        }

        tr:last-child td {
            color: #5b21b6;
            border-bottom: none;
            padding: 15px 10px;
            font-size: 15px;
        }

        /* Area tombol */
        body > p:last-child {
            margin-top: 0;
            padding: 20px 25px 25px;
            background-color: white;
            border-radius: 0 0 18px 18px;
            box-shadow: 0 10px 30px rgba(91, 33, 182, 0.18);
            text-align: center;
        }

        /* Tombol cetak */
        button {
            padding: 11px 20px;
            border: none;
            border-radius: 9px;
            background-color: #a78bfa;
            color: white;
            font-size: 14px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
        }

        button:hover {
            background-color: #7c3aed;
            transform: translateY(-2px);
            box-shadow: 0 5px 12px rgba(124, 58, 237, 0.25);
        }

        /* Link kembali */
        body > p:last-child a {
            display: inline-block;
            margin-left: 10px;
            padding: 11px 20px;
            background-color: #c084fc;
            color: white;
            text-decoration: none;
            border-radius: 9px;
            font-size: 14px;
            font-weight: bold;
            transition: 0.3s;
        }

        body > p:last-child a:hover {
            background-color: #9333ea;
            transform: translateY(-2px);
        }

        /* Tampilan HP */
        @media (max-width: 600px) {
            body {
                padding: 20px 10px;
            }

            body > h2 {
                font-size: 24px;
                padding: 20px 15px 10px;
            }

            body > h2 + p {
                padding: 12px 15px 18px;
                font-size: 13px;
            }

            table {
                display: table;
                width: 100%;
                font-size: 12px;
            }

            th,
            td {
                padding: 9px 5px;
                font-size: 11px;
            }

            body > p:last-child {
                padding: 18px 10px;
            }

            button,
            body > p:last-child a {
                display: block;
                width: 100%;
                margin: 5px 0;
            }
        }

        /* Tampilan saat dicetak */
        @media print {
            body {
                background: white;
                padding: 0;
            }

            body > h2,
            body > p,
            body > table {
                box-shadow: none;
            }

            body > h2 {
                border-radius: 0;
            }

            body > p:last-child {
                display: none;
            }

            table {
                border: 1px solid #ddd;
            }

            th {
                background-color: #eee !important;
                color: black !important;
            }

            td {
                color: black;
            }
        }
    </style>
</head>
<body>

<h2>Warung ABC</h2>
<p>
    No. Transaksi: <?php echo $transaksi['no_transaksi']; ?><br>
    Tanggal: <?php echo $transaksi['tanggal']; ?><br>
    Kasir: <?php echo $transaksi['nama_kasir']; ?><br>
    Pelanggan: <?php echo $transaksi['nama_pelanggan'] ? $transaksi['nama_pelanggan'] : 'Umum'; ?>
</p>

<table border="1" cellpadding="6">
    <tr>
        <th>Barang</th>
        <th>Harga</th>
        <th>Jumlah</th>
        <th>Subtotal</th>
    </tr>

    <?php while ($item = mysqli_fetch_assoc($detail)) { ?>
    <tr>
        <td><?php echo $item['nama_barang']; ?></td>
        <td><?php echo number_format($item['harga_satuan'], 0, ',', '.'); ?></td>
        <td><?php echo $item['jumlah']; ?></td>
        <td><?php echo number_format($item['subtotal'], 0, ',', '.'); ?></td>
    </tr>
    <?php } ?>

    <tr>
        <td colspan="3">Total Bayar</td>
        <td><?php echo number_format($transaksi['total_bayar'], 0, ',', '.'); ?></td>
    </tr>
</table>

<p>
    <button onclick="window.print()">Cetak Struk</button>
    <a href="riwayat_transaksi.php">Kembali ke Riwayat Transaksi</a>
</p>

</body>
</html>