<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Management</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <?php require('links/links.php');?>
</head>
<body class="bg-light">
<?php require('inc/header.php');?>
<div class="container-fluid" id="main-content">
    <div class="row">
        <!-- Main content -->
        <div class="col-lg-7 ms-auto p-4 overflow-hidden">
            <span class="d-flex justify-content-between align-items-center">
                <h1 class="mb-4">File Management</h1>
            </span>
            <!-- Upload and Create Folder -->
            <div class="card border-0 shadow-sm mt-3 mb-5 align-content-center">
                <div class="card-body">
                    <div class="d-flex mb-4 mt-3">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success fw-bold" type="submit">Search</button>
                    </div>
                    <div class="d-flex align-items-center">
                        <div class="row">
                            <div class="d-flex align-items-center">
                                <h5 class="mt-2">Sort by: </h5>
                                <select id="sortSelect" class="form-select w-auto ms-2" aria-label="Default select example">
                                    <option selected>Modified</option>
                                    <option value="1">Today</option>
                                    <option value="2">Last 7 days</option>
                                    <option value="3">Last 30 days</option>
                                    <option value="4">Custom</option>
                                </select>
                                <!-- Date range inputs, hidden by default -->
                                <div id="dateRange" class=" ms-2" style="display: none;">
                                    <input type="date" id="startDate" class="form-control" placeholder="Start Date">
                                    <input type="date" id="endDate" class="form-control ms-2" placeholder="End Date">
                                </div>
                            </div>
                            <div class="d-flex flex-row mt-5 mb-5">
                                <!-- File and Folder Display -->
                                <div class="d-flex flex-row flex-wrap" id="fileContainer">
                                    <!-- Files and folders will be loaded here dynamically -->
                                </div>
                            </div>
                        </div>  
                    </div>
                    <div class="ms-auto d-flex justify-content-end align-items-center mt-3 mb-2">
                        <div class="text-center">
                            <button class="btn btn-success me-2" data-bs-toggle="modal" data-bs-target="#uploadModal">
                                <i class="bi bi-file-earmark-plus-fill"></i> UPLOAD FILE
                            </button>
                            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#folderModal">
                                <i class="bi bi-folder-plus"></i> NEW FOLDER
                            </button>
                        </div>
                    </div>
                </div>
            </div>


        </div>

        <!-- Preview Section -->
        <div class="col-lg-3 p-4">
            <h3 class="text-center">Preview</h3>
            <div class="card shadow-sm text-center" id="previewSection">
                <p class="mt-3">Select a file or folder to preview.</p>
                <img src="" id="previewImage" class="card-img-top p-2 d-none" style="max-height: 200px;">
                <h6 class="card-title mt-3" id="previewName"></h6>
            </div>
        </div>
    </div>
</div>

<!-- Context Menu -->
<div id="contextMenu" class="position-absolute bg-white shadow-sm border rounded" style="display: none; z-index: 1000;">
    <ul class="list-unstyled m-0 p-2">
        <li class="py-1 px-3 text-hover" id="renameOption">Rename</li>
        <li class="py-1 px-3 text-hover text-danger" id="deleteOption">Delete</li>
    </ul>
</div>

<!-- Upload File Modal -->
<div class="modal fade" id="uploadModal" tabindex="-1" aria-labelledby="uploadModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="uploadModalLabel">Upload File</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="file" id="fileInput" class="form-control">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" id="uploadFileBtn" class="btn btn-success">Upload</button>
            </div>
        </div>
    </div>
</div>

<!-- New Folder Modal -->
<div class="modal fade" id="folderModal" tabindex="-1" aria-labelledby="folderModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="folderModalLabel">Create New Folder</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="text" id="folderInput" class="form-control" placeholder="Enter folder name">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" id="createFolderBtn" class="btn btn-success">Create</button>
            </div>
        </div>
    </div>
</div>

<script>
// Load files
function loadFiles(sortBy = 'modified') {
    fetch(`fetch_files.php?sort_by=${sortBy}`)
        .then(response => response.json())
        .then(data => {
            const container = document.getElementById('fileContainer');
            container.innerHTML = ''; // Clear existing files

            data.forEach(item => {
                const card = document.createElement('div');
                card.className = 'card border-0 shadow-sm text-center m-2';
                card.style.width = '12rem';
                card.dataset.item = JSON.stringify(item); // Attach item data to the card

                card.innerHTML = item.type === 'folder'
                    ? `<i class="bi bi-folder" style="font-size: 8rem;"></i>
                       <h6 class="card-title mb-3">${item.name}</h6>`
                    : `<img src="${item.path}" class="card-img-top p-2" style="max-height: 150px;" alt="${item.name}">
                       <h6 class="card-title mb-3">${item.name}</h6>`;

                card.addEventListener('click', () => previewItem(item));
                container.appendChild(card);
            });
        });
}

// Preview files and folders
function previewItem(item) {
    const previewSection = document.getElementById('previewSection');
    const previewImage = document.getElementById('previewImage');
    const previewName = document.getElementById('previewName');

    previewName.textContent = item.name;
    if (item.type === 'file') {
        previewImage.src = item.path;
        previewImage.classList.remove('d-none');
    } else {
        previewImage.classList.add('d-none');
    }
}

// Upload file
document.getElementById('uploadFileBtn').addEventListener('click', () => {
    const fileInput = document.getElementById('fileInput');
    const formData = new FormData();

    if (fileInput.files.length > 0) {
        formData.append('file', fileInput.files[0]);

        fetch('upload.php', { method: 'POST', body: formData })
            .then(response => response.text())
            .then(data => {
                alert(data);
                loadFiles();
            })
            .catch(error => console.error('Error:', error));
    } else {
        alert('Please select a file to upload.');
    }
});

// Create new folder
document.getElementById('createFolderBtn').addEventListener('click', () => {
    const folderInput = document.getElementById('folderInput');
    const folderName = folderInput.value.trim();

    if (folderName) {
        const formData = new FormData();
        formData.append('folder_name', folderName);

        fetch('upload.php', { method: 'POST', body: formData })
            .then(response => response.text())
            .then(data => {
                alert(data);
                loadFiles();
            })
            .catch(error => console.error('Error:', error));
    } else {
        alert('Please enter a folder name.');
    }
});

// Sorting
document.getElementById('sortSelect').addEventListener('change', function () {
    loadFiles(this.value);
});

// Initial load
document.addEventListener('DOMContentLoaded', () => {
    loadFiles();

    // Right-click context menu setup
    const contextMenu = document.getElementById('contextMenu');
    let selectedItem = null;

    document.addEventListener('click', () => {
        contextMenu.style.display = 'none'; // Hide menu on click outside
    });

    document.getElementById('fileContainer').addEventListener('contextmenu', (event) => {
        event.preventDefault();
        
        if (event.target.closest('.card')) {
            selectedItem = JSON.parse(event.target.closest('.card').dataset.item); // Get the attached item

            // Show the context menu at the mouse position
            contextMenu.style.top = `${event.pageY}px`;
            contextMenu.style.left = `${event.pageX}px`;
            contextMenu.style.display = 'block';
        }
    });

    // Rename functionality
    document.getElementById('renameOption').addEventListener('click', () => {
        const newName = prompt('Enter new name:', selectedItem.name);
        if (newName && newName.trim() !== '') {
            fetch('rename.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ id: selectedItem.id, newName })
            })
                .then(response => response.text())
                .then(data => {
                    alert(data);
                    loadFiles();
                })
                .catch(error => console.error('Error:', error));
        }
    });

    // Delete functionality
    document.getElementById('deleteOption').addEventListener('click', () => {
        if (confirm(`Are you sure you want to delete ${selectedItem.name}?`)) {
            fetch('delete.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ id: selectedItem.id })
            })
                .then(response => response.text())
                .then(data => {
                    alert(data);
                    loadFiles();
                })
                .catch(error => console.error('Error:', error));
        }
    });
});


</script>

<?php require('inc/script.php'); ?>
<script src="bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>