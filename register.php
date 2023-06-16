<?php

// Database connection (create instance of DBAccess class)
// $db is our DBAccess instance
require_once "./includes/database.php";

// Open database connection
$db->connect();

// Config
$title = "Register";

// Start output buffering
ob_start();

//list the categories
$sqlCategory = <<<SQL
SELECT categoryName, categoryId
FROM category
SQL;
$smstCat = $db->prepareStatement($sqlCategory);
$categories = $db->executeSQL($smstCat);

// Check if register form has been submitted
if (isset($_POST['submitRegister'])) {

    // Collection of all errors for this form (no errors by default)
    $errors = [];

    // Get data passed to this page - $_POST super global array
    $firstName = $_POST["firstName"] ?? "";
    $lastName = $_POST["lastName"] ?? "";
    $email = $_POST["email"] ?? "";
    $password1 = $_POST["password1"] ?? "";
    $password2 = $_POST["password2"] ?? "";
    $course = $_POST["course"] ?? "";
    $enrolmentMode = $_POST["enrolmentMode"] ?? "";
    $newsletter = isset($_POST["newsletter"]);
    $comments = $_POST["comments"] ?? "";

    // TESTING: Manually add errors into the list
    // $errors["firstName"] = "First name is required.";
    // $errors["lastName"] = "Last name is required.";

    // Validate first name
    //if (strlen($firstName) < 2) {
    if ($firstName === "") {
        $errors["firstName"] = "First name is required.";
    }

    // Validate last name
    if (strlen($lastName) < 2) {
        $errors["lastName"] = "Last name must be 2+ characters.";
    }

    // Validate email
    if ($email === "") {
        $errors["email"] = "Email is required.";
    }

    // Validate password
    if (strlen($password1) < 10) {
        $errors["password1"] = "Password must be 10+ characters.";
    }
    if ($password1 !== $password2) {
        $errors["password2"] = "Passwords don't match.";
    }

    // Check if we have errors (invalid data)
    if (count($errors) > 0) {

        // Invalid - re-display the form with errors
        include_once "./templates/_registerPage.html.php";
    } else {

        // Valid - display confirmation
        include_once "./templates/_registerConfirmation.html.php";
    }
} else {

    // Just display the empty form
    include_once "./templates/_registerPage.html.php";
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
