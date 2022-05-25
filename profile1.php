<?php
include('./include/connect.php');
session_start();
$uid =  $_SESSION['userid'];
extract($_POST);
if (isset($updateProfileBtn)) {

    if (!empty($_FILES['upload']) && $_FILES['upload']['error'] != UPLOAD_ERR_NO_FILE) {
        $fileToUpload = $_FILES["upload"]["name"];
        move_uploaded_file($_FILES["upload"]["tmp_name"], "./upload/" . $_FILES["upload"]["name"]);
        $file = './upload/' . $fileToUpload;
        $sql2 = " UPDATE `tbl_user` SET `username`='$username',`phn_number`='$phn_number',`email`='$email',`address`='$address',`profile_pic`='$fileToUpload'  WHERE `user_id`='$uid'";
        $result2 = mysqli_query($con, $sql2);
        header('location:./profile.php');
    }
    if (empty($_FILES['upload']['name'])) {
        $query = "UPDATE `tbl_user` SET `username`='$username',`phn_number`='$phn_number',`email`='$email','address'='$address' WHERE `user_id`='$uid'";
        $result = mysqli_query($con, $query);
        header('location:./profile.php');
    }
}
