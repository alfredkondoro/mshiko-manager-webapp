<?php

// Beginning of a session
   session_start();

// Requesting the connection by including the connection file
   require_once'connect.php';

// If the user has not logged in then he/she would be sent to the login page
   if(!isset($_SESSION['login_user'])){
    header("location: index.php");
   }
   else{

?>

<!-- Beginning of the front end part of system -->
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="generator" content="Mobirise v4.9.3, mobirise.com">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <link rel="shortcut icon" href="assets/images/logo-128x128-1.png" type="image/x-icon">
  <meta name="description" content="Website Builder Description">

<!-- Title of the page -->
  <title>Dashboard | Mshiko Manager</title>

<!-- CSS files of the system -->
  <link rel="stylesheet" href="assets/web/assets/mobirise-icons2/mobirise2.css">
  <link rel="stylesheet" href="assets/web/assets/mobirise-icons/mobirise-icons.css">
  <link rel="stylesheet" href="assets/tether/tether.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-grid.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-reboot.min.css">
  <link rel="stylesheet" href="assets/dropdown/css/style.css">
  <link rel="stylesheet" href="assets/theme/css/style.css">
  <link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css">
</head>

<!-- Beginning of the body section -->
<body>
  <section class="menu cid-s5SRSarPQi" once="menu" id="menu1-d">

<!-- Navigation section of the system -->
    <nav class="navbar navbar-expand beta-menu navbar-dropdown align-items-center navbar-fixed-top navbar-toggleable-sm">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <div class="hamburger">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
        </button>
        <div class="menu-logo">
            <div class="navbar-brand">
                <span class="navbar-logo">
                    <a href="dashboard.php">
                         <img src="assets/images/logo-150x150.png" alt="Mobirise" title="" style="height: 3.8rem;">
                    </a>
                </span>
            </div>
        </div>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            
             <!-- Button to signout -->
            <div class="navbar-buttons mbr-section-btn"><a class="btn btn-sm btn-secondary display-4" href="logout.php"><span class="mobi-mbri mobi-mbri-error mbr-iconfont mbr-iconfont-btn"></span>
                    SignOut</a></div>
        </div>
    </nav>
</section>

<!-- Content section of the dashboard page -->
<!-- Setting of the background video for UI of the dashboard page -->
<section class="header6 cid-s5VIJsycr6 mbr-fullscreen" data-bg-video="https://www.youtube.com/watch?v=AK1o9rZHABg" id="header6-j">
    <div class="mbr-overlay" style="opacity: 0.8; background-color: rgb(35, 35, 35);">
    </div>

    <div class="container">
        <div class="row justify-content-md-center">
            <div class="mbr-white col-md-10">

            <!-- Balance of the user is computed from the total expenses and revenue inputed by the user -->
                <h1 class="mbr-section-title align-center mbr-bold pb-3 mbr-fonts-style display-1">
                <span class="text-warning">Balance:</span> Tsh.<?php
            $num = $_SESSION['login_id'];

            // SQL Statement to add all amounts entered by the user
           $sql_exp="SELECT SUM(expenses_amount) as rev_total FROM expenses where users_id=$num";
           $sql_rev="SELECT SUM(revenue_amount) as exp_total FROM revenue where users_id=$num";
           
            // Querying the SQL statements with database using the connection variable
           $res_Rev =mysqli_query($db,$sql_rev);
           $res_Exp =mysqli_query($db,$sql_exp);
           
           $exp = mysqli_fetch_array($res_Exp);
           $rev = mysqli_fetch_array($res_Rev);
           
           //Computation of the balance
           $bal = $rev[0] - $exp[0];

           echo $bal;

            ?></h1>
                <p class="mbr-text align-center pb-3 mbr-fonts-style display-5">Money management requires commitment and sacrifice</p>
                
                <!-- Navigation buttons to expenses and revenue pages -->
                <div class="mbr-section-btn align-center"><a class="btn btn-md btn-secondary display-4" href="expenses.php">Expenses</a>
                        <a class="btn btn-md btn-warning display-4" href="revenue.php">Revenue</a></div>
            </div>
        </div>
    </div>

    
</section>

<!-- Footer section of the dashboard page -->
<section once="" class="cid-s5T3FyOMpk" id="footer6-e">
    <div class="container">
        <div class="media-container-row align-center mbr-white">
            <div class="col-12">
                <p class="mbr-text mb-0 mbr-fonts-style display-7"><em>
                    © Copyright <?php echo date("Y"); ?> MshikoManager - All Rights Reserved
                </em></p>
            </div>
        </div>
    </div>
</section>

<!-- JS files of the system -->
  <script src="assets/custom/browserclose.js"></script>
  <script src="assets/web/assets/jquery/jquery.min.js"></script>
  <script src="assets/tether/tether.min.js"></script>
  <script src="assets/popper/popper.min.js"></script>
  <script src="assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/smoothscroll/smooth-scroll.js"></script>
  <script src="assets/vimeoplayer/jquery.mb.vimeo_player.js"></script>
  <script src="assets/dropdown/js/script.min.js"></script>
  <script src="assets/touchswipe/jquery.touch-swipe.min.js"></script>
  <script src="assets/ytplayer/jquery.mb.ytplayer.min.js"></script>
  <script src="assets/theme/js/script.js"></script>
</body>
</html>
<?php
   }
?>