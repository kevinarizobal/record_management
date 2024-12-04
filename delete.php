
<?php
$conn = new mysqli('localhost', 'root', '', 'file_management');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$data = json_decode(file_get_contents('php://input'), true);
$id = $data['id'];

// Delete file or folder from database
$sql = "DELETE FROM files WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();

echo "File deleted successfully.";
?>
