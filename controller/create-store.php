<?php
session_start();
if (!isset($_SESSION["store_name"])){
    header("Location: ../index");
    exit();
}
require "../autoloader.php";
require "statements.php";
require "../debug.php";
$usersDB = new DB($config['database'], $config['accessor']['user'], $config['accessor']['pass'], 'cracked');
$name = $_POST['store_name'];
$slug = $_POST['slug'];

echo $slug." ".$name." ".$_SESSION['user_id'];
$sql = "INSERT INTO cracked_store (user_id, name, slug) VALUES (:id, :name, :slug)";
$param = [":id" => $_SESSION['user_id'], ':name'=> $name, ':slug'=> $slug];
dd($_SESSION);
try {
    $usersDB->query($sql, $param);
    $_SESSION['store'] = $slug;
    header('Location ../manage-store');
}catch (PDOException $e) {
    echo $e->getMessage();
}
