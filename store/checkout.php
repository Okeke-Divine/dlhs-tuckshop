<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<?php

	include("../config.php");
	include("../conn.php");
	include("../css.php");
	include("ses.php");
	include("../js.php");
	

	?>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../font/css/all.css">
	<title><?php echo $ses_uname; ?> | Check Out | DLHS (<?php echo $campus_name.") - tuckshop"; ?></title>
</head>
<body style="background: #f5f5f5;">
	
	<?php include("header.php"); ?>


	<main class="container" role="main">
		

		<?php

		$get_cart = mysqli_query($conn,"SELECT * FROM $cart INNER JOIN $items ON $cart.item_id=$items.item_id WHERE user_id = '$ses_id'");

		if(mysqli_num_rows($get_cart) > 0){

			$stotal = 0;
			$squantiy = 0;
			while($row = mysqli_fetch_array($get_cart)){
					$quantity = $row['quantity'];
					$item_price = $row['price'];
					$item_sub_total = $item_price*$quantity;
					$stotal = $stotal+$item_sub_total;
					$squantiy = $squantiy+$quantity;
			}
			?>

			<div class="wd100 br-5 white">
				<div class="h3 border-bottom p-2">
					<i class="fa fa-money-check"></i> Checkout
				</div>
				<div class="p-2 pb-3 border-bottom">
					<span class="h5">
						<span class="def_col_text">My Account</span>:
						&#8358;<?php echo $amount_query; ?><br>
					</span>
					<span class="h5">
						<span class="def_col_text">Total</span>:
						&#8358;<?php echo $stotal; ?> for <?php echo $squantiy; ?> items.<br>
					</span>
				</div>
				<div class="p-2">
					<button class="def_col_text sada white pointer" onclick="goto('cart');"><i class="fa fa-shopping-cart"></i> Back to cart</button>


					<?php

					if($stotal>$amount_query){

						?>
						<button class="btn-danger sada text-light" id="pay_btn" disabled="disabled"><i class="fa fa-money-check"></i> Pay</button> You can't buy.
						<?php

					}else{
						?>
						<button class="def_col sada text-light pointer" id="pay_btn" onclick="pay_for_goods();"><i class="fa fa-money-check"></i> Pay</button>
						<?php
					}

					?>

				</div>
			</div>

			<?php
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


	</main>


	<?php include("footer.php"); ?>



</body>
</html>