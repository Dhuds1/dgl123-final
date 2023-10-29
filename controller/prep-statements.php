<?php
/*
    dummy structure of what I think I want
*/

// user WISHLIST
// user PROFILE
// user CART
$prep_statement = [
    // USERS
    // USER SIGNUP
    "signup"=> [
        "check_username" => "SELECT * FROM cracked_users WHERE user_name = ?;",
        "check_email"=> "SELECT * FROM cracked_users WHERE user_email = ?",
        "insert" => "INSERT INTO cracked_users (user_name, user_email, user_password, user_salt, user_firstName, user_lastName, user_DOB, user_gender) VALUES (?, ?, ?, ?, ?, ?, ?, ?);"],
    // USER LOGIN
    "login" => [
        "retrieve" => "SELECT user_password, user_salt FROM cracked_users WHERE user_name = ? OR user_email = ?"
    ],
    // USER WISHLIST
    "wishlist" => [
        "retrieve" => "SELECT * FROM cracked_wishlist WHERE user_id = ? OR is_public = 1;",
    ],
    // USER CART
    "cart"=> [
        "retrieve" => "SELECT * FROM cracked_cart WHERE user_id = ?;",
        "add" => "INSERT INTO cracked_cart (user_id, user_name, store_name, product_name, product_style, product_quantity) VALUES (?, ?, ?, ?, ?, ?);"
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