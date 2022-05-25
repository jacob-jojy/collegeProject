<?php
session_start();
if ($_SESSION["hellodocsession"] == session_id()) {
    include('./cred/connect.php');
    $hid=$_GET['hid'];
    // Fetch hospital details
    $fetchHos="SELECT `hospital_name`, `hospital_location`, `hospital_number`, `specialities`, `user_created_at`, `status` FROM `hospital` WHERE `hospital_id`='$hid'";
    $fetchHosResult=mysqli_query($connect, $fetchHos);
    $hospData=mysqli_fetch_assoc($fetchHosResult);
    $hName = $hospData['hospital_name'];
    $hLocation = $hospData['hospital_location'];
    $hNumber = $hospData['hospital_number'];
    $hSpecialities = $hospData['specialities'];
    $createdAt = $hospData['user_created_at'];
    $status = $hospData['status'];

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Hospital Dashboard</title>
        <link rel="stylesheet" href="./css/view_hosp.css">
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
        <style>
            a.tip {
                border-bottom: 1px dashed;
                text-decoration: none
            }

            a.tip:hover {
                cursor: help;
                position: relative
            }

            a.tip span {
                display: none
            }

            a.tip:hover span {
                border: #c0c0c0 1px dotted;
                padding: 5px 20px 5px 5px;
                display: block;
                z-index: 100;
                background: url(../images/status-info.png) #f0f0f0 no-repeat 100% 5%;
                left: 0px;
                margin: 10px;
                width: 250px;
                position: absolute;
                top: 10px;
                text-decoration: none
            }
        </style>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
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
                            <a class="nav-link" href="/hellodoc/admin.php">
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
                            <a class="nav-link" href="/hellodoc/ambubooking.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-building"></i></div>
                                Ambulance Details
                            </a>
                            <a class="nav-link" href="/hellodoc/ducbook.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-building"></i></div>
                                Duty Doctor booked
                            </a>
                        </div>
                    </div>

                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Hospital details</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active"> Dashboard</li>
                        </ol>
                    </div>
                    <a class="breadscrum" href="./hospital.php">Back</a>

                    <div class="hospital-detail">
                        <div class="name">
                            <?php echo $hName ?>
                        </div>
                        <div class="details">
                            <div class="detail">
                                <div class="q">Location:</div>
                                <div class="a"><?php echo $hLocation ?></div>
                            </div>
                            <div class="detail">
                                <div class="q">Phone number:</div>
                                <div class="a"><?php echo $hNumber ?></div>
                            </div>
                            <div class="detail">
                                <div class="q">Specialities:</div>
                                <div class="a"><?php echo $hSpecialities ?></div>
                            </div>
                            <div class="detail">
                                <div class="q">Date created:</div>
                                <div class="a"><?php echo $createdAt ?></div>
                            </div>
                            <div class="detail">
                                <div class="q">Status</div>
                                <?php
                                if($status=='1'){
                                ?>
                                    <div class="a tagg act">Active</div>
                                <?php
                                    }else{
                                ?>
                                    <div class="a tagg de">Deactive</div>
                                <?php
                                    }
                                ?>
                            </div>
                        </div>
                        <div class="buttons">
                            

                            <?php
                                if($status=='1'){
                            ?>
                                <a href="./deactivate_hospital.php?hid=<?php echo $hid;?>" class="btn deBtn" name="deactivate-btn">Deactivate</a>
                            <?php
                                }else{
                            ?>
                                <a href="./activate_hospital.php?hid=<?php echo $hid;?>" class="btn acBtn">Activate</a>
                            <?php
                                }
                            ?>
                        </div>
                    </div>

                        


                </main>
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