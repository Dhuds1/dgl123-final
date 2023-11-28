<?php
   // Get the store name from URI
   function get_name(){
      if(isset($_GET["name"])){
         return $_GET["name"];
      }
   }
   // Get the store slug from database
   function get_store($slug){
      require 'controller/statements.php';
      $storeQuery = new DB($config['database'], $config['accessor']['user'], $config['accessor']['pass'], 'cracked');
      $storeQuery->query("SELECT * FROM cracked_store where slug =:slug", ["slug"=> $slug]);
      $store = $storeQuery->find();
      return $store;
   }
   // Get the store ID
   function get_store_data($id) {
      require 'controller/statements.php';
      $storeQuery = new DB($config['database'], $config['accessor']['user'], $config['accessor']['pass'], 'cracked');
      $storeQuery->query("SELECT * FROM cracked_store where id = :id", ["id" => $id]);
      $store = $storeQuery->find();
      return $store;
   }
try {
   if(isset($_GET['name'])){
      $name = $_GET['name'];
      $store = get_store($name);
      $productQuery = new DB($config['database'], $config['accessor']['user'], $config['accessor']['pass'], 'cracked');
      $productQuery->query("SELECT * FROM cracked_product WHERE store_id = :id", ["id" => $store['id']]);
      $products = $productQuery->findAll();
   }else{
      $productQuery = new DB($config['database'], $config['accessor']['user'], $config['accessor']['pass'], 'cracked');
      $productQuery->query($prep_statement['product']['retrieve']);
      $products = $productQuery->findAll();
   }

   // Query store information

} catch (PDOException $e) {
   // Handle database query errors, e.g., log or display an error message.
   echo "An error occurred: " . $e->getMessage();
}
?>

<div class="product__wrapper">
   <!-- Loop through each product that is retrived from the DATABASE -->
   <?php foreach ($products as $product): ?>
      <!-- I don't remember why I am retriving the store ID... But its most likely important!.. -->
      <?php $store = get_store_data($product['store_id']) ?>
      <div class="card__product">
         <span class="card__product-wishlist"><i class="fa fa-lg fa-heart" aria-hidden="true"></i></span>
         <!-- This links to the product post page -->
         <a href="product?name=<?= $product['slug'] ?>">
            <div class="card__product-image">
               <!-- Product Thumbnail image -->
               <img src="data:image/jpeg;base64,<?= base64_encode($product['image']) ?>">
            </div>
            <h2 class="card__product-title">
               <!-- Product name -->
               <?= $product['name'] ?>
            </h2>
            <!-- if the product is being loaded in a store page, IT WILL NOT PRINT THIS -->
            <?php if($store['slug'] !== get_name()): ?>
            <h3 class="card__product-store">
               <span class="card__store-ratings">
                  <!-- STORE RATING -->
                  <?= $store['rating'] ?> &starf;
               </span>
               <span class="card__store-purchases">
                  <!-- STORE TOTAL ORDERS DONE -->
                  <?= $store['orders'] ?> &SmallCircle;
               </span>
               <!-- THE NAME OF THE STORE -->
               <a style="text-decoration: underline;" href="store?name=<?= $store['slug'] ?>"><?= $store['name'] ?></a>
            </h3>
            <?php endif ?>
            <!-- END OF CONDITIONAL PRINTING STATEMENT -->
            <h2 class="card__product-price">$
               <?= $product['price'] ?>
            </h2>
         </a>
         <!-- NO functionality right now, but will add the product to the users cart -->
         <a href="<?= $user_cart ?>">
            <button class="card__btn-cart">&plus; Add To Cart</button>
         </a>
      </div>
   <?php endforeach; ?>
</div>