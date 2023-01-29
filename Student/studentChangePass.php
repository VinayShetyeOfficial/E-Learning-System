<?php

if (!isset($_SESSION)) {
    session_start();
}

include "./stuInclude/header.php";
include "../dbConnection.php";
?>

<?php
// Redirect admin to index page if no active session
if (isset($_SESSION["is_login"])) {
    $stuEmail = $_SESSION["stuLogEmail"];
} else {
    echo '
        <script>
            window.location.href = "../index.php";
        </script>
    ';
}

if (isset($_REQUEST["stuPassUpdateBtn"])) {
    if ($_REQUEST["stuNewPass"] == "") {
        $passmsg =
            '<div class="alert alert-warning my-3" style="width: 210px;margin: auto;text-align: center;">Fields cannot be empty</div>';
    } else {
        $sql = "SELECT * FROM student WHERE stu_email = '$stuEmail'";
        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            $stuPass = $_REQUEST["stuNewPass"];
            $sql = "UPDATE student SET stu_pass = '$stuPass' WHERE stu_email = '$stuEmail'";

            if ($conn->query($sql) == true) {
                $passmsg =
                    '<div class="alert alert-success my-3" style="width: 210px;margin: auto;text-align: center;">Updated Succesfully</div>';
            }
        } else {
            $passmsg =
                '<div class="alert alert-danger my-3" style="width: 210px;margin: auto;text-align: center;">Unable to update</div>';
        }
    }
}
?>

<div class="col-sm-9 col-md-10">
    <div class="row">
        <div class="col-sm-6">
            <form class="mt-5 mx-5" method="POST">
                <div class="form-group">
                    <label for="inputEmail">Email</label>
                    <input type="email" class="form-control" id="inputEmail" value="<?php echo $stuEmail; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="input newpassword">New Password</label>
                    <input type="password" class="form-control" id="inputnewpassword" placeholder="New Password" name="stuNewPass">
                </div>
                <?php if (isset($passmsg)) {
                    echo $passmsg;
                } ?>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary mr-4 mt-4" name="stuPassUpdateBtn">Update</button>
                    <button type="reset" class="btn btn-secondary mt-4">Reset</ button>
                </div>
            </form>
        </div>
    </div>
</div>
</div> <!-- Close Row Div from header file -->
</div> <!-- Close container-fluid Div from header file -->

<?php include "./stuInclude/footer.php";
?>
