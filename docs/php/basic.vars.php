<?php
// USER VARS
$user_name = "evelynn";
$addto_user_cart = "send this information to user cart";
// STORE VARS
$store_info = [
    "rating" => 4.4,
    "orders_total" => 99,
    "name" => "store-name",
    "display_name" => "Store Name",
];

// PRODUCT VARS, CHILD OF STORE
$product_info = [
    "name" => "product name",
    "post_page" => "product",
    "image_thumb" => "#",
    "image_alt" => "",
    "price" => 99,
];

// NAV VARIABLES
if ($user_name) {
    $user_logged = true;
    $user_store = true;
    $store_product_list = true;

    $user_cart = [
        [
            "quantity" => 1,
        ]
        
    ];
} else {
    $user_logged = false;
    $user_store = false;
    $store_product_list = false;
}