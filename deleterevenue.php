<?php
// initializing a session
include_once 'connect.php';
// including the connection file
session_start();

$revenue_id = $_GET['revenue_id'];

// creating a delete statement that delete the products from the database which has that specific id
$deletesql = "DELETE FROM revenue where revenue_id=$revenue_id";
$deleteres = mysqli_query($db, $deletesql);

// if the query is performed the user will be reloaded the page of viewitems.php
if($deleteres){
    header("location: revenue.php");
}
else{
// if the query is not performed, then output
    $error = "You cannot delete at this time";
    echo $error;
}

?>