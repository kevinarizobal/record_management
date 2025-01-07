<?php
include('db_connect.php');

$file_id = $_GET['id'] ?? null;

if (!$file_id) {
    http_response_code(400);
    die('Invalid file ID.');
}

// Fetch file details
$query = $conn->prepare("SELECT * FROM files WHERE id = ?");
$query->bind_param("i", $file_id);
$query->execute();
$result = $query->get_result();
$file = $result->fetch_assoc();
$query->close();

if (!$file) {
    http_response_code(404);
    die('File not found.');
}

$file_path = $file['path'];
$file_type = strtolower(pathinfo($file_path, PATHINFO_EXTENSION));

if (!file_exists($file_path)) {
    http_response_code(404);
    die('File not found.');
}

// Serve file content
header('Content-Disposition: inline; filename="' . basename($file_path) . '"');

switch ($file_type) {
    case 'jpg':
    case 'jpeg':
    case 'png':
    case 'gif':
        header('Content-Type: image/' . $file_type);
        readfile($file_path);
        break;
    case 'pdf':
        header('Content-Type: application/pdf');
        readfile($file_path);
        break;
    case 'doc':
    case 'docx':
    case 'xls':
    case 'csv':
    case 'xlsx':
        header('Content-Type: application/vnd.openxmlformats-officedocument');
        readfile($file_path);
        break;
    default:
        header('Content-Type: application/octet-stream');
        readfile($file_path);
}
?>
