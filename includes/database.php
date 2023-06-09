<?php

require "classes/DBAcess.php";
/**
 * A PHP class to provide access to a MySQL database
 */
$dbServer = "localhost";
$dbDatabase = "sportswh";
$dbUsername = "root";
$dbPassword = "";


// Create a new instance of database connection
$db = new DBAccess($dbServer, $dbDatabase, $dbUsername, $dbPassword);
