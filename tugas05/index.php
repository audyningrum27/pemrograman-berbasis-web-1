<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Buku</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <?php include("config.php"); ?>
</head>
<style>
    <?php include "css/style.css"; ?>
</style>

<body>
    <div class="main">
        <div class="sidebar">
            <ul id="nav">
                <li><a href="index.php" class="active">Login</a></li>
                <li><a href="admin.php">Admin</a></li>
                <li><a href="lihatdata.php">Lihat Data</a></li>
                <li><a href="cari.php">Cari</a></li>
                <li><a href="tambah.php">Tambah Buku</a></li>
                <li><a href="hapus.php">Hapus Buku</a></li>
                <li><a href="update.php">Update</a></li>
            </ul>
        </div>
        <div class="content">
            <?php 
                if(isset($_POST["login"])) {
                    ceklogin($_POST);
                }
            ?>
            <h2>Login</h2>
            <form method="POST" class="login">
                <input type="text" name="username" placeholder="Username" autocomplete="off"autofocus="on" required>
                <br>
                <input type="password" name="password" placeholder="Password" autocomplete="off" required>
                <br>
                <button type="submit" name="login">Login</button>
                <br>
                <input type="checkbox" name="rememberme" value="rememberme" style="margin-top: 10px;"> Remember Me<br>
                <p>Belum punya akun? <a href="register.php">Daftar disini</a></p>
            </form>

            <?php
                function ceklogin($datalogin) {
                    global $conn;
                    $username = $datalogin["username"];
                    $password = $datalogin["password"];

                    $cekuser = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");

                    if(mysqli_num_rows($cekuser) === 1) {
                        $hasil = mysqli_fetch_assoc($cekuser);

                        if(password_verify($password, $hasil["password"])) {
                            $_SESSION["user"] = $username;
                            $_SESSION["login"] = true;

                            if(isset($datalogin["rememberme"])) {
                                setcookie("login", "tetap_ingat", time()+3600);
                            } else {
                                echo "Cookie belum dibuat";
                            }
                            echo "<script>
                                alert('Anda berhasil login!');
                                document.location.href='admin.php';
                            </script>";
                        }
                    } else {
                        echo "<p style=\"color:red; font-style:italic;\"> Username / Password Salah ! </p>";
                    }
                }
            ?>
        </div>
    </div>
</body>

</html>