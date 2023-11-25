<?php
session_start(); // Start the session

// Unset all session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Redirect to the home page or login page after logout
header("Location: index"); // Change 'index.php' to the desired page
exit();
?>
