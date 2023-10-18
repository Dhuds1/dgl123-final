<?php
require 'php/loader.php';
echo "<div class='wrapper card__wrapper'>";
require "php/components/filters.comp.php";
require 'php/components/product.loader.php';
echo "</div>";
get_dependencies('index', 'view');