<?php
require "../autoloader.php";
if(isset($_POST['first_name']) &&
   isset($_POST['last_name']) &&
   isset($_POST["username"]) && 
   isset($_POST["email"]) &&
   isset($_POST["email_confirm"]) &&
   isset($_POST['password']) &&
   isset($_POST['password_confirm'])){
   $first_name = $_POST['first_name'];
   $last_name = $_POST['last_name'];
   $username = $_POST["username"];
   $email = matching($_POST['email'], $_POST['email_confirm'], "Email");
   $password = matching($_POST['password'], $_POST['password_confirm'], "password");
   if ($email !== user_in_db($email) && $username !== user_in_db($password)){
      $salt = generate_salt();
      $hashed_password = hash_user_password($password, $salt);
      submit_user_data($first_name, $last_name, $username, $email, $hashed_password, $salt);
   };
   echo "here";
}
function matching($value, $c_value, $input){
   require_once "statements.php";
   if($value === $c_value) return $value;
   else {
      exit();
   }
}
function user_in_db($value) {
}
function generate_salt() {
   $salt = 1;
   return $salt;
}
function hashed_password($password, $salt) {
   return 1;
}
function submit_user_data($first_name, $last_name, $user_name, $email, $hashed_password, $salt) {
   require_once "statements.php";
   $acc = $accessor["users_login"];
   $db = new DB($acc['host'], $acc['user'], $acc['pass'], $acc['db']);
   $db->close();
}