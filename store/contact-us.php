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
	<title><?php echo $ses_uname; ?> | Contact Us | DLHS (<?php echo $campus_name.") - tuckshop"; ?></title>
</head>
<body style="background: #f5f5f5;">
	
	<?php include("header.php"); ?>

	<main class="container" role="main">
		
		<div class="white br-5 p-2 wd1000">
			<h3>Contact Us</h3>
			

			<?php

			if(isset($_POST['msg'])){
				$msg = $_POST['msg'];
				$insert_contact_us = mysqli_query($conn,"INSERT INTO $contact_us VALUES('','$ses_id','$msg',UNIX_TIMESTAMP(),'0')");
				if($insert_contact_us){
					?>
					<div class="text-success">
						Your message has been recieved we will attend to that soon
					</div>
					<?php
				}
			}else{
				?>
			<form action="" method="POST">
				<textarea name="msg" placeholder="Type..." class="fd form-control" required=""></textarea>
				<button class="btn btn-primary mt-2">Submit</button>
			</form>
				<?php
			}

			?>
			



		</div>

	</main>

	<?php include("footer.php"); ?>



</body>
</html>