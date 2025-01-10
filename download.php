<?php
// Include the database connection
include('db_connect.php');

session_start();

// Check if the user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // Redirect to login page if not logged in
    header("Location: index.php");
    exit();
}

// Get the file ID from the URL
$file_id = $_GET['id'] ?? null;

if ($file_id) {
    // Fetch the file details based on the given id
    $file_query = $conn->prepare("SELECT * FROM files WHERE id = ?");
    $file_query->bind_param("i", $file_id);
    $file_query->execute();
    $file_result = $file_query->get_result();
    $file = $file_result->fetch_assoc();
    $file_query->close();
    
    if (!$file) {
        die("File not found.");
    }

    // Set the file path and name
    $file_path = $file['path'];

    // Check if the file exists
    if (file_exists($file_path)) {
        // Force the download
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . basename($file_path) . '"');
        header('Content-Length: ' . filesize($file_path));
        readfile($file_path);
        exit;
    } else {
        die("File does not exist.");
    }
} else {
    die("Invalid file ID.");
}
?>
