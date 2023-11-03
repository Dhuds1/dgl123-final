<?php 
$productQuery = new DB($config['database'], $config['accessor']['user'], $config['accessor']['pass'], 'cracked');
$productQuery->query($prep_statement['product']['retrieve']);
$products = $productQuery->findAll();
?>
<div class="product__wrapper">
   <?php foreach ( $products as $product => $product_data ) : ?>
      <div class="card__product">
         <span class="card__product-wishlist"><i class="fa fa-lg fa-heart" aria-hidden="true"></i>
      </span>
      <a href=<?= $product_data['post_page'] ?>>
         <div class="card__product-image">
            <img src=<?= $product_data['image_thumb'] ?> alt=<?= $product_data['image_alt'] ?>>
         </div>
         <h2 class="card__product-title"><?= $product_data['name'] ?></h2>
         <?php if(getURI($_SERVER['REQUEST_URI']) !== $product_data['store_uri']) :?>
         <h3 class="card__product-store">
            <span class="card__store-ratings"><?= $product_data['store_rating'] ?> &starf;</span>
            <span class="card__store-purchases"><?= $product_data['store_total_orders']?> &SmallCircle;</span>
            <?= $product_data['store_name'] ?>
         </h3>
         <?php endif ?>
         <h2 class="card__product-price">$<?= $product_data['price'] ?></h2>
      </a>
    <a href=<?= $user_cart=null ?>><button class="card__btn-cart">&plus; Add To Cart</button></a>
   </div>
   <?php endforeach; ?>
</div>
<?php 
   function getURI($list){
      $uri = $list;
      $uriParts = array_filter(explode('/', $uri));
      return end($uriParts);
   }
?>