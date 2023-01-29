<!-- Header Start  -->
<?php
if (!isset($_SESSION)) {
    session_start();
}

include_once "./dbConnection.php";
include "./mainInclude/header.php";
?>
<!-- Header End  -->

<!-- Start Course Page Banner  -->
<div class="container-fluid bg-dark">
    <div class="row">
        <img src="./image/coursebanner.png" alt="courses" style="height:500px; width: 100%; object-fit:cover; box-shadow: 10px;">
    </div>
</div>
<!-- End Course Page Banner  -->

<!-- Start Main Content  -->
<div class="container mt-5">

    <?php if (isset($_GET["course_id"])) {
        $course_id = $_GET["course_id"];
        $sql = "SELECT * FROM course WHERE course_id = '$course_id'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $_SESSION["course_id"] = $course_id;
    } ?>

    <div class="row">
        <div class="col-md-4">
            <img src="./image/courseimg/uploads/<?php echo $row[
                "course_img"
            ]; ?>" class="card-img-top" alt="Course">
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title">Course Name: <?php echo $row[
                    "course_name"
                ]; ?></h5>
                <p class="card-text"> Description: <?php echo $row[
                    "course_desc"
                ]; ?></p>
                <p class="card-text"> Duration: <?php echo $row[
                    "course_duration"
                ]; ?></p>
                <form action="" method="post">
                    <p class="card-text d-inline">Price: <small> <del>&#8377 <?php echo $row[
                        "course_original_price"
                    ]; ?></del></small> <span
                            class="font-weight-bolder">&#8377 <?php echo $row[
                                "course_price"
                            ]; ?><span></p>
                    <a href="<?php echo isset($_SESSION["is_login"])
                        ? "checkout.php?course_price=" . $row["course_price"]
                        : "##"; ?>" type="submit" role="button" class="btn btn-primary text-white font-weight-bolder float-right" id="buyBtn">Buy Now</a>
                </form>
            </div>
        </div>
    </div>
    <div class="container mt-4 mb-4">
        <div class="row">
            <table class="table table-bordered table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Lesson No.</th>
                        <th scope="col">Lesson Name</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $sql = "SELECT * FROM lesson WHERE course_id = '$course_id'";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    $lesson_no = 1;

                    while ($row = $result->fetch_assoc()) {
                        echo '
                        <tr>
                            <th scope="row">' .
                            $lesson_no++ .
                            '</th>
                            <td>' .
                            $row["lesson_name"] .
                            '</td>
                        </tr>
                    ';
                    }
                } else {
                    echo '
                    <tr>
                        <td colspan="2" class="text-center">
                            <div class="alert alert-warning py-5 m-0" role="alert">
                                <i class="fas fa-exclamation-triangle fa-2x"></i>
                                <h4 class="alert-heading">0 Results</h4>
                                <p class="m-0">No lesson added.</p>
                            </div>
                        </td>
                    </tr>
                    ';
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- End Main Content  -->


<!-- Toggle the login modal if the user is not logged in but trying to enroll -->
<script>
    var buyBtn = document.getElementById("buyBtn");
    var loginBtn = document.getElementById("login-btn");

    buyBtn.addEventListener("click", function() {
        <?php if (!isset($_SESSION["is_login"])) { ?>
            loginBtn.click();
        <?php } else { ?>
            window.location.href='checkout.php';
        <?php } ?>
    });
</script>

<!-- Start Footer  -->
<?php include "./mainInclude/footer.php"; ?>
<!-- End Footer  -->