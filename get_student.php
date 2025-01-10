<?php
require('db_connect.php');

session_start();

// Check if the user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // Redirect to login page if not logged in
    header("Location: index.php");
    exit();
}

if (isset($_GET['id'])) {
    $studentId = $_GET['id'];
    $query = "SELECT * FROM `students` WHERE `id` = '$studentId'";
    $result = $conn->query($query);
    $student = $result->fetch_assoc();
    echo json_encode($student);
}
?>
