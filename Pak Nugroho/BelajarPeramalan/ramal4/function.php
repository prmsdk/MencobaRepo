<?php

	error_reporting(0);
	$n = $_GET["n"];
	?>

<form action="" method="post" name="ramal4">
<h3>Masukkan Angka</h3>

<?php for($x=0; $x<$n; $x++){ ?>
					
		<input type="number" name="<?php echo "angka$x" ?>" style="width:70px">
		<span> </span>
		
		<?php

		$Jx+= $x;
	}
	?>

	<button type="submit" name="hitung">hitung</button>
	</form>

	<?php
	
	//$unsorted_numbers = array(9, 87, 5, 63, 100, 12, 17, 86, 12,6,21,23,73);
	echo "Angka yang belum diurutkan = ";
	if(isset($_POST["hitung"])){
	$dicari = $_POST["dicari"];
	for($x=0; $x<$n; $x++){
			
			$hitung = $_POST["angka$x"];

			$unsorted_numbers[$x] = $hitung;
			if (($n-1)==$x) {
				echo $unsorted_numbers[$x] . " ";
			}else{
				echo $unsorted_numbers[$x] . ", ";
			}
	}
	
  function merge_arrays($left_arr, $right_arr){
	$res = array();
	while (count($left_arr) > 0 && count($right_arr) > 0){
		if($left_arr[0] > $right_arr[0]){
			$res[] = $right_arr[0];
			$right_arr = array_slice($right_arr , 1);
		}else{
			$res[] = $left_arr[0];
			$left_arr = array_slice($left_arr, 1);
		}
	}
	while (count($left_arr) > 0){
		$res[] = $left_arr[0];
		$left_arr = array_slice($left_arr, 1);
	}
	while (count($right_arr) > 0){
		$res[] = $right_arr[0];
		$right_arr = array_slice($right_arr, 1);
	}
	return $res;
}


        function mergesort($array)
    {
    if(count($array) == 1 ) return $array;
	$mid = count($array) / 2;
    $left_arr = array_slice($array, 0, $mid);
    $right_arr = array_slice($array, $mid);
    $left_arr = mergesort($left_arr);
	$right_arr = mergesort($right_arr);
	return merge_arrays($left_arr, $right_arr);
    }
    
    $sorted_numbers = mergesort($unsorted_numbers);
		// print_r($sorted_numbers);

		
	echo "<br><br> Angka yang telah diurutkan = ";
		for($x=0; $x<$n; $x++){
			if (($n-1)==$x) {
				echo $sorted_numbers[$x] . " ";
			}else{
				echo $sorted_numbers[$x] . ", ";
			}
	}
	}