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
?>

<div class="col-sm-9 mt-5">
    <!--Table-->
    
    <?php
    $sql = "SELECT * FROM feedback";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo '
            <h3 class="bg-dark text-white text-center p-2">Students Feedbacks</h3>

            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Feedback ID</th>
                    <th scope="col">Content</th>
                    <th scope="col">Student ID</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
        ';

        while ($row = $result->fetch_assoc()) {
            echo '
                <tr>
                    <th scope="row">' .
                $row["f_id"] .
                '</th>
                    <td>' .
                $row["f_content"] .
                '</td>
                    <td>' .
                $row["stu_id"] .
                '</td>
                    <td>
                        <form action="" method="POST" class="d-inline">
                        <input type="hidden" name="id" value="' .
                $row["f_id"] .
                '">
                        <button type="submit" class="btn btn-secondary" name="delete" value="Delete">
                            <i class="far fa-trash-alt"></i>
                        </button>
                        </form>
                    </td>
                </tr>

            ';
        }

        echo '
        </tbody>
    </table>
    ';
    } else {
        echo '
        <h3 class="bg-dark text-white text-center p-2">Feedbacks</h3>
        <div class="alert alert-warning text-center py-5" role="alert">
            <i class="fas fa-exclamation-triangle fa-2x"></i>
            <h4 class="alert-heading">0 Results</h4>
            <p class="m-0">No feedback submitted.</p>
        </div>
        ';
    }

    if (isset($_REQUEST["delete"])) {
        $sql = "DELETE FROM feedback WHERE f_id = '" . $_REQUEST["id"] . "'";
        if ($conn->query($sql) === true) {
            // echo "Record Deleted Successfully";
            echo "<meta http-equiv='refresh' content='0;URL=?deleted'>";
        }
    }
    ?>

</div>
</div> <!-- Close Row Div from header file -->
</div> <!-- Close container-fluid Div from header file -->

<!-- Start Footer  -->
<?php include "./admininclude/footer.php"; ?>
<!-- End Footer  -->"