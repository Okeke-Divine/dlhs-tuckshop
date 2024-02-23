<?php
	include("auth.php");
	if(isset($_REQUEST['aemail'],$_REQUEST['apsw'])){
		$aemail = $_REQUEST['aemail'];
		$apsw = $_REQUEST['apsw'];

					$open = fopen("../../config.php", "w");
$txt = '
<?php

$campus_name = "'.$campus_name.'";
$email = "'.$aemail.'";
$admin_password = "'.$apsw.'";

?>
					';
					fwrite($open, $txt);
					if(fclose($open)){
						?>
							<div class="alert alert-success">
								You account has been successfully edited.
							</div>
						<?php
					}

	}else{
		echo "error";
	}

?>