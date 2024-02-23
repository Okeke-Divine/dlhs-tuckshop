<?php
	include("auth.php");

	if(isset($_REQUEST['record_id'])){
		$record_id = $_REQUEST['record_id'];
		$update_record = mysqli_query($conn,"UPDATE $records SET recieved = '0' WHERE record_id = '$record_id'");
		?>
		<i class="fa fa-circle text-danger" style="font-size: 10px;"></i>
		<button id="<?php echo $record_id; ?>btn" onclick="attend_to_record('<?php echo $record_id; ?>');" title='Click to attend to' class="btn btn fa fa-plus-circle"></button>
				<?php
	}

?>