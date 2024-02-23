<?php
	include("auth.php");
	if(isset($_REQUEST['item_id'])){
		$item_id = $_REQUEST['item_id'];
		$query = mysqli_query($conn,"UPDATE $items SET available = '0' WHERE item_id = '$item_id'");
	}
?>