<?php
function get_store_data(){
    require "statements.php";
    $usersDB = new DB($config['database'], $config['accessor']['user'], $config['accessor']['pass'], 'cracked');
    $sql = "SELECT * FROM cracked_store WHERE user_id = :id";
    $param = [":id" => $_SESSION['user_id']];   
    $store_info = $usersDB->queryAll($sql, $param);
    return $store_info;
}
function update_store_data($data)
{
    require "statements.php";
    $usersDB = new DB($config['database'], $config['accessor']['user'], $config['accessor']['pass'], 'cracked');

    // Assuming you have a 'cracked_store' table with columns: description, primary_color, secondary_color, highlight_color, social_1, social_2, social_3
    $sql = "UPDATE cracked_store SET ";
    $params = [];

    if (isset($data['description'])) {
        $sql .= "description = :description, ";
        $params[':description'] = $data['description'];
    }
    if(isset($data['banner'])){
        $sql .= 'banner = :banner, ';
        $params[':banner'] = $data['banner'];
    }
    if(isset($data['logo'])){
        $sql .= 'logo = :logo, ';
        $params[':logo'] = $data['logo'];
    }
    if (isset($data['primary_color'])) {
        $sql .= "primary_color = :primary_color, ";
        $params[':primary_color'] = $data['primary_color'];
    }

    if (isset($data['secondary_color'])) {
        $sql .= "secondary_color = :secondary_color, ";
        $params[':secondary_color'] = $data['secondary_color'];
    }

    if (isset($data['highlight_color'])) {
        $sql .= "highlight_color = :highlight_color, ";
        $params[':highlight_color'] = $data['highlight_color'];
    }
    for ($i = 1; $i <= 3; $i++) {
        $socialKey = "social_$i";
        $socialLinkKey = "social_link_$i";
    
        if (isset($data[$socialKey])) {
            $sql .= "$socialKey = :$socialKey, ";
            $params[":$socialKey"] = $data[$socialKey];
        }
    
        if (isset($data[$socialLinkKey])) {
            $sql .= "$socialLinkKey = :$socialLinkKey, ";
            $params[":$socialLinkKey"] = $data[$socialLinkKey];
        }
    }

    // Remove the trailing comma and space from the SQL statement
    $sql = rtrim($sql, ', ');

    $sql .= " WHERE user_id = :id";
    $params[':id'] = $_SESSION['user_id'];

    // Execute the update query
    $usersDB->query($sql, $params);
    $_SESSION['success'] = "Updated Information";
    header('Location: ../manage-store');
    exit();
}