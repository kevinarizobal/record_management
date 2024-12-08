<?php 
include("db_connect.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DASHBOARD</title>
    <?php require('links/links.php');?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
<?php require('inc/header.php');?>
<div class="container-fluid" id="main-content">
    <div class="row">
        <div class="col-lg-10 ms-auto p-4 overflow-hidden">
            <h1 class="mb-2"> Dashboard</h1>
            <!-- NUMBERSTUDENT -->
            <h4>Number of Students</h4>
            <div class="row">
                <div class="col-md-3 mb-4">
                    <a href="#" class="text-decoration-none">
                        <div class="card text-center text-success p-3">
                            <div class="row">
                                <div class="col">
                                    <i class="bi bi-people-fill" style="font-size: 3.5rem;"></i>
                                </div>
                                <div class="col me-3">
                                    <h6>ICT</h6>
                                    <?php
                                        $sql = "SELECT * FROM `students` WHERE `course`='ICT'";
                                        $sql_run = mysqli_query($conn,$sql);
                                        if($result = mysqli_num_rows($sql_run)){
                                            echo '<h1 class="mt-2 mb-0">'.$result.'</h1>';
                                        }else{
                                            echo '<h1 class="mt-2 mb-0">0</h1>';
                                        }   
                                    ?>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 mb-4">
                <a href="#" class="text-decoration-none">
                        <div class="card text-center text-success p-3">
                            <div class="row">
                                <div class="col">
                                    <i class="bi bi-people-fill" style="font-size: 3.5rem;"></i>
                                </div>
                                <div class="col me-3">
                                    <h6>BOT</h6>
                                    <?php
                                        $sql = "SELECT * FROM `students` WHERE `course`='BOT'";
                                        $sql_run = mysqli_query($conn,$sql);
                                        if($result = mysqli_num_rows($sql_run)){
                                            echo '<h1 class="mt-2 mb-0">'.$result.'</h1>';
                                        }else{
                                            echo '<h1 class="mt-2 mb-0">0</h1>';
                                        }   
                                    ?>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 mb-4">
                <a href="#" class="text-decoration-none">
                        <div class="card text-center text-success p-3">
                            <div class="row">
                                <div class="col">
                                    <i class="bi bi-people-fill" style="font-size: 3.5rem;"></i>
                                </div>
                                <div class="col me-3">
                                    <h6>BSCS</h6>
                                    <?php
                                        $sql = "SELECT * FROM `students` WHERE `course`='BSCS'";
                                        $sql_run = mysqli_query($conn,$sql);
                                        if($result = mysqli_num_rows($sql_run)){
                                            echo '<h1 class="mt-2 mb-0">'.$result.'</h1>';
                                        }else{
                                            echo '<h1 class="mt-2 mb-0">0</h1>';
                                        }   
                                    ?>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 mb-4">
                    <a href="#" class="text-decoration-none">
                        <div class="card text-center text-success p-3">
                            <div class="row">
                                <div class="col">
                                    <i class="bi bi-people-fill" style="font-size: 3.5rem;"></i>
                                </div>
                                <div class="col me-3">
                                    <h6>TST</h6>
                                    <?php
                                        $sql = "SELECT * FROM `students` WHERE `course`='TST'";
                                        $sql_run = mysqli_query($conn,$sql);
                                        if($result = mysqli_num_rows($sql_run)){
                                            echo '<h1 class="mt-2 mb-0">'.$result.'</h1>';
                                        }else{
                                            echo '<h1 class="mt-2 mb-0">0</h1>';
                                        }   
                                    ?>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <!-- ENROLLMENT -->
            <div class="row">
                <div class="col-md-8">
                    <h4>Enrollment</h4>
                    <div class="row">
                        <div class="col mb-4">
                            <a href="#" class="text-decoration-none">
                                <div class="card text-center text-success p-3">
                                    <div class="row">
                                        <div class="col">
                                            <i class="bi bi-person-fill-check" style="font-size: 3.5rem;"></i>
                                        </div>
                                        <div class="col me-3">
                                            <h6>Active</h6>
                                            <?php
                                                $sql = "SELECT * FROM `students` WHERE `status`= 1";
                                                $sql_run = mysqli_query($conn,$sql);
                                                if($result = mysqli_num_rows($sql_run)){
                                                    echo '<h1 class="mt-2 mb-0">'.$result.'</h1>';
                                                }else{
                                                    echo '<h1 class="mt-2 mb-0">0</h1>';
                                                }   
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col mb-4">
                            <a href="#" class="text-decoration-none">
                                <div class="card text-center text-success p-3">
                                    <div class="row">
                                        <div class="col">
                                            <i class="bi bi-person-fill-x" style="font-size: 3.5rem;"></i>
                                        </div>
                                        <div class="col me-3">
                                            <h6>DROP</h6>
                                            <?php
                                                $sql = "SELECT * FROM `students` WHERE `status`= 0";
                                                $sql_run = mysqli_query($conn,$sql);
                                                if($result = mysqli_num_rows($sql_run)){
                                                    echo '<h1 class="mt-2 mb-0">'.$result.'</h1>';
                                                }else{
                                                    echo '<h1 class="mt-2 mb-0">0</h1>';
                                                }   
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <h4>TRASH</h4>
                    <a href="#" class="text-decoration-none">
                        <div class="card text-center text-success p-3">
                            <div class="row">
                                <div class="col">
                                    <i class="bi bi-trash" style="font-size: 3.5rem;"></i>
                                </div>
                                <div class="col me-3">
                                    <h6>TRASH</h6>
                                    <h1>5</h1>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <!-- GRAPH -->
            <div class="row">
                <div class="col-md-6">
                    <h3>Number of Students by Course</h3>
                    <div id="student" style="height: 370px; width: 100%;"></div>
                </div>
                <div class="col-md-6">
                    <h3>Active vs. Dropped Students</h3>
                    <div id="active" style="height: 370px; width: 100%;"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require('inc/script.php'); ?>
<script src="bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
<script>
        // Fetch data from the server
        fetch('fetch_graph.php')
            .then(response => response.json())
            .then(data => {
                var studentChart = new CanvasJS.Chart("student", {
                    animationEnabled: true,
                    theme: "light2",
                    title: {
                        text: "Number of Students by Course"
                    },
                    axisY: {
                        title: "Number of Students"
                    },
                    axisX: {
                        title: "Courses"
                    },
                    data: [{
                        type: "column",
                        dataPoints: data.studentData
                    }]
                });
                studentChart.render();

                var activeChart = new CanvasJS.Chart("active", {
                    animationEnabled: true,
                    theme: "light2",
                    title: {
                        text: "Active vs. Dropped Students"
                    },
                    axisY: {
                        title: "Number of Students"
                    },
                    axisX: {
                        title: "Status"
                    },
                    data: [{
                        type: "pie",
                        showInLegend: true,
                        toolTipContent: "{label}: <strong>{y}</strong>",
                        dataPoints: data.activeData
                    }]
                });
                activeChart.render();
            })
            .catch(error => console.error("Error fetching data:", error));
    </script>

</body>
</html>
