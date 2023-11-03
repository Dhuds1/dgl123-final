<?php
require 'basic.vars.php';
// MAIN PAGES
Route::set('index', function(){
    Route::$page_title = "Cracked Unicorn | Home";
});
Route::set('store', function(){
    Route::$page_title = 'Cracked Unicorn | Store';
});
Route::set('', function(){
Route::$page_title = '';
});
Route::load_view();