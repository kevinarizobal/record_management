<?php 
include("db_connect.php");

// Fetch data for Student Chart
$studentQuery = "SELECT course, COUNT(*) AS student_count FROM students GROUP BY course";
$studentResult = $conn->query($studentQuery);
$studentData = [];
while ($row = $studentResult->fetch_assoc()) {
    $studentData[] = ["label" => $row["course"], "y" => (int)$row["student_count"]];
}

// Fetch data for Active Chart
$activeQuery = "SELECT status, COUNT(*) AS count FROM students GROUP BY status";
$activeResult = $conn->query($activeQuery);
$activeData = [];
while ($row = $activeResult->fetch_assoc()) {
    $activeData[] = ["label" => $row["status"], "y" => (int)$row["count"]];
}

// Pass data to the front-end as JSON
header('Content-Type: application/json');
echo json_encode(["studentData" => $studentData, "activeData" => $activeData]);
$conn->close();
?>