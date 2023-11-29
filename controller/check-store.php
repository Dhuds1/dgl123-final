<?php
session_start();
require "../autoloader.php";
require "statements.php";
$usersDB = new DB($config);
$name = $_POST['check_store_name'];
$_SESSION['store_name'] = $name;
if (empty($name)) {
    $_SESSION['error'] = "Please enter a name";
    header("Location: ../create-store");
    exit();
}

$data = $usersDB->clean_data($name);
$slug = $data['slug'];
if ($usersDB->get_store_name($slug)) {    
    $_SESSION['error'] = $data['clean'] . " already exists";
    header("Location: ../create-store");
    exit();
} else {
    $_SESSION["success"] = $data;
    header("Location: ../create-store");
    exit();
}