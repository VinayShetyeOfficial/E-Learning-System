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
        $_REQUEST["lesson_id"] == "" ||
        $_REQUEST["lesson_name"] == "" ||
        $_REQUEST["lesson_desc"] == "" ||
        $_REQUEST["course_id"] == "" ||
        $_REQUEST["course_name"] == ""
    ) {
        // Checking form empty fields
        $msg =
            '<div class="alert alert-warning my-3" style="width: 210px;margin: auto;text-align: center;">Fields cannot be empty</div>';
    } else {
        $lesson_id = $_REQUEST["lesson_id"];
        $lesson_name = ucwords(
            strtolower(
                mysqli_real_escape_string($conn, trim($_REQUEST["lesson_name"]))
            )
        );
        $lesson_desc = ucfirst(
            strtolower(
                mysqli_real_escape_string($conn, trim($_REQUEST["lesson_desc"]))
            )
        );
        $course_id = $_REQUEST["course_id"];
        $course_name = $_REQUEST["course_name"];

        // File  data Variables
        $lesson_link = $_FILES["lesson_link"]["name"];
        $lesson_link_temp = $_FILES["lesson_link"]["tmp_name"];

        // spliting extension of video file
        $extension = explode(".", $lesson_link);

        // specific format for lesson video name
        $lesson_link = strtolower(
            join(
                "_",
                explode(
                    " ",
                    str_replace(
                        str_split('\\/:*?"<>|+-,.%!@#$%^&*()_=+'),
                        " ",
                        $lesson_name
                    )
                )
            ) .
                "_" .
                $course_id .
                "." .
                $extension[1]
        );

        // Defining folder to store file uploads
        $video_folder = "../lessonvid/" . basename($lesson_link);

        // Checking if the file is uploaded via HTTP POST
        if (is_uploaded_file($lesson_link_temp)) {
            // Checking image size and format
            if (
                $_FILES["lesson_link"]["size"] < 1000000 &&
                getimagesize($lesson_link_temp) !== false
            ) {
                // Moving uploaded file to above defined folder
                move_uploaded_file($lesson_link_temp, $video_folder);
            } else {
                $msg =
                    '<div class="alert alert-danger my-3" style="width: 230px;margin: auto;text-align: center;">Invalid video file</div>';
            }
        } else {
            $msg =
                '<div class="alert alert-danger my-3" style="width: 230px;margin: auto;text-align: center;">Unable to upload lesson video</div>';
        }

        if (!isset($msg)) {
            $sql = "UPDATE lesson SET lesson_name='$lesson_name', lesson_desc='$lesson_desc', course_name='$course_name', lesson_link = '$lesson_link' WHERE lesson_id = '$lesson_id' AND course_id = '$course_id'";

            if (mysqli_query($conn, $sql) == true) {
                $msg =
                    '<div class="alert alert-success my-3" style="width: 300px;margin: auto;text-align: center;">Lesson details updated successfully</div>';
            } else {
                $msg =
                    '<div class="alert alert-danger my-3" style="width: 210px;margin: auto;text-align: center;">Failed to update lesson details</div>';
            }
        }
    }
}
?>

<div class="col-sm-6 mt-5 mx-3 jumbotron">
    <h3 class="text-center">Update Lesson Details</h3>

    <?php if (isset($_REQUEST["edit"])) {
        $stmt = $conn->prepare("SELECT * FROM lesson WHERE lesson_id = ?");
        $stmt->bind_param("i", $_REQUEST["id"]);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
        }
    } ?>

    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="lesson_id">Lesson Id</label>
            <input type="text" class="form-control" id="lesson_id" name="lesson_id" value="<?php if (
                isset($row["lesson_id"])
            ) {
                echo $row["lesson_id"];
            } ?>" readonly>
        </div>

        <div class="form-group">
            <label for="lesson_name">Lesson Name</label>
            <input type="text" class="form-control" id="lesson_name" name="lesson_name" style="text-transform:capitalize" placeholder="Eg. Introduction to HTML, CSS and JavaScript"
             value="<?php if (isset($row["lesson_name"])) {
                 echo $row["lesson_name"];
             } ?>">
        </div>

        <div class="form-group">
            <label for="lesson_desc">Lesson Description</label>
            <textarea class="form-control" name="lesson_desc" id="lesson_desc" rows="5" placeholder="Eg. In this lesson, we will learn the basics of HTML, CSS, and JavaScript and how to use them to create web pages."><?php if (
                isset($row["lesson_desc"])
            ) {
                echo $row["lesson_desc"];
            } ?></textarea>
        </div>

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
            <input type="text" class="form-control" id="course_name" name="course_name" value="<?php if (
                isset($row["course_name"])
            ) {
                echo $row["course_name"];
            } ?>" readonly>
        </div>

        <div class="form-group">
            <label for="lesson_link">Lesson Video</label>
            <div class="embed-responsive embed-responsive-16by9 mb-3" style="width: 100%">
                <iframe class="embed-responsive-item" src="../lessonvid/<?php if (
                    isset($row["lesson_link"])
                ) {
                    echo $row["lesson_link"];
                } ?>" allowfullscreen></iframe>
            </div>
            <input type="file" class="form-control-file" id="lesson_link" name="lesson_link">
        </div>

        <?php if (isset($msg)) {
            echo $msg;
        } ?>
        <div class="text-center">
            <button type="submit" class="btn btn-success" id="requpdate" name="requpdate">Update</button>
            <a href="lessons.php" class="btn btn-secondary">Close</a>
        </div>
    </form>
</div>

</div><!-- div Row close from header  -->
</div><!-- div Container-fluid close from header  -->

<!-- Start Footer  -->
<?php include "./admininclude/footer.php"; ?>
<!-- End Footer  -->