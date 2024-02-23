<?php
include("auth.php")
?>
<div class="wd100 ofdjfsd p-2 text-light">
	<i class="fa fa-newspaper"></i>
	View Requests	
</div>
<hr>
<div class="wd100 p-2">
	
	<?php

	$get_request = mysqli_query($conn,"SELECT * FROM $records INNER JOIN $student ON $records.user_id = $student.id LEFT JOIN $items ON $records.item_id = $items.item_id ORDER BY recieved");

	if(mysqli_num_rows($get_request) > 0 ){

		echo '<table class="wd100 br-5">';
		echo '
			<tr>
				<th>Username</th>
				<th>Info</th>
				<th>Details</th>
			</tr>
		';
		while($row = mysqli_fetch_array($get_request)){
			$uname = $row['username'];
			$record_id = $row['record_id'];
			$user_id = $row['user_id'];
			$user_class = $row['class']." ".$row['class_arm'];
			$item_id = $row['item_id'];
			$item_name = $row['name'];
			$price = $row['price'];
			$quantity = $row['quantity'];
			$recieved = $row['recieved'];
			?>
			<tr id="<?php echo $record_id; ?>table">
				<td class="pointer" onclick="get_infot('<?php echo $uname; ?>','<?php echo $user_class; ?>');"><?php echo $uname; ?></td>
				<td>
					<?php echo $quantity; ?> <?php echo $item_name; ?>
				</td>
				<td id="<?php echo $record_id; ?>details">
					<?php

					if($recieved == 0){
						?>
						<i class="fa fa-circle text-danger" style="font-size: 10px;"></i>
						<button id="<?php echo $record_id; ?>btn" onclick="attend_to_record('<?php echo $record_id; ?>');" title='Click to attend to' class="btn btn fa fa-plus-circle"></button>

						<?php
					}else{
						?>
						<i class="fa fa-circle text-success" style="font-size: 10px;"></i>
						<button id="<?php echo $record_id; ?>btn" onclick="unattend_to_record('<?php echo $record_id; ?>');" title='Click to attend to' class="btn btn fa fa-plus-circle"></button>
						<?php
					}

					?>
				</td>
			</tr>
			<?php
		}
		echo '</table>';

	}else{
		echo "<div class='alert alert-danger'>No request found.</div>";
	}


	?>

</div>