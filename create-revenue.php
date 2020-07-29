<?php
   session_start();
   require_once'connect.php';
   if(!isset($_SESSION['login_user'])){
    header("location: index.php");
   }
   else{
    $num = $_SESSION['login_id'];

        $description = $_GET['neno'];
        $amount = $_GET['kiasi']; 

        $sql = "INSERT INTO `revenue`( `revenue_description`, `revenue_amount`, `users_id`) VALUES ($description,$amount,$num)";

        $result = mysqli_query($db,$sql);
        if($result){
            header("location: revenue.php");
        }
        else{
        //     echo 
        //     echo '<div class="alert alert-danger alert-dismissible">
        //     <button type="button" class="close" data-dismiss="alert">&times;</button>
        //     <strong>Failure!</strong> Could not add your expenses.
        //   </div>';
        }
    }