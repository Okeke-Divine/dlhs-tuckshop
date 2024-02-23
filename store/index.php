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
	<title><?php echo $ses_uname; ?> | Home | DLHS (<?php echo $campus_name.") - tuckshop"; ?></title>
</head>
<body style="background: #f5f5f5;">
	
	<?php include("header.php"); ?>

	<main class="container" role="main">
		
		<div class="white p-3 alert_box wd100">
			<div class="flexex">
				<i class="fa fa-user-circle fa-5x m-1"></i>
				
				<div class="dsd">
					<?php echo $ses_uname; ?><br>
					&#8358;<span id="amount"><?php echo $amount_query; ?></span> - remaining<br>
					<?php echo date("h:ia"); ?>
				</div>

			</div>

				<span class="jois right"><button onclick="goto('record');" class="btn def_col text-light"><i class="fa fa-newspaper"></i> <span class="nss">View Record</span></button></span>

		</div>


		<div class="navbar">
			<center>
				<button onclick="goto('store');" class="btn def_col1 text-light">
					 <span class="yss"><i class="fa fa-shopping-basket"></i></span>
					 <span class="nss">Shop Now 
					 <i class="fa fa-angle-double-right"></i></span>
				</button>

				<button onclick="goto('cart');" class="btn def_col text-light">
					 <span class="yss"><i class="fa fa-shopping-cart"></i> </span>
					 <span class="nss">View Cart 
					 <i class="fa fa-angle-double-right"></i></span>
				</button>



			</center>
		</div>

		<br>

		<div class="white p-3 alert_box">

		<div class="row">
			<?php

			$items = mysqli_query($conn,"SELECT * FROM $items ORDER BY RAND() LIMIT 0,4");
			while($row = mysqli_fetch_array($items)){
				$item_id = $row['item_id'];
				$item_name = $row['name'];
				$item_price = $row['price'];
				$item_picture = $row['picture'];
				$loss = rand(1,20);
				$inflate_price = $item_price*$loss;
				$inflate_price = $inflate_price/100;
				$inflate_price = $inflate_price+$item_price;
				?>
			<div class="col-md-3">
				<span class="discount right">-<?php echo $loss;?>%</span>
				<img src="../item_images/<?php echo $item_picture; ?>" class="item_img pointer" onclick="goto('item-preview?id=<?php echo $item_id; ?>');"><Br>

				<span class="text-dark"><?php echo $item_name; ?>
				&#8358;<?php echo $item_price; ?> | <del>&#8358;<?php echo $inflate_price; ?></del></span>	


			</div>
				<?php
			}

			?>
			
		</div>

		</div>
	
		<br>
	
		<div class="row">
			<div class="col-md-3 br-5 m-1 pad0">
				<div class="defok text-light p-2 bg-dark">Mission Statement</div>
				<div class="white p-2">
					To transform our nation, by producing upright leaders of the future, through sound quality and sound education.
				</div>
			</div>

			<div class="col-md-3 br-5 m-1 pad0">
				<div class="defok text-light p-2 bg-dark">Vission Statement</div>
				<div class="white p-2">
					To produce students who are academically well grounded, morally upright and adeqately equipped as future leaders.
				</div>
			</div>

			<div class="col-md-3 br-5 m-1 pad0">
				<div class="defok text-light p-2 bg-dark">Pledge</div>
				<div class="white p-2">
					To Deeper Life High School I pledge, to be a worthy ambassador, and with all my might and knowledge, uphold its ideals in indoor and outdoor and by the grace of God to fight for the right will working for a future bright.
				</div>
			</div>
			
		</div>
	</main>



	<?php include("footer.php"); ?>



</body>
</html>