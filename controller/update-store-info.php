<?php
session_start();
require "manage-store.php";
require "../autoloader.php";
// Assuming get_store_data() retrieves data from the database
$originalStoreData = get_store_data();
$originalStoreData = $originalStoreData[0];

// Function to check if a value has changed
function hasChanged($original, $submitted)
{
    return $original !== $submitted;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve submitted form data
    function sanitize_color($color)
    {
        // Remove any non-hex value characters
        return preg_replace('/[^a-zA-Z0-9]/', '', $color);
    }
    $description = $_POST['description'];
    $primColor = sanitize_color($_POST['prim_color']);
    $secColor = sanitize_color($_POST['sec_color']);
    $triColor = sanitize_color($_POST['tri_color']);
    require "../debug.php";

    $changes = [];
    
    // Check if values have changed
    if (hasChanged($originalStoreData['description'], $description)) {
        $changes['description'] = $description;
    }

    if (hasChanged($originalStoreData['primary_color'], $primColor)) {
        $changes['primary_color'] = $primColor;
    }

    if (hasChanged($originalStoreData['secondary_color'], $secColor)) {
        $changes['secondary_color'] = $secColor;
    }

    if (hasChanged($originalStoreData['highlight_color'], $triColor)) {
        $changes['highlight_color'] = $triColor;
    }

    $socials = [];
    for ($i = 1; $i <= 3; $i++) {
        $social = $_POST["social_$i"];
        $socialLink = $_POST["social_link_$i"];
        $socials["social_$i"] = ($social !== 'none') ? $social : $socialLink;
        $socials["social_link_$i"] = $socialLink;
    }
    foreach ($socials as $key => $value) {
        list($platform, $index) = explode("_", $key);
    
        if (hasChanged($originalStoreData[$key], $value)) {
            $changes[$key] = $value;
        }
    }
;

    // Handle image uploads
    if (isset($_FILES['banner_image']) && $_FILES['banner_image']['error'] === UPLOAD_ERR_OK) {
        $allowedExtensions = ['jpg', 'jpeg'];
        $bannerExtension = strtolower(pathinfo($_FILES['banner_image']['name'], PATHINFO_EXTENSION));

        if (hasChanged($originalStoreData['banner'], $_FILES['banner_image']) && in_array($bannerExtension, $allowedExtensions)) {
            // Read and encode the image file data
            $bannerData = file_get_contents($_FILES['banner_image']['tmp_name']);
            // Update the changes array with the encoded image data
            $changes['banner'] = $bannerData;
        } else {
            // Handle invalid file type
            $_SESSION['error'] = "Invalid file type for banner image. Please upload a JPEG file.";
            header('Location: ../manage-store');
            exit();
        }
    }

    if (isset($_FILES['logo_image']) && $_FILES['logo_image']['error'] === UPLOAD_ERR_OK) {
        $allowedExtensions = ['jpg', 'jpeg'];
        $logoExtension = strtolower(pathinfo($_FILES['logo_image']['name'], PATHINFO_EXTENSION));

        if (hasChanged($originalStoreData['logo'], $_FILES['logo_image']) && in_array($logoExtension, $allowedExtensions)) {
            // Read and encode the image file data
            $logoData = file_get_contents($_FILES['logo_image']['tmp_name']);
            $logoBase64 = $logoData;

            // Update the changes array with the encoded image data
            $changes['logo'] = $logoBase64;
        } else {
            // Handle invalid file type
            $_SESSION['error'] = "Invalid file type for logo image. Please upload a JPEG file.";
            header('Location: ../manage-store');
            exit();
        }
    }

    // If no changes, redirect to manage store with success message 
    if (empty($changes)) {
        $_SESSION['success'] = "No changes made";
        header('Location: ../manage-store');
    }

    /// If changes, update store
    update_store_data($changes);
}
?>