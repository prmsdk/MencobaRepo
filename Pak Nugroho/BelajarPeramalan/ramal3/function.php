<?php
        error_reporting(0);
        $n = $_GET["n"];
        echo '<form action="" method="post" name="asd">';
        for($i=0; $i<$n; $i++){
            echo '
            
            <h3>Masukkan Jumlah Penjualan Kecap Bulan ke-', $i, '</h3>
            <input type="number" name="y'.$i.'">
            ';
            $Ji+= $i;
        }
        
        echo '<h3>Masukkan Jumlah Penjualan Kecap Bulan ke</h3>';
        echo '<input type="number" name="dicari">';
        echo '<button type="submit" name="hitung">hitung</button>';
        
        if(isset($_POST["hitung"])){
        $dicari = $_POST["dicari"];
        for($i=0; $i<$n; $i++){
            
            $hitung = $_POST["y$i"];

            $y[$i] = $hitung;
            echo "<br>";
            echo "y ke-$i = ";
            echo $y[$i];

            $Jy+=$y[$i];

            $i2[$i] = $i * $i;
            echo "<br>";
            echo "x2 ke-$i = $i2[$i]";

            $Ji2+=$i2[$i];

            $xy[$i] = $y[$i] * $i;
            echo "<br>";
            echo "xy ke-$i = $xy[$i]";

            $Jxy+=$xy[$i];

            echo "<br> ===== BATAS FOR =====";
        }

        $b = ($n * $Jxy - $Ji * $Jy) / ($n * $Ji2 - ($Ji * $Ji));
        
        echo "<br> Ini Sigma y = ";
        echo $Jy;

        echo "<br> Ini Sigma x = ";
        echo $Ji;

        echo "<br> Ini Sigma x2 = ";
        echo $Ji2;

        echo "<br> Ini Sigma xy = ";
        echo $Jxy;

        echo "<br> Ini adalah b = ";
        echo $b;

        $a = ($Jy / $n) - ($b * ($dicari / $n));

        echo "<br> Ini adalah a = ";
        echo $a;

        $bulan = $a + ($b * $dicari);

        echo "<br> Ini adalah penjualan kecap bulan ke-$dicari = ";
        echo $bulan;
        echo '</form>';
        }else{
            echo "cb";
        }
    ?>