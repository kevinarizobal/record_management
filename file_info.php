<?php
include('db_connect.php');

session_start();

// Check if the user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // Redirect to login page if not logged in
    header("Location: index.php");
    exit();
}

$file_id = $_GET['id'] ?? null;
if ($file_id) {
    $query = $conn->prepare("SELECT * FROM files WHERE id = ?");
    $query->bind_param("i", $file_id);
    $query->execute();
    $result = $query->get_result();
    $file = $result->fetch_assoc();
    $query->close();

    if ($file) {
        echo json_encode($file);
    } else {
        echo json_encode(['error' => 'File not found']);
    }
} else {
    echo json_encode(['error' => 'Invalid file ID']);
}
?>
