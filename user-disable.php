<?php
session_start();
require 'database.php';

if(isset($_POST['users_ID'])) {
    $errorMsg = "";

    $id_numb = mysqli_real_escape_string($con, $_POST['users_ID']);
    $stat = mysqli_real_escape_string($con, $_POST['status']);

    $query = "UPDATE student_users SET status = '$stat' WHERE id_number='$id_numb' ";
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