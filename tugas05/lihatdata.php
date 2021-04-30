<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lihat Data Buku</title>
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
                <li><a href="index.php">Login</a></li>
                <li><a href="admin.php">Admin</a></li>
                <li><a href="lihatdata.php" class="active">Lihat Data</a></li>
                <li><a href="cari.php">Cari</a></li>
                <li><a href="tambah.php">Tambah Buku</a></li>
                <li><a href="hapus.php">Hapus Buku</a></li>
                <li><a href="update.php">Update</a></li>
            </ul>
        </div>
        <div class="content">
            <form method="post">
                <div class="group-form">
                    <label for="select-data">Data</label>
                    <div class="input">
                        <select name="data" id="select-data">
                            <option value="6706202013_tbbuku">Data Buku</option>
                        </select>
                    </div>
                </div>
                <div class="group-form">
                    <div>
                        <button type="submit" name="submit">Lihat Data</button>
                    </div>
                </div>
            </form>
            <?php
            if (isset($_POST['submit'])) {
                $data = $_POST['data'];
                $query = "Select * from $data";
                $hasil = mysqli_query($conn, $query);
                $i = 1;
                if ($_POST['data'] == "6706202013_tbbuku") {
            ?>
                    <table class="table">
                        <tr>
                            <th>No</th>
                            <th>Judul Buku</th>
                            <th>Pengarang</th>
                            <th>Penerbit</th>
                        </tr>
                        <?php
                        if (mysqli_num_rows($hasil) > 0) {
                            // output data setiap baris
                            while ($row = mysqli_fetch_assoc($hasil)) {
                                echo
                                '<tr>
									<td>' . $i . '</td>
									<td>' . $row['judul'] . '</td>
									<td>' . $row['pengarang'] . '</td>
									<td>' . $row['penerbit'] . '</td>
								</tr>';
                                $i++;
                            }
                        } else {
                            echo "0 results";
                        }
                        ?>
                    </table>
            <?php
                }
            }
            ?>
        </div>
    </div>
</body>

</html>