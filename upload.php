<?php
$conn = new mysqli('localhost', 'root', '', 'file_management');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Set the uploads directory
    $uploads_dir = 'uploads';

    // Ensure the uploads directory exists
    if (!is_dir($uploads_dir)) {
        mkdir($uploads_dir, 0777, true);
    }

    // Handle folder creation
    if (isset($_POST['folder_name'])) {
        $folder_name = trim($_POST['folder_name']);
        $path = "$uploads_dir/$folder_name";

        if (!file_exists($path)) {
            if (mkdir($path, 0777, true)) {
                $stmt = $conn->prepare("INSERT INTO files (name, type, path) VALUES (?, 'folder', ?)");
                $stmt->bind_param('ss', $folder_name, $path);
                $stmt->execute();
                echo "Folder created successfully.";
            } else {
                echo "Error creating folder.";
            }
        } else {
            echo "Folder already exists.";
        }
    }
    // Handle file upload
    elseif (isset($_FILES['file'])) {
        $file = $_FILES['file'];
        $file_name = basename($file['name']);
        $target_path = "$uploads_dir/$file_name";

        if (move_uploaded_file($file['tmp_name'], $target_path)) {
            $stmt = $conn->prepare("INSERT INTO files (name, type, path) VALUES (?, 'file', ?)");
            $stmt->bind_param('ss', $file_name, $target_path);
            $stmt->execute();
            echo "File uploaded successfully.";
        } else {
            echo "Error uploading file.";
        }
    } else {
        echo "No file or folder data received.";
    }
}
?>
