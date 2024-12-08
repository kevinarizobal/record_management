<?php 
require('db_connect.php'); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enrollment</title>
    <?php require('links/links.php'); ?>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.3/css/jquery.dataTables.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="bg-light">
<?php require('inc/header.php');?>

<div class="container-fluid" id="main-content">
    <div class="row">
        <div class="col-lg-10 ms-auto p-4 overflow-hidden">
            <span class="d-flex justify-content-between align-items-center">
            </span>
            <div class="card border-0 shadow-sm mt-4 mb-4 align-content-center">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <a href="add_student.php" class="btn btn-outline-success fw-bold">Return Add Student</a>
                    </div>
                    <!-- Data Table -->
                    <div class="table-responsive rounded-3">
                        <table class="table table-hover border text-center" id="studentTable" style="min-width: 100px;">
                            <thead class="text-start">
                                <tr class="bg-dark text-light">
                                    <th scope="col">Name</th>
                                    <th scope="col">Course</th>
                                    <th scope="col">Year & Section</th>
                                    <th scope="col">Contact</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody class="text-start">
                                <?php
                                $query = "SELECT `id`, `name`, `email`, `contact_number`, `profile_picture`, `attachment`, `course`, `section`, `gender`, `date_of_birth`, `school_id`, `address`, `mother_name`, `father_name`, `guardian_contact_number`, `guardian_address`, `status`, `date_enrolled` FROM `students`";
                                $result = $conn->query($query);
                                while ($row = $result->fetch_assoc()) {
                                  if($row['status'] == 0){
                                    $new_stat = 'Inactive';
                                  }
                                  if($row['status'] == 1){
                                    $new_stat = 'Active';
                                  }
                                    echo "<tr id='student-{$row['id']}'>
                                            <td>{$row['name']}</td>
                                            <td>{$row['course']}</td>
                                            <td>{$row['section']}</td>
                                            <td>{$row['contact_number']}</td>
                                            <td>{$row['email']}</td>
                                            <td>{$new_stat}</td>
                                            <td>
                                                <a href='#' class='edit-btn text-decoration-none me-2' data-id='{$row['id']}' data-bs-toggle='modal' data-bs-target='#registerModal'><i class='bi bi-pencil-square text-decoration-none'></i> Edit</a>
                                            </td>
                                        </tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal for Editing Student -->
<div class="modal fade" id="registerModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-xl">
        <div class="modal-content">
          <form action="update_student.php" id="register-form" method="POST" enctype="multipart/form-data">
            <div class="modal-header">
              <h3 class="modal-title d-flex align-items-center">
              <i class="bi bi-person-lines-fill fs-3 me-2"></i>STUDENT INFORMATION
              </h3>
              <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="max-height: 70vh; overflow-y: auto;">
              <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6 ps-0 mb-3">
                        <label class="form-label">Name</label>
                        <input name="id" id="modal-id" type="hidden" class="form-control shadow-none" required>
                        <input name="name" id="modal-name" type="text" class="form-control shadow-none" required>
                    </div>
                    <div class="col-md-6 p-0 mb-3">
                        <label class="form-label">Email</label>
                        <input name="email" id="modal-email" type="email" class="form-control shadow-none" required>
                    </div>
                    <div class="col-md-6 ps-0 mb-3">
                        <label class="form-label">Contact Number</label>
                        <input name="snumber" id="modal-snumber" type="number" class="form-control shadow-none" required>
                    </div>
                    <div class="col-lg-3 ps-0 mb-3">
                        <label class="form-label">Course</label>
                        <input name="course" id="modal-course" type="text" class="form-control shadow-none" required>
                    </div>
                    <div class="col-lg-3 p-0 mb-3">
                        <label class="form-label">Section</label>
                        <input name="section" id="modal-section" type="text" class="form-control shadow-none" required>
                    </div>
                    <div class="col-lg-3 ps-0 mb-3">
                        <label class="form-label">Gender</label>
                        <input name="gender" id="modal-gender" type="text" class="form-control shadow-none" required>
                    </div>
                    <div class="col-lg-3 ps-0 mb-3">
                        <label class="form-label">Date of Birth</label>
                        <input name="dob" id="modal-dob" type="date" class="form-control shadow-none" required>
                    </div>
                    <div class="col-md-6 p-0 mb-3">
                        <label class="form-label">School ID</label>
                        <input name="sid" id="modal-sid" type="number" class="form-control shadow-none" required>
                    </div>
                    <div class="col-md-3 ps-0 mb-3">
                        <label class="form-label">Address</label>
                        <input name="address" id="modal-address" type="text" class="form-control shadow-none" required>
                    </div>
                    <div class="col-md-3 ps-0 mb-3">
                        <label class="form-label">Status</label>
                        <select name="status" id="modal-status" class="form-select shadow-none">
                          <option value="0">Inactive</option>
                          <option value="1">Active</option>
                        </select>
                    </div>
                    <div class="col-lg-3 ps-0 mb-3">
                      <label class="form-label">Picture</label>
                      <input name="profile" type="file" accept=".jpg, .jpeg, .png, .webp" class="form-control shadow-none">
                    </div>
                    <div class="col-lg-3 p-0 mb-3">
                      <label class="form-label">Attachment</label>
                      <input name="attach" type="file" accept=".pdf, .docx, .png, .jpg, .jpeg,  .webp" class="form-control shadow-none">
                    </div>

                     <!-- guardian info -->
                    <h3 class="modal-title text-center ">PARENTS/GUARDIAN INFORMATION</h3>
                    <div class="col-lg-6 ps-0 mb-3">
                    <label class="form-label">Mother's Name</label>
                    <input name="mname" id="modal-mname" type="text" class="form-control shadow-none" required>
                  </div>
                  <div class="col-md-6 p-0 mb-3">
                    <label class="form-label">Father's Name</label>
                    <input name="fname" id="modal-fname" type="text" class="form-control shadow-none" required>
                  </div>
                  <div class="col-md-12 p-0 mb-3">
                    <label class="form-label">Contact Number</label>
                    <input name="gnumber" id="modal-pnumber" type="number" class="form-control shadow-none" required>
                  </div>
                  <div class="col-lg-12 p-0 mb-3">
                    <label class="form-label">Adress</label>
                    <textarea name="gaddress" id="modal-paddress" class="form-control shadow-none" rows="1" required></textarea>
                  </div>
                </div>
                <div class="text-center my-1">
                    <button type="submit" class="btn btn-success shadow-none">UPDATE STUDENT</button>
                </div>
            </div>
          </form>
        </div>
    </div>
</div>

<?php require('inc/script.php'); ?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>
<script src="bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>

<script>
// Initialize DataTable
$(document).ready(function() {
    $('#studentTable').DataTable();

    // Edit student button click event
    $('.edit-btn').click(function() {
        const studentId = $(this).data('id');
        $.ajax({
            url: 'get_student.php',
            method: 'GET',
            data: { id: studentId },
            success: function(response) {
                const student = JSON.parse(response);
                $('#modal-name').val(student.name);
                $('#modal-email').val(student.email);
                $('#modal-snumber').val(student.contact_number);
                $('#modal-course').val(student.course);
                $('#modal-section').val(student.section);
                $('#modal-gender').val(student.gender);
                $('#modal-dob').val(student.date_of_birth);
                $('#modal-sid').val(student.school_id);
                $('#modal-address').val(student.address);
                $('#modal-mname').val(student.mother_name);
                $('#modal-fname').val(student.father_name);
                $('#modal-pnumber').val(student.guardian_contact_number);
                $('#modal-paddress').val(student.guardian_address);
                $('#modal-id').val(student.id);
            }
        });
    });

    // Delete student button click event
    $('.delete-btn').click(function(e) {
        e.preventDefault();
        const studentId = $(this).data('id');
        Swal.fire({
            title: 'Are you sure?',
            text: 'You won\'t be able to revert this!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: 'delete_student.php',
                    method: 'POST',
                    data: { id: studentId },
                    success: function() {
                        $(`#student-${studentId}`).remove();
                        Swal.fire('Deleted!', 'The student has been deleted.', 'success');
                    }
                });
            }
        });
    });
});
</script>

</body>
</html>
