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
    header("location: ../index.php");
}

$sql = "SELECT * FROM student WHERE stu_email = '$stuEmail'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $stuId_val = $row["stu_id"];
    $stuEmail_val = $row["stu_email"];
    $stuName_val = $row["stu_name"];
    $stuOcc_val = $row["stu_occu"];
    $stuImg_val = $row["stu_img"];
}

if (isset($_REQUEST["updateStuNameBtn"])) {
    if ($_REQUEST["stuName"] == "") {
        $passmsg =
            '<div class="alert alert-warning my-3" style="width: 210px;margin: auto;text-align: center;">Fields cannot be empty</div>';
    } else {
        $stuId = trim($_REQUEST["stuId"]);
        $stuName = ucwords(trim($_REQUEST["stuName"]));
        $stuOccu = ucwords(trim($_REQUEST["stuOccu"]));
        $stu_image = $_FILES["stuImg"]["name"];
        $stu_image_temp = $_FILES["stuImg"]["tmp_name"];

        // specific format for student image
        $stu_image = strtolower(
            join("_", explode(" ", $stuName)) . "_" . $stuId . ".png"
        );

        $img_folder = "../image/stuimg/" . $stu_image;

        move_uploaded_file($stu_image_temp, $img_folder);

        $sql = "UPDATE student SET stu_name = '$stuName', stu_occu = '$stuOccu', stu_img = '$stu_image' WHERE stu_email = '$stuEmail'";

        if ($conn->query($sql) == true) {
            $passmsg =
                '<div class="alert alert-success my-3" style="width: 210px;margin: auto;text-align: center;">Updated Succesfully</div>';
            echo "<meta http-equiv='refresh' content='0;URL=?updated'>";
        } else {
            $passmsg =
                '<div class="alert alert-danger my-3" style="width: 210px;margin: auto;text-align: center;">Unable to update</div>';
        }
    }
}
?>

<div class="col-sm-6 mt-5">
    <form class="mx-5" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="stuId">Student ID</label>
            <input type="text" class="form-control" id="stuId" name="stuId" value="<?php if (
                isset($stuId_val)
            ) {
                echo $stuId_val;
            } ?>" readonly>
        </div>
        <div class="form-group">
            <label for="stuEmail">Email</label>
            <input type="email" class="form-control" id="stuEmail" value="<?php if (
                isset($stuEmail_val)
            ) {
                echo $stuEmail_val;
            } ?>" readonly>
        </div>
        <div class="form-group">
            <label for="stuName">Name</label>
            <input type="text" class="form-control" id="stuName" name="stuName" placeholder="Eg. Matthew Rodriguez" style="text-transform: capitalize" value="<?php if (
                isset($stuName_val)
            ) {
                echo $stuName_val;
            } ?>">
        </div>
        <div class="form-group">
            <label for="stuOccu">Occupation</label>
            <input type="text" class="form-control" id="stuOccu" name="stuOccu" placeholder="Eg. Software Engineer" style="text-transform: capitalize" value="<?php echo $stuOcc_val; ?>">
        </div>
        <div class="form-group">
            <label for="stuImg">Upload Image</label>
            <input type="file" class="form-control-file" id="stuImg" name="stuImg">
        </div>
        <?php if (isset($passmsg)) {
            echo $passmsg;
        } ?>
        <div class="text-center">
            <button type="submit" class="btn btn-primary" name="updateStuNameBtn">Update</button>
        </div>
    </form>
</div>
</div> <!-- Close Row Div from header file -->
</div> <!-- Close container-fluid Div from header file -->

<?php include "./stuInclude/footer.php";
?>
