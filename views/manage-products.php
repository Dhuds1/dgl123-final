<?php
$products = get_products();
?>
<style>
   .product-wrapper {
      position: relative;
   }

   input.file__upload-image {
      display: none !important;
   }

   .edit__product {
      text-decoration: none;
      color: black;
   }

   .edit__product h3 {
      font-weight: 600;
      margin-top: 10px;
   }

   .text-area {
      padding: 5px;
      border: 1px solid black;
      height: 75px;
      margin-top: 5px;
      overflow: auto;
   }

   .product-edit-btn {
      --clr: var(--colr);
      display: inline-block;
      padding: 10px;
      margin-top: 10px;
      border: 1px solid black;
      background-color: var(--clr-2);
      color: black;
      text-decoration: none;
      border-radius: 5px;
   }

   .product-edit-container {
      display: flex;
      justify-content: center;
      gap: 5px;
      text-align: center;
   }

   .edit {
      --clr-2: mediumspringgreen;
      width: 80%;
   }

   .hide {
      --clr-2: orange;
   }

   .remove {
      --clr-2: #D8524B;
   }
</style>
<div class="wrapper display__grid">
   <h1 style="grid-column: 1 / span 4; margin-bottom: 1rem;">
      Product manager
      <a href="add-new-product">Add New</a>
   </h1>
   <!-- loop through each product -->
   <?php foreach ($products as $product): ?>
      <div class="product-wrapper">
         <div class="card__product-image">
            <!-- Update the data-foo attribute to a class, and add a class to the file input -->
            <img name="product-image" style="background-color:#<?= $store['highlight_color'] ?>"
               src="data:image/jpeg;base64,<?= base64_encode($product['image']) ?>" alt="">
         </div>
         <h2>
            <?= $product['name'] ?>
         </h2>
         <h3>Description</h3>
         <p class="text-area">
            <?= isset($product['description']) ? $product['description'] : '' ?>
         </p>
         <h3>Specs</h3>
         <p class="text-area">
            <?= isset($product['specification']) && $product['specification'] != null ? $product['specification'] : 'None' ?>
         </p>
         <h3>Price</h3>
         <p>
            <?= $product['price'] ?>
         </p>
         <h3>Quantity</h3>
         <p>
            <?= isset($product['quantity']) ? $product['quantity'] : 'no limit' ?>
         </p>
         <div class="product-edit-container">
            <a href="edit-product?id=<?= $product['id'] ?>&name=<?= $product['slug'] ?>" data=""
               class="product-edit-btn edit">Edit</a>
         </div>
      </div>
   <?php endforeach; ?>
</div>