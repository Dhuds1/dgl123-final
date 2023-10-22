<?php
// MAIN PAGES
Route::set('index', function(){
    Route::$page_title = "Cracked Unicorn | Home";
});
Route::set('about', function() {
    Route::$page_title = "CrackedUnicorn | About Us";
});
Route::set('contact', function(){
    $page_title = "CrackedUnicorn | Contact Us";
});
Route::set('policy', function(){
    Route::$page_title = "CrackedUnicorn | Privacy Policy";
});
// END OF MAIN PAGES

// STORE PAGES
Route::set('create-store', function(){
    Route::$page_title = "Create Store";
});
Route::set('store', function(){
    Route::$page_title = $store["display_name"];
    echo "store";
});
Route::set('products', function(){
    Route::$page_title = "products";
});
Route::set('manage-store', function(){
    Route::$page_title = "Manage | ".$store['display_name'];
});
Route::set('manage-product', functioN(){
    Route::$page_title = "Create Store";
});
Route::set('manage-orders', function(){
    Route::$page_title = "Manage | ".$product['name'];
});
// END OF STORE PAGES

// USER PAGES
Route::set('wishlist', function(){
    Route::$page_title = $user_name. "'s | Wishlist";
});
Route::set('cart', function(){
    Route::$page_title = $user_name. "'s | Cart";
});
Route::set('notifications', function(){
    Route::$page_title = "$user_name's Notification Center";
});
Route::set('public-profile', function(){
    Route::$page_title = "$user_name's Profile";
});
Route::set('user-settings', function(){
    Route::$page_title = "Account Manager";
});
Route::set('orders', function(){
    Route::$page_title = "$user_name's Orders";
});
// END OF USER PAGES
