<?php
$conn = new mysqli('localhost', 'root', '', 'file_management');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$data = json_decode(file_get_contents('php://input'), true);
$id = $data['id'];
$newName = $data['newName'];

// Sanitize and update the file or folder name in the database
$sql = "UPDATE files SET name = ? WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("si", $newName, $id);
$stmt->execute();

echo "File renamed successfully.";
?>