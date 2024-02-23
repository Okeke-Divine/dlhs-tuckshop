<nav class="white wd100 my_navbar navbar p-3">

		<span class="logo">DLHS <?php echo $campus_name; ?></span>

		<input type="text" id="searchmyInput" onkeypress="searchmyFunction(event)" placeholder="Search products, categories" value="<?php echo $search; ?>">


		<button class="btn btn fa fa-bars" onclick="sidebar('open');"></button>

	</nav>
	<br><br><br><br>


	<div class="sidebar_me" id="sidebar_me">
		<button onclick="sidebar('close');" class="right okdsoks btn fa fa-times text-light"></button>

		<br>
		<main class="container" role="main">
			<h3 class="text-light"><?php echo $ses_uname; ?></h3>
			<h5 class="text-light">&#8358;<?php echo $amount_query; ?></h5>
			<h5 class="text-light"><?php echo $class." ".$class_arm; ?></h5>
		</main>
		<hr class="bg-light text-light">
		<button class="wd100 side_navbtns" onclick="goto('home');"><i class="fa fa-home"></i> Home</button>
		<button class="wd100 side_navbtns" onclick="goto('cart');"><i class="fa fa-shopping-cart"></i> Cart</button>
		<button class="wd100 side_navbtns" onclick="goto('contact-us');"><i class="fa fa-phone-alt"></i> Contact Us</button>
		<button class="wd100 side_navbtns" onclick="goto('change-password');"><i class="fa fa-lock"></i> Change Password</button>
		<button class="wd100 side_navbtns" onclick="goto('record');"><i class="fa fa-newspaper"></i> Record</button>
		<button class="wd100 side_navbtns" onclick="goto('store');"><i class="fa fa-shopping-basket"></i> Store</button>
		<hr class="mt-2 mb-2 text-light bg-light">
		<button class="wd100 side_navbtns" onclick="goto('../logout.php');"><i class="fa fa-sign-out-alt"></i> Logout</button>
		
	</div>
	<link rel="stylesheet" type="text/css" href="../css/sweetalert.css">
	<script type="text/javascript" src="../js/sweetalert.js"></script>