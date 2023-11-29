<?php
require "../autoloader.php";
require "statements.php";
require "../debug.php";

$usersDB = new DB($config);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   if (isset($_POST['hide'])) {
         $result = $usersDB->queryAll('SELECT is_visible FROM cracked_product WHERE id = :id', [":id" => $_POST['id']]);
         $newVisibility = ($result[0]["is_visible"] === 1)? 0 : 1;
         $usersDB->query('UPDATE cracked_product SET is_visible = :is_visible WHERE id = :id', [":is_visible" => $newVisibility, ":id" => $_POST['id']]);
         header('Location: ../edit-product?id='.$_POST['id']."&name=".$_POST['slug']);
   }
   if (isset($_POST['delete'])) {
      $usersDB->query('DELETE FROM cracked_product WHERE id = :id', [":id" => $_POST['id']]);
   }   
}
?>
