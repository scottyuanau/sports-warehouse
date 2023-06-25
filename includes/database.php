<?php

require_once "classes/DBAcess.php";
/**
 * A PHP class to provide access to a MySQL database
 */

if (
    $_SERVER['SERVER_NAME'] === 'localhost' ||
    $_SERVER['Server_ADDR'] === "127.0.0.1" ||
    $_SERVER['Server_ADDR'] === "::1" 
) {
    // database config - local
    $dbServer = "localhost";
    $dbDatabase = "sportswh";
    $dbUsername = "root";
    $dbPassword = "";
    $relativeurl = $_SERVER['SERVER_NAME'] . ":8080/sports-warehouse/";
} else {
    // database config - remote
    $dbServer = "sql209.infinityfree.com";
    $dbDatabase = "if0_34496115_sports_warehouse";
    $dbUsername = "if0_34496115";
    $dbPassword = "IhFUpVKbzp";
    $relativeurl = $_SERVER['SERVER_NAME'] . "/";
}

// Create a new instance of database connection
$db = new DBAccess($dbServer, $dbDatabase, $dbUsername, $dbPassword);
