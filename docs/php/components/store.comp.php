<div class="store__header-wrapper">
   <?php require 'php/components/search.comp.php'; ?>
   <div class="store__banner-graphics">
      <div class="store__banner-image">
         <div class="store__socials">
            <ul>
               <li>Reddit</li>
               <li>Twitter</li>
               <li>Instagram</li>
            </ul>
         </div>
         <div class="store__front-image">
            Store front image
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
            <span><b>Sales</b><br><?= $store_info['orders_total'] ?></span>
            <span><b>Items</b><br><?= $store_info['items_total'] ?></span>
            <span><b>Reviews</b><br><?= $store_info['reviews'] ?></span>
         </div>
      </div>
      <div class="store__info">
         <div>
            <h1><?= $store_info['display_name']?><h1>
         </div>
         <div>
            <h2><?= $store_info['tagline']?></h2>
         </div>
      </div>
      </div>
</div>
<hr>