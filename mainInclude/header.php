<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS  -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- Font Awesome CSS  -->
    <link rel="stylesheet" href="css/all.min.css">

    <!-- Google Font  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700">

    <!-- Custom CSS  -->
    <link rel="stylesheet" href="css/style.css">
    <title>iSchool</title>

    <!-- OWL Carouse CSS  -->
    <link rel="stylesheet" href="css/carousel.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    
    <style>
        /* change navbar background color on scroll */
        .fixed-top.scrolled {
            background-color: #8A6FDF !important;
            transition: background-color 400ms linear;
        }
        
    </style>

<body>

    <!-- Start Navigation  -->
    <nav class="navbar navbar-expand-lg navbar-dark pl-5 fixed-top" id="navbar">
        <div class="brand d-flex flex-column justify-content-center align-items-center">
            <a class="navbar-brand p-0 m-0" href="index.php">iSchool</a>
            <span class="navbar-text p-0" style="margin-top: -13px; color: #fff">Learn and Implement</span>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation" style="border: 1px solid #7655dd;">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse custom-nav pl-5" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item custom-nav-item">
                    <a href="./index.php#home" class="nav-link">Home</a>
                </li>
                <li class="nav-item custom-nav-item">
                    <a href="courses.php" class="nav-link">Courses</a>
                </li>
                <li class="nav-item custom-nav-item">
                    <a href="paymentstatus.php" class="nav-link">Payment Status</a>
                </li>
                <?php
                if (!isset($_SESSION)) {
                    session_start();
                }

                if (isset($_SESSION["is_login"])) {
                    echo '
                        <li class="nav-item custom-nav-item"><a href="Student/studentProfile.php" class="nav-link">My Profiles</a></li>
                        <li class="nav-item custom-nav-item"><a href="logout.php" class="nav-link">Logout</a></li>
                    ';
                } else {
                    echo '
                    <li class="nav-item custom-nav-item">
                        <a href="#"class="nav-link" id="login-btn" data-toggle="modal" data-target="#loginModal">Login</a>
                    </li>
                    <li class="nav-item custom-nav-item">
                        <a href="#" class="nav-link" data-toggle="modal"data-target="#registrationModal">Signup</a>
                    </li>
                    ';
                }
                ?>

                <li class="nav-item custom-nav-item">
                    <a href="./index.php#feedback" class="nav-link">Feedback</a>
                </li>
                <li class="nav-item custom-nav-item">
                    <a href="./index.php#contact" class="nav-link">Contact</i></a>
                </li>
            </ul>
        </div>
    </nav>
    <!-- End Navigation  -->