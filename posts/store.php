<div class="store__header-wrapper">
   <div class="store__banner-graphics">
      <div class="store__banner-image">
      <!-- CHECKS IF THERE IS A STORE BANNER -->
      <?php if($store['banner']) :?>
      <img style="background-color:#<?= $store['primary_color'] ?>" src="data:image/jpeg;base64,<?= base64_encode($store['banner']) ?>" alt="">
      <!-- IF NO STORE BANNER -->
      <?php else:?>
      <div class="store__banner-graphic-fill" style="background-color:#<?= $store['primary_color'] ?>"></div>
      <?php endif;?>
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
            <!-- CHECKS FOR STORE LOGO -->
         <?php if ($store['logo']) :?>
         <img src="data:image/jpeg;base64,<?= base64_encode($store['logo']) ?>" alt="">
         <!-- IF NO LOGO USE STORE HIGHLIGHT COLOR -->
         <?php else:?>
            <div class="store__front-image-fill" style="background-color:#<?= $store['highlight_color'] ?>"></div>
         <?php endif;?>
         </div>
      </div>
   </div>
   <div class="store__banner-text">
      <div class="store__info-buttons">

         <div class="store__contact-buttons">
            <a href="profile?name=<?= $owner['username']?>">
               <button style="background-color: #<?= $store['highlight_color']?>" class="store__buttons-owner"><?= $owner['username']?></button>
               </a>
            <div>
               <?php if($store['slug'] === $_SESSION['store']):?>
                  <a href="manage-store">Manage Store</a>
                  <br>
                  <a href="manage-products">Manage Products</a>
               <?php endif?>
               <button>Follow Store</button>
               <button>Message</button>
         </div>
         </div>
         <!-- DISPLAY STORE RELATED STATISTIC INFORMATION, TOTAL ORDERS, ITEMS FOR SALE AND RATINGS -->
         <div class="store__stats">
            <span><b>Sales</b><br><?= $store['orders'] ?></span>
            <span><b>Items</b><br><?= $store['items'] ?></span>
            <span><b>Reviews</b><br><?= $store['rating'] ?></span>
         </div>
      </div>
      <div class="store__info">
         <div>
            <!-- DISPLAY THE STORE NAME AS A TITLE AT THE TOP -->
            <h1><?= $store['name']?><h1>
         </div>
         <div>
            <!-- DISPLAY THE STORE INFORMATION, DESCRIPTION OR MOTO BENEATH THE STORE NAME -->
            <h2><?= $store['description']?></h2>
         </div>
      </div>
   </div>
</div>
<div class="wrapper">
   <!-- LOADS ALL THE STORE PRODUCTS -->
   <?php require "components/product.loader.php" ?>
</div>