<?php
include'config.php';
session_start();
?>
<!doctype html>
<html lang="en">
<head>
        <title>Log In, Admin | EKC SDA Church</title>
<?php include'style.php'; ?>

    </head>

    <body>

    <!-- <body data-layout="horizontal"> -->
        <div class="auth-page">
            <div class="container-fluid p-0">
                <div class="row g-0">
                    <div class="col-xxl-9 col-lg-7 col-md-7" style="background: #0d1028">
                        <div class="pt-md-5 p-4" >
                            <div class="bg-overlay bg-primary"></div>
                            <ul class="bg-bubbles">
                                <li></li>
                                <li></li>
                                <li></li>
                                <li></li>
                                <li></li>
                                <li></li>
                                <li></li>
                                <li></li>
                                <li></li>
                                <li></li>
                            </ul>
                            <!-- end bubble effect -->
                            <div class="row justify-content-center align-items-center">
                                <div class="col-xl-7">
                                    <div class="signin_div text-center">
                                        <img src="../images/east%20kampala%20logo.png" width="100%">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-3 col-lg-5 col-md-5">
                        <div class="auth-full-page-content d-flex p-5">
                            <div class="w-100">
                                <div class="d-flex flex-column h-100">

                                    <div class="auth-content my-auto">
                                        <div class="text-center">
                                            <h4 class="mb-0">Log In</h4>
                                        </div>
                                        <form class="needs-validation custom-form mt-4 pt-2" novalidate action="" method="POST">
                                            <div class="mb-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
  <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
  <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
</svg>
                                                <label for="useremail" class="form-label"> Registered User Name</label>

                                                <input type="text" class="form-control" name="user_name" placeholder="Enter Valid Name" required >
                                            </div>

                                            <div class="mb-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-lock-fill" viewBox="0 0 16 16">
  <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z"/>
</svg>
                                                <label for="userpassword" class="form-label">Password</label>
                                                <input type="password" class="form-control" name="user_password" placeholder="Enter password" required>
                                            </div>
                                            <div class="mb-3">
                                                <button class="btn btn-primary w-50 waves-effect waves-light text-center" type="submit" name="admin_login">Login <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right-circle-fill" viewBox="0 0 16 16">
  <path d="M8 0a8 8 0 1 1 0 16A8 8 0 0 1 8 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z"/>
</svg></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end auth full page content -->
                    </div>
                </div>
            </div>
        </div>





        <!-- JAVASCRIPT -->
        <?php include'script.php'; ?>

    </body>
</html>

<?php
if(isset($_POST['admin_login'])){
    $username = $_POST['user_name'];
    $userpassword = $_POST['user_password'];

    $view_data = "SELECT * FROM admin WHERE admin_name = ? AND admin_password = ?";
    $result = $conn->prepare($view_data);
    $result->execute([$username, $userpassword]);

    // Check if the query returned any rows
    if ($result->rowCount() > 0) {
        $_SESSION['admin_name'] = $_POST['user_name'];
        echo '<script> window.location.href = "./";</script>';
    } else {
        echo '<script>alert("Login Failed.")</script>';
    }
}

?>
