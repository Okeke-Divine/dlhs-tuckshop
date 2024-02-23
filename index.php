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
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/style.css?r=<?php echo rand(); ?>">
	<link rel="stylesheet" type="text/css" href="font/css/all.css">
	<title>DLHS <?php echo $campus_name; ?> Tuckshop</title>
</head>
<body>

	<div class="container">

		<nav>
			<div class="nav-logo">
				<img src="logo/logo.png">
			</div>
			<div class="nav-links">
				<a href="index.php">Home</a>
				<div>
					<span class="sojdofsdf">|</span> <a href="login?ref=student">Student</a>
					<span class="sojdofsdf">|</span> <a href="login?ref=admin" class="btn">Admin</a>
				</div>
			</div>
		</nav>

		<div class="content">
			<h1>DLHS <?php echo $campus_name."<br /> Tuckshop Service"; ?></h1>
				<form class="search-box" action="store/item-preview">
					<input type="text" name="item" placeholder="Search Any Item">
					<button type="submit"><i class="fa fa-search"></i></button>
				</form>
			<p>Hundreds of items sold</p>
		</div>

		<!-- <div class="arrow">
			<img src="logo/previous.png">
			<img src="logo/next.png">
		</div> -->

	</div>


</body>
</html>