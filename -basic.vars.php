<?php
// USER VARS
// My cute little temporary variable form
$user_name = "Username";
$addto_user_cart = "send this information to user cart";
// STORE VARS
$store = [
    "store1" => [
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
    ],
    "store2" => [
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
    ],
    "store3" => [
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
    ],
    "store4" => [
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
    ],
];

// PRODUCT VARS, CHILD OF STORE
$product = [
    [  
        "store_name" => $store['store1']['display_name'],
        'store_uri'=> $store['store1']['name'],
        "store_rating" => $store['store1']['rating'],
        "store_reviews" => $store['store1']['reviews'],
        "store_total_orders" => $store['store1']["orders_total"],
        "name" => "product name",
        "post_page" => "product",
        "image_thumb" => "#",
        "image_alt" => "",
        "price" => 99,
    ],
    [  
        "store_name" => $store['store1']['display_name'],
        'store_uri'=> $store['store1']['name'],
        "store_rating" => $store['store1']['rating'],
        "store_reviews" => $store['store1']['reviews'],
        "store_total_orders" => $store['store1']["orders_total"],
        "name" => "product name",
        "post_page" => "product",
        "image_thumb" => "#",
        "image_alt" => "",
        "price" => 99,
    ],
    [  
        "store_name" => $store['store1']['display_name'],
        'store_uri'=> $store['store1']['name'],
        "store_rating" => $store['store1']['rating'],
        "store_reviews" => $store['store1']['reviews'],
        "store_total_orders" => $store['store1']["orders_total"],
        "name" => "product name",
        "post_page" => "product",
        "image_thumb" => "#",
        "image_alt" => "",
        "price" => 99,
    ],
    [  
        "store_name" => $store['store1']['display_name'],
        'store_uri'=> $store['store1']['name'],
        "store_rating" => $store['store1']['rating'],
        "store_reviews" => $store['store1']['reviews'],
        "store_total_orders" => $store['store1']["orders_total"],
        "name" => "product name",
        "post_page" => "product",
        "image_thumb" => "#",
        "image_alt" => "",
        "price" => 99,
    ],
    [  
        "store_name" => $store['store1']['display_name'],
        'store_uri'=> $store['store1']['name'],
        "store_rating" => $store['store1']['rating'],
        "store_reviews" => $store['store1']['reviews'],
        "store_total_orders" => $store['store1']["orders_total"],
        "name" => "product name",
        "post_page" => "product",
        "image_thumb" => "#",
        "image_alt" => "",
        "price" => 99,
    ],
    [  
        "store_name" => $store['store1']['display_name'],
        'store_uri'=> $store['store1']['name'],
        "store_rating" => $store['store1']['rating'],
        "store_reviews" => $store['store1']['reviews'],
        "store_total_orders" => $store['store1']["orders_total"],
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