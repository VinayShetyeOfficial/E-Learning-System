<?php

include_once "../dbConnection.php";

if (!isset($_SESSION)) {
    session_start();
}

if (isset($_SESSION["is_login"])) {
    $stuLogEmail = $_SESSION["stuLogEmail"];
}
// else {
// echo "<script> location.href='../index.php'; </script>";
// }

if (isset($stuLogEmail)) {
    $sql = "SELECT stu_img FROM student WHERE stu_email ='$stuLogEmail'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $stu_img = $row["stu_img"];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS  -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">

    <!-- Font   Awesome CSS  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />

    <!-- Google Font  -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">

    <!-- Custom CSS  -->
    <link rel="stylesheet" href="../css/adminstyle.css">
    <title>iSchool</title>

    <style>
        /* style for student image  */
        .img-thumbnail {
            padding: 0.25rem;
            background-color: #fff;
            border: 1px solid #dee2e6;
            border-radius: 0.25rem;
            width: 150px;
            height: 150px;
            object-fit: cover;
        }
    </style>

</head>

<body>

    <!-- Top Navbar -->
    <nav class="navbar navbar-dark fixed-top flex-md-nowrap p-0 shadow" style="background-color: #225470;">
        <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="../index.php">E-Learning</a>
    </nav>

    <!-- Side Bar -->
    <div class="container-fluid mb-5" style="margin-top:40px;">
        <div class="row">
            <nav class="col-sm-2 bg-light sidebar py-5 d-print-none">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item mb-3">
                            <img src="../image/stuimg/<?php echo $stu_img; ?>" alt="Student Image" class="img-thumbnail" width="150px !important" height="150px !important">
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if ($PAGE == "profile") {
                                echo "active";
                            } ?>" href="studentProfile.php">
                                <i class="fas fa-user"></i>
                                Profile <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="myCourse.php">
                                <i class="fab fa-accessible-icon"></i>
                                My Courses
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="stufeedback.php">
                                <i class="fab fa-accessible-icon"></i>
                                Feedback
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="studentChangePass.php">
                                <i class="fa fa-key"></i>
                                Change Password
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../logout.php">
                                <i class="fa fa-sign-out-alt"></i>
                                Logout
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>