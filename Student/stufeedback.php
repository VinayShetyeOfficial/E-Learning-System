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
    $stuId = $row["stu_id"];
}

if (isset($_REQUEST["submitFeedbackBtn"])) {
    if ($_REQUEST["f_content"] == "") {
        $passmsg =
            '<div class="alert alert-warning my-3" style="width: 210px;margin: auto;text-align: center;">Fields cannot be empty</div>';
    } else {
        $fcontent = ucfirst(strtolower(trim($_REQUEST["f_content"])));
        $sql = "INSERT INTO feedback (f_content, stu_id) VALUES ('$fcontent', '$stuId')";

        if ($conn->query($sql) === true) {
            $passmsg =
                '<div class="alert alert-success my-3" style="width: 210px;margin: auto;text-align: center;">Updated Succesfully</div>';
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
                isset($stuId)
            ) {
                echo $stuId;
            } ?>" readonly>
        </div>
        <div class="form-group">
            <label for="f_content">Write Feedback</label> 
            <textarea class="form-control" id="f_content" name="f_content" row=2></textarea>
        </div>
        <?php if (isset($passmsg)) {
            echo $passmsg;
        } ?>
        <div class="text-center">
            <button type="submit" class="btn btn-primary" name="submitFeedbackBtn">Submit</button>
        </div>
    </form>
</div>
</div> <!-- Close Row Div from header file -->
</div> <!-- Close container-fluid Div from header file -->

<?php include "./stuInclude/footer.php";
?>
