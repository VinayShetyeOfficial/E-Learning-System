<?php

if (!isset($_SESSION)) {
    session_start();
}

include_once "./dbConnection.php";
include "./mainInclude/header.php";
?>
<!-- Header End  -->

<!-- Start Course Page Banner  -->
<div class="container-fluid bg-dark">
    <div class="row">
        <img src="./image/coursebanner.png" alt="courses" style="height:500px; width: 100%; object-fit:cover; box-shadow: 10px;">
    </div>
</div>
<!-- End Course Page Banner  -->
<h1 class="text-center mt-5">Login or Signup</h1>
<div class="container jumbotron pb-4" style="margin-top: 2rem">
    <div class="row justify-content-around">
        <div class="col-md-4">
            <h5 class="mb-3">If Already Registered ? Login</h5>
            <form role="form" id="stuLoginForm">
                <div class="form-group">
                    <label for="stuLogemail" class="font-weight-bold">Email</label>
                    <small id="log_statusMsg1"></small>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-envelope"></i></span>
                        </div>
                        <input type="email" class="form-control" name="stuLogemail" id="stuLogemail" placeholder="Eg. matthewr@example.com" style="text-transform: lowercase">
                    </div>
                </div>
                <div class="form-group">
                    <label for="stuLogpass" class="font-weight-bold">Password</label>
                    <small id="log_statusMsg2"></small>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-key"></i></span>
                        </div>
                        <input type="password" class="form-control" name="stuLogpass" id="stuLogpass" placeholder="Eg. e3@aJ9yK">
                    </div>
                </div>
                <button type="button" class="btn btn-primary" id="stuLoginBtn" onclick="checkStuLogin()">Login</button>
                <small id="statusLogMsg" class="d-inline ml-3"></small>
            </form><br />
        </div>
        <div class="col-md-6 offset-md-1">
            <h5 class="mb-3">New User ? Sign Up</h5>
            <form role="form" id="stuRegForm">
                <div class="form-group">
                    <label for="stuname" class="font-weight-bold">Name</label>
                    <small id="reg_statusMsg1"></small>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
                        </div>
                        <input type="text" class="form-control" name="stuname" id="stuname" placeholder="Eg. Matthew Rodriguez" style="text-transform: capitalize">
                    </div>
                </div>
                <div class="form-group">
                    <label for="stuemail" class="font-weight-bold">Email</label>
                    <small id="reg_statusMsg2"></small>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-envelope"></i></span>
                        </div>
                        <input type="email" class="form-control" name="stuemail" id="stuemail" placeholder="Eg. matthewr@example.com" style="text-transform: lowercase">
                    </div>
                    <small class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                    <label for="stupass" class="font-weight-bold">New Password</label>
                    <small id="reg_statusMsg3"></small>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-key"></i></span>
                        </div>
                        <input type="password" class="form-control" name="stupass" id="stupass" placeholder="Eg. e3@aJ9yK">
                    </div>
                </div>
                <button type="button" class="btn btn-primary" id="signup" onclick="addStu()">Signup</button>
                <small id="successMsg" class="d-inline ml-3"></small>
            </form> <br />
        </div>
    </div>

</div>
<hr />

<?php // Contact Us
include "./contact.php"; ?>

<?php include "./mainInclude/footer.php";
?>
