<?php
// CODE WRITTEN BY CHAT GPT
// Start the session
require "../autoloader.php";
session_start();

// Check for error session variable
if (isset($_SESSION['error'])) {
    $error_message = $_SESSION['error'];
    echo "<p style='color: red;'>Error: $error_message</p>";

    // Clear the error session variable
    unset($_SESSION['error']);
}

// Check for old_values session variable and populate form fields
$old_values = isset($_SESSION['old_values']) ? $_SESSION['old_values'] : [];

?>

<form action="controller/process_signup.php" method="post">
    <label for="first_name">First Name:</label>
    <input type="text" id="first_name" name="first_name" value="<?= isset($old_values['first_name']) ? $old_values['first_name'] : '' ?>" required><br><br>

    <label for="last_name">Last Name:</label>
    <input type="text" id="last_name" name="last_name" value="<?= isset($old_values['last_name']) ? $old_values['last_name'] : '' ?>" required><br><br>

    <label for="username">Username:</label>
    <input type="text" id="username" name="username" value="<?= isset($old_values['username']) ? $old_values['username'] : '' ?>" required><br><br>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" value="<?= isset($old_values['email']) ? $old_values['email'] : '' ?>" required><br><br>

    <label for="email_confirm">Confirm Email:</label>
    <input type="email" id="email_confirm" name="email_confirm" value="<?= isset($old_values['email_confirm']) ? $old_values['email_confirm'] : '' ?>" required><br><br>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required><br><br>

    <label for="password_confirm">Confirm Password:</label>
    <input type="password" id="password_confirm" name="password_confirm" required><br><br>

    <input type="submit" value="Sign Up">
</form>
