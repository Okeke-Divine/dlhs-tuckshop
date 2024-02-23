<?php

	include("../config.php");
	include("../conn.php");
	include("ses.php");


	if(isset($_REQUEST['cart_id'])){
		$cart_id = $_REQUEST['cart_id'];
		$delete = mysqli_query($conn,"DELETE FROM $cart WHERE cart_id = '$cart_id' and user_id = '$ses_id'");
	}

?>