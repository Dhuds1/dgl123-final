<?php

session_start();
require_once "../autoloader.php"; // Adjust the path as needed
require "statements.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require "account.php";

    $config = []; // Assume you have your $config array defined somewhere
    
    // Sanitize and retrieve submitted form data
    $firstname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_STRING);
    $lastname = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $is_pub = isset($_POST['publicProfile']) ? true : false;

    // Retrieve existing user data from the database
    $account = get_account_information($_SESSION['user_id']);

    // Check if the new email is already used by another user
    if ($email !== $account['email']) {
        $usersDB = new DB($config);
        if ($usersDB->check_value('email', $email)) {
            // Redirect back to the account page with an error message
            $_SESSION['error'] = "$email is already taken, please try another email.";
            header('Location: ../account');
            exit();
        }
    }

    // Create an array to store the changes
    $changes = [];

    // Check if the data is different from the existing data
    if ($account['firstname'] !== $firstname) {
        $changes['firstname'] = $firstname;
    }
    if ($account['lastname'] !== $lastname) {
        $changes['lastname'] = $lastname;
    }
    if ($account['is_public'] != $is_pub) {
        $changes['is_public'] = $is_pub;
    }
    if ($account['email'] !== $email) {
        $changes['email'] = $email;
    }

    if (isset($_FILES['profile_picture']) && $_FILES['profile_picture']['error'] === UPLOAD_ERR_OK) {
        $allowedExtensions = ['jpg', 'jpeg'];
        $profilePictureExtension = strtolower(pathinfo($_FILES['profile_picture']['name'], PATHINFO_EXTENSION));

        if (in_array($profilePictureExtension, $allowedExtensions)) {
            // Read and encode the image file data
            $profilePictureData = file_get_contents($_FILES['profile_picture']['tmp_name']);

            // Update the changes array with the encoded image data
            $changes['picture'] = $profilePictureData;
        } else {
            // Handle invalid file type
            $_SESSION['error'] = "Invalid file type for profile picture. Please upload a JPEG file.";
            header('Location: ../account');
            exit();
        }
    }

    if (empty($changes)) {
        $_SESSION['success'] = "No changes made";
        header('Location: ../account');
        exit();
    }
    update_user_info($_SESSION['user_id'], $changes);
} else {
    // Handle invalid request
    header('Location: ../error'); // Replace with an appropriate error page
    exit();
}
