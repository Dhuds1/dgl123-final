<?php
   function get_name(){
      if(isset($_GET["name"])){
         return $_GET["name"];
      }
   }
   function get_store($slug){
      require 'controller/statements.php';
      $storeQuery = new DB($config['database'], $config['accessor']['user'], $config['accessor']['pass'], 'cracked');
      $storeQuery->query("SELECT * FROM cracked_store where slug =:slug", ["slug"=> $slug]);
      $store = $storeQuery->find();
      return $store;
   }
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
   <?php foreach ($products as $product): ?>
      <?php $store = get_store_data($product['store_id']) ?>
      <div class="card__product">
         <span class="card__product-wishlist"><i class="fa fa-lg fa-heart" aria-hidden="true"></i></span>
         <a href="product?name=<?= $product['slug'] ?>">
            <div class="card__product-image">
               <img src="data:image/jpeg;base64,<?= base64_encode($product['image']) ?>">
            </div>
            <h2 class="card__product-title">
               <?= $product['name'] ?>
            </h2>
            <?php if($store['slug'] !== get_name()): ?>
            <h3 class="card__product-store">
               <span class="card__store-ratings">
                  <?= $store['rating'] ?> &starf;
               </span>
               <span class="card__store-purchases">
                  <?= $store['orders'] ?> &SmallCircle;
               </span>
               <?= $store['name'] ?>
            </h3>
            <?php endif ?>
            <h2 class="card__product-price">$
               <?= $product['price'] ?>
            </h2>
         </a>
         <a href="<?= $user_cart ?>">
            <button class="card__btn-cart">&plus; Add To Cart</button>
         </a>
      </div>
   <?php endforeach; ?>
</div>