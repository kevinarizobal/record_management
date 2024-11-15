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
                <h1 class="mb-2 mt-1"><i class="bi bi-trash"></i> Temporary Deleted</h1>
                
            </span>
            <!-- List -->
            <div class="card border-0 shadow-sm mt-3 mb-5 align-content-center">
                <div class="card-body">
                    <div class="d-flex mb-4">
                      <h3>After 30 Days The Data is Permanently Deleted</h3>
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
                                
                                
                                </tr>
                            </thead>
                            <tbody class="text-start" id="enrolled-student">
                              <tr>
                                <td>Juan Luan</td>
                                <td>BSCS</td>
                                <td>1 - A</td>
                                <td>09461109394</td>
                                <td>juan@gmail.com</td>
                                
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            
            
        </div>
    </div>
</div>




<?php require('inc/script.php'); ?>
<script src="bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>