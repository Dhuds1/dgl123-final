<?php 
// CALL BEFORE REQUIRES !IMPORTANT
$page = "Wishlist";

?>


<?php require "php/loader.php"; ?>
<div class="wrapper">
   <h1><?= $user_name?>'s Wishlist</h1>
   <?php require "php/components/product.loader.php"; ?>
</div>