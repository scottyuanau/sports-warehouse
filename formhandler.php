<?php
// start session
session_start();

// Database connection (create instance of DBAccess class)
// $db is our DBAccess instance
require_once "./includes/database.php";

// Open database connection
$db->connect();

//list the categories
$sqlCategory = <<<SQL
SELECT categoryName, categoryId
FROM category
SQL;
$smstCat = $db->prepareStatement($sqlCategory);
$categories = $db->executeSQL($smstCat);


// Config
$title = "Thanks for submitting the form";

// Start output buffering
ob_start();


include_once "./templates/_formhandler.html.php";


// Stop output buffering
$output = ob_get_clean();

// Include layout template
include_once "./templates/_layout.html.php";

// Close database connection
$db->disconnect();
