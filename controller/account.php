<?php
function get_account_information($account_id) {
    require "statements.php";
    $usersDB = new DB($config['database'], $config['accessor']['user'], $config['accessor']['pass'], 'cracked');
    $sql = "SELECT * FROM cracked_user WHERE id = :id";
    $param = [":id" => $_SESSION['user_id']];   
    $store_info = $usersDB->queryAll($sql, $param);
    return $store_info[0];
}