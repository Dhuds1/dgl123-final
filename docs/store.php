<?php 
require 'php/basic.vars.php';
// CALL BEFORE REQUIRES !IMPORTANT
$page = $store['display_name'];

?>
<?php
require 'php/partial/head.php';
require 'php/partial/nav.php';
echo '<div class="store__wrapper">';
require 'php/components/store.comp.php';
echo '</div>';