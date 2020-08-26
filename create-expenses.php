<?php

// Beginning of a session
   session_start();

// Requesting the connection by including the connection file
   require_once'connect.php';

//    If the user has not logged in then he/she would be sent to the login page
   if(!isset($_SESSION['login_user'])){
    header("location: index.php");
   }
   else{

    //    If the user has logged in that is, there is a session variable then the expense variables accepted will be then processed
    $num = $_SESSION['login_id'];

    // Then we will asign variables with the inputs that the user has entered
        $exp_description = $_POST['exp_neno'];
        $exp_amount = $_POST['exp_kiasi']; 

    // Using SQL we will create a query statement for the inputs to send them to the database
        $sql = "INSERT INTO `expenses`( `expenses_description`, `expenses_amount`, `users_id`) VALUES ('$exp_description','$exp_amount','$num')";

    // Using the connection variable, we will then query the data into the database
        $result = mysqli_query($db,$sql);
        if($result){
    
    // If the query is successful that is the data is entered successfully then user will be sent to the dashboard page
            header("location: dashboard.php");
        }
        else{
    // If not successful an error will be outputed to the user
            echo mysqli_error($db);
        //     echo '<div class="alert alert-danger alert-dismissible">
        //     <button type="button" class="close" data-dismiss="alert">&times;</button>
        //     <strong>Failure!</strong> Could not add your expenses.
        //   </div>';
        }
    }