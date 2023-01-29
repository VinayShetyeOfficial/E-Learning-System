<!-- Header Start  -->
<?php
if (!isset($_SESSION)) {
    session_start();
}

include "../dbConnection.php";
include "./admininclude/header.php";
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

<?php if (isset($_REQUEST["newStuSubmitBtn"])) {
    if (
        $_REQUEST["stu_name"] == "" ||
        $_REQUEST["stu_email"] == "" ||
        $_REQUEST["stu_pass"] == "" ||
        $_REQUEST["stu_occu"] == ""
    ) {
        // Checking form empty fields
        $msg =
            '<div class="alert alert-warning my-3" style="width: 210px;margin: auto;text-align: center;">Fields cannot be empty</div>';
    } else {
        $stu_name = ucwords(
            strtolower(
                mysqli_real_escape_string($conn, trim($_POST["stu_name"]))
            )
        );
        $stu_email = strtolower(
            mysqli_real_escape_string($conn, trim($_POST["stu_email"]))
        );
        $stu_pass = mysqli_real_escape_string($conn, trim($_POST["stu_pass"]));
        $stupass_hash = password_hash($stu_pass, PASSWORD_DEFAULT, [
            "cost" => 12,
        ]);
        $stu_occu = ucwords(
            strtolower(
                mysqli_real_escape_string($conn, trim($_POST["stu_occu"]))
            )
        );
        $stu_img = "default_avatar.png";

        $sql = "INSERT INTO student (stu_name, stu_email, stu_pass, password_hash, stu_occu, stu_img)
        VALUES ('$stu_name', '$stu_email', '$stu_pass', '$stupass_hash', '$stu_occu', '$stu_img')";

        if ($conn->query($sql) == true) {
            $msg =
                '<div class="alert alert-success my-3" style="width: 270px;margin: auto;text-align: center;">Student data added successfully</div>';
        } else {
            $msg =
                '<div class="alert alert-danger my-3" style="width: 230px;margin: auto;text-align: center;">Unable to add student data</div>';
        }
    }
} ?>

<div class="col-sm-6 mt-5 mx-3 jumbotron">
    <h3 class="text-center">Add New Student</h3>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="course_name">Name</label>
            <input type="text" class="form-control" id="stu_name" name="stu_name" placeholder="Eg. Matthew Rodriguez" style="text-transform: capitalize">
        </div>
        <div class="form-group">
            <label for="course_desc">Email</label>
            <input type="text" class="form-control" name="stu_email" id="stu_email" placeholder="Eg. matthewr@example.com" style="text-transform: lowercase">
        </div>
        <div class="form-group">
            <label for="course_author">Password</label>
            <input type="password" class="form-control" id="stu_pass" name="stu_pass" placeholder="Eg. e3@aJ9yK">
        </div>
        <div class="form-group">
            <label for="course_original_price">Occupation</label>
            <input type="text" class="form-control" id="stu_occu" name="stu_occu" placeholder="Eg. Software Engineer" style="text-transform: capitalize">
        </div>
        <?php if (isset($msg)) {
            echo $msg;
        } ?>
        <div class="text-center">
            <button type="submit" class="btn btn-primary" id="newStuSubmitBtn" name="newStuSubmitBtn">Submit</button>
            <a3 href="students.php" class="btn btn-secondary">Close</a3>
        </div>
    </form>
</div>


</div><!-- div Row close from header  -->
</div><!-- div Container-fluid close from header  -->

<!-- Start Footer  -->
<?php include "./admininclude/footer.php"; ?>
<!-- End Footer  -->