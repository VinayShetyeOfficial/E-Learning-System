<!-- Header Start  -->
<?php
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

<!-- Start All Popular Course  -->
<div class="container mt-5 mb-5">
    <h1 class="text-center">All Courses</h1>
    <!-- Start ALL Popular Course Card Decks  -->
    <?php
    $sql = "SELECT * FROM course";
    $result = $conn->query($sql);

    $count = 0;

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            if ($count % 3 == 0) {
                echo '<div class="card-deck mt-4">';
            }

            //<!-- Start ALL Popular Course Card Deck  -->
            echo '
                <a href="coursedetail.php?course_id=' .
                $row["course_id"] .
                '" class="btn" style="text-align: left; padding: 0px; margin: 0px">
                    <div class="card justify-content-between">
                        <img src="./image/courseimg/uploads/' .
                $row["course_img"] .
                '" class="card-img-top" alt="Guitar">
                        <div class="card-body">
                            <h5 class="card-title">' .
                $row["course_name"] .
                '</h5>
                            <p class="card-title">' .
                $row["course_desc"] .
                '</p>
                        </div>
                        <div class="card-footer">
                            <p class="card-text d-inline">
                                Price: <small><del>&#8377 ' .
                $row["course_original_price"] .
                '</del></small>
                                <span class="font-weight-bolder">&#8377 ' .
                $row["course_price"] .
                '</span>
                            </p>
                            <a href="' .
                (isset($_SESSION["is_login"])
                    ? "checkout.php?course_price=" .
                        $row["course_price"] .
                        "&course_id=" .
                        $row["course_id"]
                    : "##") .
                '" class="btn btn-primary text-white font-weight-bolder float-right enrollBtn">Enroll</a>
                        </div>
                    </div>
                </a>
            ';

            if ($count % 3 == 2) {
                echo "</div>";
            }
            //<!-- End ALL Popular Course Card Deck  -->
            $count++;
        }

        if ($count % 3 == 2 || $count % 3 == 1) {
            echo "</div>";
        }
        //<!-- End ALL Popular Course Card Deck  -->
    } else {
        echo '
            <div class="alert alert-warning text-center py-5" role="alert">
                <i class="fas fa-exclamation-triangle fa-2x"></i>
                <h4 class="alert-heading">0 Results</h4>
                <p class="m-0">No course added.</p>
            </div>
        ';
    }
    ?>

</div>
<!-- End ALL Popular Course  -->

<!-- Toggle the login modal if the user is not logged in but trying to enroll -->
<script>
    var enrollBtns = document.getElementsByClassName("enrollBtn");
    var loginBtn = document.getElementById("login-btn");

    for (var i = 0; i < enrollBtns.length; i++) {
        enrollBtns[i].addEventListener("click", function() {
        <?php if (!isset($_SESSION["is_login"])) { ?>
            loginBtn.click();
        <?php } else { ?>
            window.location.href='checkout.php';
        <?php } ?>
        });
    }
</script>


<!-- Start Footer  -->
<?php include "./mainInclude/footer.php"; ?>
<!-- End Footer  -->