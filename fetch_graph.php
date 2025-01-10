<?php
include("db_connect.php");

// Fetch number of students by course
$sql = "SELECT course, COUNT(*) as count FROM students GROUP BY course";
$result = mysqli_query($conn, $sql);

$studentData = [];
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $studentData[] = [
            "label" => $row['course'],
            "y" => (int)$row['count']
        ];
    }
}

// Fetch active vs dropped students
$sql = "SELECT status, COUNT(*) as count FROM students GROUP BY status";
$result = mysqli_query($conn, $sql);

$activeData = [];
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $label = ($row['status'] == 1) ? "Active" : "Dropped";
        $activeData[] = [
            "label" => $label,
            "y" => (int)$row['count']
        ];
    }
}

// Return the data as JSON
echo json_encode([
    "studentData" => $studentData,
    "activeData" => $activeData
]);
?>
