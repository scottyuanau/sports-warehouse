<?php

// Database connection (create instance of DBAccess class)
// $db is our DBAccess instance
require_once "./includes/database.php";

// Open database connection
$db->connect();

// Config
$title = "Add a new category";

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
if (isset($_POST['submitInsertCategory'])) {

  // Collection of all errors for this form (no errors by default)
  $errors = [];

  // Get data passed to this page - $_POST super global array
  $categoryName = $_POST["categoryName"] ?? "";
  // $description = $_POST["description"] ?? "";

  // Validate name
  if ($categoryName === "") {
    $errors["categoryName"] = "Category name is required.";
  }

  // Check if we have errors (invalid data)
  if (count($errors) > 0) {

    // Invalid - re-display the form with errors
    include_once "./templates/_insertCategoryPage.html.php";
  } else {

    // Valid - add the category to the database

    // Define SQL query
    $sql = <<<SQL
        INSERT INTO category (CategoryName)
        VALUES (:CategoryName)
      SQL;

    // Prepare the SQL statement
    $stmt = $db->prepareStatement($sql);

    // Add/bind parameter values
    $stmt->bindValue(":CategoryName", $categoryName, PDO::PARAM_STR);
    // $stmt->bindValue(":Description", $description, PDO::PARAM_STR);

    // Insert the category
    $newCategoryId = $db->executeNonQuery($stmt, true);

    // Display confirmation
    $successMessage = "Category added successfully, new ID: $newCategoryId";
    include_once "./templates/_success.html.php";
  }
} else {

  // Just display the empty form
  include_once "./templates/_insertCategoryPage.html.php";
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
