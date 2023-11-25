<?php 
$getStoreData = function() {
  require "controller/manage-store.php";
  $store = get_store_data(); 
  return $store[0];
};
$store = $getStoreData();

?>
<form action="controller/update-store-info.php" method="post">
  <h2>Manage Store</h2>
  <?= isset($_SESSION['success'])?$_SESSION['success']:''?>
  <?php $_SESSION['success'] = null ?>
  <h3>Store Name <?= $store['name']?></h3>
  <h3>Store Slug <?= $store['slug']?></h3> 
  <label for="description">Store Description</label><br>
  <textarea name="description" id="description" cols="30" rows="10" maxlength="100"><?=isset($store['description'])? $store['description'] : ''?></textarea>
   <p id="char-count">Remaining characters: 100</p>
  <br>
  store banner
  <?=isset($store['banner'])? $store['banner'] : 'No Banner'?>
  store logo
  <?=isset($store['logo'])? $store['logo'] : 'No Logo'?>
  <div>
    <h2>Store Colours</h2>
    <p>hex values only</p>
    <a href="https://coolors.com" target="_blank">Need help with colors? Try here!</a><br>
    <label for="prim_color">Primary Color</label>
    #<input type="text" name="prim_color" id="prim_color" value="<?= isset($store)? $store['primary_color']: "" ?>"><br>
    <label for="sec_color">Secondary Color</label>
    #<input type="text" name="sec_color" id="sec_color" value="<?= isset($store)? $store['secondary_color']: "" ?>"><br>
    <label for="tri_color">Highlight Color</label>
    #<input type="text" name="tri_color" id="tri_color"value="<?= isset($store)? $store['highlight_color']: "" ?>">
  </div>
  <div>
    <h2>Socials</h2>
    <?php for ($i = 1; $i <= 3; $i++): ?>
      <div>

        <label for="social_<?= $i ?>"><?= $i ?></label>
        <select name="social_<?= $i ?>" id="social_<?= $i ?>" onchange="toggleInputRequired(this)">
        <option value="none" <?= empty($store["social_$i"]) ? 'selected' : '' ?>>None</option>
        <option value="reddit" <?= $store["social_$i"] === 'reddit' ? 'selected' : '' ?>>Reddit</option>
        <option value="tumblr" <?= $store["social_$i"] === 'tumblr' ? 'selected' : '' ?>>Tumblr</option>
        <option value="twitter" <?= $store["social_$i"] === 'twitter' ? 'selected' : '' ?>>Twitter</option>
        <option value="pinterest" <?= $store["social_$i"] === 'pinterest' ? 'selected' : '' ?>>Pinterest</option>
        <option value="facebook" <?= $store["social_$i"] === 'facebook' ? 'selected' : '' ?>>Facebook</option>
        <option value="instagram" <?= $store["social_$i"] === 'instagram' ? 'selected' : '' ?>>Instagram</option>
      </select>
      <input type="text" name="social_input_<?= $i ?>" placeholder="Social <?= $i ?>" value="<?= $store["social_$i"] ?>">
    </div>
    <?php endfor; ?>
  </div>

  <button type="reset">Reset</button>
  <button type="submit">Save</button>

</form>

<script>
  function toggleInputRequired(selectElement) {
    const inputElement = selectElement.nextElementSibling;
    inputElement.required = selectElement.value !== 'none';
  }
  var textarea = document.getElementById('description');
    var charCount = document.getElementById('char-count');

    textarea.addEventListener('input', function() {
        updateCharacterCount();
    });

    function updateCharacterCount() {
        var remainingChars = textarea.maxLength - textarea.value.length;
        charCount.textContent = "Remaining characters: " + remainingChars;
    }
</script>