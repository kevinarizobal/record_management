<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TST</title>
    <?php require('links/links.php');?>
    
</head>
<body class="bg-light">
<?php require('inc/header.php');?>
<div class="container-fluid" id="main-content">
    <div class="row">
        <div class="col-lg-10 ms-auto p-4 overflow-hidden">
            <span class="d-flex justify-content-between align-items-center">
                <h1 class="mb-2 mt-1">TST STUDENTS</h1>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </span>
                    <div class="card border-0 bg-white  shadow-sm mt-4 mb-4 align-content-center">
                      <div class="row card-body justify-content-between me-3 ms-0">
                        <div class="col-lg-2">
                            <div class="card border-0 shadow-sm text-center" style="width: 12rem; ">
                                <img src="img/ict/boy.jpg" class="card-img-top shadow-sm p-2" style="width: 12rem; height: 12rem;" alt="...">
                                <div class="card-body">
                                    <h6 class="card-title">JUAN LUNA</h6>
                                    <p class="card-text">Section 1A</p>
                                    <a data-bs-target="#registerModal" data-bs-toggle="modal" class="btn btn-success">MORE INFO</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="card border-0 shadow-sm text-center" style="width: 12rem; ">
                                <img src="img/ict/boy.jpg" class="card-img-top shadow-sm p-2" style="width: 12rem; height: 12rem;" alt="...">
                                <div class="card-body">
                                    <h6 class="card-title">JUAN LUNA</h6>
                                    <p class="card-text">Section 1A</p>
                                    <a data-bs-target="#registerModal" data-bs-toggle="modal" class="btn btn-success">MORE INFO</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="card border-0 shadow-sm text-center" style="width: 12rem; ">
                                <img src="img/ict/boy.jpg" class="card-img-top shadow-sm p-2" style="width: 12rem; height: 12rem;" alt="...">
                                <div class="card-body">
                                    <h6 class="card-title">JUAN LUNA</h6>
                                    <p class="card-text">Section 1A</p>
                                    <a data-bs-target="#registerModal" data-bs-toggle="modal" class="btn btn-success">MORE INFO</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="card border-0 shadow-sm text-center" style="width: 12rem; ">
                                <img src="img/ict/boy.jpg" class="card-img-top shadow-sm p-2" style="width: 12rem; height: 12rem;" alt="...">
                                <div class="card-body">
                                    <h6 class="card-title">JUAN LUNA</h6>
                                    <p class="card-text">Section 1A</p>
                                    <a data-bs-target="#registerModal" data-bs-toggle="modal" class="btn btn-success">MORE INFO</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="card border-0 shadow-sm text-center" style="width: 12rem; ">
                                <img src="img/ict/boy.jpg" class="card-img-top shadow-sm p-2" style="width: 12rem; height: 12rem;" alt="...">
                                <div class="card-body">
                                    <h6 class="card-title">JUAN LUNA</h6>
                                    <p class="card-text">Section 1A</p>
                                    <a data-bs-target="#registerModal" data-bs-toggle="modal" class="btn btn-success">MORE INFO</a>
                                </div>
                            </div>
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
                <button type="submit" class="btn btn-dark shadow-none">UPDATE</button>
              </div>
              <h3><i class="bi bi-file-earmark-text mt-3 me-2"></i>Student Files</h3>
                    <div class="row card-body">
                        <div class="col-lg-12">
                            <div class="card border-0 shadow-lg text-center mt-3">
                                <img src="img/ict/nso.jpg" alt="">
                                <div class="card-body">
                                    <h6 class="card-title">FILE NAME: NSO</h6>
                                    <a data-bs-target="#registerModal" data-bs-toggle="modal" class="btn btn-success btn-lg">Print</a>
                                    <a data-bs-target="#registerModal" data-bs-toggle="modal" class="btn btn-danger btn-lg">Delete</a>
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