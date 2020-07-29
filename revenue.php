<?php
   session_start();
   require_once'connect.php';
   if(!isset($_SESSION['login_user'])){
    header("location: index.php");
   }
   else{
    $num = $_SESSION['login_id'];

?>
<!DOCTYPE html>
<html >
<head>
  
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="generator" content="Mobirise v4.9.3, mobirise.com">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <link rel="shortcut icon" href="assets/images/logo-128x128-1.png" type="image/x-icon">
  <meta name="description" content="Web Site Maker Description">
  <title>Revenue | Mshiko Manager</title>
  <link rel="stylesheet" href="assets/web/assets/mobirise-icons2/mobirise2.css">
  <link rel="stylesheet" href="assets/web/assets/mobirise-icons/mobirise-icons.css">
  <link rel="stylesheet" href="assets/tether/tether.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-grid.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-reboot.min.css">
  <link rel="stylesheet" href="assets/datatables/data-tables.bootstrap4.min.css">
  <link rel="stylesheet" href="assets/dropdown/css/style.css">
  <link rel="stylesheet" href="assets/theme/css/style.css">
  <link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css">
  
  
  
</head>
<body>
  <section class="menu cid-s5SRSarPQi" once="menu" id="menu1-h">

    

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
                    <a href="dashboard.php">
                         <img src="assets/images/logo-150x150.png" alt="Mobirise" title="" style="height: 3.8rem;">
                    </a>
                </span>
            </div>
        </div>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            
            <div class="navbar-buttons mbr-section-btn"><a class="btn btn-sm btn-secondary display-4" href="logout.php"><span class="mobi-mbri mobi-mbri-error mbr-iconfont mbr-iconfont-btn"></span>
                    SignOut</a></div>
        </div>
    </nav>
</section>

<section class="mbr-section content5 cid-s5VJooyPu3" data-bg-video="https://www.youtube.com/watch?v=NqDv1Vb_rwM" id="content5-l">

    

    <div class="mbr-overlay" style="opacity: 0.9; background-color: rgb(35, 35, 35);">
    </div>

    <div class="container">
        <div class="media-container-row">
            <div class="title col-12 col-md-8">
                <h2 class="align-center mbr-bold mbr-white pb-3 mbr-fonts-style display-1">
                    REVENUE</h2>
                <h3 class="mbr-section-subtitle align-center mbr-light mbr-white pb-3 mbr-fonts-style display-5">
                    COST INCURRED IN OR REQUIRED FOR SOMETHING</h3>
                
                    <div class="mbr-section-btn align-center"><a class="btn btn-secondary display-4" data-toggle="modal" data-target="#myModal"><span class="mobi-mbri mobi-mbri-plus mbr-iconfont mbr-iconfont-btn"></span>ADD MORE REVENUE</a></div>>
            </div>
        </div>
    </div>
</section>
<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">ADD MORE REVENUE</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <form action="create-revenue.php" method="post">
      <!-- Modal body -->
      <div class="modal-body">
        <div class="form-group">
          <label class="form-control-label mbr-fonts-style display-7">Description</label>
          <input type="text" class="form-control" name="rev_neno"  required="">
        </div>
        <div class="form-group">
          <label class="form-control-label mbr-fonts-style display-7">Amount</label><br>
          <span>Tsh. </span><input type="number" class="form-control" name="rev_kiasi"  required="">
        </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
      <button type="submit" class="btn btn-secondary btn-sm">Add Revenue</button>
      </div>
      </form>
    </div>
  </div>
</div>
<section class="section-table cid-s5VJhTwGmx" id="table1-k">

  
  
  <div class="container container-table">
      
      
      <div class="table-wrapper">
        <div class="container">
          <div class="row search">
            <div class="col-md-6"></div>
            <div class="col-md-6">
                <div class="dataTables_filter">
                  <label class="searchInfo mbr-fonts-style display-7">Search:</label>
                  <input class="form-control input-sm" disabled="">
                </div>
            </div>
          </div>
        </div>

        <div class="container scroll">
          <table class="table isSearch" cellspacing="0">
            <thead>
              <tr class="table-heads ">
                <th class="head-item mbr-fonts-style display-7">
                  #
                </th>  
              <th class="head-item mbr-fonts-style display-7">
                  Description
              </th>
              <th class="head-item mbr-fonts-style display-7">
                  Amount
              </th>
              </tr>
            </thead>
            <tbody>            
  
              <?php
              $matumizi = "SELECT * FROM revenue where users_id= '$num'";
              $tokeo = mysqli_query($db, $matumizi);
              if(mysqli_num_rows($tokeo) > 0){
                $n =1;
                while($row = mysqli_fetch_array($tokeo))
                {
              ?>
              <tr>
                  <td><?=$n++?></td>
                  <td><?php echo $row["revenue_description"]; ?></td>
                  <td><?php echo $row["revenue_amount"]; ?></td>
              </tr>
              <?php
                                        }
                                    }
                                    ?>
            </tbody>
          </table>
        </div>
        <div class="container table-info-container">
          <div class="row info">
            <div class="col-md-6">
              <div class="dataTables_info mbr-fonts-style display-7">
                <span class="infoBefore">Showing</span>
                <span class="inactive infoRows"></span>
                <span class="infoAfter">entries</span>
                <span class="infoFilteredBefore">(filtered from</span>
                <span class="inactive infoRows"></span>
                <span class="infoFilteredAfter"> total entries)</span>
              </div>
            </div>
            <div class="col-md-6"></div>
          </div>
        </div>
      </div>
    </div>
</section>

<section once="" class="cid-s5T3FyOMpk" id="footer6-i">

    

    

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


  <script src="assets/web/assets/jquery/jquery.min.js"></script>
  <script src="assets/tether/tether.min.js"></script>
  <script src="assets/popper/popper.min.js"></script>
  <script src="assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/smoothscroll/smooth-scroll.js"></script>
  <script src="assets/touchswipe/jquery.touch-swipe.min.js"></script>
  <script src="assets/ytplayer/jquery.mb.ytplayer.min.js"></script>
  <script src="assets/vimeoplayer/jquery.mb.vimeo_player.js"></script>
  <script src="assets/datatables/jquery.data-tables.min.js"></script>
  <script src="assets/datatables/data-tables.bootstrap4.min.js"></script>
  <script src="assets/dropdown/js/script.min.js"></script>
  <script src="assets/theme/js/script.js"></script>
  
  
</body>
</html>
<?php
   }
?>