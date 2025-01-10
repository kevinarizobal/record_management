<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        /* Custom Scrollbar for Sidebar */
        #dashboard-menu {
            scrollbar-width: thin; /* For Firefox */
            scrollbar-color: #ffc107 #198754; /* For Firefox */
        }

        #dashboard-menu::-webkit-scrollbar {
            width: 8px; /* For Chrome, Safari, and Edge */
        }

        #dashboard-menu::-webkit-scrollbar-thumb {
            background-color: #ffc107; /* Scrollbar color */
            border-radius: 4px;
        }

        #dashboard-menu::-webkit-scrollbar-track {
            background-color: #198754; /* Track color */
        }

        /* Responsive styles for smaller screens */
        @media (max-width: 992px) {
            #dashboard-menu {
                position: fixed;
                z-index: 1040;
                width: 100%;
                height: auto;
                max-height: 50vh;
            }
        }
    </style>
</head>
<body>
    <div class="container-fluid bg-success text-light p-3 d-flex align-items-center justify-content-between sticky-top">
        <h1 class="mb-0 h-font" style="font-size: 1.7rem;">
            <img src="img/smc.png" style="height: 50px; width: auto;" alt="">
            SAINT MICHAEL'S COLLEGE
        </h1>
        <a href="logout.php" class="btn btn-outline-warning fw-bold">LOG OUT</a>
    </div>

    <div class="col-lg-2 bg-success border-white border-top border-3 border-secondary" id="dashboard-menu" style="max-height: 100vh; overflow-y: auto;">
        <nav class="navbar navbar-expand-lg navbar-dark rounded">
            <div class="container-fluid flex-lg-column align-items-stretch">
                <h4 class="mt-2 text-light text-center">ADMIN PANEL</h4>
                <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#admindropdown" aria-controls="admindropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse flex-column align-items-stretch mt-2" id="admindropdown">
                    <ul class="nav nav-pills flex-column">
                        <!-- Dashboard -->
                        <li class="nav-item">
                            <a class="nav-link text-white d-flex justify-content-between align-items-center" href="dashboard.php">
                                <span>Dashboard</span>
                                <i class="bi bi-window-fullscreen"></i>
                            </a>
                        </li>

                        <!-- Program -->
                        <li class="nav-item">
                            <button class="btn text-white px-3 w-100 shadow-none text-start d-flex align-items-center justify-content-between" type="button" data-bs-toggle="collapse" data-bs-target="#course" aria-expanded="false" aria-controls="course">
                                <span>Program</span>
                                <i class="bi bi-stack"></i>
                            </button>
                            <div class="collapse px-3 small mb-1" id="course">
                                <ul class="nav nav-pills flex-column rounded border border-white border-secondary">
                                    <li class="nav-item"><a class="nav-link text-white" href="ict.php">ICT</a></li>
                                    <li class="nav-item"><a class="nav-link text-white" href="bot.php">BOT</a></li>
                                    <li class="nav-item"><a class="nav-link text-white" href="tst.php">TST</a></li>
                                    <li class="nav-item"><a class="nav-link text-white" href="bcsc.php">BSCS</a></li>
                                </ul>
                            </div>
                        </li>

                        <!-- Enrollment -->
                        <li class="nav-item">
                            <button class="btn text-white px-3 w-100 shadow-none text-start d-flex align-items-center justify-content-between" type="button" data-bs-toggle="collapse" data-bs-target="#enrollment" aria-expanded="false" aria-controls="enrollment">
                                <span>Enrollment</span>
                                <i class="bi bi-people"></i>
                            </button>
                            <div class="collapse px-3 small mb-1" id="enrollment">
                                <ul class="nav nav-pills flex-column rounded border border-white border-secondary">
                                    <li class="nav-item"><a class="nav-link text-white" href="add_student.php">Add students</a></li>
                                </ul>
                            </div>
                        </li>

                        <!-- Archive Files -->
                        <li class="nav-item">
                            <a class="nav-link text-white d-flex justify-content-between align-items-center" href="billing.php">
                                <span>Archive Files</span>
                                <i class="bi bi-archive"></i>
                            </a>
                        </li>

                        <!-- Trash -->
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

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js"></script>
</body>
</html>
