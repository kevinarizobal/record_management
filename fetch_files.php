<?php

session_start();

// Check if the user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // Redirect to login page if not logged in
    header("Location: index.php");
    exit();
}

$conn = new mysqli('localhost', 'root', '', 'file_management');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sort_by = $_GET['sort_by'] ?? 'modified'; // Default sort by 'modified'
$query = "SELECT * FROM files ORDER BY id DESC"; // Adjust as per your sorting needs

$result = $conn->query($query);

$files = [];
while ($row = $result->fetch_assoc()) {
    $files[] = $row;
}

header('Content-Type: application/json');
echo json_encode($files);
?>