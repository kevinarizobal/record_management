<?php
// Database connection
include('db_connect.php');

session_start();

// Check if the user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // Redirect to login page if not logged in
    header("Location: index.php");
    exit();
}

// Handle create folder
if (isset($_POST['create_folder'])) {
    $folder_name = $_POST['folder_name'];
    $parent_id = $_POST['parent_id'] ?? null;

    // Optionally override the parent_id (e.g., set to 0 if null, or set to a specific folder ID)
    if ($parent_id === null) {
        $parent_id = 0;  // or any other logic to set a default parent_id
    }

    // Construct the folder path
    $folder_path = $parent_id ? "uploads/" . $parent_id . "/" . $folder_name : "uploads/" . $folder_name;

    // Ensure the folder path exists
    if (!is_dir($folder_path)) {
        // Try creating the folder
        if (mkdir($folder_path, 0777, true)) {
            // Folder created successfully, now insert into the database
            $stmt = $conn->prepare("INSERT INTO files (name, path, type, parent_id) VALUES (?, ?, 'folder', ?)");
            if ($stmt === false) {
                echo "Error: Failed to prepare the statement. " . $conn->error;
                exit;
            }
            $stmt->bind_param("ssi", $folder_name, $folder_path, $parent_id);

            // Execute the statement
            if ($stmt->execute()) {
                echo "Folder created and inserted successfully.";
            } else {
                echo "Error: Failed to insert folder into the database. " . $stmt->error;
            }
            $stmt->close();
        } else {
            echo "Error: Unable to create folder. Check directory permissions.";
        }
    } else {
        echo "Error: Folder already exists.";
    }
}


// Handle file upload
if (isset($_FILES['file_upload'])) {
    $file_name = $_FILES['file_upload']['name'];
    $file_tmp = $_FILES['file_upload']['tmp_name'];
    $parent_id = $_POST['parent_id'] ?? null;

    // Clean file name to remove spaces or special characters
    $file_name = preg_replace('/[^a-zA-Z0-9._-]/', '_', $file_name);

    $upload_path = "uploads/" . $file_name;
    
    // Check if the uploads directory is writable
    if (!is_writable('uploads/')) {
        echo "Error: Upload directory is not writable. Please check permissions.";
    } else {
        if (move_uploaded_file($file_tmp, $upload_path)) {
            $stmt = $conn->prepare("INSERT INTO files (name, path, type, parent_id) VALUES (?, ?, 'file', ?)");
            $stmt->bind_param("ssi", $file_name, $upload_path, $parent_id);
            $stmt->execute();
            $stmt->close();
        } else {
            echo "Error: Failed to move the uploaded file.";
        }
    }
}

// Handle delete file/folder
if (isset($_POST['delete_file'])) {
    $id = $_POST['file_id'];

    // First, get the folder path to remove the actual folder
    $stmt = $conn->prepare("SELECT path FROM files WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $folder = $result->fetch_assoc();
    $folder_path = $folder['path'];
    
    // Remove folder from database
    $delete_stmt = $conn->prepare("DELETE FROM files WHERE id = ?");
    $delete_stmt->bind_param("i", $id);
    if ($delete_stmt->execute()) {
        // Delete the folder from the server
        if (is_dir($folder_path)) {
            // Recursively delete folder content if needed (if it's not empty)
            array_map('unlink', glob("$folder_path/*"));
            rmdir($folder_path); // Delete the empty folder
        }
        echo "Folder deleted successfully.";
    } else {
        echo "Error: Unable to delete folder from the database.";
    }
    $stmt->close();
    $delete_stmt->close();
}

// Handle edit file/folder
if (isset($_POST['edit_file'])) {
    $id = $_POST['file_id'];
    $name = $_POST['file_name'];
    $stmt = $conn->prepare("UPDATE files SET name = ? WHERE id = ?");
    $stmt->bind_param("si", $name, $id);
    $stmt->execute();
    $stmt->close();
}

// Fetch files and folders
$result = $conn->query("SELECT * FROM files Where type='folder'");
$num = 1;

$next_id_query = $conn->query("SELECT MAX(id) + 1 AS next_id FROM files");
$next_id_row = $next_id_query->fetch_assoc();
$next_id = $next_id_row['next_id'] ?? 1; // Default to 1 if table is empty
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Manager</title>
    <?php require('links/links.php');?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" rel="stylesheet">
    <style>
        .table-container {
            max-height: 400px;
            overflow-y: auto;
        }
    </style>
</head>
<body>

<?php require('inc/header.php');?>
    <div class="container-fluid" id="main-content">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
                <div class="card border-0 shadow-sm mt-4 mb-4 align-content-center">
                    <div class="card-body">
                        <div class="d-flex justify-content-start align-items-center mb-4 gap-3">
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createFolderModal">Create Folder</button>
                            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#uploadFileModal">Upload File</button>
                        </div>

                        <div class="table-container mt-5">
                            <table id="fileTable" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Folder</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($row = $result->fetch_assoc()): ?>
                                        <tr>
                                            <td>
                                                <?php if ($row['parent_id'] != null): ?>
                                                    <?php
                                                    // Get parent folder details
                                                    $parent_result = $conn->query("SELECT name FROM files WHERE id = " . $row['parent_id'] . " ORDER BY name ASC");

                                                    $parent_row = $parent_result->fetch_assoc();
                                                    ?>
                                                    <a href="folder.php?id=<?= $row['parent_id'] ?>"><?= $parent_row['name'] ?></a>
                                                <?php else: ?>
                                                    Root Folder
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editFileModal" data-id="<?= $row['id'] ?>" data-name="<?= $row['name'] ?>">Edit</button>
                                                <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteFileModal" data-id="<?= $row['id'] ?>" data-name="<?= $row['name'] ?>">Delete</button>
                                            </td>
                                        </tr>
                                    <?php endwhile; ?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>

<!-- Create Folder Modal -->
<div class="modal fade" id="createFolderModal" tabindex="-1" aria-labelledby="createFolderModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST">
                <div class="modal-header">
                    <h5 class="modal-title" id="createFolderModalLabel">Create Folder</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="folder_name" class="form-label">Folder Name</label>
                        <input type="text" class="form-control" name="folder_name" required>
                    </div>
                    <div class="mb-3">
                        <label for="parent_id" class="form-label">Parent Folder</label>
                        <input type="number" class="form-control" name="parent_id" value="<?= $next_id ?>" readonly>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="create_folder" class="btn btn-primary">Create</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Upload File Modal -->
<div class="modal fade" id="uploadFileModal" tabindex="-1" aria-labelledby="uploadFileModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="uploadFileModalLabel">Upload File</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="file_upload" class="form-label">Select File</label>
                        <input type="file" class="form-control" name="file_upload" required>
                    </div>
                    <div class="mb-3">
                        <label for="parent_id" class="form-label">Parent Folder</label>
                        <select name="parent_id" class="form-control">
                            <option value="">Select Parent Folder</option>
                            <?php
                            // Fetch all folders to populate the parent folder dropdown
                            $folders = $conn->query("SELECT id, name FROM files WHERE type = 'folder'");
                            while ($folder = $folders->fetch_assoc()):
                            ?>
                                <option value="<?= $folder['id'] ?>"><?= htmlspecialchars($folder['name']) ?></option>
                            <?php endwhile; ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Upload</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit File Modal -->
<div class="modal fade" id="editFileModal" tabindex="-1" aria-labelledby="editFileModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST">
                <div class="modal-header">
                    <h5 class="modal-title" id="editFileModalLabel">Edit File/Folder</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="file_id" id="editFileId">
                    <div class="mb-3">
                        <label for="file_name" class="form-label">Name</label>
                        <input type="text" class="form-control" name="file_name" id="editFileName" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="edit_file" class="btn btn-warning">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteFileModal" tabindex="-1" aria-labelledby="deleteFileModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteFileModalLabel">Confirm Delete</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete <span id="deleteFileName"></span>?
                    <input type="hidden" name="file_id" id="deleteFileId">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" name="delete_file" class="btn btn-danger">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#fileTable').DataTable();

        $('#editFileModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var id = button.data('id');
            var name = button.data('name');
            var modal = $(this);
            modal.find('#editFileId').val(id);
            modal.find('#editFileName').val(name);
        });

        $('#deleteFileModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var id = button.data('id');
            var name = button.data('name');
            var modal = $(this);
            modal.find('#deleteFileId').val(id);
            modal.find('#deleteFileName').text(name);
        });
    });
</script>
</body>
</html>
