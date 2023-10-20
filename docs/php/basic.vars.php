<?php
// USER VARS
$user_name = "Evelynn";
$addto_user_cart = "send this information to user cart";
// STORE VARS
$store = [
    "rating" => 4.4,
    "reviews" => 9,
    "orders_total" => 999,
    "items_total" => 99,
    "name" => "store-name",
    "display_name" => "Store Name",
    "store_banner" => "#",
    "store_banner_alt" => "",
    "store_image" => "#",
    "store_image_alt" => "",
    "tagline" => "The More You Eat",
];

// PRODUCT VARS, CHILD OF STORE
$product = [
    [  
        "store_name" => $store['display_name'],
        "store_rating" => $store['rating'],
        "store_reviews" => $store['reviews'],
        "store_total_orders" => $store["orders_total"],
        "name" => "product name",
        "post_page" => "product",
        "image_thumb" => "#",
        "image_alt" => "",
        "price" => 99,
    ],
    [  
        "store_name" => $store['display_name'],
        "store_rating" => $store['rating'],
        "store_reviews" => $store['reviews'],
        "store_total_orders" => $store["orders_total"],
        "name" => "product name",
        "post_page" => "product",
        "image_thumb" => "#",
        "image_alt" => "",
        "price" => 99,
    ],
    [  
        "store_name" => $store['display_name'],
        "store_rating" => $store['rating'],
        "store_reviews" => $store['reviews'],
        "store_total_orders" => $store["orders_total"],
        "name" => "product name",
        "post_page" => "product",
        "image_thumb" => "#",
        "image_alt" => "",
        "price" => 99,
    ],
    [  
        "store_name" => $store['display_name'],
        "store_rating" => $store['rating'],
        "store_reviews" => $store['reviews'],
        "store_total_orders" => $store["orders_total"],
        "name" => "product name",
        "post_page" => "product",
        "image_thumb" => "#",
        "image_alt" => "",
        "price" => 99,
    ],
    [  
        "store_name" => $store['display_name'],
        "store_rating" => $store['rating'],
        "store_reviews" => $store['reviews'],
        "store_total_orders" => $store["orders_total"],
        "name" => "product name",
        "post_page" => "product",
        "image_thumb" => "#",
        "image_alt" => "",
        "price" => 99,
    ],
    
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