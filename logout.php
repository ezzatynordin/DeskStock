<?php
session_start(); // start the PHP session

session_destroy(); // destroy the session and unset all session variables

header("Location: login.php"); // redirect to the login page
exit; // terminate the current script
?>
