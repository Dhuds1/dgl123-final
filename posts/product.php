<div class="page__content-wrapper">
    <h1><?= $product['name']?></h1>
    <div class="product__image">
        <img src="data:image/jpeg;base64,<?= base64_encode($product['image']) ?>">
    </div>
    Price <?= $product['price'] ?>
    Available <?= $product['quantity'] ?>
    Description <?= $product['description'] ?>
    Specifications <?= $product['specification'] ?>
</div>