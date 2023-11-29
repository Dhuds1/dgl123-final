<?php
require "loader.php";
if (!isset($_SESSION['store'])) {
   header('Location: manage-products');
   exit();
}
$usersDB = new DB($config['database'], $config['accessor']['user'], $config['accessor']['pass'], 'cracked');
$store = $usersDB->get_store($_SESSION['user_id']);
?>
<style>
   input.file__upload-image {
      display: none !important;
   }
</style>
<div class="wrapper display__grid">
   <div style="color: red;">
      <?= isset($_SESSION['errors']) ? implode('<br>', $_SESSION['errors']) : '' ?>
      <?php $_SESSION['errors'] = null ?>
   </div>
   <h1 style="grid-column: 1 / span 4; margin-bottom: 1rem;">
      Add Product
   </h1>
   <form action="controller/add-new-product.php" method="post" enctype="multipart/form-data">
      <div class="card__product-image">
         <label for="image" class="upload-label">
            <div class="add-icon-center">
               <i class="fa-solid fa-image fa-xl" style="color: white;"></i> <span>Upload</span>
            </div>
         </label>
         <!-- Update the data-foo attribute to a class, and add a class to the file input -->
         <input class="file__upload-image" id="image" name="image" type="file" accept="image/jpeg"
            onchange="handleLogoUpload(this)">
         <img id="product-image" src="" alt="">
      </div>

      <label for="name">Product Name</label>
      <input type="text" id="name" name="name"
         value="<?= isset($_SESSION['old_values']) ? $_SESSION['old_values']['name'] : '' ?>" required>

      <label for="description">Description</label>
      <textarea id="description" name="description" cols="30" rows="10"
         required><?= isset($_SESSION['old_values']) ? $_SESSION['old_values']['description'] : '' ?></textarea>

      <label for="specification">Specifications - Optional</label>
      <textarea id="specification" name="specification" cols="30"
         rows="10"><?= isset($_SESSION['old_values']) ? $_SESSION['old_values']['specification'] : '' ?></textarea>

      <label for="quantity">Quantity Limit - Optional <br> 0 = no limits</label>
      <input type="text" id="quantity" name="quantity"
         value="<?= isset($_SESSION['old_values']) ? $_SESSION['old_values']['quantity'] : '0' ?>"
         oninput="validateNumber(this)">

      <label for="price">Product Price</label>
      <input type="text" id="price" name="price"
         value="<?= isset($_SESSION['old_values']) ? $_SESSION['old_values']['price'] : '0' ?>" required
         oninput="validateNumber(this)">

      <button id="reset" type="reset">Reset</button>
      <button class="green__button" type="submit">Save</button>
   </form>
</div>

<script>
   document.getElementById('reset').addEventListener('click', e => {
      window.location.reload();
   });

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

   function validateNumber(input) {
      // Remove non-numeric characters from the input value
      input.value = input.value.replace(/[^0-9.]/g, '');
   }
</script>