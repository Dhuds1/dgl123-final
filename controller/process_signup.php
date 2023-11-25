<?php
// Start the session
session_start();

// Validate form data
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$username = $_POST['username'];
$email = $_POST['email'];
$email_confirm = $_POST['email_confirm'];
$password = $_POST['password'];
$password_confirm = $_POST['password_confirm'];

// Store form data in session variables
$_SESSION['old_values'] = [
    'first_name' => $first_name,
    'last_name' => $last_name,
    'username' => $username,
    'email' => $email,
    'email_confirm' => $email_confirm,
    // Add more fields as needed
];

// Add more validation as needed
if (empty($first_name) || empty($last_name) || empty($username) || empty($email) || empty($email_confirm) || empty($password) || empty($password_confirm)) {
    $_SESSION['error'] = "All fields are required. Please fill out the entire form.";
    header("Location: ../login?error=true");
    exit();
}

if ($email !== $email_confirm) {
    $_SESSION['error'] = "Email and Confirm Email do not match.";
    header("Location: ../login?error=true");
    exit();
}

if ($password !== $password_confirm) {
    $_SESSION['error'] = "Password and Confirm Password do not match.";
    header("Location: ../login?error=true");
    exit();
}

// You can add more validation logic here

// If all validation passes, you can process the signup (for example, save to a database)
// Replace the following with your actual signup logic

// For demonstration purposes, let's just print the form data
echo "First Name: $first_name<br>";
echo "Last Name: $last_name<br>";
echo "Username: $username<br>";
echo "Email: $email<br>";
echo "Password: $password<br>";

// You should replace the above with your actual signup logic (e.g., save to a database)

// Clear the old values session variable
unset($_SESSION['old_values']);
?>
