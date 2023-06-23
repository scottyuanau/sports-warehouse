<?php
// start session
session_start();


// Database connection (create instance of DBAccess class)
// $db is our DBAccess instance
require_once "./includes/database.php";
require_once "./classes/CategoryClass.php";
require_once "./classes/ProductClass.php";

// Open database connection
$db->connect();

// Config
$title = "Add a new product";

// Start output buffering
ob_start();

//list the categories
$categoryObj = new Category();
$categories = $categoryObj->getCategories();

// Check if form has been submitted
if (isset($_POST['submitInsertProduct'])) {

    // Collection of all errors for this form (no errors by default)
    $errors = [];

    // Get data passed to this page - $_POST super global array
    $itemName = $_POST["itemName"] ?? "";
    $price = $_POST["price"] ?? "";
    $salePrice = $_POST["salePrice"] ?? null;
    $description = $_POST["description"] ?? "";
    $categoryId = $_POST["category"] ?? null;
    $photoPath = $_FILES["photoPath"]["name"] ?? null;
    $featured = isset($_POST["featured"]) ? 1 : 0;

    // Validate product name
    if (empty($itemName)) {
        $errors["itemName"] = "Product name cannot be empty.";
    }

    // Validate sale price
    if ($salePrice > $price) {
        $errors["price"] = "Sale Price must be less than original price.";
    }


    // TODO: handle photo upload


    //move file to the img folder
    if ($photoPath !== null) {
        $targetDirectory = 'img/';
        $originalFilename = $_FILES['photoPath']['name'];
        $extension = pathinfo($originalFilename, PATHINFO_EXTENSION);
        $uniqueFilename = uniqid() . '.' . $extension;
        $targetFilePath = $targetDirectory . $uniqueFilename;
        $photoPath = $uniqueFilename;
        // $targetFilePath = $targetDirectory . basename($_FILES['photoPath']['name']);
        move_uploaded_file($_FILES['photoPath']['tmp_name'], $targetFilePath);
    }

    // Check if we have errors (invalid data)
    if (count($errors) > 0) {

        // Invalid - re-display the form with errors
        include_once "./templates/_insertProductPage.html.php";
    } else {

        // Valid - add the product to the database

        // Create a new product object and set the properties to the correct value
        $newProductObj = new Product();
        $newProductObj->setProductName($itemName);
        $newProductObj->setUnitPrice($price);
        $newProductObj->setSalePrice($salePrice);
        $newProductObj->setDescription($description);
        $newProductObj->setCategoryId($categoryId);
        $newProductObj->setPhoto($photoPath);
        $newProductObj->setFeatured($featured);

        // Insert the product
        $newProductId = $newProductObj->insertProduct();
        // Display confirmation
        $successMessage = "Product added successfully, new product address:" . $relativeurl . "product.php?id=" . $newProductId;
        include_once "./templates/_success.html.php";
    }
} else {

    // Just display the empty form
    include_once "./templates/_insertProductPage.html.php";
}

// Stop output buffering
$output = ob_get_clean();

// Include layout template
include_once "./templates/_layout.html.php";

// Functions to handle loading data into the form

/**
 * Set an HTML-safe value of a form field from $_POST data.
 * @param string $fieldName The name of field to display.
 * @return string The HTML entity encoded output for the form field.
 */
function setValue($fieldName)
{
    return htmlspecialchars($_POST[$fieldName] ?? "");
}

/**
 * Return the "checked" attribute if the field value is checked.
 * @param string $fieldName The name of field to check.
 * @param string $fieldValue The value of field to check.
 * @return string The "checked" attribute if field value is checked.
 */
function setChecked($fieldName, $fieldValue)
{
    return ($_POST[$fieldName] ?? "") === $fieldValue ? "checked" : "";
}

/**
 * Return the "selected" attribute if the field value is selected.
 * @param string $fieldName The name of field to check.
 * @param string $fieldValue The value of field to check.
 * @return string The "selected" attribute if field value is selected.
 */
function setSelected($fieldName, $fieldValue)
{
    return ($_POST[$fieldName] ?? "") === $fieldValue ? "selected" : "";
}




// Close database connection
$db->disconnect();
