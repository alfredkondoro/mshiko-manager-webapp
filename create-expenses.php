<?php
   session_start();
   require_once'connect.php';
   if(!isset($_SESSION['login_user'])){
    header("location: index.php");
   }
   else{
    $num = $_SESSION['login_id'];

        $description = $_POST['neno'];
        $amount = $_POST['kiasi']; 

        $sql = "INSERT INTO expenses ( 'expenses_description', 'expenses_amount', 'users_id') VALUES ($description,$amount,$num)";

        $result = mysqli_query($db,$sql);
        if($result){
            header("location: expenses.php");
        }
        else{
            echo "error";
        //     echo 
        //     echo '<div class="alert alert-danger alert-dismissible">
        //     <button type="button" class="close" data-dismiss="alert">&times;</button>
        //     <strong>Failure!</strong> Could not add your expenses.
        //   </div>';
        }
    }