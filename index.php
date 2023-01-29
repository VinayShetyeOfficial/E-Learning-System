<!-- Header Start  -->
<?php
if (!isset($_SESSION)) {
    session_start();
}

include "./mainInclude/header.php";
?>
<!-- Header End  -->

<!-- Start Video background  -->
<div class="container-fluid remove-vid-marg" id="home">
    <div class="vid-parent">
        <video playsinline autoplay muted loop>
            <source src="video/banvid.mp4">
        </video>
        <div class="vid-overlay"></div>
    </div>
    <div class="vid-content">
        <h1 class="my-content">Welcome to iSchool</h1>
        <small class="mt-content" style="font-size: 17px">Learn and Implement</small>
        <br>

        <?php if (!isset($_SESSION["is_login"])) {
            echo '
            <a href="#" class="btn btn-primary m-2" data-toggle="modal" data-target="#registrationModal">Get Started</a>
            ';
        } else {
            echo '
            <a href="Student/studentProfile.php" class="btn btn-primary mt-3">My Profile</a>
            ';
        } ?>

    </div>
</div>
<!-- End Video background  -->

<!-- Start Text banner  -->
<div class="container-fluid txt-banner" style="background: #8A6FDF">
    <div class="row bottom-banner">
        <div class="col-sm">
            <h5>
                <i class="fas fa-book mr-3"></i> 100+ Online Courses
            </h5>
        </div>
        <div class="col-sm">
            <h5>
                <i class="fas fa-user mr-3"></i> Expert Instructors
            </h5>
        </div>
        <div class="col-sm">
            <h5>
                <i class="fas fa-keyboard mr-3"></i> Lifetime
            </h5>
        </div>
        <div class="col-sm">
            <h5>
                <i class="fas fa-rupee-sign mr-3"></i> Money Back Gurantee*
            </h5>
        </div>
    </div>
</div>
<!-- End Text banner  -->

<!-- Start Most Popular Course  -->
<div class="container mt-5">
    <h1 class="text-center">Popular Course</h1>
    <!-- Start Most Popular Course 1st Card Deck  -->
    <div class="card-deck mt-4">

        <?php
        include_once "./dbConnection.php";

        $sql = "SELECT * FROM course LIMIT 3";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $course_id = $row["course_id"];

                echo '
                <a href="coursedetail.php?course_id=' .
                    $course_id .
                    '" class="btn" style="text-align: left; padding: 0px; margin: 0px">
                    <div class="card justify-content-between">
                        <img src="./image/courseimg/uploads/' .
                    $row["course_img"] .
                    '" class="card-img-top" alt="Course Image" style="width: 100%; height: 200px">
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
            }
        }
        ?>
    </div>
    <!-- End Most Popular Course 1st Card Deck  -->

    <!-- Start Most Popular Course 1st Card Deck  -->
    <div class="card-deck mt-4">

        <?php
        include_once "./dbConnection.php";

        $sql = "SELECT * FROM course LIMIT 3, 3";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $course_id = $row["course_id"];

                echo '
                <a href="coursedetail.php?course_id=' .
                    $course_id .
                    '" class="btn" style="text-align: left; padding: 0px; margin: 0px">
                    <div class="card justify-content-between">
                        <img src="./image/courseimg/uploads/' .
                    $row["course_img"] .
                    '" class="card-img-top" alt="Course Image" style="width: 100%; height: 200px">
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
            }
        }
        ?>
    </div>
    <!-- End Most Popular Course 2nd Card Deck  -->
    <div class="text-center m-2">
        <a href="courses.php" class="btn btn-danger btn-sm" style="font-size: 15px; margin-top: 15px; padding: 10px; background:#8A6FDF; border: 1px solid #7655dd;">View All Course</a>
    </div>
</div>
<!-- End Most Popular Course  -->

<!-- Start Contact Us  -->
<?php include "./contact.php"; ?>
<!-- End Contact Us -->

<!-- Start Students Testimonials  -->
<div class="container-fluid" style="background-color:#4B7289; height: 23rem;" id="feedback">
    <div class="container-lg">
        <div class="row">
            <div class="col-sm-12 mb-3">
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                    <h2>Student's <b>Feedback</b></h2>
                    <!-- Carousel indicators -->
                    <ol class="carousel-indicators mb-5">

                        <!-- Generating list itmes with the list item count of (n/2), where 'n' is the total number of records in the feedback table  -->
                        <?php
                        $sql =
                            "SELECT stu_name, stu_occu, stu_img, f_content FROM student AS s JOIN feedback AS f on s.stu_id = f.stu_id LIMIT 8";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            $record_count = $result->num_rows;
                            $item_count = $record_count / 2;
                            $slide_count = 0;

                            while ($item_count > 0) {
                                echo '<li data-target="#myCarousel" data-slide-to="' .
                                    $slide_count .
                                    '" class="' .
                                    ($slide_count == 0 ? "active" : "") .
                                    '"></li>';

                                $slide_count++;
                                $item_count--;
                            }
                        }
                        ?>

                    </ol>
                    <!-- Wrapper for carousel items -->
                    <div class="carousel-inner">

                        <?php
                        $count = 0;
                        $slideCount = 0;
                        $items = [];

                        while ($row = $result->fetch_assoc()) {
                            if ($count % 2 == 0) {
                                echo '<div class="carousel-item ' .
                                    ($slideCount == 0 ? "active" : "") .
                                    '"><div class="row">';
                                $slideCount++;
                            }

                            $star_count = rand(3, 5);
                            $star_html =
                                '<li class="list-inline-item"><span class="material-icons" style="font-size: 17px; color: rgb(255, 210, 48);"> star </span></li>';
                            $star_o_html =
                                '<li class="list-inline-item"><span class="material-icons" style="font-size: 17px; color: rgb(255, 210, 48);"> star_border </span></li>';
                            $star_html_list = "";

                            for ($i = 0; $i < $star_count; $i++) {
                                $star_html_list .= $star_html;
                            }

                            for ($i = 0; $i < 5 - $star_count; $i++) {
                                $star_html_list .= $star_o_html;
                            }

                            echo '
                                <div class="col-sm-6">
                                    <div class="testimonial">
                                        <p>' .
                                $row["f_content"] .
                                '</p>
                                    </div>
                                    <div class="media">
                                        <img src="./image/stuimg/' .
                                $row["stu_img"] .
                                '" class="mr-3" alt="Student Image" style="object-fit:cover;">
                                        <div class="media-body">
                                            <div class="overview">
                                                <div class="name"><b>' .
                                $row["stu_name"] .
                                '</b></div>
                                                <div class="details">' .
                                $row["stu_occu"] .
                                '</div>
                                                <div class="star-rating">
                                                    <ul class="list-inline">
                                                        ' .
                                $star_html_list .
                                '
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            ';

                            if ($count % 2 == 1) {
                                echo "</div></div>";
                            }

                            $count++;
                        }

                        if ($count % 2 == 1) {
                            echo "</div></div>";
                        }
                        ?>

                    </div>
                    <!-- Carousel controls -->
                    <a class="carousel-control-prev" href="#myCarousel" data-slide="prev">
                        <i class="fa fa-chevron-left"></i>
                    </a>
                    <a class="carousel-control-next" href="#myCarousel" data-slide="next">
                        <i class="fa fa-chevron-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div><!-- End Students Testimonials  -->

<div class="container-fluid" style="background: #8A6FDF">
    <!-- Start Social Follow  -->
    <div class="row text-white text-center p-1">
        <div class="col-sm">
            <a href="##" class="text-white links social-hover">
                <i class="fab fa-facebook"></i> Facebook
            </a>
        </div>
        <div class="col-sm">
            <a href="##" class="text-white links social-hover">
                <i class="fab fa-twitter"></i> Twitter
            </a>
        </div>
        <div class="col-sm">
            <a href="##" class="text-white links social-hover">
                <i class="fab fa-whatsapp"></i> WhatsApp
            </a>
        </div>
        <div class="col-sm">
            <a href="##" class="text-white links social-hover">
                <i class="fab fa-instagram"></i> Instagram
            </a>
        </div>
    </div>
</div>
<!-- End Social Follow  -->

<!-- Start About Section  -->
<div class="jumbotron jumbotron-fluid mb-0 py-5 bg-light text-dark">
    <div class="container">
        <div class="row text-center">
            <div class="col-md-4">
                <h5 class="font-weight-bold">About Us</h5>
                <p>
                    iSchool is a leading e-learning platform offering universal access to top university and organization courses online. Join us for high-quality, interactive and engaging education experiences from the comfort of your own home.
                </p>
            </div>
            <div class="col-md-4">
                <h5 class="font-weight-bold">Category</h5>
                <a href="" class="text-primary">Web Development</a>
                <br>
                <a href="" class="text-primary">Web Designing</a>
                <br>
                <a href="" class="text-primary">UI/UX Designing</a>
                <br>
                <a href="" class="text-primary">Android App Dev</a>
                <br>
                <a href="" class="text-primary">iOS Development</a>
                <br>
                <a href="" class="text-primary">Data Analysis</a>
            </div>
            <div class="col-md-4">
                <h5 class="font-weight-bold">Contact Us</h5>
                <p>iSchool Pvt Ltd, <br> 2nd Floor Vishal Enclave, <br> Rajouri Garden, <br> Delhi - 411053 <br> Phone: <a href="tel:+91987654321"> +91 (987) 653-3210</a> <br> Email: <a href="mailto:info@ischool.com">info@ischool.com</a></p>
            </div>
        </div>
    </div>
</div>
<!-- End About Section  -->

<!-- Toggle the login modal if the user is not logged in but trying to enroll -->
<script>
    var enrollBtns = document.getElementsByClassName("enrollBtn");
    var loginBtn = document.getElementById("login-btn");

    for (var i = 0; i < enrollBtns.length; i++) {
        enrollBtns[i].addEventListener("click", function() {
            <?php if (!isset($_SESSION["is_login"])) { ?>
                loginBtn.click();
            <?php } else { ?>
                window.location.href = 'checkout.php';
            <?php } ?>
        });
    }
</script>

<!-- Start Footer  -->
<?php include "./mainInclude/footer.php"; ?>
<!-- End Footer  -->
