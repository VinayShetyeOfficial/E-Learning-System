<?php

if (!isset($_SESSION)) {
    session_start();
}

include "../dbConnection.php";

// Redirect admin to index page if no active session
if (isset($_SESSION["is_login"])) {
    $stuEmail = $_SESSION["stuLogEmail"];
} else {
    header("location: ../index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>E-Learning</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <style>
        /* Custom styles */
        .sidebar {
            background-color: #f5f5f5;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            width: 250px;
            padding: 20px;
            box-shadow: 2px 0px 10px rgba(0, 0, 0, 0.1);
        }
        .sidebar h4 {
            margin-bottom: 20px;
        }
        .sidebar .nav-item {
            padding: 10px 0;
            font-size: 16px;
            cursor: pointer;
        }
        .sidebar .nav-item:hover {
            background-color: #e9e9e9;
        }
        .main-content {
            margin-left: 250px;
            padding: 50px;
        }
        .main-content h3 {
            margin-bottom: 30px;
        }
        .main-content video {
            max-width: 100%;
        }
        .my-courses-btn {
            background-color: #ff6b6b;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 20px;
            font-size: 16px;
            cursor: pointer;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease-in-out;
        }
        .my-courses-btn:hover {
            background-color: #ff4136;
            box-shadow: 3px 3px 15px rgba(0, 0, 0, 0.2);
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<script>
    $(document).ready(function(){
        $("#playlist li").click(function(){
            var videoURL = $(this).attr("movieurl");
            $("#videoarea").attr("src", videoURL);
        });
    });
</script>

</head>
<body>
    <div class="container-fluid bg-success p-2 d-flex justify-content-center align-items-center">
        <h3 class="text-white text-center">Welcome to E-Learning</h3>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3 sidebar">
                <a href="./myCourse.php" style="font-size: 20px">My Courses</a>
                <hr>
                <h4>Lessons</h4>
                <ul id="playlist" class="nav flex-column"> 
                    <?php if (isset($_GET["course_id"])) {
                        $course_id = $_GET["course_id"];
                        $sql = "SELECT * FROM lesson WHERE course_id = '$course_id' ";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo '
                                <li class="nav-item" movieurl=' .
                                    $row["lesson_link"] .
                                    ">" .
                                    $row["lesson_name"] .
                                    '</li>
                            ';
                            }
                        }
                    } ?> 
            </ul>
        </div>
        <div class="col-sm-9 main-content">
            <h3 class="mb-2">Lesson Video</h3>
            <video id="videoarea" src="" class="w-75 m1-2" controls></video>
        </div>
    </div>
</div>

    <!-- Jquery and Boostrap JavaScript -->
    <script type="text/javascript" src="../js/jquery.min.js"></script>
    <script type="text/javascript" src="../js/popper.min.js"> </script>
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>

    <!--Font Awesome JS-- >
            <script type = "text/javascript" src = "../js/all.min.js"></script>

    <!-- Ajax Call JavaScript -->
    <!-- <script type="text/javascript" src="..js/ajaxrequest. js"></script> -->

    <!-- Custom JavaScript -->
    <script type="text/javascript" src="../js/custom.js"></script>

</body>

</html>