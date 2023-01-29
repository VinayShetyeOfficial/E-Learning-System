<!-- Header Start  -->
<?php
if (!isset($_SESSION)) {
    session_start();
}

include "../dbConnection.php";
include "./admininclude/header.php";
?>
<!-- Header End  -->

<?php
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

$sql = "SELECT * FROM course";
$result = $conn->query($sql);
$totalcourse = $result->num_rows;

$sql = "SELECT * FROM student";
$result = $conn->query($sql);
$totalstu = $result->num_rows;

$sql = "SELECT * FROM courseorder";
$result = $conn->query($sql);
$totalsold = $result->num_rows;
?>


<div class="col-sm-9">
    <div class="row mx-5 text-center">
        <div class="col-sm-4 mt-5">
            <div class="card text-white bg-danger mb-3" style="max-width: 18rem">
                <div class="card-header">Courses</div>
                <div class="card-body">
                    <h4 class="card-title">
                        <?php echo $totalcourse; ?>
                    </h4>
                    <a href="courses.php" class="btn text-white">View</a>
                </div>
            </div>
        </div>
        <div class="col-sm-4 mt-5">
            <div class="card text-white bg-success mb-3" style="max-width: 18rem">
                <div class="card-header">Students</div>
                <div class="card-body">
                    <h4 class="card-title">
                        <?php echo $totalstu; ?>
                    </h4>
                    <a href="students.php" class="btn text-white">View</a>
                </div>
            </div>
        </div>
        <div class="col-sm-4 mt-5">
            <div class="card text-white bg-primary mb-3" style="max-width: 18rem">
                <div class="card-header">Sold</div>
                <div class="card-body">
                    <h4 class="card-title">
                    <?php echo $totalsold; ?>
                    </h4>
                    <a href="sellReport.php" class="btn text-white">View</a>
                </div>
            </div>
        </div>
    </div>
    <div class="mx-5 text-center">
        <!-- Table  -->
        <h3 class="bg-dark text-white p-2">Course Orders</h3>
        <?php
        $sql = "SELECT * FROM courseorder";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            echo '
                <table class="table table-hover">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">Order Id</th>
                            <th scope="col">Course Id</th>
                            <th scope="col">Student Id</th>
                            <th scope="col">Order Date</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>';
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo '<th scope="row">' . $row["order_id"] . "</th>";
                echo "<td>" . $row["course_id"] . "</td>";
                echo "<td>" . $row["stu_email"] . "</td>";
                echo "<td>" . $row["order_date"] . "</td>";
                echo "<td>" . $row["amount"] . "</td>";
                echo '<td>
                                <form action="" method="POST" class="d-inline">
                                    <input type="hidden" name="id" value=' .
                    $row["co_id"] .
                    '>
                                    <button type="submit" class="btn btn-secondary" name="delete" value="Delete">
                                        <i class="far fa-trash-alt"></i>
                                    </button>
                                </form>
                            </td>';

                echo "</tr>";
            }
            echo "</tbody>";
        } else {
            echo '
            <div class="alert alert-warning text-center py-5" role="alert">
                <i class="fas fa-exclamation-triangle fa-2x"></i>
                <h4 class="alert-heading">0 Results</h4>
                <p class="m-0">No course ordered.</p>
            </div>
            ';
        }

        if (isset($_REQUEST["delete"])) {
            $sql = "DELETE FROM courseorder WHERE co_id = {$_REQUEST["id"]}";
            if ($conn->query($sql) === true) {
                // echo "Record Deleted Successfully";
                // below code will refresh the page after deleting the

                echo '<meta http-equiv="refresh" content="0;URL=?deleted" />';
            } else {
                echo "Unable to Delete Data";
            }
        }
        ?>
        
    </div>
</div>

</div><!-- div Row clode from the header -->
</div><!-- div Container-fluid close from header -->

<!-- Start Footer  -->
<?php include "./admininclude/footer.php"; ?>
<!-- End Footer  -->