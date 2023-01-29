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

if (isset($_REQUEST["newStuSubmitBtn"])) {
    if (
        $_REQUEST["stu_name"] == "" ||
        $_REQUEST["stu_email"] == "" ||
        $_REQUEST["stu_pass"] == "" ||
        $_REQUEST["stu_occu"] == ""
    ) {
        // display below message for empty fields
        $msg =
            '<div class="alert alert-warning my-3" style="width: 210px;margin: auto;text-align: center;">Fields cannot be empty</div>';
    } else {
        $stu_id = $_POST["stu_id"];
        $stu_name = ucwords(
            strtolower(
                mysqli_real_escape_string($conn, trim($_POST["stu_name"]))
            )
        );
        $stu_email = strtolower(
            mysqli_real_escape_string($conn, trim($_POST["stu_email"]))
        );
        $stu_pass = mysqli_real_escape_string($conn, trim($_POST["stu_pass"]));
        $stu_occu = ucwords(
            strtolower(
                mysqli_real_escape_string($conn, trim($_POST["stu_occu"]))
            )
        );

        $sql = "UPDATE student SET stu_name='$stu_name', stu_email='$stu_email', stu_pass='$stu_pass', stu_occu='$stu_occu' WHERE stu_id='$stu_id' ";

        if (mysqli_query($conn, $sql) == true) {
            // display below message on form submit
            $msg =
                '<div class="alert alert-success my-3" style="width: 310px;margin: auto;text-align: center;">Students details updated successfully</div>';
        } else {
            // display below message on form submit failure
            $msg =
                '<div class="alert alert-danger my-3" style="width: 210px;margin: auto;text-align: center;">Failed to update student details</div>';
        }
    }
}
?>


<div class="col-sm-6 mt-5 mx-3 jumbotron">
    <h3 class="text-center">Update Student Details</h3>
    <?php if (isset($_POST["edit"])) {
        $stmt = $conn->prepare("SELECT * FROM student WHERE stu_id = ?");
        $stmt->bind_param("i", $_REQUEST["id"]);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
        }
    } ?>

    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="stu_id">Student Id</label>
            <input type="text" class="form-control" id="stu_id" name="stu_id" value="<?php if (
                isset($row["stu_id"])
            ) {
                echo $row["stu_id"];
            } ?>" readonly>
        </div>
        <div class="form-group">
            <label for="stu_name">Student Name</label>
            <input type="text" class="form-control" id="stu_name" name="stu_name" placeholder="Eg. Matthew Rodriguez" style="text-transform: capitalize" value="<?php if (
                isset($row["stu_name"])
            ) {
                echo $row["stu_name"];
            } ?>">
        </div>
        <div class="form-group">
            <label for="stu_email">Student Email</label>
            <input type="text" class="form-control" name="stu_email" id="stu_email" placeholder="Eg. matthewr@example.com" style="text-transform: lowercase" value="<?php if (
                isset($row["stu_email"])
            ) {
                echo $row["stu_email"];
            } ?>">
        </div>
        <div class="form-group">
            <label for="stu_pass">Student Password</label>
            <input type="password" class="form-control" id="stu_pass" name="stu_pass" placeholder="Eg. e3@aJ9yK" value="<?php if (
                isset($row["stu_pass"])
            ) {
                echo $row["stu_pass"];
            } ?>">
        </div>
        <div class="form-group">
            <label for="stu_occu">Student Occupation</label>
            <input type="text" class="form-control" id="stu_occu" name="stu_occu" placeholder="Eg. Software Engineer" style="text-transform: capitalize"  value="<?php if (
                isset($row["stu_occu"])
            ) {
                echo $row["stu_occu"];
            } ?>">
        </div>
        <?php if (isset($msg)) {
            echo $msg;
        } ?>
        <div class="text-center">
            <button type="submit" class="btn btn-success" id="newStuSubmitBtn" name="newStuSubmitBtn">Update</button>
            <a href="students.php" class="btn btn-secondary">Close</a>
        </div>
    </form>
</div>

</div><!-- div Row close from header  -->
</div><!-- div Container-fluid close from header  -->

<!-- Start Footer  -->
<?php include "./admininclude/footer.php"; ?>
<!-- End Footer  -->"