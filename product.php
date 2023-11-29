<?php 
    require "loader.php";
    require "controller/statements.php";
    $name = $_GET["name"];
    $query_product = new DB($config['database'], $config['accessor']['user'], $config['accessor']);;

// Query to retrieve store data based on the slug
$query_product->query("SELECT * FROM cracked_product WHERE slug = :slug", ["slug" => $name]);
$product = $query_product->find();
require "posts/product.php";