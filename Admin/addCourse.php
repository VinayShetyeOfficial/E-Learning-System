<!-- Header Start  -->
<?php
if (!isset($_SESSION)) {
    session_start();
}

include "./admininclude/header.php";
include "../dbConnection.php";
?>
<!-- Header End  -->

<?php // Redirect admin to index page if no active session
if (isset($_SESSION["is_admin_login"])) {
    $adminEmail = $_SESSION["adminLogEmail"];
} else {
    echo "
        <script>
            window.location.href = '../index.php';
        </script>
    ";
} ?>

<?php
// function to generate random Course ID
function generateCourseId($course_name)
{
    $numbers = "0123456789";
    $id = "";
    $course_name = substr($course_name, 0, 3);
    $id .= $course_name;
    $digits_count = 4;
    for ($i = 0; $i < $digits_count; $i++) {
        $id .= $numbers[rand(0, strlen($numbers) - 1)];
    }
    return strtoupper($id);
}

if (isset($_REQUEST["courseSubmitBtn"])) {
    if (
        $_REQUEST["course_name"] == "" ||
        $_REQUEST["course_desc"] == "" ||
        $_REQUEST["course_author"] == "" ||
        $_REQUEST["course_duration"] == "" ||
        $_REQUEST["course_price"] == "" ||
        $_REQUEST["course_original_price"] == ""
    ) {
        // Checking form empty fields
        $msg =
            '<div class="alert alert-warning" style="width: 210px;margin: auto;text-align: center;">Fields cannot be empty</div>';
    } else {
        $course_name = ucwords(
            strtolower(
                mysqli_real_escape_string($conn, trim($_POST["course_name"]))
            )
        );
        $course_desc = ucwords(
            strtolower(
                mysqli_real_escape_string($conn, trim($_POST["course_desc"]))
            )
        );
        $course_author = ucwords(
            strtolower(
                mysqli_real_escape_string($conn, trim($_POST["course_author"]))
            )
        );
        $course_duration = ucwords(
            mysqli_real_escape_string($conn, trim($_POST["course_duration"]))
        );
        $course_price = mysqli_real_escape_string(
            $conn,
            trim($_POST["course_price"])
        );
        $course_original_price = mysqli_real_escape_string(
            $conn,
            trim($_POST["course_original_price"])
        );

        // Generating random Course ID
        $course_id = generateCourseId($course_name);

        // File  data Variables
        $course_image = $_FILES["course_img"]["name"];
        $course_image_temp = $_FILES["course_img"]["tmp_name"];

        // specific format for course image name
        $course_image = strtolower(
            join(
                "_",
                explode(
                    " ",
                    str_replace(
                        str_split('\\/:*?"<>\'\'|+-,.%!@#$%^&*()_=+'),
                        "",
                        $course_name
                    )
                )
            ) .
                "_" .
                $course_id .
                ".png"
        );

        // Defining folder to store file uploads
        $img_folder = "../image/courseimg/uploads/" . basename($course_image);

        // Checking if the file is uploaded via HTTP POST
        if (is_uploaded_file($course_image_temp)) {
            // Checking image size and format
            if (
                $_FILES["course_img"]["size"] < 1000000 &&
                getimagesize($course_image_temp) !== false
            ) {
                // Moving uploaded file to above defined folder
                move_uploaded_file($course_image_temp, $img_folder);
            } else {
                $msg =
                    '<div class="alert alert-danger my-3" style="width: 230px;margin: auto;text-align: center;">Invalid image file</div>';
            }
        } else {
            $msg =
                '<div class="alert alert-danger my-3" style="width: 230px;margin: auto;text-align: center;">Unable to upload image</div>';
        }

        if (!isset($msg)) {
            $sql = "INSERT INTO course (course_id, course_name, course_desc, 
            course_author, course_img, course_duration, course_price, 
            course_original_price)
            VALUES ('$course_id', '$course_name', '$course_desc', 
            '$course_author', '$course_image', '$course_duration', '$course_price', 
            '$course_original_price')";

            if ($conn->query($sql) == true) {
                $msg =
                    '<div class="alert alert-success my-3" style="width: 250px;margin: auto;text-align: center;">Course added successfully</div>';
            } else {
                $msg =
                    '<div class="alert alert-danger my-3" style="width: 230px;margin: auto;text-align: center;">Unable to add course</div>';
            }
        }
    }
}
?>


<div class="col-sm-6 mt-5 mx-3 jumbotron">
    <h3 class="text-center">Add New Course</h3>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="course_name">Course Name</label>
            <input type="text" class="form-control" id="course_name" name="course_name" style="text-transform:capitalize" placeholder="Eg. Full Stack Web Development">
        </div>
        <div class="form-group">
            <label for="course_desc">Course Description</label>
            <textarea class="form-control" name="course_desc" id="course_desc" placeholder="Eg. Learn how to build complete web applications using HTML, CSS, JavaScript, and web frameworks like React and Node.js"></textarea>
        </div>
        <div class="form-group">
            <label for="course_duration">Course Duration</label>
            <input type="text" class="form-control" id="course_duration" name="course_duration" style="text-transform:capitalize" placeholder="Eg. 12 weeks / 3 months">
        </div>
        <div class="form-group">
            <label for="course_author">Author</label>
            <input type="text" class="form-control" id="course_author" name="course_author" style="text-transform:capitalize" placeholder="Eg. James Bradley">
        </div>
        <div class="form-group">
            <label for="course_original_price">Course Original Price ( &#8377 )</label>
            <input type="text" class="form-control" id="course_original_price" name="course_original_price" pattern="\d*" maxlength="5" placeholder="Eg. 399">
        </div>
        <div class="form-group">
            <label for="course_price">Course Selling Price ( &#8377 )</label>
            <input type="text" class="form-control" id="course_price" name="course_price" pattern="\d*" maxlength="5" placeholder="Eg. 299">
        </div>
        <div class="form-group">
            <label for="course_img">Course Image</label>
            <input type="file" class="form-control-file" id="course_img" name="course_img">
        </div>
        <?php if (isset($msg)) {
            echo $msg;
        } ?>
        <div class="text-center">
            <button type="submit" class="btn btn-primary" id="courseSubmitBtn" name="courseSubmitBtn">Submit</button>
            <a href="courses.php" class="btn btn-secondary">Close</a>
        </div>
    </form>
</div>

</div><!-- div Row close from header  -->
</div><!-- div Container-fluid close from header  -->

<!-- Start Footer  -->
<?php include "./admininclude/footer.php"; ?>
<!-- End Footer  -->