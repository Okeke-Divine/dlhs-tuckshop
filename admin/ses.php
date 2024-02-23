<?php
	
    $admin_logged_on = $_SESSION['admin_logged_on'];

    if(empty($admin_logged_on) || $admin_logged_on != 'dfs9gisdg'){
    	echo '<script>goto("login?access=denied");</script>';
    	die();
    }

?>