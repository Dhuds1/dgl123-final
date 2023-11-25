<?php
require "loader.php";
require "controller/manage-store.php";
if(!$_SESSION['store']){
    header('Location: index');
    exit();
}
