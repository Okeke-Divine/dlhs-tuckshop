<?php

	include("../config.php");
	include("../conn.php");
	include("ses.php");


	if(isset($_REQUEST['item_id'],$_REQUEST['quantity'])){
		$item_id = $_REQUEST['item_id'];
		$quantity = $_REQUEST['quantity'];
		echo $item_id;
		$items = mysqli_query($conn,"SELECT * FROM $items WHERE item_id = '$item_id' LIMIT 0,1");
		while($row = mysqli_fetch_array($items)){
				$item_id = $row['item_id'];
				$item_name = $row['name'];
				$item_price = $row['price'];

				$add_to_cart = mysqli_query($conn,"INSERT INTO $cart (`item_id`,`user_id`,`quantity`,`time_in`) VALUES ('$item_id','$ses_id','$quantity',UNIX_TIMESTAMP())");
		}

	}

?>