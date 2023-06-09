<?php

// Database connection (create instance of DBAccess class)
// $db is our DBAccess instance
require_once "./includes/database.php";

// Open database connection
$db->connect();

// Config
$title = "Product details";

// Start output buffering
ob_start();

//list the categories
$sqlCategory = <<<SQL
SELECT categoryName, categoryId
FROM category
SQL;
$smstCat = $db->prepareStatement($sqlCategory);
$categories = $db->executeSQL($smstCat);



// Check if product ID has been provided
if (isset($_GET["id"])) {

  // Validate/sanitise the ID
  $itemId = intval($_GET["id"]);

  // Search for the product in the DB
  $sql = <<<SQL
      SELECT  itemId, itemName, photo, price, salePrice, description, featured, categoryId
      FROM    item
      WHERE   itemId = :itemId
    SQL;

  // Prepare the SQL statement
  $stmt = $db->prepareStatement($sql);

  // Add/bind parameter values
  $stmt->bindValue(":itemId", $itemId, PDO::PARAM_INT);

  // Get the product name from the product ID
  $product = $db->executeSQL($stmt);

  // Check if product does NOT exist
  if (empty($product)) {

    // Display error
    $errorMessage = "Product does not exist.";
    include "./templates/_error.html.php";
  } else {

    // Extract first and only row
    $product = $product[0];

    // Include the page-specific template
    include_once "./templates/_productPage.html.php";
  }
} else {

  // Display error
  $errorMessage = "Please select a valid product: 'id' parameter missing.";
  include "./templates/_error.html.php";
}

// Stop output buffering
$output = ob_get_clean();

// Include layout template
include_once "./templates/_layout.html.php";

// Close database connection
$db->disconnect();
