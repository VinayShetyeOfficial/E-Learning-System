<!-- Header Start -->
<?php
if (!isset($_SESSION)) {
    session_start();
}

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

<div class="col-sm-9">
    <!-- Table  -->
    <!-- <p class="bg-dark text-white p-2">List of Courses</p> -->
    <?php
    include "../dbConnection.php";

    $sql = "SELECT * FROM course ORDER BY course_name";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) { ?>
        <h3 class="mt-5 bg-dark text-white text-center p-2">Course List</h3>
        <table class="table table-hover">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Course ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Author</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_Assoc()) {
                    echo '
                    <tr>
                        <th scope="row">#' .
                        $row["course_id"] .
                        '</th>
                        <td scope="col">' .
                        $row["course_name"] .
                        '</td>
                        <td scope="col">' .
                        $row["course_author"] .
                        '</td>
                        <td>
                        <form action="editcourse.php" method="POST" class="d-inline">
                             <input type="hidden" name="id" value="' .
                        $row["course_id"] .
                        '">
                            <button id="edit" name="edit" type="submit" class="btn btn-info mr-3">
                                <i class="fas fa-pen"></i>
                            </button>
                        </form>
                        <form action="" method="POST" class="d-inline">
                            <input type="hidden" name="id" value="' .
                        $row["course_id"] .
                        '">
                            <button id="delete" name="delete" type="submit" class="btn btn-danger">
                            <i class="fas fa-trash-alt"></i>
                            </button>
                        </form>
                        </td>
                    </tr>
                    ';
                } ?>
            </tbody>
        </table>
    <?php } else {echo '
        <h3 class="bg-dark text-white mt-3 p-2">List Of Courses</h3>
        <div class="alert alert-warning text-center py-5" role="alert">
            <i class="fas fa-exclamation-triangle fa-2x"></i>
            <h4 class="alert-heading">0 Results</h4>
            <p class="m-0">No course added.</p>
        </div>
        ';}

    if (isset($_REQUEST["delete"])) {
        $course_id = $_REQUEST["id"];
        $stmt = $conn->prepare("DELETE FROM course WHERE course_id = ?");
        $stmt->bind_param("s", $course_id);

        if ($stmt->execute()) {
            echo "<meta http-equiv='refresh' content='0;URL=?deleted'>";
        } else {
            echo "Unable to delete data";
        }
    }
    ?>
</div>
</div><!-- div Row close from header  -->

<div>
    <a href="./addCourse.php" class="btn btn-danger box">
        <i class="fas fa-plus fa-2x"></i>
    </a>
</div>
</div><!-- div Container-fluid close from header  -->


<!-- Start Footer  -->
<?php include "./admininclude/footer.php"; ?>
<!-- End Footer  -->