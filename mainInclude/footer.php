<!-- Start Footer  -->
<footer class="container-fluid bg-dark text-center p-2">
    <small class="text-white">Copyright &copy; 2019 || Designed by E-Learning || 
        <?php if (isset($_SESSION["is_admin_login"])) { ?>
            <a href="./Admin/adminDashboard.php" class="nav-link" rel="noopener noreferrer">Admin</a>
        <?php } else { ?>
            <a href="#adminModal" class="nav-link" data-toggle="modal" rel="noopener noreferrer">Admin</a>
        <?php } ?>
    </small>
</footer>
<!-- End Footer  -->

<!-- Start Student Registration Modal  -->
<!-- Modal -->
<div class="modal fade " id="registrationModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Student Registration</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <!-- Start Student Registration Form  -->
                <?php include "studentRegistration.php"; ?>
                <!-- End Student Registration Form  -->

            </div>
            <div class="text-center mb-3" style="font-size: 14px;">Already a member? <a href="#" data-dismiss="modal" data-toggle="modal" data-target="#loginModal">Login</a></div>
            <div class="modal-footer">
                <span id="successMsg"></span>
                <button type="button" class="btn btn-primary" id="signup" onclick="addStu()">Signup</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- End Student Registration Modal -->

<!-- Start Student Login Modal  -->
<!-- Modal -->
<div class="modal fade " id="loginModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Login</h5>
                <button type="button" onclick="" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <!-- Start Student Login Form  -->
                <form id="stuLoginForm">
                    <div class="form-group">
                        <i class="fas fa-envelope"></i>
                        <label for="stuLogemail font-weight-bold">Email</label>
                        <small id="log_statusMsg1"></small>
                        <input type="email" class="form-control" id="stuLogemail" name="stuLogemail"" placeholder="Eg. matthewr@example.com" style="text-transform: lowercase">
                    </div>
                    <div class=" form-group mb-0">
                        <i class="fas fa-key"></i>
                        <label for="stuLogpass font-weight-bold">Password</label>
                        <small id="log_statusMsg2"></small>
                        <input type="password" class="p1-2 form-control" id="stuLogpass" name="stuLogpass" placeholder="Eg. e3@aJ9yK">
                    </div>
                </form>
                <!-- End Student Login Form  -->

            </div>
            <div class="text-center mb-3" style="font-size: 14px;">Don't have an account? <a href="#" data-dismiss="modal" data-toggle="modal" data-target="#registrationModal">Register</a></div>
            <div class="modal-footer">
                <small id="statusLogMsg"></small>
                <button type="button" class="btn btn-primary" onclick="checkStuLogin()" id="stuLogButton">Login</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
<!-- End Student Login Modal -->

<!-- Start Admin Login Modal  -->
<!-- Modal -->
<div class="modal fade " id="adminModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Admin Login</h5>
                <button type="button" onclick="clearStuLogFields()" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <!-- Start Admin Login Form  -->
                <form id="adminLoginForm">
                    <div class="form-group">
                        <i class="fas fa-envelope"></i>
                        <label for="adminLogemail font-weight-bold">Email</label>
                        <input type="email" class="form-control" id="adminLogemail" name="adminLogemail" placeholder="admin@example.com" style="text-transform: lowercase">
                    </div>
                    <div class="form-group">
                        <i class="fas fa-key"></i>
                        <label for="adminLogpass font-weight-bold">Password</label>
                        <input type="password" class="p1-2 form-control" id="adminLogpass" name="adminLogpass" placeholder="Eg. e3@aJ9yK">
                    </div>
                </form>
                <!-- End Admin Login Form  -->

            </div>
            <div class="modal-footer">
                <small id="statusAdminLogMsg"></small>
                <button type="button" class="btn btn-primary" id="adminLogButton" onclick="checkAdminLogin()">Login</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
<!-- End Admin Login Modal -->

<div class="scrolltop-wrap">
    <a href="#" class="box" role="button" aria-label="Scroll to top">
        <svg height="48" viewBox="0 0 48 48" width="48" height="48px" xmlns="http://www.w3.org/2000/svg">
            <path id="scrolltop-bg" d="M0 0h48v48h-48z"></path>
            <path id="scrolltop-arrow" d="M14.83 30.83l9.17-9.17 9.17 9.17 2.83-2.83-12-12-12 12z"></path>
        </svg>
    </a>
</div>

<!-- Jquery and Bootstrap JavaScript  -->
<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>

<!-- Font Awesome JavaScript  -->
<script src="js/all.min.js"></script>

<!-- Student Ajax Call JavaScript  -->
<script src="js/ajaxrequest.js"></script>
<script src="js/adminajaxrequest.js"></script>

<!-- Custom JavaScript -->
<script type="text/javascript" src="../js/custom.js"></script>


<script>
    // for navbar scroll
    $(document).ready(function() {
        $(document).scroll(function() {
            var $nav = $(".fixed-top");
            $nav.toggleClass('scrolled', $(this).scrollTop() > 400);
        });
    });
    
</script>

</body>

</html>