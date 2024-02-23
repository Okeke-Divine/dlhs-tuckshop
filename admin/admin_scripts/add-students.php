<?php

	include("auth.php");
	if(isset($_REQUEST['adm_no'],$_REQUEST['stuuname'],$_REQUEST['stupsw'],$_REQUEST['classa'],$_REQUEST['classi'])){
		$adm_no = $_REQUEST['adm_no'];
		$stuuname = $_REQUEST['stuuname'];
		$stupsw = $_REQUEST['stupsw'];
		$classa = $_REQUEST['classa'];
		$classi = $_REQUEST['classi'];

		if(!empty($adm_no) && !empty($stuuname) && !empty($stupsw) && !empty($classi) && !empty($classa)){

			$add_student = mysqli_query($conn,"INSERT INTO $student VALUES ('','$adm_no','$stuuname','$stupsw','$classi','$classa')");
			if($add_student){
				echo "<div class='alert alert-success'>".$stuuname."'s account has been Successfully created.</div>";
			}

		}else{
			echo "error";
		}

	}else{
		echo "error";
	}

?>