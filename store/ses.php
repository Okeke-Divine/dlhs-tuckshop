<?php

	session_start();
	$ses_id = $_SESSION['dlhsuser_id'];
	$ses_uname = $_SESSION['dlhsuser_name'];
	$ses_an = $_SESSION['dlhsuser_an'];

	$verify_amount = mysqli_query($conn,"SELECT * FROM account_storage WHERE admission_number = '$ses_an'");
	if(mysqli_num_rows($verify_amount) > 0){}else{
		$insert_amount = mysqli_query($conn,"INSERT INTO $account_storage (`admission_number`,`amount_query`) VALUES ('$ses_an','0')");
		?><meta http-equiv="refresh" content="0"><?php
	}

	if(empty($ses_id) || empty($ses_uname) || empty($ses_an)){
		echo"
		<script>window.location = '../login?login=false&&back_to='+window.location.href;</script>
	";
	}else{
		$check_user = mysqli_query($conn,"SELECT * FROM $student INNER JOIN $account_storage ON $student.admission_number = $account_storage.admission_number WHERE id = '$ses_id'");

		while($row = mysqli_fetch_assoc($check_user)){
			$amount_query = $row['amount_query'];
			$class = $row['class'];
			$ses_psw = $row['password'];
			$class_arm = $row['class_arm'];
		}

	}

	if(isset($_GET['search'])){
		$search = $_GET['search'];
	}else{
		$search = "";
	}
?>