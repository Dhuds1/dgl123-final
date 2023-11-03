<?php 
    require "loader.php";
    require "controller/statements.php";
    $name = $_GET["name"];
    $query_store = new DB($config['database'], $config['accessor']['user'], $config['accessor']['pass'], 'cracked');

// Query to retrieve store data based on the slug
$query_store->query("SELECT * FROM cracked_store WHERE slug = :slug", ["slug" => $name]);
$store = $query_store->find();
if ($store) {
    // Get the user_id from the store result
    $user_id = $store['user_id'];
    // Query to retrieve the username based on the user_id
    $query_store->query("SELECT username FROM cracked_user WHERE id = :user_id", ["user_id" => $user_id]);
    $owner = $query_store->find();
}
    echo '<div class="store__wrapper">';
    require 'posts/store.php';
    echo '</div>';