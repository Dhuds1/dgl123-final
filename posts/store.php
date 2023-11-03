<div class="store__header-wrapper">
   <div class="store__banner-graphics">
      <div class="store__banner-image">
      <?php if($store['banner']) :?>
      <img src="data:image/jpeg;base64,<?= base64_encode($store['banner']) ?>" alt="">
      <?php else:?>
      <div class="store__banner-graphic-fill" style="background-color:#<?= $store['primary_color'] ?>"></div>
      <?php endif;?>
         <div class="store__socials">
            <ul>
               <li>Reddit</li>
               <li>Twitter</li>
               <li>Instagram</li>
            </ul>
         </div>
         <div class="store__front-image">
         <?php if ($store['logo']) :?>
         <img src="data:image/jpeg;base64,<?= base64_encode($store['logo']) ?>" alt="">
         <?php else:?>
            <div class="store__front-image-fill" style="background-color:#<?= $store['highlight_color'] ?>"></div>
         <?php endif;?>
         </div>
      </div>
   </div>
   <div class="store__banner-text">
      <div class="store__info-buttons">

         <div class="store__contact-buttons">
            <button>Store Owner</button>
            <div>
               <button>Follow Store</button>
               <button>Message</button>
         </div>
         </div>
         <div class="store__stats">
            <span><b>Sales</b><br><?= $store['orders'] ?></span>
            <span><b>Items</b><br><?= $store['items'] ?></span>
            <span><b>Reviews</b><br><?= $store['rating'] ?></span>
         </div>
      </div>
      <div class="store__info">
         <div>
            <h1><?= $store['name']?><h1>
         </div>
         <div>
            <h2><?= $store['description']?></h2>
         </div>
      </div>
   </div>
   <?php require "components/filters.php"?>
   <br>
   <hr>
</div>
<div class="wrapper">
   <?php require "components/product.loader.php" ?>
</div>