<?php

require_once "./includes/database.php";
require_once "./classes/CategoryClass.php";
require_once "./classes/ShoppingCart.php";
require_once "./classes/CartItemClass.php";
require_once "./classes/ProductClass.php";
// start session
session_start();
// Open database connection
// Database connection (create instance of DBAccess class)
// $db is our DBAccess instance
$db->connect();

// Config
$title = "Checkout";

// Get shopping cart from the session (create a new cart if it doesn't exist)

if(empty($_SESSION["cart"])) {
    header("Location: cart.php");
}

$cart = $_SESSION["cart"];

// Start output buffering
ob_start();

//check if cart item is empty, otherwise redirect back to cart page
if($_SESSION['cartItem'] === 0){
    header("Location: cart.php");
}


if(isset($_POST['buyNow'])) {
    // Collection of all errors for this form (no errors by default)
    $errors = [];
    
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $address = $_POST['deliveryAddress'];
    $contactNumber = $_POST['contactNumber'];
    $email = $_POST['email'];
    $creditCardNumber = $_POST['creditCardNumber'];
    $expiryDate = $_POST['expiryDate'];
    $nameOnCard = $_POST['nameOnCreditCard'];
    $cSV = $_POST['cSV'];

    //validation area
    if ($firstName === "") {
        $errors["firstName"] = "First name is required.";
    }

    // Validate email
    if ($email === "") {
        $errors["email"] = "Email is required.";
    }

    // Validate password
    if (strlen($cSV) !== 3 ) {
        $errors["csv"] = "CSV must be 3 numbers.";
    }

    // Check if we have errors (invalid data)
    if (count($errors) > 0) {

        include_once "./templates/_checkoutPage.html.php";
    } else {

        // Valid - display confirmation
    $shoppingOrderId = $cart->saveCart($address, $contactNumber, $creditCardNumber, $cSV, $email, $expiryDate, $firstName, $lastName, $nameOnCard);
    
    //clear shopping cart after customer checked out
    $cart = new ShoppingCart();
    $_SESSION["cart"] = $cart;
    $_SESSION["cartItem"] = 0;
    include_once "./templates/_checkoutSuccessPage.html.php";
    }


} else {

// Just display the empty form
include_once "./templates/_checkoutPage.html.php";
}


// Stop output buffering
$output = ob_get_clean();

// Include layout template
include_once "./templates/_layout.html.php";

// Functions to handle loading data into the form

/**
 * Set an HTML-safe value of a form field from $_POST data.
 * @param string $fieldName The name of field to display.
 * @return string The HTML entity encoded output for the form field.
 */
function setValue($fieldName)
{
    return htmlspecialchars($_POST[$fieldName] ?? "");
}

/**
 * Return the "checked" attribute if the field value is checked.
 * @param string $fieldName The name of field to check.
 * @param string $fieldValue The value of field to check.
 * @return string The "checked" attribute if field value is checked.
 */
function setChecked($fieldName, $fieldValue)
{
    return ($_POST[$fieldName] ?? "") === $fieldValue ? "checked" : "";

    // if (isset($_POST[$fieldName]) && $_POST[$fieldName] === $fieldValue) {
    //   return "checked";
    // }

    // return "";
}

/**
 * Return the "selected" attribute if the field value is selected.
 * @param string $fieldName The name of field to check.
 * @param string $fieldValue The value of field to check.
 * @return string The "selected" attribute if field value is selected.
 */
function setSelected($fieldName, $fieldValue)
{
    return ($_POST[$fieldName] ?? "") === $fieldValue ? "selected" : "";
}

// Close database connection
$db->disconnect();
