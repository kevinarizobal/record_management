<?php
require('db_connect.php');

if (isset($_GET['id'])) {
    $studentId = $_GET['id'];
    $query = "SELECT * FROM `students` WHERE `id` = '$studentId'";
    $result = $conn->query($query);
    $student = $result->fetch_assoc();
    echo json_encode($student);
}
?>
