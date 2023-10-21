<?php
/*
    TEMPORARY REQUIREMENTS
*/
require 'basic.vars.php';
// END OF TEMP REQUIREMENTS

require 'partial/head.php';
require 'partial/nav.php';

function get_dependencies($file, $location){
    return require "$location/$file.$location.php";
}