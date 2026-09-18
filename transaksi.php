<?php 
//transaksi.php
include 'includes/cek_session.php';
include 'config/koneksi.php';

if (!isset($_SESSION['keranjang'])) {
    $_SESSION['keranjang'] = array();
}

$daftar_barang = mysqli_query($koneksi, "SELECT * FROM tbl_barang WHERE stok > 0");
$total = 0;
foreach ($_SESSION['keranjang'] as $item) {
    $total += $item['subtotal'];
}
?>
<!DOCTYPE html>
<html>
    <head><title>Transaksi - SellMate</title>
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

        /* Judul utama */
        h1 {
            text-align: center;
            color: #5b21b6;
            margin: 0 0 30px;
            font-size: 32px;
        }

        /* Judul bagian */
        h3 {
            max-width: 1000px;
            margin: 25px auto 12px;
            color: #6d28d9;
            font-size: 20px;
        }

        /* Pesan error */
        body > p:first-of-type {
            max-width: 1000px;
            margin: 0 auto 20px;
            padding: 12px 18px;
            background-color: #fce7f3;
            color: #be185d;
            border-radius: 10px;
            font-weight: bold;
        }

        /* Form pilih barang */
        form {
            max-width: 1000px;
            margin: 0 auto 25px;
            padding: 22px;
            background-color: rgba(255, 255, 255, 0.95);
            border-radius: 15px;
            box-shadow: 0 8px 25px rgba(91, 33, 182, 0.15);
        }

        /* Select */
        select {
            padding: 11px 14px;
            border: 2px solid #d8b4fe;
            border-radius: 9px;
            background-color: #faf5ff;
            color: #4c1d95;
            font-size: 14px;
            outline: none;
            cursor: pointer;
        }

        select:focus {
            border-color: #8b5cf6;
        }

        /* Input jumlah */
        input[type="number"] {
            width: 100px;
            padding: 11px;
            margin-left: 10px;
            border: 2px solid #d8b4fe;
            border-radius: 9px;
            outline: none;
            font-size: 14px;
        }

        input[type="number"]:focus {
            border-color: #8b5cf6;
        }

        /* Semua tombol */
        input[type="submit"] {
            padding: 11px 18px;
            margin-left: 10px;
            border: none;
            border-radius: 9px;
            background-color: #a78bfa;
            color: white;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #7c3aed;
            transform: translateY(-2px);
            box-shadow: 0 5px 12px rgba(124, 58, 237, 0.25);
        }

        /* Tabel keranjang */
        table {
            width: 100%;
            max-width: 1000px;
            margin: 0 auto 25px;
            border-collapse: collapse;
            background-color: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 8px 25px rgba(91, 33, 182, 0.15);
        }

        /* Header tabel */
        th {
            padding: 14px;
            background-color: #8b5cf6;
            color: white;
            text-align: center;
        }

        /* Isi tabel */
        td {
            padding: 13px;
            border-bottom: 1px solid #ede9fe;
            text-align: center;
        }

        tr:nth-child(even) {
            background-color: #faf5ff;
        }

        tr:hover {
            background-color: #f3e8ff;
        }

        /* Baris total */
        tr:last-child {
            background-color: #ede9fe;
            font-weight: bold;
            color: #5b21b6;
        }

        /* Tombol hapus keranjang */
        td a {
            display: inline-block;
            padding: 7px 12px;
            background-color: #f0a8c0;
            color: white;
            text-decoration: none;
            border-radius: 7px;
            font-size: 13px;
            font-weight: bold;
            transition: 0.3s;
        }

        td a:hover {
            background-color: #e11d48;
        }

        /* Form pelanggan */
        form:last-of-type {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        form:last-of-type select {
            min-width: 250px;
        }

        form:last-of-type input[type="submit"] {
            background-color: #8b5cf6;
        }

        form:last-of-type input[type="submit"]:hover {
            background-color: #6d28d9;
        }

        /* Kembali dashboard */
        body > p:last-child {
            max-width: 1000px;
            margin: 20px auto;
        }

        body > p:last-child a {
            display: inline-block;
            padding: 10px 18px;
            background-color: #c084fc;
            color: white;
            text-decoration: none;
            border-radius: 9px;
            font-weight: bold;
            transition: 0.3s;
        }

        body > p:last-child a:hover {
            background-color: #9333ea;
            transform: translateY(-2px);
        }

        /* Responsive HP */
        @media (max-width: 768px) {
            body {
                padding: 20px 10px;
            }

            h1 {
                font-size: 26px;
            }

            form {
                padding: 18px;
            }

            form:first-of-type select {
                width: 100%;
                margin-bottom: 10px;
            }

            input[type="number"] {
                width: 100%;
                margin: 5px 0;
            }

            input[type="submit"] {
                width: 100%;
                margin: 5px 0;
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

            form:last-of-type {
                display: block;
            }

            form:last-of-type select {
                width: 100%;
                margin-bottom: 10px;
            }
        }
    </style>
    </head>
    <body>
        <h1>Transaksi Penjualan</h1>

        <?php if (isset($_SESSION['pesan_error'])) {
            echo '<p>' . $_SESSION['pesan_error'] . '</p>';
            unset($_SESSION['pesan_error']);
        } ?>

        <h3>Pilih Barang</h3>
        <form action="proses_tambah_keranjang.php" method="POST">
            <select name="id_barang" required>
                <?php while ($b = mysqli_fetch_assoc($daftar_barang)) { ?>
                <option value="<?php echo $b['id_barang']; ?>php">
                    <?php echo $b['nama_barang'] . '(stok: '. $b['stok']. ')';?>
                </option>
                <?php } ?>
            </select>
            jumlah: <input type="number" name="jumlah" min="1" required>
            <input type="submit" value="Tambah Ke Keranjang">
        </form>

        <h3>Keranjang</h3>
        <table border="1" cellpadding="6">
            <tr><th>Nama Barang</th><th>Harga</th><th>Jumlah</th><th>Subtotal</th><th>Aksi</th></tr>
            <?php foreach($_SESSION['keranjang'] as $id_barang => $item) { ?>
            <tr>
                <td><?php echo $item['nama_barang']; ?></td>
                <td><?php echo number_format($item['harga'], 0,',','.'); ?></td>
                <td><?php echo $item['jumlah']; ?></td>
                <td><?php echo number_format($item['subtotal'], 0,',','.'); ?></td>
                <td><a href="hapus_keranjang.php?id=<?php echo $id_barang ?>">Hapus</a></td>
            </tr>
            <?php } ?>
            <tr><td colspan="3">Total</td>
            <td colspan="2"><?php echo number_format($total, 0,',','.') ?></td></tr>
        </table>

        <?php 
        $sql_pelanggan = "SELECT * FROM tbl_pelanggan ORDER BY nama_pelanggan ASC";
        $hasil_pelanggan = mysqli_query($koneksi, $sql_pelanggan);
        ?>

        <form action="proses_simpan_transaksi.php" method="POST">
            Pelanggan: 
            <select name="id_pelanggan">
                <option value="">-- Pelanggan Umum --</option>
                <?php while ($p = mysqli_fetch_assoc($hasil_pelanggan)) { ?>
                <option value="<?php echo $p['id_pelanggan']; ?>">
                    <?php echo $p['nama_pelanggan']; ?></option>
                <?php } ?>
            </select>
            <input type="submit" value="Simpan Transaksi">
        </form>
        <p><a href="dashboard.php">Kembali ke Dashboard</a></p>
    </body>
</html>