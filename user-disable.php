<?php
session_start();
require 'database.php';

if(isset($_POST['delete'])) {
    $errorMsg = "";

    $id_numb = mysqli_real_escape_string($con, $_POST['delete']);

    $query = "UPDATE student_users SET status = 'Disable' WHERE id_number='$id_numb' ";
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