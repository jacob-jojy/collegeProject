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
        <title>Admin Dashboard</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

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

                        <li><a class="dropdown-item" href="adminchange.php">Change Password</a></li>
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
                        <h1 class="mt-4">Ambulance Booking</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active"> Dashboard</li>
                        </ol>



                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Details
                            </div>


                            <div class="card-body">
                                <div class="dataTable-wrapper dataTable-loading no-footer sortable searchable fixed-columns">
                                    <div class="dataTable-container">
                                        <table id="datatablesSimple" class="dataTable-table">
                                            <thead>
                                                <tr>
                                                    <th>Mobile</th>
                                                    <th>Longitude</th>
                                                    <th>Latiude</th>
                                                    <th>Date and time</th>


                                                </tr>
                                                </thread>
                                            <tbody>
                                                <?php
                                                include('./cred/connect.php');
                                                $sql = "SELECT * from ambulance ";
                                                $sqlRes = mysqli_query($connect, $sql);
                                                while ($row = mysqli_fetch_assoc($sqlRes)) {
                                                    echo "  <tr>
                                                <td>" . $row['mobile'] . "</td>
                                                <td>" . $row['longi'] . "</td>
                                                <td>" . $row['lati'] . "</td>
                                                <td>" . $row['date'] . "</td>";
                                                }
                                                ?>
                                            </tbody>
                                        </table>
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
        <script>
            function validate_email() {
                var gmail = document.forms["registerForm"]["email"];
                var pattern = /[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$/;
                if (gmail.value == "") {
                    var error = "Please enter your email";
                    document.getElementById("email").placeholder = error;
                    document.getElementById("email").classList.add("custom-warning");
                    document.form.email.focus();
                    return false;
                } else if (gmail.value.match(pattern)) {
                    document.getElementById("email").innerHTML = "";
                    document.form.mobile.focus();
                    return true;
                } else {
                    document.getElementById("email").value = "";
                    document.getElementById("email").placeholder = "Invalid email";
                    document.form.email.focus();
                    return false;
                }
            }
            //validation for phone
            function validate_mobile() {
                var name = document.forms["registerForm"]["number"];
                var pattern = /^\(?([1-9]{1})\)?[-. ]?([0-9]{4})[-. ]?([0-9]{5})$/;
                if (name.value == "") {
                    var error = "Please enter your mobile number";
                    document.getElementById("number").placeholder = error;
                    document.getElementById("number").classList.add("custom-warning");
                    document.form.phone.focus();
                    return false;
                } else if (name.value.match(pattern)) {
                    document.getElementById("number").innerHTML = "";
                    document.form.password.focus();
                    return true;
                } else {
                    document.getElementById("number").value = "";
                    document.getElementById("number").placeholder = "Invalid mobile number";
                    document.form.phone.focus();
                    return false;
                }
            }
        </script>
    </body>

    </html>
    <?php
    if (isset($_POST['delte'])) {
        extract($_POST);
        echo $delete = "UPDATE `tbl_user` SET user_status = 0 WHERE user_id='$delte'";
        if (mysqli_query($connect, $delete)) {
            echo ("<script LANGUAGE='JavaScript'>
        window.alert('Delete Success');
		    window.location.href='admin.php';
		  </script>");
        }
    }
    if (isset($_POST['act'])) {
        extract($_POST);
        echo $delete = "UPDATE `tbl_user` SET user_status = 1 WHERE user_id='$act'";
        if (mysqli_query($connect, $delete)) {
            echo ("<script LANGUAGE='JavaScript'>
        window.alert('Activate Success');
		    window.location.href='admin.php';
		  </script>");
        }
    }
    if (isset($_POST['addNewUserSubmit'])) {
        if (!empty($_POST['userName']) and !empty($_POST['email'])) {
            // Collecting values
            extract($_POST);
            //check password and confirm password
            //Check if mobile already exisit
            $checkMobile = "SELECT * FROM `tbl_user` WHERE `phn_number`='$number' and user_status!=0";
            $checkMobileResult = mysqli_query($connect, $checkMobile);
            $checkMobileCount = mysqli_num_rows($checkMobileResult);
            //No user exists
            if ($checkMobileCount == 0) {
                //CHECK IF EMAIL ALREADY EXISTS
                $checkEmail = "SELECT * FROM `tbl_user` WHERE `email`='$email' and user_status!=0";
                $checkEmailResult = mysqli_query($connect, $checkEmail);
                $checkEmailCount = mysqli_num_rows($checkEmailResult);
                //No user exists
                if ($checkEmailCount == 0) {

                    $length = 8;
                    $generatedPassword = '';
                    $validChar = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!$%^&*()_+[]#><?/';
                    while (0 < $length--) {
                        $generatedPassword .= $validChar[random_int(0, strlen($validChar) - 1)];
                    }


                    $uname = $_POST['userName'];
                    $subject = "HEllo Doc Credentials";
                    $body = "Dear, $uname, your password is  $generatedPassword  ";
                    $headers = "From: jacobjojy@mca.ajce.in";

                    if (mail($email, $subject, $body, $headers)) {
                        $generatedPassword = md5($generatedPassword);
                        $date = date("Y-m-d");
                        //Insert into database
                        $insertDb = "INSERT INTO `tbl_user`(`email`, `username`, `phn_number`, `password`, `user_created_at`) VALUES ('$email','$userName','$number','$generatedPassword','$date')";
                        $insertDbResult = mysqli_query($connect, $insertDb);
                        if ($insertDbResult) {
                            echo ("<script LANGUAGE='JavaScript'>
                        window.alert('Register Success');
                            window.location.href='admin.php';
                          </script>");
                            die();
                        } else {
                            echo ("<script LANGUAGE='JavaScript'>
                        window.alert('Register Failed');
                            window.location.href='admin.php';
                          </script>");
                            die();
                        }
                    } else {
                        echo "Email sending failed...";
                    }
                } else {
                    echo ("<script LANGUAGE='JavaScript'>
                    window.alert('User Email Already exists');
                        window.location.href='admin.php';
                      </script>");
                    die();
                }
            } else {
                echo ("<script LANGUAGE='JavaScript'>
                window.alert('User Mobile Already exists');
                    window.location.href='admin.php';
                  </script>");
                die();
            }
        } else {
            echo ("<script LANGUAGE='JavaScript'>
        window.alert('Please fill all fields');
            window.location.href='admin.php';
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