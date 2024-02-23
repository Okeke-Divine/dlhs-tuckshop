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
	
	if(isset($_GET['id'])){

	}else{
		echo '<script>goto("home");</script>';
	}

	?>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../font/css/all.css">
	<title><?php echo $ses_uname; ?> | Preview | DLHS (<?php echo $campus_name.") - tuckshop"; ?></title>
</head>
<body style="background: #f5f5f5;">
	
	<?php include("header.php"); ?>

<main class="container" role="main">


		<?php
			@$id = $_GET['id'];
			$item = mysqli_query($conn,"SELECT * FROM $items WHERE item_id = '$id' LIMIT 0,1");
			if(mysqli_num_rows($item) > 0){
				while($row = mysqli_fetch_array($item)){
					$item_id = $row['item_id'];
					$item_name = $row['name'];
					$available = $row['available'];
					$item_price = $row['price'];
					$item_picture = $row['picture'];
					$loss = rand(1,20);
					$inflate_price = $item_price*$loss;
					$inflate_price = $inflate_price/100;
					$inflate_price = $inflate_price+$item_price;
					?>

					<div class="item-prev">
						<!-- first box -->
						<div class="one m-1 white br-5 p-2">
							

							<div class="img_cont mb-1 br-5">
							</div>
							<center><img src="../item_images/<?php echo $item_picture; ?>" class="imfidsf"></center>

						<div class="fdsfs">
							<div class="border-bottom mb-2 pb-1 dkj"><?php echo $item_name; ?> <span class="right"><!-- <i class="fa fa-heart pointer"></i> --></span></div>

							<div>
								<span class="text-dark"><?php echo $item_name; ?>
								&#8358;<?php echo $item_price; ?> | <del>&#8358;<?php echo $inflate_price; ?></del></span>

								<span class="discount1 right">-<?php echo $loss;?>%</span>
							</div>

							<br>


							<div class="cart_details">
								<div class="row">
									<div class="col-md-3">
										<input type="number" class="form-control" name="quantity" placeholder="Quantity" value="1" id="quantity">
									</div>
									<div class="col-md-3">
									<?php
									if($available == 1){
									?>
										<button class="mb-2 add_to_cart text-light def_col" id="add_to_cart" onclick="add_to_cart('<?php echo $item_name; ?>','<?php echo $item_id; ?>')"><i class="fa fa-shopping-cart"></i> Add to cart</button>
									<?php
									}else{
										echo '<button class="btn btn-danger p-2" disabled>Not Available</button>';
									}	
									?>									
										
									</div>
								</div>
							</div>

							<hr />

							<br>

					<center>
						<button class="mb-2 add_to_cart text- def_col_text trans_bg" onclick="goto('store')"><i class="fa fa-angle-double-left"></i> Back to store</button>

						<button class="mb-2 add_to_cart text- def_col_text1 trans_bg" onclick="goto('cart')"><i class="fa fa-shopping-cart"></i> Goto Cart</button>
					</center>

						</div>
					</div>

						<!-- second box -->
						<div class="two m-1 white br-5">
							<div class="border-bottom p-2"> <b>Delivery</b></div>
							<div class="p-2">
								Location:
								<select class="custom-select mt-1">
									<option><?php echo $class.$class_arm ?></option>
								</select>
							</div>
							<hr />
						</div>
					</div>


					<?php
				}	
			}else{
				?>
				<div class="alert alert-danger">Item not found.</div>
				<?php
			}			

		?>
			
</main>

	<?php include("footer.php"); ?>



</body>
</html>