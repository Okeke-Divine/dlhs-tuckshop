<?php
include("auth.php")
?>
<div class="wd100 ofdjfsd p-2 text-light">
	<i class="fa fa-shopping-cart"></i>
	View Items
</div>
<hr>
<div class="wd100 p-2">
	
	<?php
			$result = 0;

				$items = mysqli_query($conn,"SELECT * FROM $items ORDER BY name ASC");
				$result = 0;
			?>

			<!-- open divs -->
			<?php 
			if(mysqli_num_rows($items) > 0){
			 $result = 1; 
			} 
			?>
			<div class="row container">

			<?php
			$total = 0;
			while($row = mysqli_fetch_array($items)){
				$total = $total+1;
				$item_id = $row['item_id'];
				$item_name = $row['name'];
				$item_price = $row['price'];
				$item_picture = $row['picture'];
				$loss = rand(1,20);
				$available = $row['available'];
				$inflate_price = $item_price*$loss;
				$inflate_price = $inflate_price/100;
				$inflate_price = $inflate_price+$item_price;
				?>
			<div class="border m-1 p-2 wd100">
				<table class="wd100">
					<tr class="wd100">
						<td><img src="../item_images/<?php echo $item_picture; ?>" class="dkodkfods"></td>
						<td>
							<span class="text-dark">
							<?php echo $item_name; ?> &#8358;<?php echo $item_price; ?>
						</span>	
						</td>
						<td>
							<span class="right" id="<?php echo $item_id; ?>available_span">
								<?php

								if($available == 1){
									echo '<i class="fa fa-circle q2w3 text-success" onclick="item_not_avail('.$item_id.');" title="Available"></i>';
								}else{
									echo '<i class="fa fa-circle q2w3 text-danger" onclick="item_avail('.$item_id.');" title="Not Available"></i>';
								}

								?>
							</span>
						</td>
					</tr>
				</table>
				

			</div>
				<?php
			}
			?>

			<!-- close div -->
			<?php if($result == 1){ ?></div><?php } ?>

			<!-- not found -->
			<?php
			if($total == 0){
				?>
				<div class="wd100 alert alert-danger">
					No item(s).
				</b>
				</div>
				<?php
			}
		?>

</div>