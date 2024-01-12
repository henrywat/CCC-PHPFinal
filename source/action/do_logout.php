<?php
// Initialize the session
session_start();

$_SESSION["loggedin"] = false;

// remove all session variables
session_unset();

// destroy the session
session_destroy();

// Redirect to login page
header("location: ../index.php");
exit();
?>