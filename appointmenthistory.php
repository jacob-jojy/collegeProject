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
                        <li><a class="dropdown-item" href="./profile.php">Profile</a></li>
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
                            <a class="nav-link" href="./dashboard.php">
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
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Appointment History</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Book Appointment</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="userhospital.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">Medical History</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="./medicalreport.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">Appointment History</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="./appointmenthistory.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="dataTable-wrapper dataTable-loading no-footer sortable searchable fixed-columns">
                                <div class="dataTable-container">
                                    <table id="datatablesSimple" class="dataTable-table">
                                        <thead>
                                            <tr>

                                                <th>Doctor Name</th>
                                                <th>Hospital Name</th>
                                                <th>Department</th>
                                                <th>Date </th>

                                            </tr>
                                            </thread>
                                        <tbody>
                                            <?php
                                            include('./cred/connect.php');
                                            $sql = "SELECT * from new_appointment ORDER BY date DESC";
                                            $sqlRes = mysqli_query($connect, $sql);
                                            while ($row = mysqli_fetch_assoc($sqlRes)) {
                                                $docId = $row['doctor_id'];
                                                $fetchDoctor = "SELECT * from doctor where doctor_id='$docId'";
                                                $fetchDoctorRes = mysqli_query($connect, $fetchDoctor);
                                                $docRow = mysqli_fetch_array($fetchDoctorRes);
                                                $hosId = $row['hosptial_id'];
                                                $fetchHos = "SELECT * from hospital where hospital_id='$hosId'";
                                                $fetchHosRes = mysqli_query($connect, $fetchHos);
                                                $hosRow = mysqli_fetch_array($fetchHosRes);
                                                $idd = $row['id'];
                                                $datee=$row['date'];
                                                $datee = date('d-m-Y', strtotime($datee));
                                                echo "  <tr>

                                                <td>" . $docRow['doctor_name'] . "</td>
                                                <td>" . $hosRow['hospital_name'] . "</td>
                                                <td>" . $docRow['specialization'] . "</td>
                                                <td>" . $datee . "</td>";

                                                $id = $row['id'];
                                                if ($row["status"] == 1) {

                                                    echo "<td><form action='appointmenthistory.php' method='post'><button class='btn btn-danger' type='submit' value=" . $id . " name='del'>Cancel</button></form></td>";
                                                } else {
                                                    echo ("<td><form action='appointmenthistory.php' method='post'><button class='btn btn-success' type='submit' value=" . $id . " name='act'>Activate</button></form></td>");
                                                }
                                            }
                                            ?>


                                            <?php
                                            if (isset($_POST['del'])) {
                                                $id = $_POST['del'];
                                                $query = "UPDATE `new_appointment` SET `status`=0 WHERE id='$id'";
                                                mysqli_query($connect, $query);
                                                echo ("
                                                  <script>
                                                  window.location.href='appointmenthistory.php';
                                                  </script>");
                                            }
                                            if (isset($_POST['act'])) {
                                                $id = $_POST['act'];
                                                $query = "UPDATE `new_appointment` SET `status`=1 WHERE id='$id'";
                                                mysqli_query($connect, $query);
                                                echo ("
                                                  <script>
                                                  window.location.href=appointmenthistory.php';
                                                  </script>");
                                            }
                                            ?>


                                        </tbody>
                                    </table>
                                </div>
                            </div>

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