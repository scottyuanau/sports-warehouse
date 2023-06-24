<?php
// Database connection (create instance of DBAccess class)
// $db is our DBAccess instance
require_once "./includes/database.php";
require_once "./classes/CategoryClass.php";
require_once "./classes/ShoppingCart.php";
require_once "./classes/CartItemClass.php";
require_once "./classes/ProductClass.php";
// start session
session_start();

// Open database connection
$db->connect();
// Config
$title = "Shopping Cart";

// Get shopping cart from the session (create a new cart if it doesn't exist)
$cart = $_SESSION["cart"] ?? new ShoppingCart();

// Start output buffering
ob_start();

//list the categories
$categoryObj = new Category();
$categories = $categoryObj->getCategories();

// Check if add to cart form has been submitted
if (isset($_POST['submitAddToCart'])) {

    // Collection of all errors for this form (no errors by default)
    $errors = [];

    // Get data passed to this page - $_POST super global array
    $itemId = $_POST["itemId"] ?? 0;
    $qty = $_POST["qty"] ?? 1;
    

    // Optional: Manually add errors into the list
    if ($qty < 0) {
        $errors["qty"] = "Quantity must be more than 0.";
    }


    // Check if we have no errors (valid data)
    if (count($errors) === 0) {

    // Valid - add the item to the shopping cart
    try {
    //Get product using the ID
    $product = new Product();
    $product->getProduct($itemId);
    $productName = $product->getProductName();
    $unitPrice = $product->getUnitPrice();
    $salePrice = $product->getSalePrice();

    // determine which price to be used to include in the cart
    if ($unitPrice != 0 && $salePrice !== null){
        $price = $salePrice;
    } else if ($unitPrice == 0 || $salePrice === null) {
        $price = $unitPrice;
    }
        

    // Create a new CartItem
    $item = new CartItem($productName, $qty, $price, $itemId);

    // Add item to the shopping cart
    $cart->addItem($item);


    // save the shopping cart into the session
    $_SESSION["cart"] = $cart;
    $_SESSION["cartItem"] = $cart->count();

    } catch(Exception $err) {
        $error["exception"] = "Error adding to cart: ". $err->getMessage();
    }
    }
} else if (isset($_POST['submitRemoveFromCart'])) {

    //Remove item from shopping cart
    $itemId = $_POST["itemId"] ?? 0;

    try {
        //get product name from the id
        $product = new Product();
        $product->getProduct($itemId);
        $productName = $product->getProductName();

        
        // Create a new CartItem
        $item = new CartItem($productName, 0, 0, $itemId);

        // Remove item from the shopping cart
        $cart->removeItem($item);

        //update global variable
        $cartCount = $cart->count();

        // Save the shopping cart into the session
        $_SESSION["cart"] = $cart;
        $_SESSION["cartItem"] = $cart->count();
    } catch(Exception $err) {
        $error["exception"] = "Error removing from cart: ". $err->getMessage();
    }

}
// Display the shopping cart
include_once "./templates/_cartPage.html.php";


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
