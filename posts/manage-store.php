<div class="store__header-wrapper">
    <style>
        .store__manage-settings--wrapper {
            background-color: #ffffff;
            position: relative;
            top: 20px;
            z-index: 99;
            padding: 2rem;
        }
        .store__manage-settings {
            text-align: center;
        }
        .store__banner-graphics {
            height: 500px;
            top: 0;
        }
    </style>
    <div class="store__manage-settings--wrapper">
        <h1 class="store__manage-settings"><b><a href='store?name=<?= $_SESSION['store'] ?>'><?= $store['name'] ?></a></b> store front manager</h1>
    </div>
   <div class="store__banner-graphics">
      <div class="store__banner-image">
      <!-- CHECKS IF THERE IS A STORE BANNER -->
      <img style="background-color:#<?= $store['primary_color'] ?>" src="data:image/jpeg;base64,<?= base64_encode($store['banner']) ?>" alt="">
         <div class="store__socials">
            <ul>
               <!-- CHECKS FOR SOCIAL MEDIAS -->
               <li><a href="<?= $store['social_1_link']?>"><?= $store['social_1']?></a></li>
               <li><a href="<?= $store['social_2_link']?>"><?= $store['social_2']?></a></li>
               <li><a href="<?= $store['social_3_link']?>"><?= $store['social_3']?></a></li>
            </ul>
         </div>
         <div class="store__front-image">
         <img src="data:image/jpeg;base64,<?= base64_encode($store['logo']) ?>" alt="">
         <!-- IF NO LOGO USE STORE HIGHLIGHT COLOR -->
         </div>
      </div>
   </div>
   <div class="store__banner-text">
      <div class="store__info-buttons">

         <div class="store__contact-buttons">
               <button style="background-color: #<?= $store['highlight_color']?>" class="store__buttons-owner"><?= $_SESSION['username']?></button>
            <div>
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