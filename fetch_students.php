<?php 
// fetch_students.php
include 'db_connect.php';

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