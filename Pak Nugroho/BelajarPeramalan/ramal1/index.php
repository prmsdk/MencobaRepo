<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Peramalan 1</title>
</head>
<body>
    
    <form action="" method="post">
        <h2>Masukkan nilai awal</h2> <input type="number" name="a">
        <hr>
        <h2>Masukkan banyak data</h2> <input type="number" name="n" min="1">
        <hr>
        <h2>Masukkan Selisih antara 2 data berurutan</h2> <input type="number" name="b">
        <hr>
        <input type="submit" value="SUBMIT" name="submit">
    </form>
    <br>

    <?php
    
        error_reporting(0);
        $a = $_POST["a"];
        $n = $_POST["n"];
        $b = $_POST["b"];

        for($i=1; $i <= $n; $i++){
            $Un = $a + ($i-1) * $b;
            $bulan = $i + $n;

            echo "Penjualan Kecap di Bulan ke $bulan adalah $Un";
            echo "<br>";
        }

    ?>
</body>
</html>