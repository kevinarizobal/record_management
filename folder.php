<?php
// Include the database connection
include('db_connect.php');

// Get the folder id from the URL
$folder_id = $_GET['id'] ?? null;

if ($folder_id) {
    // Fetch the folder details
    $folder_query = $conn->prepare("SELECT * FROM files WHERE id = ?");
    $folder_query->bind_param("i", $folder_id);
    $folder_query->execute();
    $folder_result = $folder_query->get_result();
    $folder = $folder_result->fetch_assoc();
    $folder_query->close();
    
    if (!$folder) {
        die("Folder not found.");
    }

    // Fetch all files and folders in the current folder
    $files_query = $conn->prepare("SELECT * FROM files WHERE parent_id = ? AND type='file'");
    $files_query->bind_param("i", $folder_id);
    $files_query->execute();
    $files_result = $files_query->get_result();
    $files_query->close();
} else {
    die("Invalid folder ID.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Folder: <?= htmlspecialchars($folder['name']) ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Folder: <?= htmlspecialchars($folder['name']) ?></h2>
        <a href="billing.php" class="btn btn-secondary mb-3">Back to File Manager</a>

        <h4>Contents of <?= htmlspecialchars($folder['name']) ?>:</h4>
        
        <table id="fileTable" class="table table-striped">
            <thead>
                <tr>
                    <!-- <th>ID</th> -->
                    <th>Name</th>
                    <th>Type</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($file = $files_result->fetch_assoc()): ?>
                    <tr>
                        <!-- <td><?= $file['id'] ?></td> -->
                        <td><?= htmlspecialchars($file['name']) ?></td>
                        <td><?= $file['type'] ?></td>
                        <td>
                            <?php
                                // Check file extension and render actions accordingly
                                $file_extension = strtolower(pathinfo($file['path'], PATHINFO_EXTENSION));
                                $viewable_files = ['png', 'jpeg', 'jpg', 'gif']; // List of viewable image file types

                                if ($file['type'] == 'folder'): ?>
                                    <a href="folder.php?id=<?= $file['id'] ?>" class="btn btn-info btn-sm">Open Folder</a>
                                <?php elseif (in_array($file_extension, $viewable_files)): ?>
                                    <!-- Button to view image files inline -->
                                    <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#fileModal" data-file-id="<?= $file['id'] ?>">View File</button>
                                <?php else: ?>
                                    <!-- Show only file info for non-image files -->
                                    <button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#fileModal" data-file-id="<?= $file['id'] ?>">View Info</button>
                                    <a href="download.php?id=<?= $file['id'] ?>" class="btn btn-success btn-sm">Download</a>
                                <?php endif; ?>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="fileModal" tabindex="-1" aria-labelledby="fileModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="fileModalLabel">File Information</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="fileViewerContainer">
                        <!-- Inline file viewer (like an iframe for images) will be loaded here -->
                        <iframe id="fileViewer" style="width: 100%; height: 500px;" frameborder="0"></iframe>
                    </div>
                    <div id="fileInfoContainer">
                        <!-- <p><strong>ID:</strong> <span id="fileId"></span></p> -->
                        <p><strong>Name:</strong> <span id="fileName"></span></p>
                        <p><strong>Path:</strong> <span id="filePath"></span></p>
                        <p><strong>Type:</strong> <span id="fileType"></span></p>
                        <p><strong>Created At:</strong> <span id="fileCreatedAt"></span></p>
                        <p><strong>Modified At:</strong> <span id="fileModifiedAt"></span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#fileTable').DataTable();

            $('#fileModal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget); // Button that triggered the modal
                var fileId = button.data('file-id'); // Extract file ID from data-* attributes
                
                // Make an AJAX request to fetch file details
                $.ajax({
                    url: 'file_info.php', // Server-side script to fetch file details
                    type: 'GET',
                    data: { id: fileId },
                    dataType: 'json',
                    success: function(response) {
                        // Check if the file is an image or not
                        var fileExtension = response.path.split('.').pop().toLowerCase();
                        var viewableTypes = ['png', 'jpeg', 'jpg', 'gif'];

                        // If it's an image, show it in the iframe
                        if (viewableTypes.includes(fileExtension)) {
                            $('#fileViewer').attr('src', 'view_file.php?id=' + fileId); // Show image in iframe
                            $('#fileViewer').show();
                            $('#fileInfoContainer').hide(); // Hide file info for images
                        } else {
                            // Show file information for non-image files
                            $('#fileViewer').hide(); // Hide the iframe for non-image files
                            $('#fileInfoContainer').show();
                        }

                        // Display file information
                        $('#fileId').text(response.id);
                        $('#fileName').text(response.name);
                        $('#filePath').text(response.path);
                        $('#fileType').text(response.type);
                        $('#fileCreatedAt').text(response.created_at);
                        $('#fileModifiedAt').text(response.modified_at);
                    },
                    error: function() {
                        alert('Error fetching file details.');
                    }
                });
            });
        });
    </script>
</body>
</html>
