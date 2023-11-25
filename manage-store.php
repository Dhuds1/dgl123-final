<?php
require "loader.php";
if(!$_SESSION['store']){
    header('Location: index');
    exit();
}
