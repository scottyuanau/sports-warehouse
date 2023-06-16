<?php

// Database connection (create instance of DBAccess class)
// $db is our DBAccess instance
require_once "./includes/database.php";

// Open database connection
$db->connect();

// Config
$title = "Add a new product";

// Start output buffering
ob_start();

//list the categories
$sqlCategory = <<<SQL
    SELECT categoryName, categoryId
    FROM category
    SQL;
$smstCat = $db->prepareStatement($sqlCategory);
$categories = $db->executeSQL($smstCat);

// Check if form has been submitted
if (isset($_POST['submitInsertProduct'])) {

    // Collection of all errors for this form (no errors by default)
    $errors = [];


    // Get data passed to this page - $_POST super global array
    $itemName = $_POST["itemName"] ?? "";
    $price = $_POST["price"] ?? "";
    $salePrice = $_POST["salePrice"] ?? null;
    $description = $_POST["description"] ?? "";
    $categoryId = $_POST["categoryId"] ?? null;
    $photoPath = $_POST["photoPath"] ?? null;
    $featured = isset($_POST["featured"]) ? 1 : 0;

    // Validate product name
    if (empty($itemName)) {
        $errors["itemName"] = "Product name cannot be empty.";
    }

    // TODO: handle photo upload

    // Check if we have errors (invalid data)
    if (count($errors) > 0) {

        // Invalid - re-display the form with errors
        include_once "./templates/_insertProductPage.html.php";
    } else {

        // Valid - add the employee to the database

        // Define SQL query
        $sql = <<<SQL
        INSERT INTO item (itemName, price, salePrice, description, categoryId, photo, featured)
        VALUES (:ItemName, :Price, :SalePrice, :Description, :CategoryId, :Photo, :Featured)
      SQL;

        // Prepare the SQL statement
        $stmt = $db->prepareStatement($sql);

        // Add/bind parameter values
        $stmt->bindValue(":ItemName", $itemName, PDO::PARAM_STR);
        $stmt->bindValue(":Price", $price, PDO::PARAM_STR);
        $stmt->bindValue(":SalePrice", $salePrice, PDO::PARAM_STR);
        $stmt->bindValue(":Description", $description, PDO::PARAM_STR);
        $stmt->bindValue(":CategoryId", $categoryId, PDO::PARAM_INT);
        $stmt->bindValue(":Photo", $photoPath, PDO::PARAM_STR);
        $stmt->bindValue(":Featured", $featured, PDO::PARAM_INT);

        // Insert the employee
        $newProductId = $db->executeNonQuery($stmt, true);

        // Display confirmation
        $successMessage = "Product added successfully, new ID: $newProductId";
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
