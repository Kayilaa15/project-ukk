
<!--- tambah_pelanggan.php -->
<?php include 'includes/cek_session.php'; ?>
<!DOCTYPE html>
<html>
    <head>
    <title>Tambah Pelanggan - Warung ABC</title>

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

            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        /* Judul */
        h1 {
            margin: 0 0 25px;
            color: #5b21b6;
            font-size: 32px;
            text-align: center;
        }

        /* Card form */
        form {
            width: 100%;
            max-width: 500px;
            padding: 30px;
            background-color: rgba(255, 255, 255, 0.96);
            border-radius: 18px;
            box-shadow: 0 10px 30px rgba(91, 33, 182, 0.18);
        }

        /* Tabel form */
        table {
            width: 100%;
            border-spacing: 0 15px;
        }

        td {
            color: #5b21b6;
            font-weight: bold;
            vertical-align: middle;
        }

        /* Kolom titik dua */
        td:nth-child(2) {
            width: 20px;
            text-align: center;
        }

        /* Input */
        input[type="text"] {
            width: 100%;
            padding: 12px;
            border: 2px solid #d8b4fe;
            border-radius: 9px;
            background-color: #faf5ff;
            color: #4c1d95;
            font-size: 14px;
            outline: none;
            transition: 0.3s;
        }

        /* Efek fokus */
        input[type="text"]:focus {
            border-color: #8b5cf6;
            background-color: white;
            box-shadow: 0 0 8px rgba(139, 92, 246, 0.2);
        }

        /* Tombol Simpan */
        input[type="submit"] {
            width: 100%;
            padding: 13px;
            border: none;
            border-radius: 9px;
            background-color: #a78bfa;
            color: white;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #7c3aed;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(124, 58, 237, 0.3);
        }

        /* Tombol Kembali */
        body > p {
            margin-top: 20px;
        }

        body > p a {
            display: inline-block;
            padding: 10px 22px;
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

        /* Tampilan HP */
        @media (max-width: 600px) {
            body {
                padding: 25px 15px;
            }

            h1 {
                font-size: 27px;
            }

            form {
                padding: 22px;
            }

            td:first-child {
                width: 40%;
                font-size: 13px;
            }

            td:nth-child(2) {
                width: 15px;
            }

            td:last-child {
                width: 60%;
            }
        }
    </style>
</head>

    <body>
        <h1>Tambah pelanggan</h1>
        <form action="proses_tambah_pelanggan.php" method="POST">
            <table>
                <tr><td>Nama Pelanggan</td><td>:</td>
                    <td><input type="text" name="nama_pelanggan" required></td></tr>
                <tr><td>No. Hp</td><td>:</td>
                    <td><input type="text" name="no_hp" required></td></tr>
                <tr><td>Alamat</td><td>:</td>
                    <td><input type="text" name="alamat" required></td></tr>
                <tr><td colspan="3"><input type="submit" value="Simpan"></td></tr>
            </table>
        </form>
        <p><a href="data_pelanggan.php">Kembali</a></p>
    </body>
</html>
