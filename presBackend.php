<?php
if (isset($_POST['submitPres'])) {
    include('./cred/connect.php');
    extract($_POST);
    $upQuery = "UPDATE `new_appointment` SET `prescription`='$precord',`status`='0' WHERE `op_id`='$opid'";
    $upQueryRes = mysqli_query($connect, $upQuery);
    if ($upQuery) {
        header("Location: ./docappointment.php");
    } else {
        header("Location: ./docappointment.php?op_id=$opid");
    }
}
