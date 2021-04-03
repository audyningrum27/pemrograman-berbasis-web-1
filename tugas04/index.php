<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BMI</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
</head>

<body>

    <div class="form">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            Tinggi badan (cm):<input type="text" name="height">
            <br>
            Berat badan (kg):<input type="text" name="weight">
            <br>
            <input type="submit" value="Hitung" name="calculate" class="button">
        </form>

        <?php
        $error = "";
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST['height']) || empty($_POST['weight'])) {
                $error = "Data harus diisi";
            } elseif (!preg_match('/^[0-9]*$/', $_POST['height']) || !preg_match('/^[0-9]*$/', $_POST['weight'])) {
                $error = "hanya boleh angka (0 - 9)";
            } else {
                $m = $_POST['height'] / 100;
                $kg = $_POST['weight'];
                $bmi = $kg / ($m * $m);
                $message = "";
                if ($bmi < 18.5) {
                    $message = "Kekurangan Bobot < 18.5";
                } else if ($bmi >= 18.5 && $bmi <= 24.9) {
                    $message = "Sehat 18.5 - 24.9";
                } else if ($bmi > 24.9 && $bmi <= 29.9) {
                    $message = "Kelebihan Bobot 25 - 29.9";
                } else {
                    $message = "Obesitas";
                }
                $formatBMI = number_format($bmi, 1, '.', '');
                echo "<h3>BMI Anda adalah $formatBMI</h3>";
                echo "<p>$message</p>";
            }
        }
        echo "<h4>$error</h4>";
        ?>
    </div>
    <h3>Kalkulator BMI</h3>
    <p>6706202013 - Nurul Qofifah Audyningrum</p>
</body>

</html>