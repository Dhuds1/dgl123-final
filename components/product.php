<div class="card__product">
    <span class="card__product-wishlist"><i class="fa fa-lg fa-heart" aria-hidden="true"></i>
    </span>
    <a href=<?= $product_info['post_page'] ?>>
        <div class="card__product-image">
            <img src=<?= $product_info['image_thumb'] ?> alt=<?= $product_info['image_alt'] ?>>
        </div>
        <h2 class="card__product-title"><?= $product_info['store_name'] ?></h2>
        <h3 class="card__product-store">
            <span class="card__store-ratings"><?= $product_info['store_rating'] ?> &starf;</span>
            <span class="card__store-purchases"><?= $product_info['store_total_orders']?> &SmallCircle;</span>
            <?= $product_info['name'] ?>
        </h3>
        <h2 class="card__product-price">$<?= $product_info['price'] ?></h2>
    </a>
    <a href=<?= $user_cart=null ?>><button class="card__btn-cart">&plus; Add To Cart</button></a>
</div>