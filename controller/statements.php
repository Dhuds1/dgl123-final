<?php
// CONNECTIONS
$config = [
    "database"=> [
        "host"=> "localhost",
        "port"=> "3306",
        "db" => "cracked",
        "charset"=> "utf8mb4"
    ],
    "accessor" => [
        "user" => 'accessor',
        "pass" => "passwordUwU:3"//friend came up with this impenetrable password
    ]
];

// STATEMENTS

// user WISHLIST
// user PROFILE
// user CART
$prep_statement = [
    // USERS
    // USER SIGNUP
    "signup"=> [
        "check_email_user" => "SELECT users_name FROM cracked_users WHERE users_name = ? OR users_email = ?",
        "insert" => "INSERT INTO cracked_users (users_name, users_email, users_password, users_salt, users_firstName, users_lastName, users_DOB, users_gender) VALUES (?, ?, ?, ?, ?, ?, ?, ?);"],
    // USER LOGIN
    "login" => [
        "retrieve" => "SELECT users_password, users_salt FROM cracked_users WHERE users_name = ? OR users_email = ?"
    ],
    // USER WISHLIST
    "wishlist" => [
        "retrieve" => "SELECT * FROM cracked_wishlist WHERE users_id = ? OR is_public = 1;",
    ],
    // USER CART
    "cart"=> [
        "retrieve" => "SELECT * FROM cracked_cart WHERE users_id = ?;",
        "add" => "INSERT INTO cracked_cart (users_id, users_name, store_name, product_name, product_style, product_quantity) VALUES (?, ?, ?, ?, ?, ?);"
    ],
];
// STORE
// store CREATE
// store MANAGE
// store ORDERS
// store MANAGE PRODUCT

// PRODUCT
// product SEARCH
// product POST
// product DELETE
// product EDIT

// SETTINGS
// settings USER