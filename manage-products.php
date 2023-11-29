<?php
require "loader.php";
if (!$_SESSION['store']) {
   header('Location: index');
   exit();
}
function get_products() {
   require "controller/statements.php";
   $usersDB = new DB($config['database'], $config['accessor']['user'], $config['accessor']['pass'], 'cracked');
   return $usersDB->get_products($_SESSION['user_id']);
}