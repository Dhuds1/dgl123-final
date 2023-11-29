<?php
require "controller/statements.php";
$usersDB = new DB($config['database'], $config['accessor']['user'], $config['accessor']['pass'], 'cracked');
$user = $usersDB->get_username($_GET['name']);
$store = $usersDB->get_store($user['id']);
?>
<div class="wrapper">
   <h1>
      <?= $_GET['name'] ?> Profile
   </h1>
   <?php if ($_GET['name'] === $_SESSION['username']): ?>
      <a style="display: block; margin-bottom: 2rem;" href="account">Edit Profile</a>
   <?php endif; ?>
   <div class="profile-info">
      <!-- USER PROFILE PICTURE -->
      <div class="profile-picture">
         <img src="data:image/jpeg;base64,<?= isset($user['picture']) ? base64_encode($user['picture']) : '' ?>" alt="">
      </div>
      <!-- USER PROFILE INFORMATION -->
      <span>
         <h2>
            Name
         </h2>
         <?= $user['firstname'] . " " . $user['lastname'] ?>
      </span>
   </div>
   <div>

      <h2 class="section__sep">
         Store
      </h2>
      <!-- USER STORE CARD -->
      <a href="store?name=<?= $store['slug'] ?>">
      <div class="store__card on-profile">
            <!-- CHECK FOR BANNER IMAGE -->
            <?php if ($store['banner']): ?>
               <img class="store__card--banner" src="data:image/jpeg;base64,<?= base64_encode($store['banner']) ?>" alt="">
            <?php else: ?>
               <!-- IF NO BANNER IMAGE -->
               <div class="store__card--color-fill" style="background-color:#<?= $store['primary_color'] ?>">
               </div>
            <?php endif ?>
            <div class="store__card--heading on-profile">
               <span class="store__card--logo">
                  <!-- CHECK FOR LOGO IMAGE -->
                  <?php if ($store['logo']): ?>
                     <img src="data:image/jpeg;base64,<?= base64_encode($store['logo']) ?>" alt="">
                     <!-- IF NO LOGO IMAGE -->
                  <?php else: ?>
                     <div class="store__card--logo--fill" style="background-color:#<?= $store['highlight_color'] ?>"></div>
                     <!-- END -->
                  <?php endif ?>
               </span>
               <h3 class="store__name">
                  <!-- GET STORE NAME -->
                  <?= $store['name'] ?>
               </h3>
            </div>
          </div>
        </a>
   </div>
</div>