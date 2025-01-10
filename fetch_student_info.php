<?php
// Include the database connection
require('db_connect.php');

session_start();

// Check if the user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // Redirect to login page if not logged in
    header("Location: index.php");
    exit();
}

// Get the student ID from the URL parameter
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // SQL query to fetch student details
    $query = "SELECT `id`, `name`, `email`, `contact_number`, `profile_picture`, `attachment`, `course`, `section`, `gender`, `date_of_birth`, `school_id`, `address`, `mother_name`, `father_name`, `guardian_contact_number`, `guardian_address`, `status`, `date_enrolled` FROM `students` WHERE id = $id";
    $result = $conn->query($query);

    // Check if the student exists
    if ($result->num_rows > 0) {
        $student = $result->fetch_assoc();

        // Output the student info in HTML format
        echo '
        <h3 class="modal-title text-center">STUDENT BASIC INFORMATION</h3>
        <div class="col-lg-6 ps-0 mb-3">
            <label class="form-label">Name</label>
            <input name="name" type="text" class="form-control shadow-none" value="' . htmlspecialchars($student['name']) . '" disabled>
        </div>
        <div class="col-md-6 p-0 mb-3">
            <label class="form-label">Email</label>
            <input name="email" type="email" class="form-control shadow-none" value="' . htmlspecialchars($student['email']) . '" disabled>
        </div>
        <div class="col-md-6 ps-0 mb-3">
            <label class="form-label">Contact Number</label>
            <input name="snumber" type="number" class="form-control shadow-none" value="' . htmlspecialchars($student['contact_number']) . '" disabled>
        </div>
        <div class="col-lg-3 ps-0 mb-3">
            <label class="form-label">Course</label>
            <input name="course" type="text" class="form-control shadow-none" value="' . htmlspecialchars($student['course']) . '" disabled>
        </div>
        <div class="col-lg-3 p-0 mb-3">
            <label class="form-label">Section</label>
            <input name="section" type="text" class="form-control shadow-none" value="' . htmlspecialchars($student['section']) . '" disabled>
        </div>
        <div class="col-lg-3 ps-0 mb-3">
            <label class="form-label">Gender</label>
            <input name="gender" type="text" class="form-control shadow-none" value="' . htmlspecialchars($student['gender']) . '" disabled>
        </div>
        <div class="col-lg-3 mb-3">
            <label class="form-label">Date of Birth</label>
            <input name="dob" type="date" class="form-control shadow-none" value="' . htmlspecialchars($student['date_of_birth']) . '" disabled>
        </div>
        <div class="col-md-6 p-0 mb-3">
            <label class="form-label">School ID</label>
            <input name="sid" type="number" class="form-control shadow-none" value="' . htmlspecialchars($student['school_id']) . '" disabled>
        </div>
        <div class="col-md-12 p-0 mb-3">
            <label class="form-label">Address</label>
            <input name="address" type="text" class="form-control shadow-none" value="' . htmlspecialchars($student['address']) . '" disabled>
        </div>';
        
        // Fetch the student's files from the `student_files` table
        $fileQuery = "SELECT `student_id`, `file_name`, `file_path`, `file_type` FROM `student_files` WHERE student_id = $id";
        $fileResult = $conn->query($fileQuery);
        
        // Check if files exist
        if ($fileResult->num_rows > 0) {
            echo '<h3><i class="bi bi-file-earmark-text mt-3 me-2"></i>Student Files</h3>';
            echo '<div class="row card-body">';

            // Display the files
            while ($file = $fileResult->fetch_assoc()) {
                echo '
                <div class="col-lg-12">
                    <div class="card border-0 shadow-sm text-center mt-3">
                        <img src="' . htmlspecialchars($file['file_path']) . '" alt="" class="card-img-top">
                        <div class="card-body">
                            <h6 class="card-title">FILE NAME: ' . htmlspecialchars($file['file_name']) . '</h6>
                            <a href="uploads/' . htmlspecialchars($file['file_name']) . '" class="btn btn-success btn-lg" target="_blank">Print</a>
                            <button class="btn btn-danger btn-lg delete-file" data-file-id="' . $file['student_id'] . '" data-file-name="' . $file['file_name'] . '">Delete</button>
                        </div>
                    </div>
                </div>';
            }
            echo '</div>';
        }
    }
}
?>
