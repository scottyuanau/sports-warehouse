<?php

// Database connection (create instance of DBAccess class)
// $db is our DBAccess instance
require_once "./includes/database.php";
require_once "./classes/ProductClass.php";
require_once "./classes/CategoryClass.php";

// Open database connection
$db->connect();

// Config
$title = "Product details";

// Start output buffering
ob_start();

//list the categories
$categoryObj = new Category();
$categories = $categoryObj->getCategories();

// Check if product ID has been provided
if (isset($_GET["id"])) {

  // Validate/sanitise the ID
  $itemId = intval($_GET["id"]);

  // Get the product name from the product ID

  $product = new Product();
  $productExistence = $product->getProduct($itemId);

  // Check if product does NOT exist
  if (!$productExistence) {

    // Display error
    $errorMessage = "Product does not exist.";
    include "./templates/_error.html.php";
  } else {

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
