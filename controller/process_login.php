<?php
session_start();
require_once "../autoloader.php"; // Replace with the actual path to your DB class file
require "statements.php";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username_or_email = $_POST['username_or_email'];
    $password = $_POST['password'];

    // Assuming $config is defined somewhere in your code
    $usersDB = new DB($config['database'], $config['accessor']['user'], $config['accessor']['pass'], 'cracked');

    // Check user credentials
    $user = $usersDB->check_login($username_or_email, $password);

    if ($user) {
        // Login successful
        $_SESSION['username'] = $user['username']; // Store the username in the session
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['store'] = $usersDB->get_store($user['id']);
        header("Location: ../account"); // Redirect to the dashboard or another secured page
        exit();
    } else {
        // Login failed
        $_SESSION['error'] = "Invalid username/email or password.";
        header("Location: ../login?error=true"); // Redirect back to the login form with an error flag
        exit();
    }
} else {
    // Redirect to the login form if accessed directly without submitting the form
    header("Location: ../login");
    exit();
}
?>
