<div class="card__product">
    <span class="card__product-wishlist"><i class="fa fa-lg fa-heart" aria-hidden="true"></i>
    </span>
    <a href=<?= '\''.$product_post_page.'\'' ?>>
        <div class="card__product-image">
            <img <?= '\''.$product_thumbnail_image.'\'' ?> alt="">
        </div>
        <h2 class="card__product-title"><?= $store_produce_name ?></h2>
        <h3 class="card__product-store">
            <span class="card__store-ratings"><?= $store_rating ?> &starf;</span>
            <span class="card__store-purchases"><?= $store_orders_total?> &SmallCircle;</span>
            <?= $store_name ?>
        </h3>
        <h2 class="card__product-price">$<?= $product_price ?></h2>
    </a>
    <a href=<?= '\''.$user_cart.'\'' ?>><span class="card__btn-cart">&plus; Add To Cart</span></a>
</div>