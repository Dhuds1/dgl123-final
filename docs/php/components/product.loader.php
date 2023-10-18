<div class="product__wrapper">
   <?php foreach ( $product as $products ): ?>
      <div class="card__product">
         <span class="card__product-wishlist"><i class="fa fa-lg fa-heart" aria-hidden="true"></i>
      </span>
      <a href=<?= $products['post_page'] ?>>
         <div class="card__product-image">
            <img src=<?= $products['image_thumb'] ?> alt=<?= $products['image_alt'] ?>>
         </div>
         <h2 class="card__product-title"><?= $products['store_name'] ?></h2>
         <h3 class="card__product-store">
            <span class="card__store-ratings"><?= $products['store_rating'] ?> &starf;</span>
            <span class="card__store-purchases"><?= $products['store_total_orders']?> &SmallCircle;</span>
            <?= $products['name'] ?>
         </h3>
         <h2 class="card__product-price">$<?= $products['price'] ?></h2>
      </a>
    <a href=<?= $user_cart=null ?>><button class="card__btn-cart">&plus; Add To Cart</button></a>
   </div>
   <?php endforeach; ?>
</div>