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
	<title><?php echo $ses_uname; ?> | Change Password | DLHS (<?php echo $campus_name.") - tuckshop"; ?></title>
</head>
<body style="background: #f5f5f5;">
	
	<?php include("header.php"); ?>

	<main class="container" role="main">
		
		<div class="white br-5 p-2 wd1000">
			<h3>Change Password</h3>
			

			<?php


			function show_form(){
				?>
			<form action="" method="POST">

				<label for="opsw">Old Password</label>
				<input type="password" placeholder="Old Password"  id="opsw" class="form-control" name="opsw" required="">

				<label for="newpsw">New Password</label>
				<input type="password" placeholder="New Password"  id="newpsw" class="form-control" name="newpsw" required="">

				<label for="cnewpsw">Confirm New Password</label>
				<input type="password" placeholder="Confirm New Password" name="cnewpsw" id="cnewpsw" class="form-control" required="">

				<button class="btn btn-primary mt-2">Submit</button>
			</form>
				<?php
			}

			if(isset($_POST['opsw'],$_POST['newpsw'],$_POST['cnewpsw'])){

				$opsw = $_POST['opsw'];
				$newpsw = $_POST['newpsw'];
				$cnewpsw = $_POST['cnewpsw'];

				if($opsw == $ses_psw){

					if($newpsw == $cnewpsw){

						$update_password = mysqli_query($conn,"UPDATE $student SET password = '$newpsw' WHERE id = '$ses_id'");

						if($update_password){
							?>
							<div class="text-success">
								Your password has been successfully changed.
							</div>
							<?php
						}

					}else{
						?>
						<div class="text-danger">
							Your new password and confirm password does not match.
						</div>
						<?php
						show_form();
					}

					

				}else{
					?>
					<div class="text-danger">
						Your old password is wrong.
					</div>
					<?php
					show_form();
				}

				
			}else{
				show_form();
			}

			?>
			



		</div>

	</main>

	<?php include("footer.php"); ?>



</body>
</html>