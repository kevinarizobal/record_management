<?php
// Database connection configuration
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'file_management';

// Create a new MySQLi connection
$conn = new mysqli($host, $username, $password, $database);

// Check for connection errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
