<?php

session_start();
require_once "../autoloader.php"; // Adjust the path as needed
require "statements.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require "account.php";
    // Sanitize and retrieve submitted form data
    $firstname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_STRING);
    $lastname = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    
    // Retrieve existing user data from the database
    $account = get_account_information($_SESSION['user_id']);

    // Create an array to store the changes
    $changes = [];

    // Check if the data is different from the existing data
    if ($account['firstname'] !== $firstname) {
        $changes['firstname'] = $firstname;
    }

    if ($account['lastname'] !== $lastname) {
        $changes['lastname'] = $lastname;
    }

    if ($account['email'] !== $email) {
        $changes['email'] = $email;
    }
    // Process the form data and update the user information
    update_user_info($_SESSION['user_id'], $changes);
    
    // Redirect to the account page or handle success as needed
    header('Location: ../views/account.php');
    exit();
} else {
    // Handle invalid request
    header('Location: ../error.php'); // Replace with an appropriate error page
    exit();
}
?>
