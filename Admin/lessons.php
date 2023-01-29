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

<div class="col-sm-9 mt-3 mx-3">
    <h2 class="text-center my-4">Check Course Details </h2>
    <form action="" class="mt-3 form-inline justify-content-center d-print-none">
        <div class="form-group mr-3">
            <label for="checkid">Enter Course ID:</label>
            <input type="text" class="form-control ml-3" id="checkid" name="checkid" placeholder="Eg. COS3160" style="text-transform: uppercase">
        </div>
        <button type="submit" class="btn btn-primary">Search</button>
    </form>

    <?php
    $sql = "SELECT course_id FROM course";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            if (
                isset($_REQUEST["checkid"]) &&
                strtoupper($_REQUEST["checkid"]) == $row["course_id"]
            ) {
                $sql =
                    "SELECT * FROM course WHERE course_id = '" .
                    strtoupper($_REQUEST["checkid"]) .
                    "'";
                $result = $conn->query($sql);

                $row = $result->fetch_assoc();

                if ($row["course_id"] == strtoupper($_REQUEST["checkid"])) {

                    $_SESSION["course_id"] = $row["course_id"];
                    $_SESSION["course_name"] = $row["course_name"];
                    ?>

                    <h3 class="mt-5 bg-dark text-white p-2">
                        Course Information : (
                        Course Id: <?php if (isset($row["course_id"])) {
                            echo $row["course_id"];
                        } ?> |
                        Course Name: <?php if (isset($row["course_name"])) {
                            echo $row["course_name"];
                        } ?>
                        )
                    </h3>

    <?php
    $sql =
        "SELECT * FROM lesson WHERE course_id = '" .
        strtoupper($_REQUEST["checkid"]) .
        "'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo '
                        <table class="table table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Lesson ID</th>
                                    <th scope="col">Lesson Name</th>
                                    <th scope="col">Lesson Link</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                        ';
        while ($row = $result->fetch_assoc()) {
            echo '
                                <tr>
                                    <th scope="row">#' .
                $row["lesson_id"] .
                '</th>
                                    <td scope="col">' .
                $row["lesson_name"] .
                '</td>
                                    <td scope="col">' .
                $row["lesson_link"] .
                '</td>
                                    <td>
                                    <form action="editlesson.php" method="POST" class="d-inline">
                                        <input type="hidden" name="id" value="' .
                $row["lesson_id"] .
                '">
                                        <button id="edit" name="edit" type="submit" class="btn btn-info mr-3">
                                            <i class="fas fa-pen"></i>
                                        </button>
                                    </form>
                                    <form action="" method="POST" class="d-inline">
                                        <input type="hidden" name="id" value="' .
                $row["lesson_id"] .
                '">
                                        <button id="delete" name="delete" type="submit" class="btn btn-danger">
                                        <i class="fas fa-trash-alt"></i>
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
                        <div class="alert alert-warning text-center" role="alert">
                            <i class="fas fa-exclamation-triangle fa-2x"></i>
                            <h4 class="alert-heading">0 Results</h4>
                            <p>No Lesson added.</p>
                        </div>
                        ';
    }

                }

                if (isset($_REQUEST["delete"])) {
                    $sql =
                        "DELETE FROM lesson WHERE lesson_id = '" .
                        $_REQUEST["id"] .
                        "'";

                    if ($conn->query($sql) == true) {
                        // echo "Record deleted successfuly";
                        // below code will refresh the page after record is deleted
                        $deleted = true;
                        echo "<meta http-equiv='refresh' content='0;URL=?deleted'>";
                    } else {
                        echo "Unable to delete data";
                    }
                }
            }
        }
    } else {
        echo '
        <h3 class="mt-5 bg-dark text-white p-2">
            Course Information : ( Course Id: --- | Course Name: --- )
        </h3>
        <div class="alert alert-warning text-center py-5" role="alert">
            <i class="fas fa-exclamation-triangle fa-2x"></i>
            <h4 class="alert-heading">0 Results</h4>
            <p class="m-0">No course added.</p>
        </div>
        ';
    }
    ?>
</div>

<?php if (isset($_SESSION["course_id"])) {
    echo '
        <div>
            <a href="./addLesson.php" class="btn btn-danger box">
                <i class="fas fa-plus fa-2x"></i>
            </a>
        </div>

    ';
} ?>


<!-- Start Footer  -->
<?php include "./admininclude/footer.php"; ?>
<!-- End Footer  -->