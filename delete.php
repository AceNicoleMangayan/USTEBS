<?php
session_start();
require 'database.php';

if(isset($_POST['delete'])) {
    $errorMsg = "";

    $id = mysqli_real_escape_string($con, $_POST['delete']);

    $query = "UPDATE admins SET status = 'Disable' WHERE id_number='$id' ";
    $result = mysqli_query($con, $query);

    if($result) {
        header("Location:dashboard.php");
        die();
        $errorMsg = "User deleted";
    }
    else {
        $errorMsg = "User not deleted";
    }
}
?>