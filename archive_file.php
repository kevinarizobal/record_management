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
        <div class="col-lg-7 ms-auto p-4 overflow-hidden">
            <span class="d-flex justify-content-between align-items-center">
                <h1 class="mb-2 mt-1">Archive Files</h1>
                
            </span>
            <!-- Archive Files -->
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
                                <div class="card border-0 shadow-sm text-center me-3" style="width: 12rem;">
                                    <i class="bi bi-folder" style="font-size: 8rem;"></i>
                                    <h6 class="card-title mb-3">Folder 1</h6>
                                </div>
                                <div class="card border-0 shadow-sm text-center" style="width: 12rem;">
                                    <img src="img/ict/nso.jpg" class="card-img-top p-2" style="width: 12rem; height: 12rem;" alt="...">
                                    <h6 class="card-title mb-3">nso.jpg</h6>
                                </div>
                            </div>
                        </div>  
                    </div>
                    <div class="ms-auto d-flex justify-content-end align-items-center mt-3 mb-2">
                        <div class="text-center">
                            <button class="btn btn-success me-2"><i class="bi bi-file-earmark-plus-fill"></i> UPLOAD FILE</button>
                            <button class="btn btn-success"><i class="bi bi-folder-plus"></i> NEW FOLDER</button>
                        </div>
                    </div>
                </div>
            </div>            
        </div>
         <!-- Preview section with a border -->
        <div class="col-lg-3 p-4">
            <span class="d-flex justify-content-center align-items-center">
                <h3 class="mb-2 mt-3 text-center">PREVIEW <i class="bi bi-search"></i></h3>
                
            </span>
            <div class="card border-0 shadow-sm mt-3 mb-5 align-content-center">
                <div class="card-body text-center">
                    <P class="text-center mt-3">Select a file to Preview. mawaya ine if naka select ng file ma pulihan ng file name</P>
                    <img src="img/ict/nso.jpg" class="card-img-top shadow-sm p-1 mb-5" style="width: 18rem; height: 22rem;" alt="...">

                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById("sortSelect").addEventListener("change", function() {
        var dateRange = document.getElementById("dateRange");
        if (this.value === "4") { // Value for "Custom date range"
            dateRange.style.display = "flex"; // Show date range inputs
        } else {
            dateRange.style.display = "none"; // Hide date range inputs
        }
    });
</script>


<?php require('inc/script.php'); ?>
<script src="bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>