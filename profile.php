<?php

require "loader.php";

   $usersDB = new DB($config);
   // supposed to check if profile is public, if not then see if its the user, is yes the open it, if not then home
   $is_pub = $usersDB->is_public(isset($_GET['name'])? $_GET['name']: null);
   if (!isset($_GET['name'])) {
      if($_SESSION['username']) {
         $_GET['name'] = $_SESSION['username'];
         load_profile();
      }
   } else {
      if (isset($_GET['name']) && $is_pub['is_public'] == 1) {
         load_profile();
      } else {
         header('Location: index');
         exit();
      }
   }
   function load_profile(){
      require "posts/profile.php";
   }
