<div class="container-fluid bg-success text-light p-3 d-flex align-items-center justify-content-between sticky-top">
    <h1 class="mb-0 h-font" style="font-size: 1.7rem;"><img src="img/smc.png" style="height: 50px; width: auto;" alt=""> SAINT MICHAEL'S COLLEGE </h1>
    
    <a href="logout.php" class="btn btn-outline-warning fw-bold">LOG OUT</a>
</div>
<div class="col-lg-2 bg-success border-white border-top border-3 border-secondary" id="dashboard-menu">
    <nav class="navbar navbar-expand-lg navbar-dark rounded">
        <div class="container-fluid flex-lg-column align-items-stretch">
            <h4 class="mt-2 text-light text-center">ADMIN PANEL</h4>
            <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#admindropdown" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse flex-column align-items-stretch mt-2" id="admindropdown">
                <ul class="nav nav-pills flex-column">
                    <!-- dashboard -->
                    <li class="nav-item">
                        <a class="nav-link text-white d-flex justify-content-between align-items-center" href="dashboard.php">
                            <span>Dashboard</span>
                            <i class="bi bi-window-fullscreen"></i>
                        </a>
                    </li>
                    <!-- course -->
                    <li class="nav-item">         
                        <button class="btn text-white px-3 w-100 shadow-none text-start d-flex align-items-center justify-content-between" type="button" data-bs-toggle="collapse" data-bs-target="#course">
                            <span>Course</span>
                            <span><i class="bi bi-stack"></i></span>
                        </button>
                        <div class="collapse show px-3 small mb-1" id="course">
                            <ul class="nav nav-pills flex-column rounded border border-white border-secondary">
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="ict.php">ICT</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="bot.php">BOT</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="tst.php">TST</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="bcsc.php">BSCS</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <!-- enrollement -->
                    <li class="nav-item">         
                        <button class="btn text-white px-3 w-100 shadow-none text-start d-flex align-items-center justify-content-between" type="button" data-bs-toggle="collapse" data-bs-target="#enrollment">
                            <span>Enrollment</span>
                            <span><i class="bi bi-people"></i></span>
                        </button>
                        <div class="collapse show px-3 small mb-1" id="enrollment">
                            <ul class="nav nav-pills flex-column rounded border border-white border-secondary">
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="add_student.php">Add students</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="manage_student.php">Manage Students</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <!-- Student to proceed -->
                    <li class="nav-item">         
                        <button class="btn text-white px-3 w-100 shadow-none text-start d-flex align-items-center justify-content-between" type="button" data-bs-toggle="collapse" data-bs-target="#proceed">
                            <span>Student to Proceed</span>
                            <span><i class="bi bi-file-earmark-bar-graph-fill"></i></span>
                        </button>
                        <div class="collapse show px-3 small mb-1" id="proceed">
                            <ul class="nav nav-pills flex-column rounded border border-white border-secondary">
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="proceed_list_student.php">List of students</a>
                                </li>
                               

                            </ul>
                        </div>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link text-white d-flex justify-content-between align-items-center" href="archive_file.php">
                            <span>Archive files</span>
                            
                            <i class="bi bi-archive"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white d-flex justify-content-between align-items-center" href="trash.php">
                            <span>Trash</span>
                            
                            <i class="bi bi-trash"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>

