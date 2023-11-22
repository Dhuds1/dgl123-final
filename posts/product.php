<div class="page__content-wrapper">
    <div class="">
        <div class="solo-product__wrapper">
        <div class="product__image">
            <!-- LOADS PRODUCT IMAGE -->
            <img src="data:image/jpeg;base64,<?= base64_encode($product['image']) ?>">
        </div>
        <div class="product__info">
            <!-- LOAD PRODUCT NAME -->
        <h1><?= $product['name']?></h1>
            <br>
            <!-- LOAD PRODUCT PRICE -->
            Price: <?= $product['price'] ?>
            <br>
            <!-- LOAD QUANTITY, IF NO QUANTITY ASSIGNED, SAY NO LIMIT -->
            Available: <?=  $product['quantity'] === null ? "No Limit" :$product['quantity'] ?>
            <br>
            <!-- LOAD PRODUCT DESCRIPTON -->
            Description: <?= $product['description'] ?>
            <br>
            <!-- LOAD PRODUCT SPECIFICATIONS -->
            Specifications: <?= $product['specification'] ?>
            <br>
            <br>
            <!-- NO FUNCTIONALITY, WILL EITHER SEND TO A CHECKOUT PAGE OR PLACE ITEM INTO A CART -->
            <button>Buy Now</button>
        </div>
    </div>
</div>