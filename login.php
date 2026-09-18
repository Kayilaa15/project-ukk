<!--login.php-->
<!DOCTYPE html>
<html>
    <head>
        <title>Login - SellMate</title>
        <style>
        /* Tampilan halaman */
        body {
            margin: 0;
            padding: 0;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #e9d5ff, #d8b4fe, #c4b5fd);
        }

        /* Judul */
        h1 {
            position: absolute;
            top: 70px;
            color: #5b21b6;
            font-size: 28px;
            text-align: center;
        }

        /* Form */
        form {
            background-color: #ffffff;
            padding: 35px 40px;
            border-radius: 18px;
            box-shadow: 0 10px 30px rgba(91, 33, 182, 0.2);
            width: 350px;
        }

        /* Tabel */
        table {
            width: 100%;
            border-spacing: 0 15px;
        }

        td {
            color: #4c1d95;
            font-weight: bold;
        }

        /* Input username & password */
        input[type="text"],
        input[type="password"] {
            width: 100%;
            box-sizing: border-box;
            padding: 12px;
            border: 2px solid #d8b4fe;
            border-radius: 10px;
            outline: none;
            font-size: 14px;
            background-color: #faf5ff;
            transition: 0.3s;
        }

        input[type="text"]:focus,
        input[type="password"]:focus {
            border-color: #a855f7;
            box-shadow: 0 0 8px rgba(168, 85, 247, 0.25);
        }

        /* Tombol Login */
        input[type="submit"] {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 10px;
            background-color: #a78bfa;
            color: white;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #8b5cf6;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(139, 92, 246, 0.3);
        }

        /* Pesan error */
        p {
            position: absolute;
            top: 125px;
            color: #be185d;
            background-color: #fce7f3;
            padding: 10px 20px;
            border-radius: 8px;
            font-size: 14px;
        }
    </style>
    </head>
    <body>
        <h1>Login Aplikasi Kasir SellMate</h1>


        <?php
        session_start();
        if (isset($_SESSION['pesan_error'])){
            echo '<p>'. $_SESSION['pesan_error'] . '</p>';
            unset ($_SESSION['pesan_error']);
        }
        ?>
        <form action="proses_login.php" method="POST">
            <table>
                <tr>
                    <td>Username</td>
                    <td>:</td>
                    <td><input type="text" name="username" required></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td>:</td>
                    <td><input type="password" name="password" required></td>
                </tr>
                <tr>
                    <td colspan="3">
                        <input type="submit" value="Login">
                    </td>
                </tr>
            </table>
</form>
    </body>
</html>