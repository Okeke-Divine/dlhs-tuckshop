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
	<title><?php echo $ses_uname; ?> | Cart | DLHS (<?php echo $campus_name.") - tuckshop"; ?></title>
</head>
<body style="background: #f5f5f5;">
	
	<?php include("header.php"); ?>


	<main class="container" role="main">
		
		<?php

			$get_cart = mysqli_query($conn,"SELECT * FROM $cart INNER JOIN $items ON $cart.item_id=$items.item_id WHERE user_id = '$ses_id'");
			$no_of_items = mysqli_num_rows($get_cart);
			echo "<h3> Cart (".$no_of_items." items)</h3>";

			if(mysqli_num_rows($get_cart) > 0){
				echo '<br>
							<table class="wd100 br-5">
								<tr>
									<th>Item</th>
									<th>Quantity</th>
									<th>Unit Price</th>
									<th>Sub Total</th>
									<th>Actions</th>
								</tr>
					  ';
					  $stotal = 0;
				while($row = mysqli_fetch_array($get_cart)){
					$cart_id = $row['cart_id'];
					$item_id = $row['item_id'];
					$quantity = $row['quantity'];
					$item_name = $row['name'];
					$item_price = $row['price'];
					$item_picture = $row['picture'];
					$loss = rand(1,20);
					$inflate_price = $item_price*$loss;
					$inflate_price = $inflate_price/100;
					$inflate_price = $inflate_price+$item_price;
					$item_sub_total = $item_price*$quantity;
					 $stotal = $stotal+$item_sub_total;
					?>
								<tr id="<?php echo $cart_id; ?>div" class="white kosdofds">
									<td><img src="../item_images/<?php echo $item_picture; ?>" class="dlkasdo"><?php echo $item_name; ?></td>
									<td><?php echo $quantity; ?></td>
									<td>
										&#8358;<?php echo $item_price; ?>
										<br>
										<del class="text-gray">&#8358;<?php echo $inflate_price; ?></del><br>
										<span class="text-success">Savings: &#8358;<?php echo $inflate_price-$item_price; ?></span><br><br>
									</td>
									<td>&#8358;<?php echo $item_sub_total; ?></td>
									<td>
										<button id="<?php echo $item_id; ?>btn" onclick="remove_from_cart('<?php echo $item_id; ?>','<?php echo $item_name; ?>','<?php echo $item_sub_total; ?>','<?php echo $cart_id; ?>')" class="btn btn"><i class="fa fa-trash"></i></button>
									</td>
								</tr>
					<?php
				}

				echo "</table><b>";
				?>

				<br>
				<span class="right odkf">
					<span class="def_col_text">Total:</span> &#8358;<span id="cart_total"><?php echo $stotal; ?></span>

				</span>


				
					<button class="def_col_text sada white pointer" onclick="goto('store');"><i class="fa fa-shopping-cart"></i> Continue shopping</button>
					<button class="def_col sada text-light pointer" onclick="goto('checkout');"><i class="fa fa-money-check"></i> Procedd to checkout</button>


				<?php

			}else{
				?>

				<center>
					<span>
						<img src="../logo/cart.png" alt="cart">
					</span>
				</center>


				<br>

			<div class="white br-5 p-2 wd100">
				<button onclick="goto('store');" class="btn def_col text-light">
					 <span class="yss"><i class="fa fa-shopping-basket"></i></span>
					 <span class="nss">Start Shopping Now
					 <i class="fa fa-angle-double-right"></i></span>
				</button>
			</div>

				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>

				<?php
			}

		?>

	</main>

	<?php include("footer.php"); ?>



</body>
</html>