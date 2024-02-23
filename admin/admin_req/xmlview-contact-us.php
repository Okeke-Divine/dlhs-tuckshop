<?php
include("auth.php")
?>
<div class="wd100 ofdjfsd p-2 text-light">
	<i class="fa fa-phone-alt"></i>
	Contact Us Messages	
</div>
<hr>
<div class="wd100 p-2">
	<?php


	$get_contact_us = mysqli_query($conn,"SELECT * FROM $contact_us INNER JOIN $student ON $contact_us.user_id = $student.id ORDER BY viewed");

		if(mysqli_num_rows($get_contact_us) > 0){
			while($row = mysqli_fetch_array($get_contact_us)){
				$contact_id = $row['contact_id'];
				$content = $row['content'];
				$viewed = $row['viewed'];
				$an_no = $row['admission_number'];
				$uname = $row['username'];
				?>

				<div class="wd100 p-2 br-5 doskdofdsokfs">
					<?php echo $content; ?>
				</div>
				<div class="mb-3 wd100 text-right">
					<?php echo $uname; ?>
					<?php
					if($viewed == 1){
						echo '<i class="fa fa-eye"></i>';
					}
					?>
				</div>

				<?php
			}
		}else{
			?>
			<div class="alert alert-danger">No Message Found.</div>
			<?php
		}

	?>
</div>