<?php
include('./include/connect.php');
session_start();

extract($_POST);
if (isset($uploadSubmit)) {

        $fileToUpload = $_FILES["uploadFile"]["name"];
        move_uploaded_file($_FILES["uploadFile"]["tmp_name"], "./upload/" . $_FILES["uploadFile"]["name"]);
        $file = './upload/' . $fileToUpload;
        $sql2 = " INSERT INTO `medical_history`(`file_name`) VALUES ('$fileToUpload')";

        $result2 = mysqli_query($con, $sql2);
        if($result2){
            echo "success";
           header('location:./medicalreport.php');
        }
        else{
            echo "error";
        }
       
}
    ?>
