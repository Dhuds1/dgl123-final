<?php
require "autoloader.php";

if ($_SERVER['REQUEST_METHOD'] === "POST") {
   $username = $_POST['username'];
   $email = $_POST['email'];

   if (!is_info_taken($username, $email)) {
       // Username and email are available, you can proceed with registration or other actions
   } else {
       // Username or email is already taken, handle this case as needed (e.g., show an error message)
   }
}
function is_info_taken($username, $email) {
   require_once "statements.php";
   $acc = $accessor['login_user'];
   $db = new DB($acc['host'], $acc['user'], $acc['pass'], $acc['db']);
   
   // Prepare and execute the SQL query
   $stmt = $db->query($prep_statement['signup']['check_email_user']);
   if ($stmt) {
      $stmt->bind_param("ss", $username, $email);
      $stmt->execute();
      $stmt->store_result();

      $result = $stmt->num_rows > 0; // True if the combination is taken, false otherwise
      $stmt->close();
   } else {
      die("Error in SQL query: "); // Handle any query errors
   }

   $db->close();
   return $result;
}

// $parent_url = "../";
// header("location: $parent_url");
// exit();
// echo "First Name <b>".$_POST['first_name']."</b><br>";
// echo "Last Name <b>".$_POST['last_name']."</b><br>";
// echo "User Name <b>".$_POST['username']."</b><br>";
// echo "Email <b>".$_POST['email']."</b><br>";
// echo "Confirm Email <b>".$_POST['email_confirm']."</b><br>";
// echo "Password <b>".$_POST['password']."</b><br>";
// echo "Confirm Password <b>".$_POST['password_confirm']."</b><br>";
