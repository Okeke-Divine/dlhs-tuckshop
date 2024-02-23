<?php

	include("../config.php");
	include("../conn.php");
	include("ses.php");


	$get_cart = mysqli_query($conn,"SELECT * FROM $cart INNER JOIN $items ON $cart.item_id=$items.item_id WHERE user_id = '$ses_id'");

		if(mysqli_num_rows($get_cart) > 0){

			$stotal = 0;
			$squantiy = 0;
			$paid = 1;
			while($row = mysqli_fetch_array($get_cart)){
					$quantity = $row['quantity'];
					$cart_id = $row['cart_id'];
					$item_price = $row['price'];
					$item_id = $row['item_id'];
					$item_sub_total = $item_price*$quantity;
					$stotal = $stotal+$item_sub_total;
					$squantiy = $squantiy+$quantity;

				if($stotal>$amount_query){$paid=0;}else{
					$remove_from_cart = mysqli_query($conn,"DELETE FROM $cart WHERE cart_id = '$cart_id'");

					$insert_into_records = mysqli_query($conn,"INSERT INTO $records VALUES ('','$item_id','$ses_id','$item_price','$quantity','0',UNIX_TIMESTAMP())");

				}
			}

			$new_amount_query = $amount_query-$stotal;

		if($stotal>$amount_query){$paid=0;}else{
			$deduct_amount_from_account = mysqli_query($conn,"UPDATE $account_storage SET amount_query = '$new_amount_query' WHERE admission_number = '$ses_an'");
		}

		if($paid == 1){
			?>
				<div class="h4 text-success">
					You have successfully spent <b>&#8358;<?php echo $stotal; ?></b> to pay for <b><?php echo $squantiy; ?> items</b>.<br>
					 New balance is <b>&#8358;<?php echo $new_amount_query; ?></b>.<br>
					 <hr>
					Your items will be delivered to you soon.
				</div>
			<?php
		}else{
			?>
			<div class="h4 text-danger">You can't buy at this moment.</div>
			<?php
		}


		}else{
			?>
			<div class="white p-4 h4 wd100 br-5">
					Oops! You have no item in your cart.<br>

						<button onclick="goto('store');" class="btn def_col mt-1 text-light">
							 <span class="yss"><i class="fa fa-shopping-basket"></i></span>
							 <span class="nss">Shop Now 
							 <i class="fa fa-angle-double-right"></i></span>
						</button>


			</div>
			<?php
		}



?>