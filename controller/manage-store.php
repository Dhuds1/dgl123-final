<?php

require "statements.php";

function get_store_data()
{
    require "statements.php";

    $usersDB = new DB($config);
    $sql = "SELECT * FROM cracked_store WHERE user_id = :id";
    $param = [":id" => $_SESSION['user_id']];
    $store_info = $usersDB->queryAll($sql, $param);

    return $store_info;
}

// gathers all the changes and pends them to an array
function update_store_data($data)
{
    require "statements.php";

    $usersDB = new DB($config);

    $sql = "UPDATE cracked_store SET ";
    $params = [];

    $updateFields = [
        'description', 'banner', 'logo', 'primary_color', 'secondary_color', 'highlight_color'
    ];

    foreach ($updateFields as $field) {
        if (isset($data[$field])) {
            $sql .= "$field = :$field, ";
            $params[":$field"] = $data[$field];
        }
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

    // update values
    $usersDB->query($sql, $params);
    $_SESSION['success'] = "Updated Information";
    header('Location: ../manage-store');
    exit();
}
