<?php
	
	include("auth.php");
	if(isset($_REQUEST['amount'],$_REQUEST['an'],$_REQUEST['dsf9gi9dsfgu80pi08'])){
		$amount = $_REQUEST['dsf9gi9dsfgu80pi08'];
		$an = $_REQUEST['an'];
		$get_user_info = mysqli_query($conn,"SELECT * FROM $student WHERE admission_number = '$an' LIMIT 1");
		while($row = mysqli_fetch_array($get_user_info)){
			$uname = $row['username'];
		}

		$check_if_insert = mysqli_query($conn,"SELECT * FROM $account_storage WHERE admission_number = '$an' LIMIT 1");
		$success = 0;
		if(mysqli_num_rows($check_if_insert) > 0){

			$prev_amount = mysqli_query($conn,"SELECT * FROM $account_storage WHERE admission_number = '$an' LIMIT 1");
					while($row = mysqli_fetch_array($prev_amount)){
						$pamount = $row['amount_query'];
				}
				$new_amount = $pamount+$amount;
				$update_money = mysqli_query($conn,"UPDATE $account_storage SET amount_query = '$new_amount' WHERE admission_number = '$an'");
				if($update_money){

					$insert_noti = mysqli_query($conn,"INSERT INTO $notification VALUES ('','$an','The sum of {$amount} was added to this account',UNIX_TIMESTAMP(),'0')");

					$success = 1;
				}

		}else{
			$insert_money = mysqli_query($conn,"INSERT INTO $account_storage VALUES ('','$an','$amount')");
			if($insert_money){

				$insert_noti = mysqli_query($conn,"INSERT INTO $notification VALUES ('','$an','The sum of {$amount} was added to this account',UNIX_TIMESTAMP(),'0')");

				$success = 1;
			}
		}

		if($success == 1){
			?>
			<div class="alert alert-success">
				The amount of &#8358;<b><?php echo $amount; ?></b> was successfully added to <b><?php echo $uname; ?></b> account.<br>
				New amount: <b>&#8358;<?php
					$new_amount = mysqli_query($conn,"SELECT * FROM $account_storage WHERE admission_number = '$an' LIMIT 1");
					while($row = mysqli_fetch_array($new_amount)){
						echo $row['amount_query'];
					}
				?></b>
			</div>
			<?php
		}else{
			?>
			<div class="alert alert-danger">
				Undefined Error Please Try Again
			</div>
			<?php
		}

	}else{
		echo "error";
	}

?>