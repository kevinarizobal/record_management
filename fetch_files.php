<?php
require('db_connect.php');

header('Content-Type: application/json');

// Get the POST data
$request = json_decode(file_get_contents('php://input'), true);
$sort = $request['sort'] ?? null;
$search = $request['search'] ?? null;
$start_date = $request['start_date'] ?? null;
$end_date = $request['end_date'] ?? null;

// Base query
$query = "SELECT * FROM files";
$whereClauses = [];

// Search condition
if ($search) {
    $whereClauses[] = "file_name LIKE '%" . $conn->real_escape_string($search) . "%'";
}

// Sorting conditions
if ($sort === 'today') {
    $whereClauses[] = "DATE(modified_at) = CURDATE()";
} elseif ($sort === 'last7') {
    $whereClauses[] = "modified_at >= DATE_SUB(CURDATE(), INTERVAL 7 DAY)";
} elseif ($sort === 'last30') {
    $whereClauses[] = "modified_at >= DATE_SUB(CURDATE(), INTERVAL 30 DAY)";
} elseif ($sort === 'custom' && $start_date && $end_date) {
    $whereClauses[] = "DATE(modified_at) BETWEEN '$start_date' AND '$end_date'";
}

// Combine WHERE clauses
if (!empty($whereClauses)) {
    $query .= " WHERE " . implode(' AND ', $whereClauses);
}

// Order by modified_at
$query .= " ORDER BY modified_at DESC";

$result = $conn->query($query);
$data = [];

if ($result) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

echo json_encode($data);
?>
