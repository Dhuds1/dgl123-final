<?php

$user_name = 'Evelynn';
require 'autoloader.php';
require 'partial/nav.php';
function get_dependencies($file, $location){
    return require "$location/$file.$location.php";
}