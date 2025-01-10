<?php 
// fetch_students.php
include 'db_connect.php';


session_start();

// Check if the user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // Redirect to login page if not logged in
    header("Location: index.php");
    exit();
}

$query = "SELECT * FROM students";
$result = $conn->query($query);

$data = [];
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

// Output as JSON
header('Content-Type: application/json');
echo json_encode(['data' => $data]);
?>