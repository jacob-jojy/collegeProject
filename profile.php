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
        <style>
            .pro-pic {
                width: 20vw;
                height: 20vw;
                background-color: bisque;
                border-radius: 50%;
                margin: 0.5vw 0;
                overflow: hidden;
                padding: 0;
            }

            .pro-pic img {
                width: 100%;
                height: 100%;
                border-radius: 50%;
                object-fit: cover;
                margin: 0;
            }

            .pro-pic .pro-pic-btn {
                border: none;
                display: flex;
                align-items: center;
                justify-content: center;
                background-color: #03c6fc;
                color: #f7ed7e;
                transform: translateY(-100%);
                vertical-align: middle;
                height: 20%;
                margin: 0;
                padding: 0;
            }

            .pro-pic .pro-pic-btn:hover {
                background-color: #164ac4;
            }
        </style>
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
                        <li><a class="dropdown-item" href="profile.php">Profile</a></li>
                        <!--   <li><a class="dropdown-item" href="#!">Activity Log</a></li>-->
                        <li>
                            <hr class="dropdown-divider" />
                        </li>
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
                            <a class="nav-link" href="dashboard.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Services</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Appointment
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="./userhospital.php">Book Appointment</a>
                                    <a class="nav-link" href="./appointmenthistory.php">Appointment History</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-exclamation-triangle"></i></div>
                                Emergency Services
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                        Doorstep Medical Service
                                    </a>
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                        Ambulance Service
                                    </a>
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                        Emergency Home Consultation
                                    </a>
                                </nav>
                            </div>
                            <div class="sb-sidenav-menu-heading">My Profile</div>
                            <a class="nav-link" href="./medicalreport.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-address-card"></i></div>
                                Medical History
                            </a>
                            <a class="nav-link" href="bill.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-file-invoice-dollar"></i></div>
                                Bill Payment
                            </a>
                        </div>
                    </div>

                </nav>
            </div>
            <div id="layoutSidenav_content" class="container">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">My Profile</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active"> You can update your Profile Here </li>
                        </ol>
                </main>
                <div class="container">
                    <form action="profile1.php" method="post" enctype="multipart/form-data">
                        <?php
                        include('./include/connect.php');
                        $uid =  $_SESSION['userid'];
                        // echo "<script>alert('$taskId');</script>";
                        $sql = "SELECT * FROM tbl_user WHERE user_id = $uid";
                        $result = mysqli_query($con, $sql);
                        $row = mysqli_fetch_assoc($result);
                        $username = $row['username'];
                        $email = $row['email'];
                        $phn_number = $row['phn_number'];
                        $address = $row['address'];
                        $proPic = $row['profile_pic'];



                        echo '
                    <div class="form-group">
                        <div class="pro-pic">
                            <img src="./upload/' . $proPic . '" alt="">
                            <input type="file" name="upload" id="upload" style="display:none;" />
                            <label class="pro-pic-btn" for="upload">Change</label>
                        </div>
                    </div>
                    <div class="form-group col-6">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="name" class="form-control" name="username" value="' . $username . '" aria-describedby="emailHelp" placeholder="Enter Your Name">
                    </div>
                    <div class="form-group col-6">
                        <label for="exampleInputEmail1">Mobile Number</label>
                        <input type="name" class="form-control" name="phn_number" value="' . $phn_number . '"aria-describedby="emailHelp" placeholder="Enter Your Mobile Number">
                    </div>
                    <div class="form-group col-6">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="name" class="form-control" name="email"value="' . $email . '" aria-describedby="emailHelp" placeholder="Enter Your Email">
                    </div>
                    <div class="form-group col-6">
                        <label for="exampleInputEmail1">Address</label>
                        <input type="name" class="form-control" name="address" value="' . $address . '" aria-describedby="emailHelp" placeholder="Enter Your Address">
                    </div>';
                        ?>
                        <br> <input type="submit" class="btn btn-primary ml-4" name="updateProfileBtn" value="Submit" />
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

} else {
    header('location:auth/index.php');
}
?>