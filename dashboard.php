<?php
//dasboard.php
include 'includes/cek_session.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Dashboard - SellMate </title>
         <style>
        /* Reset dasar */
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

        /* Container utama */
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        /* Judul */
        h1 {
            margin-top: 30px;
            margin-bottom: 10px;
            color: #5b21b6;
            font-size: 30px;
            text-align: center;
        }

        /* Informasi role */
        p {
            margin-top: 0;
            margin-bottom: 30px;
            padding: 10px 20px;
            background-color: #f3e8ff;
            border-radius: 20px;
            color: #6d28d9;
            font-weight: bold;
            box-shadow: 0 4px 12px rgba(91, 33, 182, 0.1);
        }

        /* Menu dashboard */
        ul {
            list-style: none;
            padding: 30px;
            margin: 0;
            width: 100%;
            max-width: 500px;

            background-color: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(91, 33, 182, 0.18);
        }

        /* Item menu */
        li {
            margin-bottom: 15px;
        }

        li:last-child {
            margin-bottom: 0;
        }

        /* Link menu */
        li a {
            display: block;
            padding: 15px 20px;
            text-decoration: none;
            color: #5b21b6;
            background-color: #f3e8ff;
            border: 2px solid #e9d5ff;
            border-radius: 12px;
            font-weight: bold;
            transition: all 0.3s ease;
        }

        /* Hover menu */
        li a:hover {
            background-color: #a78bfa;
            border-color: #8b5cf6;
            color: white;
            transform: translateY(-3px);
            box-shadow: 0 6px 15px rgba(139, 92, 246, 0.25);
        }

        /* Tombol logout */
        body > a {
            margin-top: 25px;
            padding: 12px 30px;
            background-color: #c084fc;
            color: white;
            text-decoration: none;
            font-weight: bold;
            border-radius: 10px;
            transition: 0.3s;
        }

        body > a:hover {
            background-color: #9333ea;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(147, 51, 234, 0.3);
        }

        /* Tampilan HP */
        @media (max-width: 600px) {
            body {
                padding: 20px;
            }

            h1 {
                font-size: 24px;
            }

            ul {
                padding: 20px;
            }
        }
    </style>
    </head>
    <body>
        <h1>Selamat Datang, <?php echo $_SESSION['nama_lengkap']; ?></h1>
        <p>Anda Login sebagai: <?php echo $_SESSION['role']; ?></p>

        <ul>
            <?php if ($_SESSION['role'] == 'admin' || $_SESSION['role'] == 'gudang') { ?>
               <li><a href="data_barang.php">Data Barang</a></li>
               <li><a href="data_pelanggan.php">Data pelanggan</a></li>
            <?php } ?>

         <?php if ($_SESSION['role'] == 'admin' || $_SESSION['role'] == 'kasir') { ?>
             <li><a href="transaksi.php">Transaksi Kasir</a></li>
             <li><a href="riwayat_transaksi.php">Riwayat Transaksi</a></li>
         <?php } ?>
        </ul>
        
        <a href="logout.php">Logout</a>
    </body>
</html>