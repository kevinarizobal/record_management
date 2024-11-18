<?php
// Include database connection
require('db_connect.php');

if (isset($_POST['folder_name'])) {
    $folderName = $_POST['folder_name'];
    $folderPath = 'uploads/' . $folderName;

    // Create the folder on the server
    if (!file_exists($folderPath)) {
        mkdir($folderPath, 0777, true);

        // Save folder details in the database
        $stmt = $pdo->prepare("INSERT INTO files (name, path, type) VALUES (?, ?, ?)");
        $stmt->execute([$folderName, $folderPath, 'folder']);

        echo json_encode(["message" => "Folder created successfully."]);
    } else {
        echo json_encode(["message" => "Folder already exists."]);
    }
} else {
    echo json_encode(["message" => "No folder name provided."]);
}
?>