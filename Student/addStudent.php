<?php

if (!isset($_SESSION)) {
    session_start();
}

include_once "../dbConnection.php";

// Checking if Email Already Registered
if (isset($_POST["checkmail"]) && isset($_POST["stuemail"])) {
    $stuemail = $_POST["stuemail"];
    $sql =
        "SELECT stu_email FROM student WHERE stu_email = '" . $stuemail . "'";
    $result = $conn->query($sql);
    $row = $result->num_rows;
    echo json_encode($row);
}

// Inset Student
if (
    isset($_POST["stusignup"]) &&
    isset($_POST["stuname"]) &&
    isset($_POST["stuemail"]) &&
    isset($_POST["stupass"])
) {
    $stuname = ucwords(strtolower(trim($_POST["stuname"])));
    $stuemail = strtolower(trim($_POST["stuemail"]));
    $stupass = trim($_POST["stupass"]);
    $stupass_hash = password_hash($stupass, PASSWORD_DEFAULT, ["cost" => 12]);
    $stu_img = "default_avatar.png";

    $sql = "INSERT INTO student(stu_name, stu_email, stu_pass, password_hash, stu_img) VALUES('$stuname', '$stuemail', '$stupass', '$stupass_hash', '$stu_img')";

    if ($conn->query($sql) == true) {
        echo json_encode("OK");
    } else {
        echo json_encode("Failed");
    }
}

// Student Login verification
if (!isset($_SESSION["is_login"])) {
    if (
        isset($_POST["checkLogemail"]) &&
        $_POST["stuLogEmail"] &&
        $_POST["stuLogPass"]
    ) {
        $stuLogEmail = $_POST["stuLogEmail"];
        $stuLogPass = $_POST["stuLogPass"];

        $sql =
            "SELECT stu_email, password_hash FROM student WHERE stu_email = '" .
            $stuLogEmail .
            "'";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            if (password_verify($stuLogPass, $row["password_hash"])) {
                echo json_encode(1);

                // unsetting admin login session if active
                if (isset($_SESSION["is_admin_login"])) {
                    unset($_SESSION["is_admin_login"]);
                }

                $_SESSION["is_login"] = true;
                $_SESSION["stuLogEmail"] = $stuLogEmail;
            } else {
                echo json_encode(0);
            }
        }
    }
}

?>
