<?php

// Beginning of a session
session_start();

// Requesting the connection by including the connection file
require_once'connect.php';
$_SESSION = array();
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params(0);
        setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Destroying the session
session_destroy();

// The user will be sent to the login page
header("Location: index.php"); exit;
?>