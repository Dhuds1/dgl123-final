<?php
require "loader.php";

if (!isset($_SESSION['username'])){
    header('Location: index');
}