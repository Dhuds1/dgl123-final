<?php
// Validation 
if(!isset($_SESSION['store'])){
  header('Location: index');
  exit();
}
$getStoreData = function () {
  require "controller/manage-store.php";
  $store = get_store_data();
  return $store[0];
};
$store = $getStoreData();
?>
<?= isset($_SESSION['success']) ? $_SESSION['success'] : '' ?>
<?php $_SESSION['success'] = null ?>
<form action="controller/update-store-info.php" method="post" enctype="multipart/form-data">
  <div class="store__header-wrapper">
    <!-- I WAS TIRED OF MY HUGE CSS FILE, one day I'll reformat it to SASS for better redability -->
    <style>
      .nav-bar-main {
        position: absolute;
        top: 0;
      }

      .store__manage-settings--wrapper {
        background-color: #ffffff;
        position: relative;
        top: 20px;
        z-index: 99;
        padding: .5rem;
      }

      .store__manage-settings {
        text-align: center;
      }

      .store__banner-graphics {
        width: 100vw;
        height: 500px;
        top: 0;
      }

      .edit__store-values {
        width: 60%;
        display: flex;
        flex-direction: column;
        margin: auto;
        padding: 2rem;
        background-color: pink;
        margin-top: 60px;
      }

      .store__front-image {
        border-radius: 50vw 50vw 0 50vw;
      }
    </style>
    <div class="store__manage-settings--wrapper">
      <h1 class="store__manage-settings"><b><a href='store?name=<?= $_SESSION['store'] ?>'>
            <?= $store['name'] ?>
          </a></b> store front manager</h1>
    </div>
    <div class="store__banner-graphics">
      <div class="store__banner-image">
        <label for="banner_image" class="upload-label">
          <div class="add-icon-center">
            <i class="fa-solid fa-image fa-xl" style="color: white;"></i><span>Upload</span>
          </div>
        </label>
        <input class="file__upload-image" type="file" id="banner_image" name="banner_image" accept="image/jpeg"
          onchange="handleBannerUpload()">
        <img id="bannerPreview" style="background-color:#<?= $store['primary_color'] ?>"
          src="data:image/jpeg;base64,<?= base64_encode($store['banner']) ?>" alt="">
          <div class="store__socials">
          <ul>
            <?php for ($i = 1; $i <= 3; $i++): ?>
               <?php 
               if($store["social_link_$i"] == null){
                  break;
               } 
               ?>
              <li>
                <a href="<?= $store["social_link_$i"] ?>">
                  <?php
                  switch ($store["social_$i"]) {
                    case 'reddit':
                      echo '<i class="fa-brands fa-reddit fa-xl"></i>';
                      break;
                    case 'tumblr':
                      echo '<i class="fa-brands fa-tumblr fa-xl"></i>';
                      break;
                    case 'twitter':
                      echo '<i class="fa-brands fa-twitter fa-xl"></i>';
                      break;
                    case 'pinterest':
                      echo '<i class="fa-brands fa-pinterest fa-xl"></i>';
                      break;
                    case 'facebook':
                      echo '<i class="fa-brands fa-facebook fa-xl"></i>';
                      break;
                    case 'instagram':
                      echo '<i class="fa-brands fa-instagram fa-xl"></i>';
                      break;
                    default:
                  }
                  ?>
                </a>
              </li>
            <?php endfor; ?>
          </ul>
        </div>

        <div class="store__front-image">
          <label for="logo_image" class="upload-label">
            <div class="add-icon-center">
              <i class="fa-solid fa-image fa-xl" style="color: white;"></i> <span>Upload</span>
            </div>
          </label>
          <input class="file__upload-image" type="file" id="logo_image" name="logo_image" accept="image/jpeg"
            onchange="handleLogoUpload()">
          <img id="logoPreview" style="background-color:#<?= $store['highlight_color'] ?>" src="data:image/jpeg;base64,<?= base64_encode($store['logo']) ?>" alt="">
        </div>
      </div>
    </div>
    <div class="edit__store-values">

      <label class="store-name">Store Name</label>
      <input type="text" value="<?= $store['name'] ?>" disabled>

      <label for="description">Store Description</label><br>
      <div class="store_description-wrapper">
        <textarea name="description" id="description" cols="30" rows="10"
          maxlength="100"><?= isset($store['description']) ? $store['description'] : '' ?></textarea>
        <p id="char-count">100</p>
      </div>

      <div class="manage__store-grid">
      <div class="manage__store-grid--colors">
        <h2>Store Colours</h2>
        <p>hex values only</p>
        <a href="https://coolors.com" target="_blank">Need help with colors? Try here!</a><br>
        <label for="prim_color">Primary Color</label>
        <input type="text" name="prim_color" id="prim_color" oninput="validateHexColorInput(this)"
          value="<?= isset($store) ? $store['primary_color'] : "" ?>"><br>

        <label for="sec_color">Secondary Color</label>
        <input type="text" name="sec_color" id="sec_color" oninput="validateHexColorInput(this)"
          value="<?= isset($store) ? $store['secondary_color'] : "" ?>"><br>

        <label for="tri_color">Highlight Color</label>
        <input type="text" name="tri_color" id="tri_color" oninput="validateHexColorInput(this)"
          value="<?= isset($store) ? $store['highlight_color'] : "" ?>">


      </div>
      <div>
        <h2>Socials</h2>
        <?php for ($i = 1; $i <= 3; $i++): ?>
          <div>
            <label for="social_<?= $i ?>">
              <?= $i ?>
            </label>
            <!-- checks which social it is, and makes that option selected -->
            <select name="social_<?= $i ?>" id="social_<?= $i ?>" onchange="toggleInputRequired(this)">
              <option value="none" <?= empty($store["social_$i"]) ? 'selected' : '' ?>>None</option>
              <option value="reddit" <?= $store["social_$i"] === 'reddit' ? 'selected' : '' ?>>Reddit</option>
              <option value="tumblr" <?= $store["social_$i"] === 'tumblr' ? 'selected' : '' ?>>Tumblr</option>
              <option value="twitter" <?= $store["social_$i"] === 'twitter' ? 'selected' : '' ?>>Twitter</option>
              <option value="pinterest" <?= $store["social_$i"] === 'pinterest' ? 'selected' : '' ?>>Pinterest</option>
              <option value="facebook" <?= $store["social_$i"] === 'facebook' ? 'selected' : '' ?>>Facebook</option>
              <option value="instagram" <?= $store["social_$i"] === 'instagram' ? 'selected' : '' ?>>Instagram</option>
            </select>
            <input type="text" name="social_link_<?= $i ?>" placeholder="Social <?= $i ?>"
              value="<?= $store["social_$i"] !== 'none' ? $store["social_link_$i"] : '' ?>">
          </div>
        <?php endfor; ?>
      </div>
      </div>
      <div class="manage__Store--button-controls">
        <button id="reset" type="reset">Reset</button>
        <button type="submit" class="green__button">Save</button>
      </div>

    </div>
  </div>
</form>
<!-- I was tired of going back and forth, I needed to get the features out, i'll refactor eventually. Everything works -->
<script>
  document.getElementById('reset').addEventListener('click', () => {
    window.location.reload();
  })
  function toggleInputRequired(selectElement) {
    const inputElement = selectElement.nextElementSibling;
    inputElement.required = selectElement.value !== 'none';
  }

  var textarea = document.getElementById('description');
  var charCount = document.getElementById('char-count');

  textarea.addEventListener('input', function () {
    updateCharacterCount();
  });

  // Call updateCharacterCount on page load
  window.addEventListener('load', function () {
    updateCharacterCount();
  });
  // Character counter
  function updateCharacterCount() {
    var remainingChars = textarea.maxLength - textarea.value.length;
    charCount.textContent = remainingChars + " / 100";
  }
  window.onload = function () {
    addHashToColorInput('prim_color');
    addHashToColorInput('sec_color');
    addHashToColorInput('tri_color');
  };
  // Adds hashtag / pound sign for my BOOMERS to the color input
  function addHashToColorInput(inputId) {
    const inputElement = document.getElementById(inputId);
    inputElement.value = '#' + inputElement.value;
  }
  // only accespt hex values, I think that its.
  function validateHexColorInput(inputElement) {
    // Remove non-hex characters and ensure '#' is at the beginning
    inputElement.value = '#' + inputElement.value.replace(/[^a-fA-F0-9]/g, '').slice(0, 6);
  }
  // Image preview
  function handleLogoUpload() {
    const input = document.getElementById('logo_image');
    const logoPreview = document.getElementById('logoPreview');

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
  // image preview
  function handleBannerUpload() {
    const input = document.getElementById('banner_image');
    const bannerPreview = document.getElementById('bannerPreview');

    // Check if a file is selected
    if (input.files && input.files[0]) {
      const reader = new FileReader();

      // Read the uploaded file as a data URL
      reader.onload = function (e) {
        // Update the src attribute of the image with the data URL
        bannerPreview.src = e.target.result;
      };

      reader.readAsDataURL(input.files[0]);
    }
  }
</script>