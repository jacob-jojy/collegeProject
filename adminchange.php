<?php
session_start();
if ($_SESSION["hellodocsession"] == session_id()) {

?>



    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard</title>
        <link rel="stylesheet" href="../style/style.css">
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>

    </head>

    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.html">HELLO DOC</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">

            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">

                        <li><a class="dropdown-item" href="change.php">Change Password</a></li>
                        <li>
                            <hr class="dropdown-divider" />
                        </li>
                        <li><a class="dropdown-item" href="./auth/logout.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Menu</div>
                            <a class="nav-link" href="/hellodoc/adland.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Admin Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Services</div>
                            <a class="nav-link" href="/hellodoc/admin.php">
                                <div class="sb-nav-link-icon"><i class="far fa-user"></i></div>
                                User details
                            </a>

                            <a class="nav-link" href="/hellodoc/staff.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-hospital-user"></i></div>
                                Staff Details
                            </a>


                            <a class="nav-link" href="/hellodoc/hospital.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-clinic-medical"></i></div>
                                Hospitals
                            </a>

                            <a class="nav-link" href="/hellodoc/department.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-building"></i></div>
                                Department Details
                            </a>




                        </div>
                    </div>

                </nav>
            </div>
            <div id="layoutSidenav_content" class="container">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Change Password</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active"> You can update your Password Here </li>
                        </ol>
                </main>
                <div class="container">
                    <form action="#" method="post">
                        <div class="form-group col-6">
                            <label for="exampleInputEmail1">Current Password</label>
                            <input type="password" class="form-control" name="oldPass" aria-describedby="emailHelp" placeholder="Enter Current Password">
                        </div>
                        <div class="form-group col-6">
                            <label for="exampleInputEmail1">New Password</label>
                            <input type="password" class="form-control" name="newPass" aria-describedby="emailHelp" placeholder="Enter New Password">
                        </div>
                        <div class="form-group col-6">
                            <label for="exampleInputEmail1">Confirm Password</label>
                            <input type="password" class="form-control" name="confirmPass" aria-describedby="emailHelp" placeholder="Enter Confirm Password">
                        </div>
                        <br> <input type="submit" class="btn btn-primary ml-4" name="changePassBtn" value="Submit" />
                    </form>
                </div>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Hello Docs</div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>

    </html>
    <?php
    include('./include/connect.php');
    session_start();
    $uid =  $_SESSION['userid'];
    extract($_POST);
    if (isset($_POST['changePassBtn'])) {
        if (!empty($_POST['oldPass']) && !empty($_POST['newPass']) && !empty($_POST['confirmPass'])) {
            $oldPass = md5($oldPass);
            $newPass = md5($newPass);
            $confirmPass = md5($confirmPass);
            $checkOldPass = "SELECT * FROM `tbl_user` WHERE `user_id`='$uid' and `password`='$oldPass'";
            $checkOldPassResult = mysqli_query($con, $checkOldPass);
            $checkOldPassCount = mysqli_num_rows($checkOldPassResult);
            if ($checkOldPassCount == 1) {
                if ($newPass == $confirmPass) {
                    $updatePass = "UPDATE `tbl_user` SET `password`='$newPass' WHERE `user_id`='$uid'";
                    $updatePassResult = mysqli_query($con, $updatePass);
                    $_SESSION['profileUpdateMsg'] = 'Password Updated Successfully';
                    $_SESSION['profileUpdateMsgHeading'] = 'Success';

                    header('location:./adminchange.php');
                    die();
                } else {
                    $_SESSION['profileUpdateMsg'] = "New Password and Confirm Password does not match";
                    $_SESSION['profileUpdateMsgHeading'] = 'Error!!';
                    header('location:./adminchange.php');
                    die();
                }
            } else {
                $_SESSION['profileUpdateMsg'] = "Old Password does not match";
                $_SESSION['profileUpdateMsgHeading'] = 'Error!!';
                header('location:./adminchange.php');
                die();
            }
        } else {
            $_SESSION['profileUpdateMsg'] = "Please fill all the fields";
            $_SESSION['profileUpdateMsgHeading'] = 'Error!!';
            header('location:./adminchange.php');
            die();
        }
    }

    ?>
<?php
} else {
    header('location:auth/index.php');
}
?>