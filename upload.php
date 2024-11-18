<?php
// Include your database connection here
include('db_connect.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if file is uploaded
    if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
        $file = $_FILES['file'];
        
        // Generate unique filename
        $fileName = uniqid() . '-' . basename($file['name']);
        $filePath = 'uploads/' . $fileName;  // The path to store file
        
        // Move the file to the destination folder
        if (move_uploaded_file($file['tmp_name'], $filePath)) {
            // Insert file information into database
            $name = basename($file['name']);
            $type = 'file';  // 'file' for regular files
            $createdAt = date('Y-m-d H:i:s');
            $modifiedAt = $createdAt;
            
            // Insert into the `files` table
            $query = "INSERT INTO `files` (`name`, `path`, `type`, `created_at`, `modified_at`) 
                      VALUES ('$name', '$filePath', '$type', '$createdAt', '$modifiedAt')";
            
            if (mysqli_query($conn, $query)) {
                echo json_encode(['message' => 'File uploaded successfully']);
            } else {
                echo json_encode(['message' => 'Failed to insert into the database']);
            }
        } else {
            echo json_encode(['message' => 'Failed to move uploaded file']);
        }
    } elseif (isset($_POST['folderName'])) {
        // Handle folder creation
        $folderName = $_POST['folderName'];
        $folderPath = 'uploads/' . $folderName;  // Path for the folder

        // Create the folder on the server
        if (!file_exists($folderPath)) {
            if (mkdir($folderPath, 0777, true)) {
                // Insert folder into the database
                $createdAt = date('Y-m-d H:i:s');
                $modifiedAt = $createdAt;
                
                $query = "INSERT INTO `files` (`name`, `path`, `type`, `created_at`, `modified_at`) 
                          VALUES ('$folderName', '$folderPath', 'folder', '$createdAt', '$modifiedAt')";
                
                if (mysqli_query($conn, $query)) {
                    echo json_encode(['message' => 'Folder created successfully']);
                } else {
                    echo json_encode(['message' => 'Failed to insert folder into the database']);
                }
            } else {
                echo json_encode(['message' => 'Failed to create folder']);
            }
        } else {
            echo json_encode(['message' => 'Folder already exists']);
        }
    } else {
        echo json_encode(['message' => 'No file or folder data received']);
    }
} else {
    echo json_encode(['message' => 'Invalid request method']);
}
?>
