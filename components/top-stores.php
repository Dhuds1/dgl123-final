<?php
// IMPORT STATEMENTS AND CONNECTION
require "controller/statements.php";
//QUERY DB FOR STORES    
$stores = new DB($config);
// RETURNS THE 4 STORES WITH THE MOST ITEMS
$stores->query("SELECT * FROM cracked_store ORDER BY items DESC LIMIT 4");
$results = $stores->findAll();
?>
<?php foreach ($results as $store => $data): ?>
   <div class="store__card">
      <a href="store?name=<?=$data['slug']?>">
         <!-- CHECK FOR BANNER IMAGE -->
         <?php if ($data['banner']): ?>
            <img class="store__card--banner" src="data:image/jpeg;base64,<?= base64_encode($data['banner']) ?>" alt="">
         <?php else: ?>
            <!-- IF NO BANNER IMAGE -->
            <div class="store__card--color-fill" style="background-color:#<?= $data['primary_color'] ?>">
            </div>
         <?php endif ?>
         <div class="store__card--heading">
            <span class="store__card--logo">
               <!-- CHECK FOR LOGO IMAGE -->
               <?php if ($data['logo']): ?>
                  <img src="data:image/jpeg;base64,<?= base64_encode($data['logo']) ?>" alt="">
                  <!-- IF NO LOGO IMAGE -->
               <?php else: ?>
                  <div class="store__card--logo--fill" style="background-color:#<?= $data['highlight_color'] ?>"></div>
                  <!-- END -->
               <?php endif ?>
            </span>
            <h3 class="store__name">
               <!-- GET STORE NAME -->
               <?= $data['name'] ?>
            </h3>
         </div>
         <h4 class="store__card--info">
            <span class="card__store-ratings"><b>Rating</b>
               <!-- GET STORE RATING -->
               <?= $data['rating'] ?>/5 &starf;
            </span>
            <span class="card__store-purchases"><b>Orders</b>
               <!-- GET STORE TOTAL ORDERS -->
               <?= $data['orders'] ?>
            </span>
         </h4>
      </a>
   </div>
<?php endforeach; ?>