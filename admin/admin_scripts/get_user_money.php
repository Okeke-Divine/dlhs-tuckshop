<?php

	include("auth.php");
	if(isset($_REQUEST['an'])){
		$an = $_REQUEST['an'];
		$money = "";
		$get_money = mysqli_query($conn,"SELECT * FROM $account_storage WHERE admission_number = '$an' LIMIT 1");

		while($row = mysqli_fetch_array($get_money)){
			$money = $row['amount_query'];
		}

		if(empty($money)){
			$money = "0";
		}else{
			$money = $money;
		}

		echo '&#8358;'.$money;

	}else{
		echo "error";
	}

?>