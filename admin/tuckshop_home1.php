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
            <!-- <body onload="get_page('add-item');"> -->
        <?php
    }else{
        $body_message = "";
        ?>
            <!-- <body onload="get_page('home');"> -->
        <?php
    }

?>
<style type="text/css">
    ::placeholder { /* Chrome, Firefox, Opera, Safari 10.1+ */
      color: white;
      opacity: 1; /* Firefox */
    }

    :-ms-input-placeholder { /* Internet Explorer 10-11 */
      color: white;
    }

    ::-ms-input-placeholder { /* Microsoft Edge */
      color: white;
    } 
</style>
<body onload="get_page('home');">
    
    <section class="admin-topnav">
        <i class="fa fa-bars dsifj fa-2x pointer"></i>
        
        <div class="search-box-container1">
                <input type="text" class="" placeholder="Search..." name="">
                <button><i class="fa fa-search"></i></button>
        </div>
        <!-- <div class="d1">
            <i class="fa fa-bars dsifj fa-2x pointer"></i>
        </div>
        <div class="d2">
           <div class="dim">
                <div class="a2">
                   <center>Recently opened</center>
               </div>
               <div class="a1">
                    <img class="admin-user-circle" src="/logo/admin.png">
                    <img class="admin-user-circle" src="/logo/admin.png">
                    <img class="admin-user-circle" src="/logo/admin.png">
               </div>
           </div>
        </div>
        <div class="d3">
            <div class="search-box-container1">
                <input type="text" class="" placeholder="Search..." name="">
                <button><i class="fa fa-search"></i></button>
            </div>
        </div>
        </div> -->
    </section>

    <section id="skl-admin-body" class="skl-admin-body">
        <div class="d2" id="into_div">s</div>
        <div class="d3">
            <?php include ("admin-right.php"); ?>
        </div>
    </section>
    <div class="chat-student-btn" onclick="get_page('msgstu');">
        <i class="fa fa-comment"></i>
        <span class="sdfsfsf">Click to message a student</span>
    </div>

    <div id="mySidenav" class="sidenav">
      <!-- <a href="#" id="about">Students</a> -->
      <a href="javascript:void(0)" id="about" onclick="get_page('select-classes');"><i class="fa fa-graduation-cap"></i> Classes</a>
      <a href="#" id="blog"><i class="fa fa-shopping-cart"></i> Requests</a>
      <a href="javascript:void(0)" onclick="open_more_options()" id="projects"><i class="fa fa-chevron-circle-down"></i> More</a>
    </div>

    <script type="text/javascript" src="../js/sweetalert.js"></script>

</body>
</html>
