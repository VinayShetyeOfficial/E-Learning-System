<?php

if (!isset($_SESSION)) {
    session_start();
}

include_once "../dbConnection.php";

// Admin Login verification
if (!isset($_SESSION["is_admin_login"])) {
    if (
        isset($_POST["checkLogemail"]) &&
        $_POST["adminLogEmail"] &&
        $_POST["adminLogPass"]
    ) {
        $adminLogEmail = $_POST["adminLogEmail"];
        $adminLogPass = $_POST["adminLogPass"];

        $sql =
            "SELECT admin_email, admin_pass FROM admin WHERE admin_email = '" .
            $adminLogEmail .
            "' AND admin_pass = '" .
            $adminLogPass .
            "'";

        $result = $conn->query($sql);
        $row = $result->num_rows;

        if ($row == 1) {
            echo json_encode($row);

            // unsetting student login session if active
            if (isset($_SESSION["is_login"])) {
                unset($_SESSION["is_login"]);
            }

            $_SESSION["is_admin_login"] = true;
            $_SESSION["adminLogEmail"] = $adminLogEmail;
        } elseif ($row == 0) {
            echo json_encode($row);
        }
    }
}

?>
