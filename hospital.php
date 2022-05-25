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
        <title>Hospital Dashboard</title>
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
                        <h1 class="mt-4">Admin Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active"> Dashboard</li>
                        </ol>
                        <div class="row">
                            <?php
                            include('./cred/connect.php');
                            $fetchHospital = "SELECT * from hospital";
                            $fetchResult = mysqli_query($connect, $fetchHospital);
                            while ($fetchRow = mysqli_fetch_array($fetchResult)) {
                                ?>
                                <div class='col-xl-3 col-md-6'>
                                    <div class='card bg-primary text-white mb-4'>
                                        <div class='card-body'><?php echo $fetchRow['hospital_name'] ?><i class='ml-2 fas fa-hospital fa-2x'></i></div>
                                        <div class='card-footer d-flex align-items-center tip justify-content-between' title="Mobile No:<?php echo $fetchRow['hospital_name'] ?>">
                                        <a style="padding:2px 10px; border-radius:4px; color:black; background:white;" class='small text-dark stretched-link' type='submit' name='appointmentSubmit' href="view_hospital.php?hid=<?php echo $fetchRow['hospital_id'] ?>">View Details</a>
                                        </div>
                                    </div>
                                </div>
                        <?php
                            }
                            ?>
                        </div>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            Add Hospital
                        </button>


                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Add Hospital</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="#" method="POST">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">License Number</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1" name="license" aria-describedby="emailHelp" placeholder="Enter License Number">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Hospital Name</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1" name="hospital_name" aria-describedby="emailHelp" placeholder="Enter Hospital Name">
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Hospital Location</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1" name="hospital_location" aria-describedby="emailHelp" placeholder="Enter Hospital Location">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Phone No</label>
                                                <input type="number" maxlength="10" class="form-control" id="exampleInputPassword1" name="number" placeholder="number">
                                            </div>
                                            <div class="form-group">
                                                <label>Specialities</label>
                                                <div class="checkboxes" style="display:grid; grid-template-columns:1fr 1fr;">
                                                    <div class="checkbox">
                                                        <input type="checkbox" name="spec[]" value="Cardiology" id="Cardiology">
                                                        <label for="Cardiology">Cardiology</label>
                                                    </div>
                                                    <div class="checkbox">
                                                        <input type="checkbox" name="spec[]" value="Dermatology" id="Dermatology">
                                                        <label for="Dermatology">Dermatology</label>
                                                    </div>
                                                    <div class="checkbox">
                                                        <input type="checkbox" name="spec[]" value="Pediatrision" id="Pediatrision">
                                                        <label for="Pediatrision">Pediatrision</label>
                                                    </div>
                                                    <div class="checkbox">
                                                        <input type="checkbox" name="spec[]" value="Gynocology" id="Gynocology">
                                                        <label for="Gynocology">Gynocology</label>
                                                    </div>
                                                    <div class="checkbox">
                                                        <input type="checkbox" name="spec[]" value="Homeopathy" id="Homeopathy">
                                                        <label for="Homeopathy">Homeopathy</label>
                                                    </div>
                                                </div>
                                            </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <input type="submit" name="addNewhospitalSubmit" value="Save changes" class="btn btn-primary">
                                        </form>
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
    if (isset($_POST['delte'])) {
        extract($_POST);
        echo $delete = "DELETE FROM `hospital` WHERE hospital_id='$delte'";
        if (mysqli_query($connect, $delete)) {
            echo ("<script LANGUAGE='JavaScript'>
        window.alert('Delete Success');
		    window.location.href='hospital.php';
		  </script>");
        }
    }
    if (isset($_POST['addNewhospitalSubmit'])) {
        extract($_POST);

        $checkboxes=$_POST['spec'];
        $specs="";
        foreach($checkboxes as $spec)  
        {  
            $specs .= $spec.", ";
        }

        $date = date("Y-m-d");
        //Insert into database
        $insertDb="INSERT INTO `hospital`(`license`, `hospital_name`, `hospital_location`, `hospital_number`, `specialities`, `user_created_at`) VALUES ('$license','$hospital_name','$hospital_location','$number','$specs','$date')";
        $insertDbResult = mysqli_query($connect, $insertDb);
        if ($insertDbResult) {
            echo ("<script LANGUAGE='JavaScript'>
        window.alert('registration Success');
		    window.location.href='hospital.php';
		  </script>");
            die();
        } else {
            echo ("<script LANGUAGE='JavaScript'>
        window.alert('registration failed');
		    window.location.href='hospital.php';
		  </script>");
            die();
        }
    }

    ?>
<?php
} else {
    header('location:auth/index.php');
}
?>