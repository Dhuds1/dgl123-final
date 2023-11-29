<?php
require "controller/statements.php";
require "loader.php";
require "autoloader.php";

$pdo = new DB($config['database'], $config['accessor']['user'], $config['accessor']['pass'], 'cracked');

// Retrieve clear text passwords from the database
$stmt = $pdo->queryAll('SELECT id, name FROM cracked_user');
$users = $stmt;

// Hash and update each password
foreach ($users as $user) {
    $names = explode(' ', $user['name']);

    // Assuming you want to update the firstname and lastname columns based on the exploded names
    $sql = "UPDATE cracked_user SET firstname = :firstname, lastname = :lastname WHERE id = :id";
    $params = [
        ':id' => $user['id'],
        ':firstname' => $names[0],
        ':lastname' => $names[1]
    ];

    // Execute the update query
    $pdo->query($sql, $params);

    // Output the result
    echo $names[0] . " " . $names[1] . "<br>";
}
