<?php
// Include the database connection
require('db_connect.php');

session_start();

// Check if the user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // Redirect to login page if not logged in
    header("Location: index.php");
    exit();
}

if (isset($_POST['id']) && isset($_POST['file'])) {
    $id = $_POST['id'];
    $fileName = $_POST['file'];

    // Delete file from the server
    $filePath = "uploads/" . $fileName;
    if (file_exists($filePath)) {
        unlink($filePath); // Delete the file from the server
    }

    // Delete file record from the database
    $query = "DELETE FROM `student_files` WHERE student_id = $id AND file_name = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('s', $fileName);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo "File deleted successfully!";
    } else {
        echo "Failed to delete file.";
    }

    $stmt->close();
    $conn->close();
}
?>
