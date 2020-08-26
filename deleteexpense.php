<?php
// initializing a session
include_once 'connect.php';
// including the connection file
session_start();

$expense_id = $_GET['expenses_id'];

// creating a delete statement that delete the products from the database which has that specific id
$deletesql = "DELETE FROM expenses where expenses_id=$expense_id";
$deleteres = mysqli_query($db, $deletesql);

// if the query is performed the user will be reloaded the page of viewitems.php
if($deleteres){
    header("location: expenses.php");
}
else{
// if the query is not performed, then output
    $error = "You cannot delete at this time";
    echo $error;
}

?>