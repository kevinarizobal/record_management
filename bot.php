<?php
// Include the database connection
require('db_connect.php');

// Search query logic (if any search term is passed)
$search = isset($_GET['search']) ? $_GET['search'] : '';

// SQL query to fetch ICT students' data from the database
$query = "SELECT `id`, `name`, `email`, `contact_number`, `profile_picture`, `attachment`, `course`, `section`, `gender`, `date_of_birth`, `school_id`, `address`, `mother_name`, `father_name`, `guardian_contact_number`, `guardian_address`, `status`, `date_enrolled` FROM `students` WHERE course = 'BOT' AND (name LIKE '%$search%' OR section LIKE '%$search%')";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BOT Students</title>
    <?php require('links/links.php'); ?>
</head>
<body class="bg-light">

<?php require('inc/header.php'); ?>

<div class="container-fluid" id="main-content">
    <div class="row">
        <div class="col-lg-10 ms-auto p-4 overflow-hidden">
            <span class="d-flex justify-content-between align-items-center">
                <h1 class="mb-2 mt-1">BOT STUDENTS</h1>
                <form class="d-flex" role="search" method="GET" action="">
                    <input class="form-control me-2" type="search" name="search" placeholder="Search" value="<?php echo htmlspecialchars($search); ?>" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </span>

            <div class="card border-0 bg-white shadow-sm mt-4 mb-4 align-content-center">
                <div class="row card-body justify-content-between me-3 ms-0">
                    <?php if ($result->num_rows > 0): ?>
                        <?php while ($row = $result->fetch_assoc()): ?>
                            <div class="col-lg-2">
                                <div class="card border-0 shadow-sm text-center" style="width: 12rem;">
                                    <img src="<?php echo $row['profile_picture']; ?>" class="card-img-top shadow-sm p-2" style="width: 12rem; height: 12rem;" alt="Profile Picture">
                                    <div class="card-body">
                                        <h6 class="card-title"><?php echo $row['name']; ?></h6>
                                        <p class="card-text">Section: <?php echo $row['section']; ?></p>
                                        <a data-bs-target="#registerModal" data-bs-toggle="modal" data-id="<?php echo $row['id']; ?>" class="btn btn-success view-info">MORE INFO</a>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <p>No students found.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal for displaying student details -->
<div class="modal fade" id="registerModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-xl">
        <div class="modal-content">
            <form id="register-form">
                <div class="modal-header">
                    <h3 class="modal-title d-flex align-items-center">
                        <i class="bi bi-person-lines-fill fs-3 me-2"></i>STUDENT INFORMATION
                    </h3>
                    <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" style="max-height: 70vh; overflow-y: auto;">
                    <div class="container-fluid">
                        <div class="row" id="student-info">
                            <!-- Student info will be dynamically loaded here -->
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php require('inc/script.php'); ?>
<script src="bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>

<script>
// JavaScript to handle modal and fetch student details
document.addEventListener('DOMContentLoaded', function() {
    // Handle click on 'More Info' button
    document.querySelectorAll('.view-info').forEach(function(button) {
        button.addEventListener('click', function(e) {
            var studentId = this.getAttribute('data-id');
            fetchStudentInfo(studentId);
        });
    });
});

// Function to fetch student information using AJAX
function fetchStudentInfo(id) {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "fetch_student_info.php?id=" + id, true);
    xhr.onload = function() {
        if (xhr.status == 200) {
            document.getElementById('student-info').innerHTML = xhr.responseText;
        }
    };
    xhr.send();
}

// Event listener for delete button
document.querySelectorAll('.delete-file').forEach(function(button) {
    button.addEventListener('click', function() {
        var fileName = this.getAttribute('data-file-name');
        var fileId = this.getAttribute('data-file-id');
        
        // Confirm deletion
        if (confirm("Are you sure you want to delete the file: " + fileName + "?")) {
            // AJAX request to delete the file
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'delete_file.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onload = function() {
                if (xhr.status == 200) {
                    alert('File deleted successfully!');
                    location.reload(); // Reload the page to update the list
                } else {
                    alert('Failed to delete the file.');
                }
            };
            xhr.send('id=' + fileId + '&file=' + encodeURIComponent(fileName));
        }
    });
});
</script>

</body>
</html>
