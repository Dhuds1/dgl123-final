<?php
session_start();
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
    // Wrap the database query in an anonymous function
    $get_user_data = function () use ($username) {
        require_once 'statements.php';
        $login_retrieve_query = $prep_statement['login']['retrieve'];
        
        $login = new DB($config['database'], $config['accessor']['user'], $config['accessor']['pass']);
        $result = $login->query($login_retrieve_query, $username);
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