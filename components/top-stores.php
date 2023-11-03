<?php foreach ($store as $stores => $data): ?>
   <a href="<?= $data['name'] ?>">
      <div class="store__card">
         <h3 class="store__name">
            <?= $data['display_name'] ?>
         </h3>
         <h4 class="store-card__info">
            <span class="card__store-ratings">Rating
               <?= $data['rating'] ?>/5 &starf;
            </span>
            <span class="card__store-purchases">Orders
               <?= $data['orders_total'] ?>
            </span>
         </h4>
      </div>
   </a>
<?php endforeach; ?>