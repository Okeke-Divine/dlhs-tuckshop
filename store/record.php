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
	<title><?php echo $ses_uname; ?> | My Record | DLHS (<?php echo $campus_name.") - tuckshop"; ?></title>
</head>
<body style="background: #f5f5f5;">
	
	<?php include("header.php"); ?>


	<main class="container" role="main">
		<?php

		$get_my_record = mysqli_query($conn,"SELECT * FROM $records WHERE user_id = '$ses_id' ORDER BY record_id DESC");
		$no_of_records = mysqli_num_rows($get_my_record);
		if(mysqli_num_rows($get_my_record) > 0){
	

			echo '<br>
							<table class="wd100 br-5" style="border:1px solid black;">
								<tr class="white" style="border-bottom:1px solid black;">
									<th>Item ('.$no_of_records.')</th>
									<th>Quantity</th>
									<th>Unit Price</th>
									<th>Sub Total</th>
									<th>Status</th>
								</tr>';
			while($row = mysqli_fetch_array($get_my_record)){
				$item_id = $row['item_id'];
				$price = $row['price'];
				$recieved = $row['recieved'];
				$quantity = $row['quantity'];
				$get_item = mysqli_query($conn,"SELECT * FROM $items WHERE item_id = '$item_id'");
				while($row1 = mysqli_fetch_array($get_item)){
					$item_name = $row1['name'];
					$item_picture = $row1['picture'];
					$loss = rand(1,20);
					$inflate_price = $price*$loss;
					$inflate_price = $inflate_price/100;
					$inflate_price = $inflate_price+$price;
					$item_sub_total = $price*$quantity;
					?>


					<tr class="white kosdofds" style="border-bottom:1px dotted black;">
									<td><img src="../item_images/<?php echo $item_picture; ?>" class="dlkasdo"><?php echo $item_name; ?></td>
									<td><?php echo $quantity; ?></td>
									<td>
										&#8358;<?php echo $price; ?>
										<br>
										<del class="text-gray">&#8358;<?php echo $inflate_price; ?></del><br>
										<span class="text-success">Savings: &#8358;<?php echo $inflate_price-$price; ?></span><br><br>
									</td>
									<td>&#8358;<?php echo $item_sub_total; ?></td>
									<td>
										<?php

										if($recieved == 1){
											echo '<button class="p-2 btn btn-success">Recieved</button>';
										}else{
											echo '<button class="p-2 btn btn-danger">Pending</button>';
										}

										?>
									</td>
								</tr>


					<?php
				}
			}
			echo '</table>';

		}else{
			?>


			<center>
					<span>
						<img src="../logo/cart.png" alt="cart">
					</span>
			</center>

			<?php
		}

		?>
	</main>


	<?php include("footer.php"); ?>



</body>
</html>