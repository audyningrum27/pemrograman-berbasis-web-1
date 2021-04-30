<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Buku</title>
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
                <li><a href="register.php" class="active">Register</a></li>
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
            if (isset($_POST["submit"])) {
                if (register($_POST) > 0) {
                    echo "<script>
                            alert('Data berhasil disimpan');
                            document.location.href='index.php';
                            </script>";
                } else {
                    echo mysqli_error($conn);
                }
            }
            ?>
            <h2>Register</h2>
            <form method="POST" class="register">
                <input type="text" name="username" placeholder="Username" autocomplete="off" autofocus="on" required><br>
                <input type="password" name="password" placeholder="Password" required><br>
                <input type="password" name="cpassword" placeholder="Confirm Password" required><br>
                <button type="submit" name="submit">Register</button>
                <p>Sudah punya akun? <a href="index.php">Login</a></p>
            </form>

            <?php
                function register($infologin) {
                    global $conn;

                    $username = htmlspecialchars(stripslashes($infologin["username"]));
                    $password = mysqli_real_escape_string($conn, $infologin["password"]);
                    $cpassword = mysqli_real_escape_string($conn, $infologin["cpassword"]);;
                    $cek = mysqli_query($conn, "SELECT username FROM users WHERE username = '$username'");

                    if(mysqli_num_rows($cek) > 0) {
                        echo "<script>alert('Username sudah ada!');</script>";
                        return false;
                    }

                    if($password != $cpassword) {
                        echo "<script>alert('Password tidak sama');</script>";
                        return false;
                    }

                    $password = password_hash($password, PASSWORD_DEFAULT);

                    $query = mysqli_query($conn, "INSERT INTO users (username, password) VALUES ('$username', '$password')");

                    return mysqli_affected_rows($conn);
                }
            ?>
        </div>
    </div>
</body>

</html>