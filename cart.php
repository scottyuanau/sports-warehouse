<?php
// start session
session_start();

// Database connection (create instance of DBAccess class)
// $db is our DBAccess instance
require_once "./includes/database.php";
require_once "./classes/CategoryClass.php";
require_once "./classes/ShoppingCart.php";

// Open database connection
$db->connect();

// Config
$title = "Shopping Cart";

// Start output buffering
ob_start();

//list the categories
$categoryObj = new Category();
$categories = $categoryObj->getCategories();

// Check if add to cart form has been submitted
if (isset($_POST['submitAddToCart'])) {

    // Collection of all errors for this form (no errors by default)
    $errors = [];

    // Get data passed to this page - $_POST super global array
    $itemId = $_POST["itemId"] ?? 0;
    $qty = $_POST["qty"] ?? 1;
    

    // Optional: Manually add errors into the list
    if ($qty < 0) {
        $errors["qty"] = "Quantity must be more than 0.";
    }


    // Check if we have no errors (valid data)
    if (count($errors) === 0) {

    // Valid - add the item to the shopping cart
      
    }
} 
// Display the shopping cart
include_once "./templates/_cartPage.html.php";


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

    // if (isset($_POST[$fieldName]) && $_POST[$fieldName] === $fieldValue) {
    //   return "checked";
    // }

    // return "";
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
