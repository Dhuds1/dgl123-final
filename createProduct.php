<?php require "php/loader.php"; ?>
<div class="wrapper">
   <form method="post" class="creation__menu">
      <h2>Create a new Product</h2>
      <label for="name">Product Name</label>
      <input type="text" name="name">
      <label for="">Product Price</label>
      <input type="text" name="" id="">
      <label for="">Product Quantity</label>
      <input type="text" name="" id="">
      <label for=""><input type="checkbox" style="margin-right: 10px;">No Product Limit</label>
      <br>
      <label for="">Product Category</label>
      <input type="text" name="" id="">
      <label for="">Product Tags</label>
      <input type="text" name="" id="">
      <button for="tags">Add</button>
      <br>
      <label for="description">Product Description</label>
      <textarea></textarea>
      <label for="specification">Product specification</label>
      <textarea></textarea>
      <br>
      <label for="picture">Product Pictures</label>
      <br>
      <input type="file">
      <br>
      <br>
      <button type="submit" value="Submit">Create Store</button>
   </form>
</div>