<?php

// Database connection (create instance of DBAccess class)
// $db is our DBAccess instance
require_once "./includes/database.php";

// Open database connection
$db->connect();

// Config
$title = "Products by category";

// Start output buffering
ob_start();


//list the categories
$sqlCategory = <<<SQL
SELECT categoryName, categoryId
FROM category
SQL;
$smstCat = $db->prepareStatement($sqlCategory);
$categories = $db->executeSQL($smstCat);



// Check if category ID has been provided
if (isset($_GET["id"])) {

  // Validate/sanitise the ID
  $categoryId = intval($_GET["id"]);

  // Search for the category in the DB
  $sql = <<<SQL
      SELECT  CategoryName
      FROM    category
      WHERE   CategoryID = :categoryId
    SQL;

  // Prepare the SQL statement
  $stmt = $db->prepareStatement($sql);

  // Add/bind parameter values
  $stmt->bindValue(":categoryId", $categoryId, PDO::PARAM_INT);

  // Get the category name from the category ID
  $categoryName = $db->executeSQLReturnOneValue($stmt);

  // Check if category does NOT exist
  if ($categoryName === false) {

    // Display error
    $errorMessage = "Category does not exist.";
    include "./templates/_error.html.php";
  } else {

    // Load the category's products
    $sql = <<<SQL
        SELECT  itemId, itemName, price
        FROM    item
        WHERE   categoryId = :categoryId
      SQL;

    // Prepare the SQL statement
    $stmt = $db->prepareStatement($sql);

    // Add/bind parameter values
    $stmt->bindValue(":categoryId", $categoryId, PDO::PARAM_INT);

    // Get the list of products
    $products = $db->executeSQL($stmt);

    // Include the page-specific template
    include_once "./templates/_categoryPage.html.php";
  }
} else {

  // Display error
  $errorMessage = "Please select a valid category: 'id' parameter missing.";
  include "./templates/_error.html.php";
}

// Stop output buffering
$output = ob_get_clean();

// Include layout template
include_once "./templates/_layout.html.php";

// Close database connection
$db->disconnect();
