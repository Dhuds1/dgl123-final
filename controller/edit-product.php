<?php
require "../autoloader.php";
require "statements.php";
require "../debug.php";

$usersDB = new DB($config);
$product = $usersDB->get_products_byID($_POST['store_id'], $_POST['product_id']);

if ($_POST['quantity_limit'] === 'none') {
    $quantity = null;
}

$changes = [];

if ($_POST['product_name'] !== $product['name']) {
    $changes['name'] = $_POST['product_name'];
}

if ($_POST['description'] !== $product['description']) {
    $changes['description'] = $_POST['description'];
}

if ($_POST['specification'] !== $product['specification']) {
    $changes['specification'] = $_POST['specification'];
}

if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
    $allowedExtensions = ['jpg', 'jpeg'];
    $logoExtension = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));

    if (in_array($logoExtension, $allowedExtensions)) {
        // Read and encode the image file data
        $image = file_get_contents($_FILES['image']['tmp_name']);

        // Update the changes array with the encoded image data
        $changes['image'] = $image;
    } else {
        // Handle invalid file type
        $_SESSION['error'] = "Invalid file type for product image. Please upload a JPEG file.";
        header('Location: ../manage-products');
        exit();
    }
}

if ($_POST['product_price'] != $product['price']) {
    $changes['price'] = $_POST['product_price'];
}

if ($quantity != $product['quantity']) {
    $changes['quantity'] = $_POST['quantity_limit'];
}

if (empty($changes)) {
    $_SESSION['success'] = "No changes made.";
    header('Location: ../manage-products');
    exit();
} else {
    update_product($product['id'], $changes);
}

function update_product($id, $changes)
{
    require "../autoloader.php";
    require "statements.php";

    $usersDB = new DB($config);

    $sql = "UPDATE cracked_product SET ";
    $params = [];

    foreach ($changes as $field => $value) {
        $sql .= "$field = :$field, ";
        $params[":$field"] = $value;
    }

    // Remove the trailing comma and space from the SQL statement
    $sql = rtrim($sql, ', ');

    $sql .= " WHERE id = :id";
    $params[':id'] = $id;

    // Execute the update query
    $usersDB->query($sql, $params);
    $_SESSION['success'] = "Successfully made changes";
    header('Location: ../manage-products');
    exit();
}
?>
