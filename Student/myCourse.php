<?php

if (!isset($_SESSION)) {
    session_start();
}

include "./stuInclude/header.php";
include "../dbConnection.php";

// Redirect admin to index page if no active session
if (isset($_SESSION["is_login"])) {
    $stuEmail = $_SESSION["stuLogEmail"];
} else {
    header("location: ../index.php");
}

if (isset($_SESSION["course_id"])) {
    unset($_SESSION["course_id"]);
}
?> 

<div class="container mt-5">
  <div class="row">
    <div class="col-12 text-center pt-4 pb-2 px-0">
      <h3 class="p-2 mb-3 bg-dark text-white">Your Courses</h3>
    </div>
  </div>
  <div class="row"> 
    
    <?php if (isset($stuLogEmail)) {
        $sql = "SELECT co.order_id, c.course_id, c.course_name, c. course_duration, c.course_desc, c.course_img, c.course_author, c.course_original_price, c.course_price 
            FROM 
            courseorder AS co JOIN course AS c ON c.course_id = co.course_id 
            WHERE co.stu_email = '$stuLogEmail'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) { ?> 
            <div class="col-md-4 mt-0 mb-4 d-flex justify-content-between">
                <div class="card">
                    <img src="../image/courseimg/uploads/<?php echo $row[
                        "course_img"
                    ]; ?>" class="card-img-top" alt="pic">
                    <div class="card-body">
                        <h5 class="card-title"> <?php echo $row[
                            "course_name"
                        ]; ?> </h5>
                        <p class="card-text"> <?php echo $row[
                            "course_desc"
                        ]; ?> </p>
                        <small class="card-text">Duration: <?php echo $row[
                            "course_duration"
                        ]; ?> </small>
                        <br />
                        <small class="card-text">Instructor: <?php echo $row[
                            "course_author"
                        ]; ?> </small>
                        <br />
                        <p class="card-text d-inline">Price: 
                            <small>
                                <del>&#8377 <?php echo $row[
                                    "course_original_price"
                                ]; ?> </del>
                            </small>
                            <span class="font-weight-bolder">&#8377 <?php echo $row[
                                "course_price"
                            ]; ?> <span>
                        </p>
                    </div>
                    <a href="watchcourse.php?course_id=<?php echo $row[
                        "course_id"
                    ]; ?>" class="btn btn-primary m-3" style="display: block">Watch Course </a>
                </div>
            </div> 
    
    <?php }
        } else {
            echo '
            <div class="col-12 text-center py-5 alert-warning">
                <i class="fas fa-exclamation-triangle fa-2x"></i>
                <h4 class="alert-heading">0 Results</h4>
                <p class="m-0">No course ordered.</p>
            </div>
        ';
        }
    } ?> 
  </div>
</div>

</div>
<!-- Close Row Div from header file -->
</div>
<!-- Close container-fluid Div from header file --> <?php include "./stuInclude/footer.php";
?>
