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
            .tblBtn {
                display: flex;
                column-gap: 12px;
            }

            .tblBtn a {
                padding: 2px 8px;
                color: #fff;
                background: blue;
                text-decoration: none;
                border-radius: 4px;
                transition: .1s ease-in-out;
            }

            .tblBtn a:active {
                transform: scale(.96);
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
                            <a class="nav-link" href="#">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>



                        </div>
                    </div>

                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>


                        <div class="card-body">
                            <div class="dataTable-wrapper dataTable-loading no-footer sortable searchable fixed-columns">
                                <div class="dataTable-container">
                                    <table id="datatablesSimple" class="dataTable-table">
                                        <thead>
                                            <tr>
                                                <th>OP Id</th>

                                                <!-- <th>Doctor Name</th>
                                                <th>Hospital Name</th> -->
                                                <th>Date</th>
                                                <th>Time Slot</th>
                                                <th>Action</th>
                                            </tr>
                                            </thread>
                                        <tbody>
                                            <?php
                                            include('./cred/connect.php');
                                            $sql = "SELECT * from new_appointment where `status`='1' ORDER BY date DESC";
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
                                                $datee = $row['date'];
                                                $datee = date('d-m-Y', strtotime($datee));
                                            ?>
                                                <tr> <?php $id = $row['id'] ?>
                                                    <td><?php echo $row['op_id'] ?></td>
                                                    <!-- <td><?php echo $row['patient_name'] ?></td> -->
                                                    <!-- <td><?php echo $docRow['doctor_name'] ?></td>
                                                    <td><?php echo $hosRow['hospital_name'] ?></td> -->
                                                    <td><?php echo $datee ?></td>
                                                    <td><?php echo $row['time_slot'] ?></td>

                                                    <?php if ($row["status"] == 1) {
                                                    ?>
                                                        <td class="tblBtn">
                                                            <!-- <form action='docappointment.php' method='post'>
                                                                <button class='btn btn-danger' value="<?php $row['id'] ?>" name='del'>Cancel</button>
                                                            </form> -->
                                                            <a href="./patient_record.php?op_id=<?php echo $row['op_id'] ?>">Add prescription</a>
                                                        </td>
                                                    <?php
                                                    } else {
                                                    ?>
                                                        <td>
                                                            <form action='docappointment.php' method='post'>
                                                                <button class='btn btn-success' value="<?php $row['id'] ?>" name='act'>Active</button>
                                                            </form>
                                                        </td>
                                                    <?php
                                                    }
                                                    ?>

                                                    <?php
                                                    if (isset($_POST['del'])) {
                                                        $id = $_POST['del'];
                                                        $query = "UPDATE `new_appointment` SET `status`=0 WHERE id='$id'";
                                                        mysqli_query($connect, $query);
                                                        echo ("
                                                  <script>
                                                  window.location.href='docappointment.php';
                                                  </script>");
                                                    }
                                                    if (isset($_POST['act'])) {
                                                        $id = $_POST['act'];
                                                        $query = "UPDATE `new_appointment` SET `status`=1 WHERE id='$id'";
                                                        mysqli_query($connect, $query);
                                                        echo ("
                                                  <script>
                                                  window.location.href=docappointment.php';
                                                  </script>");
                                                    }
                                                    ?>


                                                </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                    <div class="accordion" id="accordionExample">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="headingOne">
                                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                    View history
                                                </button>
                                            </h2>
                                            <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                                <div class="accordion-body">
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th>OP Id</th>
                                                                <!-- <th>Patient Name</th> -->
                                                                <!-- <th>Doctor Name</th>
                                                <th>Hospital Name</th> -->
                                                                <th>Date</th>
                                                                <th>Time Slot</th>

                                                                <th>Action</th>
                                                                <th>Previous Prescription</th>
                                                            </tr>
                                                            </thread>
                                                        <tbody>
                                                            <?php
                                                            include('./cred/connect.php');
                                                            $sql = "SELECT * from new_appointment where `status`='0' ORDER BY date DESC";
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
                                                                $datee = $row['date'];
                                                                $datee = date('d-m-Y', strtotime($datee));
                                                            ?>
                                                                <tr> <?php $id = $row['id'] ?>
                                                                    <td><?php echo $row['op_id'] ?></td>
                                                                    <!-- <td><?php echo $row['patient_name'] ?></td> -->
                                                                    <!-- <td><?php echo $docRow['doctor_name'] ?></td>
                                                                    <td><?php echo $hosRow['hospital_name'] ?></td> -->
                                                                    <td><?php echo $datee ?></td>
                                                                    <td><?php echo $row['time_slot'] ?></td>
                                                                    <?php if ($row["status"] == 1) {
                                                                    ?>
                                                                        <td class="tblBtn">
                                                                            <!-- <form action='docappointment.php' method='post'>
                                                                            <button class='btn btn-danger' value="<?php $row['id'] ?>" name='del'>Cancel</button>
                                                                            </form> -->
                                                                            <a href="./patient_record.php?op_id=<?php echo $row['op_id'] ?>">Add prescription</a>
                                                                        </td>
                                                                    <?php
                                                                    } else {
                                                                    ?>
                                                                        <td>
                                                                            <form action='patient_record.php' method='post'>
                                                                                <button class='btn btn-danger' value="<?php echo $row['op_id'] ?>" name='act'>edit</button>
                                                                            </form>
                                                                        </td>
                                                                    <?php
                                                                    }
                                                                    ?>

                                                                    <?php
                                                                    if (isset($_POST['del'])) {
                                                                        $id = $_POST['del'];
                                                                        $query = "UPDATE `new_appointment` SET `status`=0 WHERE id='$id'";
                                                                        mysqli_query($connect, $query);
                                                                        echo ("
                                                  <script>
                                                  window.location.href='docappointment.php';
                                                  </script>");
                                                                    }
                                                                    if (isset($_POST['act'])) {
                                                                        $id = $_POST['act'];
                                                                        $query = "UPDATE `new_appointment` SET `status`=1 WHERE id='$id'";
                                                                        mysqli_query($connect, $query);
                                                                        echo ("
                                                  <script>
                                                  window.location.href=docappointment.php';
                                                  </script>");
                                                                    }
                                                                    ?>

                                                                    <td>
                                                                        <?php echo $row['prescription']; ?>
                                                                    </td>
                                                                </tr>

                                                            <?php
                                                            }
                                                            ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
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