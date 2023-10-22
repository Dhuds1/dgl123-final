<?php 
require 'basic.vars.php';
// CALL BEFORE REQUIRES !IMPORTANT
$page = $store['display_name'];

require 'loader.php';
echo '<div class="store__wrapper">';
require 'components/store.comp.php';
echo '</div>';