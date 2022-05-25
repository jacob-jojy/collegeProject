<?php
session_start();
include('../cred/connect.php');
if (isset($_SESSION["hellodocsession"]) == session_id()) {
    header("Location: ../dashboard.php");
    die();
} else {

    // Register check
    if (isset($_POST['SignupSubmit'])) {
        // Empty check
        if (!empty($_POST['uname']) and !empty($_POST['emil'])) {
            // Collecting values
            extract($_POST);
            //check password and confirm password
            if ($cpsword == $psword) {
                //Check if mobile already exisit
                $checkMobile = "SELECT * FROM `tbl_user` WHERE `phn_number`='$mobno' and user_status!=0";
                $checkMobileResult = mysqli_query($connect, $checkMobile);
                $checkMobileCount = mysqli_num_rows($checkMobileResult);
                //No user exists
                if ($checkMobileCount == 0) {
                    //CHECK IF EMAIL ALREADY EXISTS
                    $checkEmail = "SELECT * FROM `tbl_user` WHERE `email`='$emil' and user_status!=0";
                    $checkEmailResult = mysqli_query($connect, $checkEmail);
                    $checkEmailCount = mysqli_num_rows($checkEmailResult);
                    //No user exists
                    if ($checkEmailCount == 0) {
                        $confirm_Password = md5($cpsword);
                        $date = date("Y-m-d");
                        //Insert into database
                        $insertDb = "INSERT INTO `tbl_user`(`email`, `username`, `phn_number`, `password`, `user_created_at`) VALUES ('$emil','$uname','$mobno','$confirm_Password','$date')";
                        $insertDbResult = mysqli_query($connect, $insertDb);
                        if ($insertDbResult) {
                            echo "Register Success";
                            header("Location: ./index.php");
                            die();
                        } else {
                            echo "User Register Failed";
                            header("Location: signup.php");
                            die();
                        }
                    } else {
                        echo "User Email Already exists";
                        header("Location: signup.php");
                        die();
                    }
                } else {
                    echo "User Mobile Already exists";
                    header("Location: signup.php");
                    die();
                }
            } else {
                echo "Password Mismatch";
                header("Location: signup.php");
                die();
            }
        } else {
            echo  "Please fill all fields";
            header("Location: signup.php");
            die();
        }
    }
    // Login check
    if (isset($_POST['loginSubmit'])) {
        // Empty check
        if (!empty($_POST['un']) and !empty($_POST['pd'])) {
            // Collecting values
            extract($_POST);
            $pass = md5($pd);
            //Check if mobile already exisit
            $checkLogin = "SELECT * FROM `tbl_user` WHERE `email`='$un' and `password`='$pass' and user_status!=0";
            $checkLoginResult = mysqli_query($connect, $checkLogin);
            $checkLoginCount = mysqli_num_rows($checkLoginResult);
            //No user exists
            if ($checkLoginCount == 1) {
                $userData = mysqli_fetch_assoc($checkLoginResult);
                $_SESSION['userName'] = $userData['username'];
                $_SESSION['userid'] = $userData['user_id'];
                if ($userData['user_status'] == 2) {
                    $_SESSION['hellodocsession'] = session_id();
                    header("Location: ../admin.php");
                } else if ($userData['user_status'] == 3) {
                    $_SESSION['hellodocsession'] = session_id();
                    header("Location: ../doctorlog.php");
                    die();
                } else {
                    $_SESSION['hellodocsession'] = session_id();

                    header("Location: ../dashboard.php");
                }
            } else {
                $_SESSION['loginMessage'] = "User Login Failed";
                header("Location: index.php");
                die();
            }
        } else {
            $_SESSION['loginMessage'] = "Please fill all fields";
            header("Location: index.php");
            die();
        }
    }
}
