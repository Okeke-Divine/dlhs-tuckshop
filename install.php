<?php

	include("config.php");
	include("css.php");
	if(empty($campus_name) || empty($email) || empty($admin_password)){


		if(isset($_POST['campus'],$_POST['admin_password'],$_POST['email'])){
				$email = $_POST['email'];
				$admin_password = $_POST['admin_password'];
				$campus = $_POST['campus'];

					$open = fopen("config.php", "w");
$txt = '
<?php

$campus_name = "'.$campus.'";
$email = "'.$email.'";
$admin_password = "'.$admin_password.'";

?>
';
					fwrite($open, $txt);
					fclose($open);
					mkdir('item_images');
					header("location:index.php?install=success");
		}

		?>

		<!DOCTYPE html>
		<html>
		<head>
			<meta charset="utf-8">
			<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
			<title>DLHS - tuckshop service (Install App)</title>
		</head>
		<body>
		
			<nav class="wd100 bg-dark text-light p-3">DLHS - tuckshop service (Install App)</nav>
			<section class="install">
				<div class="app p-4">
					<form action="" method="POST">
						

							<div class="tab-content">
              <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
         <div class="main-card mb-3 card">
             <div class="card-body"><h5 class="card-title">Fill the form below to install this app.</h5>
                 <form class="" action="r.php" method="POST">
                     <div class="form-row">
                         <div class="col-md-6">
                             <div class="position-relative form-group"><label for="campus" class="">Campus</label><input name="campus" id="campus" placeholder="Campus" type="text" class="form-control" required="">
                    </div>
  </div>
 <div class="col-md-6">
 <div class="position-relative form-group">
 	<label for="email" class="">Admin Email</label>
 	<input name="email" id="email" placeholder="Email" type="text" class="form-control" required=""></div>
 </div>
        </div>
        <div class="position-relative form-group"><label for="admin_password" class="">Admin Password</label>
        	<input name="admin_password" id="admin_password" placeholder="Admin Password" type="text" required="" class="form-control"></div>
                  
                     <button class="mt-2 btn btn-primary" name="install">Install</button>
                                        </form>
                                    </div>
                                </div>



					</form>
				</div>
			</section>

		</body>
		</html>

		<?php

	}else{
		header("location:index.php");
	}


?>
