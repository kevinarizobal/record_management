<?php
// sql to delete a record
include('db_connect.php');

$id = $_GET['id'];

$sql = "DELETE FROM files WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
    // Redirect to billing.php after successful deletion
    header("Location: billing.php");
    exit();
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>
