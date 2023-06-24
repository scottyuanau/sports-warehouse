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
$title = "Login";

// Start output buffering
ob_start();

if (isset($_POST["login"])) {

    //capture the error in login
    $errors = [];

    $login = new Login();
    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = $login->login($username,$password);

    if ($result ==='success' && $login->getUserId() === 2) {
        //login success as admin, redirect to the admin page.
        $_SESSION['user'] = $login->getUserId();
        $_SESSION['username'] = $login->getUserName();
        header("Location: admin.php"); 
    } else if ($result ==='success' && $login->getUserId() !== 2) {
        //login success as other users, redirect to the home page.
        $_SESSION['user'] = $login->getUserId();
        $_SESSION['username'] = $login->getUserName();
        header("Location: index.php"); 
    } else if ($result === 'incorrect password') {
        $_SESSION['user'] = 0;
        $errors['incorrect-password'] = 'Password is incorrect, please try again.';
        include_once "./templates/_loginPage.html.php";
    }else if ($result === 'Username does not exist.') {
        $_SESSION['user'] = 0;
        $errors['incorrect-username'] = 'Username does not exist, please try again.';
        include_once "./templates/_loginPage.html.php";
    }
} else if (isset($_POST['logout'])) {
    // Destroy the session
    session_destroy();
    header("Location: login.php");
    exit;
}

include_once "./templates/_loginPage.html.php";


// Stop output buffering
$output = ob_get_clean();

// Include layout template
include_once "./templates/_layout.html.php";

// Close database connection
$db->disconnect();
