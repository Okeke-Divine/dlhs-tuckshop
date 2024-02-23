<!DOCTYPE html>
<html>
<head>
    <?php

    session_start();
    include("../config.php");
    include("../conn.php");
    include("../css.php");
    include("../js.php");
    include("admin_js.php");
    include("ses.php");
    include("admin_css.php");

    ?>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../css/sweetalert.css">
    <link rel="stylesheet" type="text/css" href="../font/css/all.css">
    <title>Admin | Home | DLHS (<?php echo $campus_name.") - tuckshop"; ?></title>
    <div class="wd100 navbar ofdjfsd p-2 text-light">
		<span class="dfsfoksdfds">Admin</span>
		<input type="text" class="d0sdji" placeholder="Search for items,students,..." name="searches">
		<button class="btn btn fa fa-user-circle fa-2x text-light"></button>
	</div>
</head>

<?php

	if(isset($_POST['item_name'],$_POST['item_price'])){
		$target_dir = "../item_images/";
		$item_name = $_POST['item_name'];
		$item_price = $_POST['item_price'];
		$filename = $_FILES["fileToUpload"]["name"];
		$tmp_name = $_FILES["fileToUpload"]["tmp_name"];
		$target_file = $target_dir . basename($filename).date("dmyhisa");
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		 $check = getimagesize($tmp_name);
	    if($check !== false) {
	        $uploadOk = 1;
	    } else {
	        $uploadOk = 0;
	    }
	    if($uploadOk == 1){
		    if (move_uploaded_file($tmp_name, $target_file)) {
		    	$insert_into_items = mysqli_query($conn,"INSERT INTO $items VALUES('','$item_name','$item_price','$target_file','0','1')");
		    	if($insert_into_items){
		    		?>
		    			<div class="wd100 p-2 alert alert-success">
		    				The item <b><?php echo $item_name; ?></b> has been successfully added.
		    			</div>
		    		<?php
		    	}
		    } else {
		    	?>
					<div class="wd100 alert alert-danger p-2">Error will trying to add item!</div>
		    	<?php
		    }	
	    }else{
	    	?>
	    	<div class="wd100 alert alert-danger p-2">Error will trying to add item!</div>
	    	<?php
	    }
	    

			$body_message = "success";
		?>
			<body onload="get_page('add-item');">
		<?php
	}else{
		$body_message = "";
		?>
			<body onload="get_page('home');">
		<?php
	}

?>


	


	<div class="wd100">
		<main class="container">
			<?php
				echo $body_message;
			?>
			<div class="row mt-3">
				<div class="col-md-3 mr-1 p-2">
					<?php

						include("left_nav.php");

					?>
				</div>
				<div class="col-md-5 s9kd br-5 white" id="into_div"></div>
				<div class="col-md-3 ml-1">
					<?php

						include("admin_details.php");

					?>
				</div>
			</div>
		</main>
	</div>

	
<script type="text/javascript" src="../js/sweetalert.js"></script>

</body>
</html>