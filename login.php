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
	<link rel="stylesheet" type="text/css" href="font/css/all.css?r=cache">
	<title>DLHS <?php echo $campus_name; ?> Tuckshop - Login</title>
</head>
<style type="text/css">
	.login-div{
		background: rgba(255,255,255,0.7);
		width: 300px;
		border-radius: 10px;
	}
	.login-div .login-type-div{
		margin-top: 10px;
		margin-left: 5px;
		margin-right: 5px;
		border-radius: 30px;
		height: auto;
		display: flex;
		background: rgb(219,19,112);
	}
	.login-div .login-type-div div{
		color: white;
		border:none;
		text-align: center;
		width: 59%;
		height: 30px;
		font-size: 17px;
		display: flex;
		justify-content: center;
		vertical-align: middle;
		align-items: center;
		position: relative;
		cursor: pointer;
	}
	.login-div .login-type-div .btn-student{
		border-right: 1px solid white;
		/*background: rgb(190,19,112);*/
		border-top-left-radius: 30px;
		border-bottom-left-radius: 30px;
	}
	.login-div .login-type-div .btn-admin{
		border-left: 1px solid white;
		border-top-right-radius: 30px;
		border-bottom-right-radius: 30px;
	}
	.login-div .login-footer{
		width: 100%;
		height: 30px;
		border-bottom-left-radius: 10px;
		border-bottom-right-radius: 10px;
		background: rgb(219,19,112);
	}
	.container{
		width: 100%;
	    display: flex;
	    padding-top:10px;
	    position:relative;
	    margin: 0;
	    justify-content: center;
	    align-items: center;
    	vertical-align: middle;
	}
	.login-div .student{
		margin:5px;
		padding-top: 10px;
	}
	.login-div .login-input{
		width: 100%;
		height: 30px;
		border-radius: 10px;
		color: rgb(219,19,112);
		outline: none;
		border:none;
		font-size: 15px;
		padding: 5px;
	}
	.login-div .h-title{
		font-size: 30px;
		color: rgb(219,19,112);
		margin-bottom: 5px;
	}
	.student-login-btn{
		background: rgb(219,19,112);
		color: white;
		padding: 10px;
		border-radius: 20px;
		font-size: 15px;
		border:none;
	}
	.login-body label{
		color: rgb(219,19,112);
		font-size: 15px;
		margin-bottom: 20px;
	}
	.login-body{
		margin-top: 40px;
		overflow: hidden;
		margin-bottom: 10px;
		max-height: 350px;
		/*background: green;*/
	}
	.login-body a{
		font-size: 15px;
	}
	.login-body .student{
		padding: 10px;
		/*background: blue;*/
	}
	.login-body .admin{
		padding: 15px;
		/*background: red;*/
	}
</style>
<body>

	<div class="container">

		<!-- <nav>
			<div class="nav-logo">
				<img src="logo/logo.png">
			</div>
			<div class="nav-links">
				<a href="index.php">Home</a>
				<div>
					<span class="sojdofsdf">|</span> <a href="login">Student</a>
					<span class="sojdofsdf">|</span> <a href="admin/" class="btn">Admin</a>
				</div>
			</div>
		</nav>

		<div class="content">
			<h1>Login</h1>
			<form class="login-box">
				<div class="search-box"><input type="text" name="uname" placeholder="Username" value="test..."></div>
				<div class="search-box">
					<select name="selecet-class" class="wd100">
						<option value="JSS1">JSS1</option>
						<option value="JSS2">JSS2</option>
						<option value="JSS3">JSS3</option>
						<option value="SSS1">SSS1</option>
						<option value="SSS2">SSS2</option>
						<option value="SSS3">SSS3</option>
					</select>
				</div>
				<div class="search-box"><input type="text" name="psw" placeholder="Password" value="test..."></div>
				<button class="login-submit-btn" name="login"><i class="fa fa-sign-in-alt"></i> Login</button>
			</form>
		</div> -->


		<div class="login-div">
			<div class="login-type-div">
				<div class="btn-student" onclick="scroll_to_student()">Student</div>
				<div class="btn-admin" onclick="scroll_to_admin()">Admin</div>
			</div>
			<div class="login-body">
				<div class="student" id="student-login">
					<!-- student -->
					<span class="h-title">Student</span>

					<br><br>
					<label for="st-uname">Student Username</label>
					<input type="text" name="st-uname" id="st-uname" placeholder="Student Name" class="login-input student-name" style="margin-bottom: 20px;margin-top: 7px;">

					<label for="st-psw">Student Password</label>
					<input type="password" name="st-psw" id="st-psw" placeholder="Student Password" class="login-input student-psw" style="margin-bottom: 20px;margin-top: 7px;">

					<center>
						<button class="student-login-btn"><i class="fa fa-sign-in-alt"></i> Login</button>
					</center>
					<br><a href="#">Forgotten Password?</a>
				</div>

				<br><br>
				<div class="admin" id="admin-login">
					<!-- admin -->
					<span class="h-title">Admin</span>

					<br><br>
					<label for="admin-uname">Admin Username</label>
					<input type="text" name="admin-uname" id="admin-uname" placeholder="Student Name" class="login-input student-name" style="margin-bottom: 20px;margin-top: 7px;">

					<label for="admin-psw">Admin Password</label>
					<input type="password" name="admin-psw" id="admin-psw" placeholder="Student Password" class="login-input student-psw" style="margin-bottom: 20px;margin-top: 7px;">

					<center>
						<button class="student-login-btn"><i class="fa fa-sign-in-alt"></i> Login</button>
					</center>
					<br><a href="#">Forgotten Password?</a>

					<br><br><br><br>
				</div>
			</div>
			<div class="login-footer"></div>
		</div>


	</div>


</body>
</html>
<script type="text/javascript">
	function scroll_to_admin(){
		window.location.hash = "admin-login";	
	}
	function scroll_to_student(){
		window.location.hash = "student-login";	
	}
</script>