<div id="admin_details" class="wd1000">
	<div class="wd100 bsdfoskdf">
		<img src="../logo/logo1.jpg" class="br-5 dsfosdks" alt="dlhs">
	</div>
	<center>
		<center><img src="../logo/admin.png" class="dosakdo"></center>
		<br>
		<a class="text-dark kdokd" href="mailto:<?php echo $email; ?>">admin</a>
	</center>
</div>

	
	<div class="white p-2 doskdofdsokfs br-5 wd100">
		<b>Trending !</b>
	</div>

	<div class="white mt-3 p-2 doskdofdsokfs br-5 wd100">
		<b>Total Students: <?php echo mysqli_num_rows(mysqli_query($conn,"SELECT * FROM $student"));
		?></b>
	</div>
