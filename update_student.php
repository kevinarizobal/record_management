<?php
require('db_connect.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contact_number = $_POST['snumber'];
    $course = $_POST['course'];
    $section = $_POST['section'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $school_id = $_POST['sid'];
    $address = $_POST['address'];
    $mname = $_POST['mname'];
    $fname = $_POST['fname'];
    $gnumber = $_POST['gnumber'];
    $gaddress = $_POST['gaddress'];
    $status = $_POST['status'];
    
    // Update query
    $query = "UPDATE `students` SET 
        `name`='$name', `email`='$email', `contact_number`='$contact_number', 
        `course`='$course', `section`='$section', `gender`='$gender', 
        `date_of_birth`='$dob', `school_id`='$school_id', `address`='$address', 
        `mother_name`='$mname', `father_name`='$fname',
        `guardian_contact_number`='$gnumber', `guardian_address`='$gaddress', `status`='$status' 
        WHERE `id`='$id'";
    
    if ($conn->query($query) === TRUE) {
        echo "<script>alert('Updated Successfully!!');</script>";
        header("Location: manage_student.php"); 
    } else {
        echo 'error';
    }
}
?>
