<?php
require 'db_connect.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize input
    $name = $conn->real_escape_string(trim($_POST['name']));
    $email = $conn->real_escape_string(trim($_POST['email']));
    $contact_number = $conn->real_escape_string(trim($_POST['snumber']));
    $course = $conn->real_escape_string(trim($_POST['course']));
    $section = $conn->real_escape_string(trim($_POST['section']));
    $gender = $conn->real_escape_string(trim($_POST['gender']));
    $dob = $conn->real_escape_string(trim($_POST['dob']));
    $school_id = $conn->real_escape_string(trim($_POST['sid']));
    $address = $conn->real_escape_string(trim($_POST['address']));
    $mother_name = $conn->real_escape_string(trim($_POST['mname']));
    $father_name = $conn->real_escape_string(trim($_POST['fname']));
    $guardian_contact_number = $conn->real_escape_string(trim($_POST['gnumber']));
    $guardian_address = $conn->real_escape_string(trim($_POST['gaddress']));

    // File upload directory
    $upload_dir = 'uploads/';
    $profile_picture = '';
    $attachment = '';

    // Ensure upload directory exists
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }

    // Handle profile picture upload
    if (isset($_FILES['profile']) && $_FILES['profile']['error'] === 0) {
        $profile_picture = $upload_dir . uniqid() . '-' . basename($_FILES['profile']['name']);
        if (!move_uploaded_file($_FILES['profile']['tmp_name'], $profile_picture)) {
            die("Error uploading profile picture.");
        }
    }

    // Handle attachment upload
    if (isset($_FILES['attach']) && $_FILES['attach']['error'] === 0) {
        $attachment = $upload_dir . uniqid() . '-' . basename($_FILES['attach']['name']);
        if (!move_uploaded_file($_FILES['attach']['tmp_name'], $attachment)) {
            die("Error uploading attachment.");
        }
    }

    // Insert into students table
    $sql = "INSERT INTO students 
            (name, email, contact_number, profile_picture, attachment, course, section, gender, date_of_birth, school_id, address, mother_name, father_name, guardian_contact_number, guardian_address) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        die("SQL error: " . $conn->error);
    }

    $stmt->bind_param(
        "sssssssssssssss",
        $name,
        $email,
        $contact_number,
        $profile_picture,
        $attachment,
        $course,
        $section,
        $gender,
        $dob,
        $school_id,
        $address,
        $mother_name,
        $father_name,
        $guardian_contact_number,
        $guardian_address
    );

    if ($stmt->execute()) {
        $student_id = $stmt->insert_id;

        // Insert into student_files table for each file
        $file_sql = "INSERT INTO student_files (student_id, file_name, file_path, file_type) VALUES (?, ?, ?, ?)";
        $file_stmt = $conn->prepare($file_sql);

        if ($profile_picture) {
            $file_name = basename($profile_picture);
            $file_type = 'profile_picture';
            $file_stmt->bind_param("isss", $student_id, $file_name, $profile_picture, $file_type);
            $file_stmt->execute();
        }

        if ($attachment) {
            $file_name = basename($attachment);
            $file_type = 'attachment';
            $file_stmt->bind_param("isss", $student_id, $file_name, $attachment, $file_type);
            $file_stmt->execute();
        }

        echo "<script>alert('Added Successfully!!');</script>";
        header("Location: add_student.php"); 
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>
