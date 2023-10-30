<?php
session_start();

require "statements.php";
require "classes/DB.php";

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $user_name = $_POST['user_name'];
    $user_password = $_POST['password'];

    try {
        if (authenticate_user($user_name, $user_password, $prep_statement)) {
            $_SESSION['username'] = $user_name;
            header('Location: index.php');
            exit();
        }
    } catch (Exception $e) {
        if ($e->getMessage() == 'InvalidUsername') {
            echo "Invalid username, please try again";
        } elseif ($e->getMessage() == "InvalidPassword") {
            echo "Invalid password, please try again";
        } else {
            echo "Authentication issue, please try again later";
        }
    }
}

function authenticate_user($username, $password, $prep_statement) {
    $login_retrieve_query = $prep_statement['login']['retrieve'];

    // Wrap the database query in an anonymous function
    $get_user_data = function () use ($username, $login_retrieve_query) {
        require_once 'connections.php';
        $acc = $accessor['users_login']; // Adjust the accessor key
        $login = new DB($acc['host'], $acc['user'], $acc['password'], $acc['db']);
        $result = $login->query($login_retrieve_query);
        $user_data = $result->fetch_assoc();
        return $user_data;
    };
    $user_data = $get_user_data();

    if ($user_data) {
        if (password_verify($password, $user_data['user_password'])) {
            return true;
        } else {
            throw new Exception("InvalidPassword");
        }
    } else {
        throw new Exception("InvalidUsername");
    }
}