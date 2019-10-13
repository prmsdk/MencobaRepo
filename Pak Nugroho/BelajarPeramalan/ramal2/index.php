<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Peramalan 2</title>
</head>
<body>
    <form action="" method="post">
        <div class="judul"><h1>Program Peramalan Stok</h1></div>
        <h2>Masukkan Stok Bulan Pertama</h2>
        <div class="barissatu">
            <h3>Tahun = </h3>
            <input type="number" name="tahun"><br>
            <h3>Bulan = </h3>
            <!--Menampilkan bulan dalam combo box, dan dimasukkan dalam variabel 'bulan' nantinya-->
            <?php SelectBulan("bulan")?><br>
            <h3>Nilai = </h3>
            <input type="number" name="nilaipertama">
        </div>

        <hr>
        <h2>Masukkan Stok Bulan setelahnya</h2>
        <div class="barisdua">
            <h3>Nilai = </h3>
            <input type="number" name="nilaikedua">
        </div>

        <hr>
        <h2>Prediksi Stok pada Bulan : </h2>
        <div class="baristiga">
            <h3>Tahun = </h3>
            <input type="number" name="tahunprediksi"><br>
            <h3>Bulan = </h3>
            <!--Menampilkan bulan dalam combo box, dan dimasukkan dalam variabel 'bulanprediksi' nantinya-->
            <?php SelectBulan("bulanprediksi");?><br>
        </div>
        <hr>
        <div class="tombol"><input type="submit" value="SUBMIT" name="submit"></div>

        <?php
            //merekam data yang telah dimasukkan
            error_reporting(0);
            //simpan data tahun awal, bulan awal, nilai pertama
            $tahun = $_POST["tahun"];
            $bulan = $_POST["bulan"];
            $nilaipertama = $_POST["nilaipertama"];

            //simpan data nilai pada bulan berikutnya
            $nilaikedua = $_POST["nilaikedua"];

            //simpan data tahun prediksi, dan bulan prediksi
            $tahunprediksi = $_POST["tahunprediksi"];
            $bulanprediksi = $_POST["bulanprediksi"];

            //Kondisi jika bulan awal adalah bulan Desember : 
            //bulan berikutnya menjadi Januari, tahun awal tambah 1
            $bulankedua = $bulan+1;
            $tahunkedua = $tahun;
            if($bulankedua>12){
                $tahunkedua++;
                $bulankedua = $bulankedua - 12;
            }

            //Cari Nilai b (Selisih)
            $b = $nilaikedua - $nilaipertama;

            //Cari Nilai n : pertama cari selisih tahun dan selisih bulan
            $tahunb = $tahunprediksi - $tahun;
            $bulanb = $bulanprediksi - $bulan + 1;
            //Cari nilai n : jika selisih tahun = 0 dan selisih bulan > 0
            if($tahunb==0 && $bulanb>2){
                $n = $bulanb;
            }
            //Cari nilai n : jika selisih tahun > 0
            else if($tahunb>0){
                $n = $tahunb*12 + $bulanb;
            }
            //Pencarian nilai n jika data yang dimasukkan tidak memenuhi syarat.
            else if(($tahunb<0) || ($bulanb<=2 && $tahunb<=0)){
                echo '<h2 style="color: red"> Waktu dalam kolom Prediksi haruslah waktu pada masa depan </h2>';
            }

            //Cari Nilai Un (Prediksi)
            if($n == 1){
                $Un = $nilaipertama + $b;
            } else if ($n>1){
            $Un = $nilaipertama + (($n-1) * $b);
            }
        ?>
    </form>
    
    <div class="hasil">
    <!--Menampilkan hasil presiksi sesuai kondisi yang dimasukkan-->
    <div class="barisempat">
        <h2>Hasil Prediksi : </h2>
        <h6><?php echo "1. Data pada Bulan " , BulanSwitch($bulan), " Tahun $tahun adalah $nilaipertama";?></h6>
        <h6><?php echo "2. Data pada Bulan " , BulanSwitch($bulankedua), " Tahun $tahunkedua adalah $nilaikedua";?></h6>
        <h6><?php echo "3. Prediksi Nilai pada Bulan " , BulanSwitch($bulanprediksi), " Tahun $tahunprediksi adalah $Un";?></h6>
        <h6><?php echo "Nilai b = $b, Nilai n = $n";?></h6>
    </div>
    
    <!--Menampilkan seluruh data dari nilai awal hingga data prediksi yang ditentukan-->
    <div class="barislima">
        <h2>Data Stok Keseluruhan :</h2>
        <?php
            for($i=0; $i<$n; $i++){
                if($n == 1){
                    $Un = $nilaipertama + $b;
                    echo "<h6> 1. Prediksi Nilai pada Bulan " , BulanSwitch($bulanprediksi), " Tahun $tahunprediksi adalah $Un </h6>";
                } else if ($n>1){
                    $Un = $nilaipertama + (($i) * $b);
                    if($bulan > 12){
                        $bulan = 1;
                        $tahun = $tahun + 1;
                    }
                    if($i<2){echo "<h6> ", ($i+1), ". Data Nilai pada Bulan " , BulanSwitch($bulan), " Tahun $tahun adalah $Un </h6>";}
                    else{echo "<h6> ", ($i+1), ". Prediksi Nilai pada Bulan " , BulanSwitch($bulan), " Tahun $tahun adalah $Un </h6>";}
                    $bulan = $bulan + 1;
                }
            }
        ?>
    </div>
    </div>
</body>
</html>


<?php
    //Fungsi untuk menampilkan bulan yang berupa angka ke String (Kalimat)
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
            echo "Mei";
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

<?php 
    //Fungsi untuk menampilkan Bulan dalam combo box
    function SelectBulan($pilihbulan){
    echo "<select name=", $pilihbulan, ">";  
    echo '<option value="">Pilih Bulan</option>  
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
    </select>' ;
    }
?>