<?php
// config.php

// Database configuration
define('DB_HOST', 'localhost'); // Database host
define('DB_USER', 'root');      // Database username
define('DB_PASS', '');          // Database password
define('DB_NAME', 'multi_email_sender'); // Database name

// Create a database connection
function getDatabaseConnection() {
    // Using mysqli for database connection
    $connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    // Check if the connection was successful
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }

    return $connection;
}

// Get a database connection
$conn = getDatabaseConnection();
session_start();