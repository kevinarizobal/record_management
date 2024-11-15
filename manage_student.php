<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enrollment</title>
    <?php require('links/links.php');?>
    
</head>
<body class="bg-light">
<?php require('inc/header.php');?>
<div class="container-fluid" id="main-content">
    <div class="row">
        <div class="col-lg-10 ms-auto p-4 overflow-hidden">
            <span class="d-flex justify-content-between align-items-center">
                <h1 class="mb-2 mt-1">Enrollment - Manage Enrolled Student</h1>
                
            </span>
            <div class="card border-0 shadow-sm mt-4 mb-4 align-content-center">
                <div class="card-body">
                    <div class="d-flex mb-4">
                        <form class="d-flex ms-auto" role="search">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success fw-bold" type="submit">Search</button>
                        </form>
                    </div>

                    <div class="table-responsive rounded-3">
                        <table class="table table-hover border text-center" style="min-width: 100px;">
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
                            <tbody class="text-start" id="enrolled-student">
                              <tr>
                                <td>Juan Luan</td>
                                <td>BSCS</td>
                                <td>1 - A</td>
                                <td>09461109394</td>
                                <td>juan@gmail.com</td>
                                <td>Active</td>

                                <td>
                                    <a a data-bs-target="#registerModal" data-bs-toggle="modal" class="text-decoration-none me-2"><i class="bi bi-pencil-square text-decoration-none">  </i> Edit</a>
                                    <a href="" class="text-decoration-none text-danger "><i class="bi bi-x-square"></i> Delete</a>
                                </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

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
                <div class="row">
                    <!-- student info -->
                  <div class="col-lg-6 ps-0 mb-3">
                    <label class="form-label">Name</label>
                    <input name="name" type="text" class="form-control shadow-none" required>
                  </div>
                  <div class="col-md-6 p-0 mb-3">
                    <label class="form-label">Email</label>
                    <input name="email" type="email" class="form-control shadow-none" required>
                  </div>
                  <div class="col-md-6 ps-0 mb-3">
                    <label class="form-label">Contact Number</label>
                    <input name="snumber" type="number" class="form-control shadow-none" required>
                  </div>
                  <div class="col-lg-3 ps-0 mb-3">
                    <label class="form-label">Picture</label>
                    <input name="profile" type="file" accept=".jpg, .jpeg, .png, .webp" class="form-control shadow-none" required>
                  </div>
                  <div class="col-lg-3 mb-3">
                    <label class="form-label">Attachment</label>
                    <input name="attach" type="file" accept=".pdf, .docx, .png, .jpg, .jpeg,  .webp" class="form-control shadow-none" required>
                  </div>
                  
                  <div class="col-lg-3 ps-0 mb-3">
                    <label class="form-label">Course</label>
                    <input name="course" type="text" class="form-control shadow-none" required>
                  </div>
                  <div class="col-lg-3 mb-3">
                    <label class="form-label">Section</label>
                    <input name="section" type="text" class="form-control shadow-none" required>
                  </div>
                  <div class="col-lg-3 ps-0 mb-3">
                    <label class="form-label">Gender</label>
                    <input name="gender" type="text" class="form-control shadow-none" required>
                  </div>
                  <div class="col-lg-3 mb-3">
                    <label class="form-label">Date of Birth</label>
                    <input name="dob" type="date" class="form-control shadow-none" required>
                  </div>
                  <div class="col-md-6 ps-0 mb-3">
                    <label class="form-label">School ID</label>
                    <input name="sid" type="number" class="form-control shadow-none" required>
                  </div>
                  <div class="col-md-6 p-0 mb-3">
                    <label class="form-label">Address</label>
                    <input name="address" type="text" class="form-control shadow-none" required>
                  </div>
                  <!-- guardian info -->
                    <h3 class="modal-title text-center ">
                    PARENTS/GUARDIAN INFORMATION
                    </h3>

                  <div class="col-lg-6 ps-0 mb-3">
                    <label class="form-label">Mother's Name</label>
                    <input name="mname" type="text" class="form-control shadow-none" required>
                  </div>
                  <div class="col-md-6 p-0 mb-3">
                    <label class="form-label">Father's Name</label>
                    <input name="fname" type="text" class="form-control shadow-none" required>
                  </div>
                  <div class="col-md-6 ps-0 mb-3">
                    <label class="form-label">Contact Number</label>
                    <input name="gnumber" type="number" class="form-control shadow-none" required>
                  </div>
                  <div class="col-md-6 ps-0 mb-3">
                    <label class="form-label">Alternate Contact Number</label>
                    <input name="galcon" type="number" class="form-control shadow-none" required>
                  </div>
                  <div class="col-lg-12 p-0 mb-3">
                    <label class="form-label">Adress</label>
                    <textarea name="gaddress" class="form-control shadow-none" rows="1" required></textarea>
                  </div>
                </div>

              </div>
              <div class="text-center my-1">
                <button type="submit" class="btn btn-success shadow-none">ADD STUDENT</button>
              </div>
              <h3><i class="bi bi-file-earmark-text mt-3 me-2"></i>Student Files</h3>
                    <div class="row card-body">
                        <div class="col-lg-12">
                            <div class="card border-0 shadow-lg text-center mt-3">
                                <img src="img/ict/nso.jpg" alt="">
                                <div class="card-body">
                                    <h2 class="card-title">FILE NAME: NSO</h2>
                                    
                                </div>
                            </div>
                        </div>
                    </div>

            </div>
          </form>
        </div>
    </div>
</div>


<?php require('inc/script.php'); ?>
<script src="bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>