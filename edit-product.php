<?php
require "loader.php";
if (!isset($_GET['id']) || !isset($_GET['name'])) {
   header('Location: manage-products');
   exit();
}
$usersDB = new DB($config['database'], $config['accessor']['user'], $config['accessor']['pass'], 'cracked');
$store = $usersDB->get_store($_SESSION['user_id']);
$products = $usersDB->get_products_byID($store['id'], $_GET['id']);
if($store['id'] !== $products['store_id']) {
   header('Location: index');
   exit();
}

?>
<div class="wrapper">
</div>
<style>
   input.file__upload-image {
      display: none !important;
   }
</style>
<div class="wrapper display__grid">
   <h1 style="grid-column: 1 / span 4; margin-bottom: 1rem;">
      Product manager
      <a href="add-new-product">Add New</a>
   </h1>
   <div>
      <div class="card__product-image">
         <label for="logo_image-id<?= $product['id'] ?>" class="upload-label">
            <div class="add-icon-center">
               <i class="fa-solid fa-image fa-xl" style="color: white;"></i> <span>Upload</span>
            </div>
         </label>
         <!-- Update the data-foo attribute to a class, and add a class to the file input -->
         <input class="file__upload-image" id="logo_image-id<?= $product['id'] ?>"
            name="logo_image-id<?= $product['id'] ?>" type="file" accept="image/jpeg" onchange="handleLogoUpload(this)">
         <img name="product-image" style="background-color:#<?= $store['highlight_color'] ?>"
            src="data:image/jpeg;base64,<?= base64_encode($product['image']) ?>" alt="">
      </div>

      <label for="product_name">Product Name</label>
      <input type="text" id="product_name" name="product_name" value="<?= $product['name'] ?>">


      <label for="description">Description</label>

      <textarea id="description" name="description" cols="30"
         rows="10"><?= isset($product['description']) ? $product['description'] : '' ?></textarea>


      <label for="specifications">Specifications</label>

      <textarea id="specifications" name="specifications" cols="30"
         rows="10"><?= isset($product['specifications']) ? $product['specifications'] : '' ?></textarea>


      <label for="quantity_limit">Quantity Limit</label>
      <input type="checkbox" id="quantity_limit" name="quantity_limit" <?= $product['quantity'] ? 'checked' : '' ?>>


      <label for="product_price">Product Price</label>
      <input type="text" id="product_price" name="product_price" value="<?= $product['price'] ?>">

      <!-- Hidden input for product ID -->
      <input type="hidden" name="product_id" value="<?= $product['id'] ?>">


      <button type="reset">Reset</button>
      <button class="green__button" type="submit">Save</button>
   </div>
</div>
<script>
   function handleLogoUpload(input) {
      const logoPreview = input.closest('form').querySelector('[name="product-image"]');

      // Check if a file is selected
      if (input.files && input.files[0]) {
         const reader = new FileReader();

         // Read the uploaded file as a data URL
         reader.onload = function (e) {
            // Update the src attribute of the image with the data URL
            logoPreview.src = e.target.result;
         };

         reader.readAsDataURL(input.files[0]);
      }
   }
</script>