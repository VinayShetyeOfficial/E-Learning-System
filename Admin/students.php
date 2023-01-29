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

<div class="col-sm-9 mt-5">
    <!-- Table  -->
    <h3 class="bg-dark text-white text-center p-2">Students Registered</h3>
    <?php
    include "../dbConnection.php";

    $sql = "SELECT * FROM student ORDER BY stu_id, stu_name ASC";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) { ?>
        <table class="table table-hover">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Student ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_Assoc()) {
                    echo '
                    <tr>
                        <th scope="row">#' .
                        $row["stu_id"] .
                        '</th>
                        <td scope="col">' .
                        $row["stu_name"] .
                        '</td>
                        <td scope="col">' .
                        $row["stu_email"] .
                        '</td>
                        <td>
                        <form action="editstudent.php" method="POST" class="d-inline">
                             <input type="hidden" name="id" value="' .
                        $row["stu_id"] .
                        '">
                            <button id="edit" name="edit" type="submit" class="btn btn-info mr-3">
                                <i class="fas fa-pen"></i>
                            </button>
                        </form>
                        <form action="" method="POST" class="d-inline">
                            <input type="hidden" name="id" value="' .
                        $row["stu_id"] .
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
        <h3 class="bg-dark text-white text-center p-2">Students Registered</h3>
        <div class="alert alert-warning text-center my-5" role="alert">
            <i class="fas fa-exclamation-triangle fa-2x"></i>
            <h4 class="alert-heading">0 Results</h4>
            <p class="m-0">No student data added.</p>
        </div>
        ';}

    if (isset($_REQUEST["delete"])) {
        $stu_id = $_REQUEST["id"];
        $stmt = $conn->prepare("DELETE FROM student WHERE stu_id = ?");
        $stmt->bind_param("s", $stu_id);

        if ($stmt->execute()) {
            echo "<meta http-equiv='refresh' content='0;URL=?deleted'>";
        } else {
            echo "Unable to delete data";
        }
    }
    ?>
</div>
</div>

<!-- div Row close from header  -->
<div>
    <a href="./addnewstudent.php" class="btn btn-danger box" style="border-radius: 48%">
        <i class="fas fa-plus fa-2x"></i>
    </a>
</div>
</div>
<!-- div Container-fluid close from header  -->

<!-- Start Footer  -->
<?php include "./admininclude/footer.php"; ?>
<!-- End Footer  -->