<?php
session_start();

// Logouts the user
unset($_SESSION['login']);

// Deletes session data
unset($_SESSION['uname']);

// Goes back to the Login page
header("Location: http://localhost/PHPatriots/login.php");
?>