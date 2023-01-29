<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS  -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">

    <!-- Font   Awesome CSS  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"
        integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog=="
        crossorigin="anonymous" />

    <!-- Google Font  -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">

    <!-- Custom CSS  -->
    <link rel="stylesheet" href="../css/adminstyle.css">
    <title>iSchool</title>

    
</head>

<body>


    <!-- Top Navbar  -->
    <nav class="navbar navbar-dark p-0 shadow justify-content-start" style="background-color: #225470;">
        <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="../index.php">E-Learning</a> 
        <a href="adminDashboard.php" class="navbar-brand col-sm-3 col-md-2 mr-0 text-center" style="margin-left: 33.5%; transform: translateX(-33.5%);">
           <small class="text-white">Admin Area</small>
        </a>
    </nav>

    <!-- Side Bar  -->
    <div class="container-fluid mb-5">
    <div class="row">
        <nav class="col-sm-3 col-md-2 d-flex flex-column sidebar py-5">
            <div class="sidebar-sticky">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a href="adminDashboard.php" class="nav-link d-flex align-items-center">
                            <i class="fas fa-tachometer-alt"></i>
                            <span class="ml-2">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="courses.php" class="nav-link d-flex align-items-center">
                            <i class="fab fa-accessible-icon"></i>
                            <span class="ml-2">Courses</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="lessons.php" class="nav-link d-flex align-items-center">
                            <i class="fab fa-accessible-icon"></i>
                            <span class="ml-2">Lessons</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="students.php" class="nav-link d-flex align-items-center">
                            <i class="fas fa-users"></i>
                            <span class="ml-2">Students</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="sellReport.php" class="nav-link d-flex align-items-center">
                            <i class="fas fa-table"></i>
                            <span class="ml-2">Sell Report</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="adminPaymentStatus.php" class="nav-link d-flex align-items-center">
                            <i class="fas fa-table"></i>
                            <span class="ml-2">Payment Status</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="feedback.php" class="nav-link d-flex align-items-center">
                            <i class="fab fa-accessible-icon"></i>
                            <span class="ml-2">Feedback</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="adminChangePass.php" class="nav-link d-flex align-items-center">
                            <i class="fa fa-key"></i>
                            <span class="ml-2">Change Password</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="logout.php" class="nav-link d-flex align-items-center">
                            <i class="fas fa-sign-out-alt"></i>
                            <span class="ml-2">Logout</span>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>