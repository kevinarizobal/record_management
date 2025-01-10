<?php
require('db_connect.php');

session_start();

// Check if the user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // Redirect to login page if not logged in
    header("Location: index.php");
    exit();
}

if (isset($_POST['id'])) {
    $studentId = $_POST['id'];
    $query = "DELETE FROM `students` WHERE `id` = '$studentId'";
    if ($conn->query($query)) {
        echo "<script>alert('Deleted Successfully!!');</script>";
        header("Location: manage_student.php"); 
    } else {
        echo "Error deleting student.";
    }
}
?>
