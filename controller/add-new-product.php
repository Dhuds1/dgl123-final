<?php
session_start();
require "../autoloader.php";
require "../debug.php";
require "statements.php";

// Retrieve and sanitize form data
$inputData = [
    'name' => htmlspecialchars($_POST['name']),
    'slug' => replaceSpacesWithHyphens(htmlspecialchars($_POST['name'])),
    'description' => htmlspecialchars($_POST['description']),
    'specification' => htmlspecialchars($_POST['specification']),
    'quantity' => htmlspecialchars($_POST['quantity']),
    'price' => htmlspecialchars($_POST['price']),
];

$errors = [];

// Check for empty required fields
if (empty($inputData['name']) || empty($inputData['description']) || empty($inputData['price'])) {
    $errors[] = "Please fill out [product name], [description], and [price].";
}

// Check for a valid file upload
if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
    $allowedExtensions = ['jpg', 'jpeg'];
    $logoExtension = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));

    if (in_array($logoExtension, $allowedExtensions)) {
        // Read and encode the image file data
        $logoData = file_get_contents($_FILES['image']['tmp_name']);
        $inputData['image'] = $logoData;
    } else {
        // Handle invalid file type
        $errors[] = "Invalid file type for logo image. Please upload a JPEG file.";
    }
}

// Check for other conditions or validations as needed

if (empty($errors)) {
    add_product($inputData);
} else {
    $_SESSION['errors'] = $errors;
    header('Location: ../add-new-product');
}

function add_product($data)
{
    require "../autoloader.php";
    require "statements.php";

    $usersDB = new DB($config);
    $store = $usersDB->get_store($_SESSION['user_id']);
    $sql = "INSERT INTO cracked_product (name, slug, description, specification, quantity, price, image, store_id) VALUES (:name, :slug, :description, :specification, :quantity, :price, :image, :store_id)";
    $param = [
        ":name" => $data['name'],
        ":slug" => $data['slug'],
        ":description" => $data['description'],
        ':specification' => $data['specification'],
        ':quantity' => $data['quantity'],
        ':price' => $data['price'],
        ':image' => $data['image'],
        ':store_id' => $store['id'],
    ];

    $usersDB->query($sql, $param);
    header('Location: ../manage-products');
}
function replaceSpacesWithHyphens($input) {
    return str_replace(' ', '-', $input);
}