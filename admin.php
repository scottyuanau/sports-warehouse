<?php
// start session
session_start();
// Database connection (create instance of DBAccess class)
// $db is our DBAccess instance
require_once "./includes/database.php";
require_once "./classes/ProductClass.php";
require_once "./classes/CategoryClass.php";

// Open database connection
$db->connect();
// Config
$title = "Admin";

// Start output buffering
ob_start();

// if user is not logged in, redirect to the login page
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
}

// if user is not admin, advise user that only admin is allowed
if ($_SESSION['user'] !== 2) {
    echo "Only admin is allowed to access this page";
}



// Check if the user is not logged in as admin (user id is 2)
if (isset($_SESSION['user']) && $_SESSION['user'] === 2 ) {


// New product object
$productObj = new Product();
$productList = $productObj->getProducts();

// New Category object
$categoryObj = new Category();
$categoryList = $categoryObj->getCategories();

$errors = [];

if (isset($_POST['submitRemoveFromProducts'])) {

  //Remove item from product list
  $itemId = $_POST["itemId"];

  try {
      //get product name from the id
      $product = new Product();
      $product->deleteProduct($itemId);

      //refresh the page after the product has been deleted.
      header("Location: " . $_SERVER['REQUEST_URI']);

  } catch(Exception $err) {
      $error["exception"] = "Error deleting the product: ". $err->getMessage();
  }
  
} else if (isset($_POST['submitRemoveFromCategories'])) {

  //Remove item from category list
  $categoryId = $_POST["categoryId"];

  try {
      //get product name from the id
      $category = new Category();
      $category->deleteCategory($categoryId);

      //refresh the page after the product has been deleted.
      header("Location: " . $_SERVER['REQUEST_URI']);

  } catch(Exception $err) {
      $error["exception"] = "Error deleting the category: ". $err->getMessage();
  }
  
} else if (isset($_POST['submitUpdateCategories'])) {

  //Remove item from category list
  $categoryId = $_POST["categoryId"];
  $newCategoryName = $_POST["newCategoryName"];

  try {
      //get product name from the id
      $category = new Category();
      $category->getCategory($categoryId);
      $category->setCategoryName($newCategoryName);
      $category->updateCategory($categoryId);

      //refresh the page after the product has been deleted.
      header("Location: " . $_SERVER['REQUEST_URI']);

  } catch(Exception $err) {
      $error["exception"] = "Error deleting the category: ". $err->getMessage();
  }
  
} else if (isset($_POST['submitUpdateProduct'])) {

  //Update the product details
  $itemId = $_POST["itemId"];
  $newProductName = $_POST["itemName"];
  $newPrice = $_POST["price"];
  $newSalePrice = $_POST["salePrice"];
  $newPhoto = $_POST["photo"];
  $newCategoryId = $_POST["categoryId"];
//   $newFeatured= $_POST["featured"];
    $newFeatured = 0;
    if(isset($_POST["featured"])) {
        $newFeatured = 1;
    }

  $newDescription = $_POST["description"];

  try {
      //get product name from the id
      $product = new Product();
      $product->getProduct($itemId);

      //update the private variables
      $product->setProductName($newProductName);
      $product->setUnitPrice($newPrice);
      $product->setSalePrice($newSalePrice);
      $product->setPhoto($newPhoto);
      $product->setCategoryId($newCategoryId);
      $product->setFeatured($newFeatured);
      $product->setDescription($newDescription);

      //update product
      $product->updateProduct($itemId);

      //refresh the page after the product has been deleted.
      header("Location: " . $_SERVER['REQUEST_URI']);

  } catch(Exception $err) {
      $error["exception"] = "Error deleting the category: ". $err->getMessage();
  }
  
} 



if (count($errors) > 0) {
  // Invalid - re-display the form with errors
  include_once "./templates/_formErrorSummary.html.php";
} 

// Include the page-specific template
include_once "./templates/_adminPage.html.php";



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
