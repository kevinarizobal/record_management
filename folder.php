<?php
// Include the database connection
include('db_connect.php');

// Get the folder id from the URL
$folder_id = $_GET['id'] ?? null;

if ($folder_id) {
    // Fetch the folder details based on the given id
    $folder_query = $conn->prepare("SELECT * FROM files WHERE id = ?");
    $folder_query->bind_param("i", $folder_id);
    $folder_query->execute();
    $folder_result = $folder_query->get_result();
    $folder = $folder_result->fetch_assoc();
    $folder_query->close();
    
    if (!$folder) {
        die("Folder not found.");
    }

    // Fetch all files and folders in the current folder (where parent_id matches the folder_id)
    $files_query = $conn->prepare("SELECT * FROM files WHERE parent_id = ? AND type = 'file'");
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
                    <th>ID</th>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($file = $files_result->fetch_assoc()): ?>
                    <tr>
                        <td><?= $file['id'] ?></td>
                        <td><?= htmlspecialchars($file['name']) ?></td>
                        <td><?= $file['type'] ?></td>
                        <td>
                            <?php if ($file['type'] == 'folder'): ?>
                                <a href="folder.php?id=<?= $file['id'] ?>" class="btn btn-info btn-sm">Open Folder</a>
                            <?php else: ?>
                               <a href="download.php?id=<?= $file['id'] ?>" class="btn btn-success btn-sm">Download File</a>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#fileTable').DataTable();
        });
    </script>
</body>
</html>
