<?php
   include("connect.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
   
      $myusername = $_POST['jina'];
      $mypassword = $_POST['pwd'];
    //   $hashPassword = sha1($mypassword);

      if(empty(trim($_POST["jina"]))){
        $username_err = "Please enter username";
    } else{
        $username = trim($_POST["jina"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["pwd"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["pwd"]);
    }
      // Prepare a select statement
      $sql = "SELECT users_id FROM users WHERE users_name = '$myusername' and users_password = '$mypassword'";

      // Using the connection variable, we will then query the data into the database
      $result = mysqli_query($db,$sql)or die(mysqli_error($db));

    //   Comparison of inputs to the data in the database
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row		
      if($count == 1) {
         $_SESSION['login_user'] = $myusername;
         $_SESSION['login_id'] = $row['users_id'];
         
         // If the query is successful that is the data is entered successfully then user will be sent to the dashboard page
         header("location: dashboard.php");
      }else {
          // If the code will not run then the user will be prompted an error 
         $error = "Your Login Name or Password is invalid";
      }
   }
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
  <meta name="description" content="Web Page Builder Description">

  <!-- Title of the page -->
  <title>Login | Mshiko Manager</title>

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
  <section class="menu cid-s5SRSarPQi" once="menu" id="menu1-4">

<!-- Navigation section of the system -->
    <nav class="navbar navbar-expand beta-menu navbar-dropdown align-items-center navbar-fixed-top navbar-toggleable-sm">
        <!-- <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <div class="hamburger">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
        </button> -->
        <div class="menu-logo">
            <div class="navbar-brand">
                <span class="navbar-logo">
                    <a href="index.php">
                         <img src="assets/images/logo-150x150.png" alt="Mshiko Manager" title="" style="height: 3.8rem;">
                    </a>
                </span>
            </div>
        </div>

    </nav>
</section>

<!-- Content section of the login page -->
<!-- Setting of the background video for UI of the login page -->
<section class="mbr-section content5 cid-s5VRgyCWkH mbr-parallax-background" id="content5-q">

    <div class="mbr-overlay" style="opacity: 0.7; background-color: rgb(35, 35, 35);">
    </div>

    <div class="container">
        <div class="media-container-row">
            <div class="title col-12 col-md-8">
                <h2 class="align-center mbr-bold mbr-white pb-3 mbr-fonts-style display-1">Login</h2>
                <h3 class="mbr-section-subtitle align-center mbr-light mbr-white pb-3 mbr-fonts-style display-5"><strong>A single username and password gets you in!</strong><br><strong>Signed up already?</strong><br><strong><a href="signup.php">Sign up here</a></strong></h3>
                
                
            </div>
        </div>
    </div>
</section>

<!-- Form for login -->
<section class="mbr-section form1 cid-s5T49cDFOb" id="form1-6">
    <div class="container">
        <div class="row justify-content-center">
            <div class="title col-12 col-lg-8"> 
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="media-container-column col-lg-8">
                    <form class="mbr-form" action="" method="post" >
                        <div class="row row-sm-offset">
                            <div class="col-md-4 multi-horizontal">
                                <div class="form-group">
                                    <label class="form-control-label mbr-fonts-style display-7" >Name</label>
                                    <input type="text" class="form-control" name="jina" required="">
                                </div>
                            </div>
                        </div>
                        <div class="row row-sm-offset">
                            <div class="col-md-4 multi-horizontal">
                                <div class="form-group">
                                    <label class="form-control-label mbr-fonts-style display-7">Password</label>
                                    <input type="password" class="form-control" name="pwd"  required="">
                                </div>
                            </div>
                            </div>
                        <span class="input-group-btn"><button type="submit" class="btn btn-form btn-secondary display-4">Login</button></span>
                    </form>
            </div>
        </div>
    </div>
</section>

<!-- Footer section of the login page -->
<section once="" class="cid-s5T3FyOMpk" id="footer6-5">
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
  <script src="assets/web/assets/jquery/jquery.min.js"></script>
  <script src="assets/popper/popper.min.js"></script>
  <script src="assets/tether/tether.min.js"></script>
  <script src="assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/parallax/jarallax.min.js"></script>
  <script src="assets/dropdown/js/script.min.js"></script>
  <script src="assets/touchswipe/jquery.touch-swipe.min.js"></script>
  <script src="assets/smoothscroll/smooth-scroll.js"></script>
  <script src="assets/theme/js/script.js"></script>
  <script src="assets/formoid/formoid.min.js"></script>
  
  
</body>
</html>