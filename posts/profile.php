<div class="wrapper">
   <?php
   require "autoloader.php";
   require "controller/statements.php";
   if (!isset($_GET['name'])) {
      header('Location: index');
      exit;
   }
   $user = $_GET['name'];

   // Assuming you have a proper DB class and $config array defined somewhere
   $usersDB = new DB($config['database'], $config['accessor']['user'], $config['accessor']['pass'], 'cracked');

   $sql = "SELECT * FROM cracked_user WHERE username = :username";
   $param = [':username' => $user];
   $userInfo = $usersDB->queryAll($sql, $param);

   // Check if user information is found
   if (!empty($userInfo)) {
      $userInfo = $userInfo[0];

      // Check if the user's profile is public
      if ($userInfo['is_public']) {
         // Check if the currently logged-in user matches the requested user
         if ($_SESSION['username'] !== $userInfo['username']) {
            echo "Hello";
         } else {
            header('Location: index');
            exit;
         }
      }
   }
   ?>

</div>