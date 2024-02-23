<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../font/css/all.css">
	<?php

	include("../config.php");
	include("../conn.php");
	include("../css.php");
	include("ses.php");
	include("../js.php");
	

	?>
	<title><?php echo $ses_uname; ?> | Store | DLHS (<?php echo $campus_name.") - tuckshop"; ?></title>
</head>
<body style="background: #f5f5f5;">
	
	<?php include("header.php"); ?>


<main class="container" role="main">


			<?php
			$result = 0;

			if(isset($_GET['search'])){
				$search = $_GET['search'];
				$items = mysqli_query($conn,"SELECT * FROM $items WHERE name like '%$search%' ORDER BY name ASC");
			}else{
				$items = mysqli_query($conn,"SELECT * FROM $items ORDER BY name ASC");
			}
			?>

			<!-- open divs -->
			<?php if(mysqli_num_rows($items) > 0){ $result = 1;?><div class="white p-3 alert_box"><div class="row">
			<?php } ?>

			<?php
			$total = 0;
			while($row = mysqli_fetch_array($items)){
				$total = $total+1;
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
				<img src="../item_images/<?php echo $item_picture; ?>" class="item_img pointer" onclick="goto('item-preview?id=<?php echo $item_id; ?>');"><br>

				<span class="text-dark"><?php echo $item_name; ?>
				&#8358;<?php echo $item_price; ?> | <del>&#8358;<?php echo $inflate_price; ?></del></span>	


			</div>
				<?php
			}
			?>

			<!-- close div -->
			<?php if($result == 1){ ?></div></div><?php } ?>

			<!-- not found -->
			<?php
			if($total == 0){
				?>
				<div class="wd100 alert alert-danger">
					No item(s) found for <b><?php echo $search; ?></b>
				</div>
				<?php
			}
			?>
			
		


</main>



	<?php include("footer.php"); ?>



</body>
</html>