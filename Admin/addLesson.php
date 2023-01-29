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

<?php if (isset($_REQUEST["lessonSubmitBtn"])) {
    if (
        $_REQUEST["lesson_name"] == "" ||
        $_REQUEST["lesson_desc"] == "" ||
        $_REQUEST["course_id"] == "" ||
        $_REQUEST["course_name"] == ""
    ) {
        // Checking form empty fields
        $msg =
            '<div class="alert alert-warning col-sm-6 my-3" style="width: 210px;margin: auto;text-align: center;">Fields cannot be empty</div>';
    } else {
        $lesson_name = mysqli_real_escape_string(
            $conn,
            trim($_POST["lesson_name"])
        );
        $lesson_desc = mysqli_real_escape_string(
            $conn,
            trim($_POST["lesson_desc"])
        );
        $course_id = mysqli_real_escape_string(
            $conn,
            trim($_POST["course_id"])
        );
        $course_name = mysqli_real_escape_string(
            $conn,
            trim($_POST["course_name"])
        );
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
                        "",
                        $lesson_name
                    )
                )
            ) .
                "_" .
                $course_id .
                "." .
                $extension[1]
        );

        $lesson_folder = "../lessonvid/" . $lesson_link;

        move_uploaded_file($lesson_link_temp, $lesson_folder);

        $sql = "INSERT INTO lesson (lesson_name, lesson_desc, 
        lesson_link, course_id, course_name) 
        VALUES ('$lesson_name', '$lesson_desc', '$lesson_link', '$course_id', '$course_name')";

        if ($conn->query($sql) == true) {
            $msg =
                '<div class="alert alert-success my-3" style="width: 250px;margin: auto;text-align: center;">Lesson added successfully</div>';
        } else {
            $msg =
                '<div class="alert alert-danger my-3" style="width: 230px;margin: auto;text-align: center;">Unable to add lesson</div>';
        }
    }
} ?>

<div class="col-sm-6 mt-5 mx-3 jumbotron">
    <h3 class="text-center">Add New Lesson</h3>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="course_id">Course Id</label>
            <input type="text" class="form-control" id="course_id" name="course_id" 
            value="<?php if (isset($_SESSION["course_id"])) {
                echo $_SESSION["course_id"];
            } ?>" readonly>
        </div>
        <div class="form-group">
            <label for="course_name">Course Name</label>
            <input type="text" class="form-control" id="course_name" name="course_name"
            value="<?php if (isset($_SESSION["course_name"])) {
                echo $_SESSION["course_name"];
            } ?>" readonly>  
        </div>
        <div class="form-group">
            <label for="lesson_name">Lesson Name</label>
            <input type="text" class="form-control" id="lesson_name" name="lesson_name" style="text-transform:capitalize" placeholder="Eg. Introduction to HTML, CSS and JavaScript">
        </div>
        <div class="form-group">
            <label for="lesson_desc">Lesson Description</label>
            <textarea class="form-control" id="lesson_desc" name="lesson_desc" row=2 placeholder="Eg. In this lesson, we will learn the basics of HTML, CSS, and JavaScript and how to use them to create web pages."></textarea>
        </div>
        <div class="form-group">
            <label for="lesson_desc">Lesson Video File</label>
            <input type="file" class="form-control-file" id="lesson_link" name="lesson_link">
        </div>
        <?php if (isset($msg)) {
            echo $msg;
        } ?>
        <div class="text-center">
            <button type="submit" class="btn btn-primary" id="lessonSubmitBtn" name="lessonSubmitBtn">Submit</button>
            <a href="lessons.php" class="btn btn-secondary">Close</a>
        </div>
    </form>
</div>

</div><!-- div Row close from header  -->
</div><!-- div Container-fluid close from header  -->

<!-- Start Footer  -->
<?php include "./admininclude/footer.php"; ?>
<!-- End Footer  -->