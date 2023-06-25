<?php
session_start();
require_once "./includes/database.php";
// Start output buffering
ob_start();


session_destroy();
header("Location: index.php");


// Stop output buffering
$output = ob_get_clean();

// Include layout template
include_once "./templates/_layout.html.php";

// Close database connection
$db->disconnect();

?>
