<div class="card__product">
    <span class="card__product-wishlist"><i class="fa fa-lg fa-heart" aria-hidden="true"></i>
    </span>
    <a href=<?= $product_info['post_page'] ?>>
        <div class="card__product-image">
            <img src=<?= $product_info['image_thumb'] ?> alt=<?= $product_info['image_alt'] ?>>
        </div>
        <h2 class="card__product-title"><?= $product_info['name'] ?></h2>
        <h3 class="card__product-store">
            <span class="card__store-ratings"><?= $store_rating ?> &starf;</span>
            <span class="card__store-purchases"><?= $store_orders_total?> &SmallCircle;</span>
            <?= $store_name ?>
        </h3>
        <h2 class="card__product-price">$<?= $product_price ?></h2>
    </a>
    <a href=<?= "$user_cart"?> data-product=<?= "$addto_user_cart"?>><button class="card__btn-cart">&plus; Add To Cart</button></a>
</div>