<?php

if (!isset($_SESSION)) {
    session_start();
}

include "./admininclude/header.php";
include "../dbConnection.php";

// Redirect admin to index page if no active session
if (isset($_SESSION["is_admin_login"])) {
    $adminEmail = $_SESSION["adminLogEmail"];
} else {
    echo "
        <script>
            window.location.href = '../index.php';
        </script>
    ";
}

if (isset($_REQUEST["requpdate"])) {
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
            '<div class="alert alert-warning my-3" style="width: 210px;margin: auto;text-align: center;">Fields cannot be empty</div>';
    } else {
        $course_id = $_REQUEST["course_id"];
        $course_name = ucwords(
            strtolower(
                mysqli_real_escape_string($conn, trim($_REQUEST["course_name"]))
            )
        );
        $course_desc = ucwords(
            strtolower(
                mysqli_real_escape_string($conn, trim($_REQUEST["course_desc"]))
            )
        );
        $course_author = ucwords(
            strtolower(
                mysqli_real_escape_string(
                    $conn,
                    trim($_REQUEST["course_author"])
                )
            )
        );
        $course_duration = ucwords(
            mysqli_real_escape_string($conn, trim($_REQUEST["course_duration"]))
        );
        $course_price = mysqli_real_escape_string(
            $conn,
            trim($_REQUEST["course_price"])
        );
        $course_original_price = mysqli_real_escape_string(
            $conn,
            trim($_REQUEST["course_original_price"])
        );

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
                        str_split('\\/:*?"<>|+-,.%!@#$%^&*()_=+'),
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
            $sql = "UPDATE course SET course_name='$course_name', course_desc='$course_desc', course_author='$course_author', course_duration='$course_duration', course_price='$course_price', course_original_price='$course_original_price', course_img='$course_image' WHERE course_id='$course_id' ";

            if (mysqli_query($conn, $sql) == true) {
                $msg =
                    '<div class="alert alert-success my-3" style="width: 250px;margin: auto;text-align: center;">Course updated successfully</div>';
            } else {
                $msg =
                    '<div class="alert alert-danger my-3" style="width: 210px;margin: auto;text-align: center;">Failed to update course</div>';
            }
        }
    }
}
?>


<div class="col-sm-6 mt-5 mx-3 jumbotron">
    <h3 class="text-center">Update Course Details</h3>

    <?php if (isset($_POST["edit"])) {
        $stmt = $conn->prepare("SELECT * FROM course WHERE course_id = ?");
        $stmt->bind_param("s", $_REQUEST["id"]);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
        }
    } ?>

    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="course_id">Course Id</label>
            <input type="text" class="form-control" id="course_id" name="course_id" value="<?php if (
                isset($row["course_id"])
            ) {
                echo $row["course_id"];
            } ?>" readonly>
        </div>

        <div class="form-group">
            <label for="course_name">Course Name</label>
            <input type="text" class="form-control" id="course_name" name="course_name" style="text-transform:capitalize" placeholder="Eg. Full Stack Web Development" value="<?php if (
                isset($row["course_name"])
            ) {
                echo $row["course_name"];
            } ?>">
        </div>

        <div class="form-group">
            <label for="course_desc">Course Description</label>
            <textarea class="form-control" name="course_desc" id="course_desc" rows="5" placeholder="Eg. Learn how to build complete web applications using HTML, CSS, JavaScript, and web frameworks like React and Node.js"><?php if (
                isset($row["course_desc"])
            ) {
                echo $row["course_desc"];
            } ?></textarea>
        </div>

        <div class="form-group">
            <label for="course_duration">Course Duration</label>
            <input type="text" class="form-control" id="course_duration" name="course_duration" style="text-transform:capitalize" placeholder="Eg. 12 weeks / 3 months" value="<?php if (
                isset($row["course_duration"])
            ) {
                echo $row["course_duration"];
            } ?>">
        </div>

        <div class="form-group">
            <label for="course_author">Author</label>
            <input type="text" class="form-control" id="course_author" name="course_author" style="text-transform:capitalize" placeholder="Eg. James Bradley" value="<?php if (
                isset($row["course_author"])
            ) {
                echo $row["course_author"];
            } ?>">
        </div>

        <div class="form-group">
            <label for="course_original_price">Course Original Price</label>
            <input type="number" class="form-control" id="course_original_price" name="course_original_price" pattern="\d*" maxlength="5" placeholder="Eg. 399" value="<?php if (
                isset($row["course_original_price"])
            ) {
                echo $row["course_original_price"];
            } ?>">
        </div>
        <div class="form-group">
            <label for="course_price">Course Selling Price</label>
            <input type="number" class="form-control" id="course_price" name="course_price" pattern="\d*" maxlength="5" placeholder="Eg. 299" value="<?php if (
                isset($row["course_price"])
            ) {
                echo $row["course_price"];
            } ?>">
        </div>
        <div class="form-group">
            <label for="course_img">Course Image:</label><br>
            <img class="img-thumbnail mb-3" src="../image/courseimg/uploads/<?php if (
                isset($row["course_img"])
            ) {
                echo $row["course_img"];
            } ?>" style="width: 300px !important; height: 175px !important; object-fit: contain !important">
            <input type="file" class="form-control-file" id="course_img" name="course_img">
        </div>
        <?php if (isset($msg)) {
            echo $msg;
        } ?>
        <div class="text-center">
            <button type="submit" class="btn btn-success" name="requpdate">Update</button>
            <a href="courses.php" class="btn btn-secondary">Close</a>
        </div>
    </form>
</div>

</div><!-- div Row close from header  -->
</div><!-- div Container-fluid close from header  -->

<!-- Start Footer  -->
<?php include "./admininclude/footer.php"; ?>
<!-- End Footer  -->