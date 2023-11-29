<?php
function get_account_information($account_id) {
    require "statements.php";
    $usersDB = new DB($config['database'], $config['accessor']['user'], $config['accessor']['pass']);
    $sql = "SELECT * FROM cracked_user WHERE id = :id";
    $param = [":id" => $_SESSION['user_id']];   
    $user_info = $usersDB->queryAll($sql, $param);
    $_SESSION['is_public'] = $user_info[0]['is_public'];
    return $user_info[0];
}

function update_user_info($user_id, $changes) {
    require "statements.php";
    $usersDB = new DB($config['database'], $config['accessor']['user'], $config['accessor']['pass']);

    // Update user information in the database based on the provided changes
    $sql = "UPDATE cracked_user SET ";
    $params = [];

    foreach ($changes as $field => $value) {
        $sql .= "$field = :$field, ";
        $params[":$field"] = $value;
    }
    require "../debug.php";
    // Remove the trailing comma and space from the SQL statement
    $sql = rtrim($sql, ', ');

    $sql .= " WHERE id = :id";
    $params[':id'] = $user_id;

    // Execute the update query
    $usersDB->query($sql, $params);
    $user = $usersDB->get_user($user_id);
    // You may want to add error handling or return a success message
    $_SESSION['success'] = "Updated Info";
    $_SESSION['pfp'] = $user['picture'];
    header('Location: ../account');
    exit;
}
?>
