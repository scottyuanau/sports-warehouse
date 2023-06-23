<?php
// start session
session_start();

// Database connection (create instance of DBAccess class)
// $db is our DBAccess instance
require_once "./includes/database.php";
require_once "./classes/CategoryClass.php";

// Open database connection
$db->connect();

// Config
$title = "Products by category";

// Start output buffering
ob_start();


//list the categories
$categoryObj = new Category();
$categories = $categoryObj->getCategories();

// Check if category ID has been provided
if (isset($_GET["id"])) {

  // Validate/sanitise the ID
  $categoryId = intval($_GET["id"]);

  // Get the category name from the category ID
  
  $categoryObj->getCategory($categoryId);
  $categoryName = $categoryObj->getCategoryName();

  // Check if category does NOT exist
  if ($categoryName === null) {

    // Display error
    $errorMessage = "Category does not exist.";
    include "./templates/_error.html.php";
  } else {

  
    // Get the list of products
   
    $products = $categoryObj->getProducts($categoryId);
    
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
