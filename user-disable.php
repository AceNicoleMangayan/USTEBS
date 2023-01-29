<?php
session_start();
require 'database.php';

<<<<<<< HEAD
if(isset($_POST['users_ID'])) {
    $errorMsg = "";

    $id_numb = mysqli_real_escape_string($con, $_POST['users_ID']);
    $stat = mysqli_real_escape_string($con, $_POST['status']);

    $query = "UPDATE student_users SET status = '$stat' WHERE id_number='$id_numb' ";
=======
if(isset($_POST['delete'])) {
    $errorMsg = "";

    $id_numb = mysqli_real_escape_string($con, $_POST['delete']);

    $query = "UPDATE student_users SET status = 'Disable' WHERE id_number='$id_numb' ";
>>>>>>> 7218bcb6743f066db53cc2c9030e1312927a00a5
    $result = mysqli_query($con, $query);

    if($result) {
        header("Location:user-dashboard.php");
        die();
    }
    else {
        $errorMsg = "User not deleted";
    }
}
?>