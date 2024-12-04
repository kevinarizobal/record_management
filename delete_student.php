<?php
require('db_connect.php');

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
