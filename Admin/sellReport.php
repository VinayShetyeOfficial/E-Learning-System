<?php

if (!isset($_SESSION)) {
    session_start();
}

include "./admininclude/header.php";
include "../dbConnection.php";
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

<div class="col-sm-9 mt-3">
    <h2 class="text-center my-4">Check Sell Report</h2>
    <form action="" method="POST" class="d-print-none">
        <div class="form-group row justify-content-center">
            <label for="startdate" class="mt-1">From:</label>
                <div class="form-group col-md-2"> <input type="date" class="form-control " id="startdate" name="startdate"></div> 
            <label for="enddate" class="mt-1">To:</label>
            <div class="form-group col-md-2">
                <input type="date" class="form-control" id="enddate" name="enddate">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" name="searchsubmit" value="Search" id="datePickerId">
            </div>
        </div>
    </form>

    <?php if (isset($_REQUEST["searchsubmit"])) {
        $startdate = $_REQUEST["startdate"];
        $enddate = $_REQUEST["enddate"];
        // $sql "SELECT * FROM courseorder WHERE order_date = BETWEEN '2018-10-11' AND '2018-10-13";

        $sql = "SELECT * FROM courseorder WHERE order_date BETWEEN '$startdate' AND '$enddate'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo '
                    <h3 class="bg-dark text-white text-center mt-4 p-2">Sell Report</h3>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Order ID</th>
                                <th scope="col">Course ID</th>
                                <th scope="col">Student Email</th>
                                <th scope="col">Payment Status</th>
                                <th scope="col">order Date</th>
                                <th scope="col">Amount</th>
                            </tr>
                        </thead>
                        <tbody>';

            while ($row = $result->fetch_assoc()) {
                echo '
                            <tr>
                                <th scope="row">' .
                    $row["order_id"] .
                    '</th>
                                <td>' .
                    $row["course_id"] .
                    '</td>
                                <td>' .
                    $row["stu_email"] .
                    '</td>
                                <td>' .
                    $row["status"] .
                    '</td>
                                <td>' .
                    $row["order_date"] .
                    '</td>
                                <td>' .
                    $row["amount"] .
                    '</td>
                            </tr>
                            ';
            }

            echo '<tr>
                                    <td><form class="d-print-none"><input class="btn btn-danger" type="submit" value="Print" onclick="window. print()"></form></td>
                                    </tr></tbody>
                                    </table>';
        } else {
            echo '
                <h3 class="bg-dark text-white text-center mt-4 p-2">Sell Report</h3>
                <div class="alert alert-warning text-center py-5" role="alert">
                    <i class="fas fa-exclamation-triangle fa-2x"></i>
                    <h4 class="alert-heading">0 Results</h4>
                    <p class="m-0">No Records Found!</p>
                </div>
                ';
        }
    } ?>
</div>

</div><!-- div Row close from header  -->
</div><!-- div Container-fluid close from header  -->

<!-- Start Footer  -->
<?php include "./admininclude/footer.php"; ?>
<!-- End Footer  -->