<?php
session_start();
require 'database.php';

if(isset($_POST['delete'])) {
    $errorMsg = "";

    $id = mysqli_real_escape_string($con, $_POST['delete']);

    $query = "UPDATE admin_account_user SET status = 'Disable' WHERE admin_userid='$id' ";
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