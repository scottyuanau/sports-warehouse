<?php

// Database connection (create instance of DBAccess class)
// $db is our DBAccess instance
require_once "./includes/database.php";

// Open database connection
$db->connect();

// Config
$title = "Home";

// Start output buffering (trap output, don't display it yet)
ob_start();


// Search for prodcuts 
$sql = <<<SQL
    SELECT itemId, itemName, price, photo, salePrice
    FROM item
    WHERE featured = 1
SQL;

// Prepare the SQL statement
$stmt = $db->prepareStatement($sql);

// Get the list of products
$products = $db->executeSQL($stmt);

//list the categories
$sqlCategory = <<<SQL
SELECT categoryName, categoryId
FROM category
SQL;
$smstCat = $db->prepareStatement($sqlCategory);
$categories = $db->executeSQL($smstCat);


// Include the page-specific template
include_once "./templates/_homePage.html.php";


// Stop output buffering - store output into our $output variable
$output = ob_get_clean();

// Include layout template
include_once "./templates/_layout.html.php";

// Close database connection
$db->disconnect();
