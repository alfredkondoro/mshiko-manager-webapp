<!-- This file is for connection with the database -->
<?php
// Defining the constant for requesting connection
   define('DB_SERVER', 'localhost');
   define('DB_USERNAME', 'root');
   define('DB_PASSWORD', '');
   define('DB_DATABASE', 'mshikomanager');
// Requesting connection with the database
   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
?>