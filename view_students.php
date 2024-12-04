<?php
require('db_connect.php');

if (isset($_GET['id'])) {
    $studentId = $_GET['id'];
    $query = "SELECT * FROM students WHERE id = '$studentId'";
    $result = mysqli_query($conn, $query);
    
    if ($row = mysqli_fetch_assoc($result)) {
        echo json_encode($row);
    }
}
?>
