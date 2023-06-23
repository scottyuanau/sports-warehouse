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
$title = "Search results";

// Start output buffering
ob_start();


//list the categories
$categoryObj = new Category();
$categories = $categoryObj->getCategories();



// Check if search query has been provided
if (isset($_GET["search"])) {

    // Todo: Validate/sanitise the search query
    $search = $_GET["search"];

    // search for products
    $sql = <<<SQL
        SELECT  itemId, itemName, price, description, photo
        FROM    item
        WHERE   itemName LIKE :search
      SQL;

    // Prepare the SQL statement
    $stmt = $db->prepareStatement($sql);

    // Add/bind parameter values
    $stmt->bindValue(":search", "%$search%", PDO::PARAM_STR);

    // Get the list of products
    $products = $db->executeSQL($stmt);

    // Include the page-specific template
    include_once "./templates/_searchPage.html.php";
} else {

    // Display error
    $errorMessage = "Please specify a search query. 'search' parameter missing.";
    include "./templates/_error.html.php";
}

// Stop output buffering
$output = ob_get_clean();

// Include layout template
include_once "./templates/_layout.html.php";

// Close database connection
$db->disconnect();
