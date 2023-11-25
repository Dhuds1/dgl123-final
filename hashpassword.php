<?php
require "controller/statements.php";
require "loader.php";
require "autoloader.php";

$pdo = new DB($config['database'], $config['accessor']['user'], $config['accessor']['pass'], 'cracked');

// Retrieve clear text passwords from the database
$stmt = $pdo->queryAll('SELECT id, password FROM cracked_user');
$users = $stmt;

// Hash and update each password
foreach ($users as $user) {
    $hashedPassword = password_hash($user['password'], PASSWORD_BCRYPT);
    $updateStmt = $pdo->query("UPDATE cracked_user SET password = :hashedPassword WHERE id = :id", ['hashedPassword' => $hashedPassword, 'id' => $user['id']]);
}

echo "Passwords hashed and updated successfully!";
?>
