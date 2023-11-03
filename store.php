<?php 
    require "loader.php";
    require "controller/statements.php";
    $name = $_GET["name"];
    $store = new DB($config['database'], $config['accessor']['user'], $config['accessor']['pass'], 'cracked');
    $store->query("SELECT * FROM cracked_store WHERE slug = :slug", ["slug"=> $name]);
    $store = $store->find();
    echo '<div class="store__wrapper">';
    require 'posts/store.php';
    echo '</div>';