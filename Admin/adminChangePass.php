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

// $adminEmail = $_SESSION['adminLogEmail'];

if (isset($_REQUEST["adminPassUpdatebtn"])) {
    if ($_REQUEST["inputnewpassword"] == "") {
        // msg displayed if required field missing
        $passmsg =
            '<div class="alert alert-warning my-3" style="width: 270px;margin: auto;text-align: center;">Password field cannot be empty</div>';
    } else {
        $sql = "SELECT * FROM admin WHERE admin_email = '$adminEmail'";
        $result = $conn->query($sql);
        if ($result->num_rows == 1) {
            $adminPass = $_REQUEST["inputnewpassword"];

            $sql = "UPDATE admin SET admin_pass = '$adminPass' WHERE admin_email = '$adminEmail'";

            if ($conn->query($sql) == true) {
                // display below message on form submit
                $passmsg =
                    '<div class="alert alert-success my-3" style="width: 310px;margin: auto;text-align: center;">Admin password updated successfully</div>';
            } else {
                // display below message on form submit failure
                $passmsg =
                    '<div class="alert alert-success my-3" style="width: 310px;margin: auto;text-align: center;">Failed to update admin password</div>';
            }
        } else {
            // display below message on form submit failure
            $passmsg =
                '<div class="alert alert-success my-3" style="width: 310px;margin: auto;text-align: center;">Admin email not found</div>';
        }
    }
}
?>

<div class="col-sm-9 mt-5">
    <div class="row">
        <div class="col-sm-6 bg-light p-5">
        <h3 class="text-center">Change Admin Password</h3>
            <form>
                <div class="form-group">
                    <label for="inputEmail">Email</label>
                    <input type="email" class="form-control" id="inputEmail" value="<?php echo $adminEmail; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="inputnewpassword">New Password</label>
                    <input type="password" class="form-control" id="inputnewpassword" name="inputnewpassword" placeholder="New Password">
                </div>
                <?php if (isset($passmsg)) {
                    echo $passmsg;
                } ?>
                <div class="text-center">
                    <button type="submit" class="btn btn-success" name="adminPassUpdatebtn">Update</button>
                    <button type="reset" class="btn btn-secondary" onlcik="this.reset()">Reset</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Start Footer  -->
<?php include "./admininclude/footer.php"; ?>
<!-- End Footer  -->