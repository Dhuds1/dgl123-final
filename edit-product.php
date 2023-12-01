<?php
require "loader.php";
if (!isset($_GET['id']) || !isset($_GET['name'])) {
   header('Location: manage-products');
   exit();
}
$usersDB=new DB($config);
$store = $usersDB->get_store($_SESSION['user_id']);
$product = $usersDB->get_products_byID($store['id'], $_GET['id']);
if ($store['id'] !== $product['store_id']) {
   header('Location: index');
   exit();
}
?>
<style>
   input.file__upload-image {
      display: none !important;
   }
</style>
<div class="wrapper">
</div>
<div class="wrapper display__grid">
   <h1 style="grid-column: 1 / span 4; margin-bottom: 1rem;">
      Edititing '
      <?= $product['name'] ?>'
   </h1>
   <form action="controller/edit-product.php" method="post" enctype="multipart/form-data">
      <div class="card__product-image">
         <label for="image" class="upload-label">
            <div class="add-icon-center">
               <i class="fa-solid fa-image fa-xl" style="color: white;"></i> <span>Upload</span>
            </div>
         </label>
         <!-- Update the data-foo attribute to a class, and add a class to the file input -->
         <input class="file__upload-image" id="image" name="image" type="file" accept="image/jpeg"
            onchange="handleLogoUpload(this)">
         <img id="product-image" style="background-color:#<?= $store['highlight_color'] ?>"
            src="data:image/jpeg;base64,<?= base64_encode($product['image']) ?>" alt="">
      </div>

      <label for="product_name">Product Name</label>
      <input type="text" id="product_name" name="product_name" value="<?= $product['name'] ?>">


      <label for="description">Description</label>

      <textarea id="description" name="description" cols="30"
         rows="10"><?= isset($product['description']) ? $product['description'] : '' ?></textarea>


      <label for="specifications">Specifications</label>

      <textarea id="specification" name="specification" cols="30"
         rows="10"><?= isset($product['specification']) ? $product['specification'] : '' ?></textarea>


      <label for="quantity_limit">Quantity Limit</label>
      <input type="text" id="quantity_limit" name="quantity_limit"
         value="<?= $product['quantity'] ? $product['quantity'] : 'none' ?>">


      <label for="product_price">Product Price</label>
      <input type="text" id="product_price" name="product_price" value="<?= $product['price'] ?>">
      <br>

      <!-- Hidden input for product ID -->
      <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
      <input type="hidden" name="store_id" value="<?= $store['id'] ?>">

      <button id="reset" type="reset">Reset</button>
      <button class="green__button" type="submit">Save</button>
   </form>
   <form action="controller/product-visibility.php" method="post">
      <!-- Your form fields go here, if any -->
      <input type="hidden" name="slug" value="<?= $product['slug'] ?>">
      <input type="hidden" name="id" value="<?= $product['id'] ?>">
      <!-- changes the color and inner text based on if product is visible or hidden -->
      <button class="<?= $product['is_visible'] === 1 ? 'green__button': ''?>" type="submit" name="hide">
         <?php if($product['is_visible'] === 1): ?>
            Product Visible
         <?php else: ?>
            Product Hidden
         <?php endif ?>
      </button>
      <br>
      <br>
      <button class="remove" type="submit" name="delete">Delete</button>
   </form>

</div>
<script>
   document.getElementById('reset').addEventListener('click', e => {
      window.location.reload();
   })
   // another image preview....
   function handleLogoUpload(input) {
      const logoPreview = document.getElementById('product-image');

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