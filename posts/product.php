<div class="page__content-wrapper">
    <div class="">
        <div class="solo-product__wrapper">
        <div class="product__image">
            <img src="data:image/jpeg;base64,<?= base64_encode($product['image']) ?>">
        </div>
        <div class="product__info">
        <h1><?= $product['name']?></h1>
            <br>
            Price: <?= $product['price'] ?>
            <br>
            Available: <?=  $product['quantity'] === null ? "No Limit" :$product['quantity'] ?>
            <br>
            Description: <?= $product['description'] ?>
            <br>
            Specifications: <?= $product['specification'] ?>
            <br>
            <br>
            <button>Buy Now</button>
        </div>
    </div>
</div>