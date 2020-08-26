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
        $description = $_POST['rev_neno'];
        $amount = $_POST['rev_kiasi']; 
    //This input is entered automatically by the system
        $date = $_POST['rev_tarehe'];

    // Using SQL we will create a query statement for the inputs to send them to the database
        $sql = "INSERT INTO `revenue`( `revenue_description`,`revenue_date`, `revenue_amount`, `users_id`) VALUES ('$description','$date','$amount','$num')";

    // Using the connection variable, we will then query the data into the database
        $result = mysqli_query($db,$sql);
        if($result){
            
    // If the query is successful that is the data is entered successfully then user will be sent to the dashboard page
            header("location: revenue.php");
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