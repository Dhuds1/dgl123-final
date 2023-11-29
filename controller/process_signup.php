<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
   header("Location: ../login");
   exit();
}
// CODE GENERATED WITH CHAT GPT'S HELP, CAUSE IM LAZY AND IDC LMAOO
// Start the session
require "../autoloader.php";
require "statements.php";

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

$errors = []; // Initialize an array to store errors

// Add more validation as needed
if (empty($first_name) || empty($last_name) || empty($username) || empty($email) || empty($email_confirm) || empty($password) || empty($password_confirm)) {
    $errors[] = "All fields are required. Please fill out the entire form.";
}

if ($email !== $email_confirm) {
    $errors[] = "Email's do not match.";
}

if ($password !== $password_confirm) {
    $errors[] = "Password's do not match.";
}

// Assuming $config is defined somewhere in your code
$usersDB = new DB($config);

if ($usersDB->check_value('email', $email)) {
    $errors[] = "$email is already taken, please try another email.";
}

if ($usersDB->check_value('username', $username)) {
    $errors[] = "$username is already taken, please try another username.";
}

// Check if there are any errors
if (!empty($errors)) {
    // If there are errors, store them in the session and redirect
    $_SESSION['error'] = implode("<br>", $errors);
    header("Location: ../login?error=true");
    exit();
}

// Proceed with user creation
create_user($_POST, $usersDB);

// Redirect and unset session variables

header("Location: ../login");
unset($_SESSION['old_values']);

function create_user($postData, $usersDB) {

    $first_name = $postData['first_name'];
    $last_name = $postData['last_name'];
    $username = $postData['username'];
    $email = $postData['email'];

    $password = password_hash($postData['password'], PASSWORD_BCRYPT); // Hash the password for security

    // Prepare the SQL statement for inserting data
    $sql = "INSERT INTO cracked_user (firstname, lastname, username, email, password) VALUES (:firstname, :lastname, :username, :email, :password)";
    $parameters = [
        ":firstname"=> $first_name,
        ":lastname"=> $last_name,
        ':username' => $username,
        ':email' => $email,
        ':password' => $password,
    ];

    // Execute the SQL statement
    $usersDB->query($sql, $parameters);

    // Check if the user was successfully registered
    if ($usersDB->rowCount() > 0) {
        // Automatically log in the user
        $user = $usersDB->check_login($username, $postData['password']);

        if ($user) {
            // Login successful
            session_start();
            $_SESSION['username'] = $user['username']; // Store the username in the session
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['store'] = $usersDB->get_store($user['id']);
            header("Location: ../account"); // Redirect to the dashboard or another secured page
            exit();
        } else {
            // Login failed
            echo "Error logging in after registration.";
        }
    } else {
        // Registration failed
        echo "Error registering user.";
    }
}

