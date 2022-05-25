<?php
session_start();
if ($_SESSION["hellodocsession"] == session_id()) {
    if (isset($_POST['appointmentSubmit'])) {
        require('./stripe-php-master/config.php');
        include('./cred/connect.php');
        extract($_POST);
        $sql = "SELECT * from hospital where hospital_id='$appointmentSubmit'";
        $sqlResult = mysqli_query($connect, $sql);
        $fetcgRow = mysqli_fetch_array($sqlResult);
        $_SESSION['hospital_id'] = $fetcgRow['hospital_id'];
        $hospitalName = $fetcgRow['hospital_name'];
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
                <a class="navbar-brand ps-3" href="#">HELLO DOC</a>
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
            <input type="hidden" id="hosptialName" value='<?php echo $hospitalName; ?>'>
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
                                <a class="nav-link" href="./bill.php">
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
                            <h1 class="mt-4"><?php echo $hospitalName; ?></h1>
                            <ol class="breadcrumb mb-4">
                                <li class="breadcrumb-item active"> Appointment</li>
                            </ol>
                    </main>

                    <form action="server.php" method="post" id="insertForm">

                        <div class="form-group col-6">
                            <label for="exampleInputEmail1">Select Doctor</label>
                            <select class="form-control" name='doctor' onchange="setDoctor(this.value)">
                                <?php
                                $fetchDoctor = "SELECT * from doctor";
                                $fetchdoctorResult = mysqli_query($connect, $fetchDoctor);
                                while ($row = mysqli_fetch_array($fetchdoctorResult)) {
                                    echo '<option value=' . $row['doctor_id'] . '>' . $row['doctor_name'] . ' -' . $row['specialization'] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="">
                            <div class="datePicker ml-3">
                                <div> Select Date <input type="text" id="datepicker" name="datePicker" onblur="displaySlot(this)" required></div>

                            </div>
                            <div class="ml-3 mt-4" style="display: none;" id="slotBox">
                                <div>
                                    <p>Timings ForeNoon</p>
                                    <p>9:00AM to 12:00PM</p>
                                    <div class="app-check">
                                        <input type="radio" class="option-input radio" value="9:00 AM" name="example" />
                                        <div class="app-border">

                                            <label class="app-label">9:00 AM
                                            </label>
                                        </div>

                                        <input type="radio" class="option-input radio" value="10:00 AM" name="example" />
                                        <div class="app-border">

                                            <label class="app-label">10:00 AM
                                            </label>
                                        </div>

                                        <input type="radio" class="option-input radio" value="11:00 AM" name="example" />
                                        <div class="app-border">

                                            <label class="app-label">11:00 AM
                                            </label>
                                        </div>
                                        <input type="radio" class="option-input radio" value="12:00 AM" name="example" />
                                        <div class="app-border">

                                            <label class="app-label">12:00 AM
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <p>Timings After Noon</p>
                                    <p>1:00PM to 5:00PM</p>
                                    <div class="app-check">

                                        <input type="radio" class="option-input radio" value="2:00 PM" name="example" />
                                        <div class="app-border">

                                            <label class="app-label">2:00 PM
                                            </label>
                                        </div>

                                        <input type="radio" class="option-input radio" value="3:00 PM" name="example" />
                                        <div class="app-border">

                                            <label class="app-label">3:00 PM
                                            </label>
                                        </div>

                                        <input type="radio" class="option-input radio" value="4:00 PM" name="example" />
                                        <div class="app-border">

                                            <label class="app-label">4:00 PM
                                            </label>
                                        </div>



                                    </div>
                                </div>
                            </div>

                        </div>
                        <br> <input class="btn btn-primary ml-4" name="insertSubmit" id="rzp-button1" value="Submit" data-key="<?php echo $publishableKey ?>" data-amount="<?php echo $payAmount ?>" data-currency="inr" data-name="HELLO DOC" data-description="HELLO DOC Payment" />
                        <link href="https://cdnjs.cloudflare.com/ajax/libs/datepicker/0.6.5/datepicker.min.css" rel="stylesheet" />
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/datepicker/0.6.5/datepicker.min.js"></script>
                        <script src="https://checkout.razorpay.com/v1/checkout.js"></script>


                        <script>
                            var amt = 100 * 100;
                            let hospital = $('#hosptialName').val();
                            var options = {
                                "key": "rzp_test_egLWVSBEAGRNzX", // Enter the Key ID generated from the Dashboard
                                "amount": amt, // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
                                "currency": "INR",
                                "name": hospital,
                                "description": "Appointment",
                                "image": "./assets/vectors/Logo.svg",
                                "handler": function(response) {
                                    //success function
                                    $.ajax({
                                        url: "./server.php",
                                        type: "POST",
                                        data: {
                                            razorpay_payment_id: response.razorpay_payment_id

                                        },
                                        success: function(data, status) {
                                            $('#insertForm').submit();

                                        },
                                        error: function(responseData, textStatus, errorThrown) {
                                            console.log(responseData, textStatus, errorThrown);
                                        }
                                    });

                                }
                            };
                            var rzp1 = new Razorpay(options);
                            document.getElementById('rzp-button1').onclick = function(e) {
                                rzp1.open();
                                e.preventDefault();
                            }
                        </script>
                        <script>
                            $(function() {
                                $("#datepicker").datepicker({
                                    startDate: new Date()
                                });
                            });

                            function setDoctor(Id) {}

                            function displaySlot(ButtonId) {
                                $("#slotBox").show();
                                $.ajax({
                                    url: './server.php',
                                    type: 'POST',
                                    dataType: 'json',
                                    data: {
                                        Date: 'ButtonId'
                                    },
                                    success: function(data) {
                                        $('#websiteLoad').html(data.data);
                                    }
                                });
                            }
                        </script>



                    </form>
                    <footer class="py-4 bg-light mt-auto">
                        <div class="container-fluid px-4">
                            <div class="d-flex align-items-center justify-content-between small">
                                <div class="text-muted">Copyright &copy; Hello Docs</div>
                            </div>
                        </div>
                    </footer>
                </div>
            </div>
            <script>
                document.getElementById("meeting-time").min = "2022-03-08T12:15:23";
                document.getElementById("meeting-time").max = "2022-03-23T12:15:23";
                var date = new Date();
                var dateString = new Date(date.getTime() - (date.getTimezoneOffset() * 60000))
                    .toISOString()
                    .split("T")[0];
                $('#meeting-time').val(dateString + 'T09:00');
                $('#meeting-time').min(dateString + 'T09:00');
                $('#meeting-time').max(dateString + 'T09:00');
            </script>
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
    }
    ?>
<?php
} else {
    header('location:auth/index.php');
}
?>