<?php
/*
    TEMPORARY REQUIREMENTS
*/
require 'basic.vars.php';
// END OF TEMP REQUIREMENTS


require 'partial/head.php';
require 'autoloader.php';
require 'partial/nav.php';
echo "<div class='wrapper card__wrapper'>";
require "components/filters.comp.php";
require 'components/product.comp.php';
echo "</div>";
function get_dependencies($file, $location){
    return require "$location/$file.$location.php";
}