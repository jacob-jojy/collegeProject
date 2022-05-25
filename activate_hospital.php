<?php
    include('./cred/connect.php');
    $hid=$_GET['hid'];
    $upQuery="UPDATE `hospital` SET `status`='1' WHERE `hospital_id`='$hid'";
    $upQueryRes=mysqli_query($connect, $upQuery);
    header("Location: ./view_hospital.php?hid=$hid");
?>