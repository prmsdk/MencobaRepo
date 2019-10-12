<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Peramalan 2</title>
</head>
<body>
    
    <form action="" method="post">
        <div class="barissatu">
            <h2>Masukkan Nilai Pertama</h2>
            <h3>Tahun = </h3>
            <input type="number" name="tahun">
            <h3>Bulan = </h3>
            <select name="bulan">  
                <option value="">Pilih Bulan</option>  
                <option value="1">Januari</option>
                <option value="2">Februari</option>  
                <option value="3">Maret</option>  
                <option value="4">April</option>  
                <option value="5">Mei</option>
                <option value="6">Juni</option>  
                <option value="7">Juli</option>
                <option value="8">Agustus</option>
                <option value="9">September</option>
                <option value="10">Oktober</option>
                <option value="11">November</option>
                <option value="12">Desember</option>
            </select>
            <h3>Nilai = </h3>
            <input type="number" name="nilaipertama">
            <hr>
        </div>

        <div class="barisdua">
            <h2>Masukkan Nilai Bulan setelahnya</h2>
            <h3>Nilai = </h3>
            <input type="number" name="nilaikedua">
            <hr>
        </div>

        <div class="baristiga">
            <h2>Prediksi Nilai pada Bulan : </h2>
            <h3>Tahun = </h3>
            <input type="number" name="tahunprediksi">
            <h3>Bulan = </h3>
            <select name="bulanprediksi">  
                <option value="">Pilih Bulan</option>  
                <option value="1">Januari</option>
                <option value="2">Februari</option>  
                <option value="3">Maret</option>  
                <option value="4">April</option>  
                <option value="5">Mei</option>
                <option value="6">Juni</option>  
                <option value="7">Juli</option>
                <option value="8">Agustus</option>
                <option value="9">September</option>
                <option value="10">Oktober</option>
                <option value="11">November</option>
                <option value="12">Desember</option>
            </select>
            <input type="submit" value="submit" name="submit">
            <hr>
        </div>

        <?php
            error_reporting(0);
            $tahun = $_POST["tahun"];
            $bulan = $_POST["bulan"];
            $nilaipertama = $_POST["nilaipertama"];

            $nilaikedua = $_POST["nilaikedua"];

            $tahunprediksi = $_POST["tahunprediksi"];
            $bulanprediksi = $_POST["bulanprediksi"];
            //Rumuusssssssssss anjaayyyyyy
            $bulankedua = $bulan+1;
            $tahunkedua = $tahun;
            if($bulankedua>12){
                $tahunkedua++;
                $bulankedua = $bulankedua - 12;
            }
            //Cari Nilai b (Selisih)
            $b = $nilaikedua - $nilaipertama;
            //Cari Nilai n
            $tahunb = $tahunprediksi - $tahun;
            $bulanb = $bulanprediksi - $bulan;
            if($tahunb==0 && $bulanb>0){
                $n = $bulanb;
            }
            else if($tahunb>0){
                $n = $tahunb*12 + $bulanb;
            }
            else if($tahunb<0 || ($bulanb<=0 && $tahunb<=0)){
                echo "Data tahun & bulan awal harus lebih kecil daripada tahun & bulan prediksi";
            }

            //Cari Nilai Un (Prediksi)
            $Un = $nilaipertama + (($n-1) * $b);
        ?>

        <div class="barisempat">
            <h2>Hasil Prediksi : </h2>
            <h2><?php echo "Nilai b = $b, Nilai n = $n";?></h2>
            <h2><?php echo "Data pada Bulan " , BulanSwitch($bulan), " Tahun $tahun adalah $nilaipertama";?></h2>
            <h2><?php echo "Data pada Bulan " , BulanSwitch($bulankedua), " Tahun $tahunkedua adalah $nilaikedua";?></h2>
            <h2><?php echo "Prediksi Nilai pada Bulan " , BulanSwitch($bulanprediksi), " Tahun $tahunprediksi adalah $Un";?></h2>
        </div>
    </form>

</body>
</html>

<?php
    function BulanSwitch($bulan_temp){
        switch($bulan_temp){
            case "1":
            echo "Januari";
            break;

            case "2":
            echo "Februari";
            break;

            case "3":
            echo "Maret";
            break;

            case "4":
            echo "April";
            break;

            case "5":
            echo "Maret";
            break;

            case "6":
            echo "Juni";
            break;

            case "7":
            echo "Juli";
            break;

            case "8":
            echo "Agustus";
            break;

            case "9":
            echo "September";
            break;

            case "10":
            echo "Oktober";
            break;

            case "11":
            echo "November";
            break;

            case "12":
            echo "Desember";
            break;
        }
    }
?>