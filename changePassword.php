<?php
// start session
session_start();

// Database connection (create instance of DBAccess class)
// $db is our DBAccess instance
require_once "./includes/database.php";
require_once "./classes/LoginClass.php";

// Open database connection
$db->connect();




// Config
$title = "Change Password";

// Start output buffering
ob_start();

if (isset($_POST["submitChangePassword"])) {

    //capture the error & success in login
    $errors = [];
    $successes = [];

    $username = $_POST["username"];
    $currentPassword = $_POST["currentPassword"];
    $newPassword = $_POST["newPassword"];

    $login = new Login();

    //get the user details
    $login->getUser($username);

    if ($currentPassword === $login->getPassword()) {
        // check if password provided by user is correct
        $login->setPassword($newPassword);
        $login->updatePassword($username);
        $successes['success'] = "Password has been successfully updated.";
    } else if ($currentPassword !== $login->getPassword()) {
        $errors["incorrect-password"] = "The current password is incorrect";
    }
    
} 

include_once "./templates/_changePasswordPage.html.php";


// Stop output buffering
$output = ob_get_clean();

// Include layout template
include_once "./templates/_layout.html.php";

// Close database connection
$db->disconnect();
