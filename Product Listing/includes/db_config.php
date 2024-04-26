

<?php
// Database configuration
$host = 'localhost'; // Database host (usually 'localhost')
$dbname = 'ecomm'; // Database name
$username = 'root'; // Database username
$password = ''; // Database password

// Attempt to establish a connection to the database
$mysqli = new mysqli($host, $username, $password, $dbname);

// Check if connection was successful
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
?>
