<?php
session_start();
require "manage-store.php";
require "../autoloader.php";
// Assuming get_store_data() retrieves data from the database
$originalStoreData = get_store_data();
$originalStoreData = $originalStoreData[0];

// Function to check if a value has changed
function hasChanged($original, $submitted) {
    return $original !== $submitted;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve submitted form data
    function sanitize_color($color)
    {
        // Remove any non-alphanumeric characters
        return preg_replace('/[^a-zA-Z0-9]/', '', $color);
    }
    $description = $_POST['description'];
    $primColor = sanitize_color($_POST['prim_color']);
    $secColor = sanitize_color($_POST['sec_color']);
    $triColor = sanitize_color($_POST['tri_color']);

    $socials = [];
    for ($i = 1; $i <= 3; $i++) {
        $social = $_POST["social_$i"];
        $socialInput = $_POST["social_input_$i"];
        $socials["social_$i"] = ($social !== 'none') ? $socialInput : '';
    }

    // Check if values have changed
    $changes = [];

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
    foreach ($socials as $key => $value) {
        if (hasChanged($originalStoreData[$key], $value)) {
            $changes[$key] = $value;
        }
    }
    if(empty($changes)) {
        $_SESSION['success'] = "No changes made";
        header('Location: ../manage-store');
    }
    // Now $changes array contains only the fields that have changed
    // Perform the database update with $changes
    update_store_data($changes);
}
?>
