<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<?php
	session_start();
	include("config.php");
	include("conn.php");
	include("css.php");
	include("js.php");
	if(empty($campus_name) || empty($email) || empty($admin_password))
	{
		header("location:install.php");
	}

	?>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="font/css/all.css">
	<title>DLHS (<?php echo $campus_name.") - tuckshop"; ?></title>
</head>
<body style="background: #f5f5f5;">

		<nav class="white wd100 my_navbar p-3">
			<span class="logo">DLHS <?php echo $campus_name; ?></span>
			<span class="right logo">
				<button class="btn btn def_col text-light" onclick="goto('admin/login');"><i class="fa fa-user"></i> Admin</button>
			</span>
		</nav>
		<br><br><br><br>
		<main class="container" role="main">
			<?php
			if(isset($_GET['install'])){
				if($_GET['install'] == "success"){
					?>
					
					<div class="white p-3 alert_box">
						<span class="text-success">Alert! Your app has been successfully installed.</span>
						<span class="right pointer" onclick="goto('index.php');">&times;</span><br>
						<b>Campus:</b> <?php echo $campus_name; ?>
					</div><Br>
					<?php
				}
			}
			?>
			
			<div class="white p-3 alert_box">
				<span class="incr">Top selling items.</span>
				<marquee>
					<img src="images/cheeseballs.jpg" class="advert_items_i">
					<img src="images/custard_cream.jpg" class="advert_items_i">
					<img src="images/fanta.jpg" class="advert_items_i">
					<img src="images/gala.png" class="advert_items_i">
					<img src="images/mathset.jpg" class="advert_items_i">
					<img src="images/milo.jpg" class="advert_items_i">
					<img src="images/mirinda_orange.jpg" class="advert_items_i">
					<img src="images/purebliss_wafers.jpg" class="advert_items_i">
					<img src="images/oat and milk.jpg" class="advert_items_i">
					<img src="images/peak_milk.jpg" class="advert_items_i">
					<img src="images/munchit.jpg" class="advert_items_i">
				</marquee>
			</div><Br>

			<div class="white p-3 alert_box">
				<span class="incr">Login</span><br>
				<form method="POST">
					<?php

					if(isset($_POST['an'],$_POST['psw'])){
						$an = $_POST['an'];
						$psw = $_POST['psw'];
						$check_user = mysqli_query($conn,"SELECT * FROM $student WHERE admission_number = '$an' and password = '$psw' LIMIT 0,1");
						if(mysqli_num_rows($check_user) > 0){
							while($row = mysqli_fetch_assoc($check_user)){
								$id = $row['id'];
								$student_name = $row['username'];
								$student_password = $row['password'];
								$admission_number = $row['admission_number'];

								$_SESSION['dlhsuser_id'] = $id;
								$_SESSION['dlhsuser_name'] = $student_name;
								$_SESSION['dlhsuser_an'] = $admission_number;
								$_SESSION['dlhsuser_psw'] = $student_password;

								echo $_SESSION['dlhsuser_an'];

								echo "<script>window.location = 'store/';</script>";
							}
						}else{
							?>
								<div class="alert mt-2 alert-danger">Invalid login.</div>
							<?php
						}
					}else{
						$an = "";
						$psw = "";
					}

					?>
					<label for="an">Admission number</label>
					<input type="text" name="an" id="an" class="form-control" required="" value="<?php echo $an; ?>" placeholder="Admission Number">
					<label for="psw">Password</label>
					<input type="password" name="psw" id="psw" class="form-control" required="" placeholder="Password">
					<button class="mt-2 btn btn-primary">Login</button>
				</form>
			</div>

		</main>


</body>
</html>