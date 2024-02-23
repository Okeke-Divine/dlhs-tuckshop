<!DOCTYPE html>
<html>
<head>
    <?php
    session_start();
    include("../config.php");
    include("../conn.php");
    include("../css.php");
    include("../js.php");
    if(empty($campus_name) || empty($email) || empty($admin_password))
    {
        header("location:../install.php");
    }
        if(isset($_POST['psw'],$_POST['email'])){
            $admin_email = $_POST['email'];
            $admin_psw = $_POST['psw'];
            $error = "";
            $success = 0;
            if($admin_email != $email){$success = 0;}else{$success = 1;}
            if($admin_psw != $admin_password){$success = 0;}else{$success = 1;}
            if($success == 0){
                $error = '
                <div class="alert alert-danger">
                Invalid Login.
                </div><br>
                ';
            }else{
                $error = "";
                $_SESSION['admin_logged_on'] = 'dfs9gisdg';
                echo '<script>goto("home");</script>';
            }
        }else{
            $admin_email = "";
            $error = "";
        }

    ?>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Admin | Login | DLHS (<?php echo $campus_name.") - tuckshop"; ?></title>
        <link rel="stylesheet" href="admin_items/general-style-plugins.css">
        <link rel="stylesheet" href="../font/css/all.css">
        <link rel="stylesheet" href="admin_items/style.css">
        <script type="text/javascript" src="admin_items/jquery-3.js"></script>
</head>

<body class="">
        <div class="content-container container">
      <div class="row admin-panel">
        <div class="col-md-1"></div>
        <div class="col-md-10">
          <div class="wo_install_step">
                        <!-- <ul class="install_steps">
                            <li class="step-one active">
                                <span>1<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M21,7L9,19L3.5,13.5L4.91,12.09L9,16.17L19.59,5.59L21,7Z"></path></svg></span>Admin Login
                             </li>
                        </ul> -->

            <!-- <div class="line"><div class="line_sec"></div></div> -->
          </div>
        </div>
        <div class="col-md-1"></div>
      </div>
      <div class="row admin-panel">
        <div class="col-md-1"></div>
        <div class="col-md-10">
          <div class="wo_install_wiz">
            <div>
                            <h2 class="light">Admin Login</h2>
                            <div class="setting-well">
                            <div class="terms">

                                <form method="POST" action="">

                                    <?php echo $error; ?>

                                    <label for="email">Admin Email</label>
                                    <input type="email" required="" class="form-control" value="<?php echo $admin_email; ?>" placeholder="Admin Email" name="email" id="email" required="">
                                    <br>

                                    <label for="psw">Admin Password</label>
                                    <input type="password" required="" class="form-control" placeholder="Admin Password" name="psw" id="psw" required="">
                                    <br>

                                    <button class="btn btn-main">
                                        <i class="fa fa-sign-in-alt"></i> Login
                                    </button>
                                </form>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

              
    
</body>
</html>