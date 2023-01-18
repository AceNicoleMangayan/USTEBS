<?php
  // Include database connection file
  include_once('database.php');
  if (isset($_POST['submit'])) {
    
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $name     = mysqli_real_escape_string($con, $_POST['name']);
    $role     = mysqli_real_escape_string($con, $_POST['role']);
    $query  = "INSERT INTO admins (name,username,password,role) VALUES ('$name','$username','$password','$role')";
    $result = mysqli_query($con, $query);
    if ($result==true) {
      header("Location:index.php");
      die();
    }else{
      $errorMsg  = "You are not Registred..Please Try again";
    }   
  }
?>
<style type="text/css">
  .logo{
    display: block;
    margin-left: auto;
    margin-right: auto;
    width: 35%;
    padding: 30px;

  }

  .ustebs{
    width: 100%;
    height: 100%;
    background-image: linear-gradient(rgba(0,0,0,0.75), rgba(0,0,0,0.75)), url(images/ustp.jpg);
	  background-size: cover;
	  background-position: center;
  }
</style>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Multi user role based application login in php mysqli</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>
<body>

<div class ="ustebs">
<img src="images/logo.webp" class="logo">
<div class="container">
  <div class="row">
    <div class="col-md-3"></div>
      <div class="col-md-6">      
        <?php if (isset($errorMsg)) { ?>
          <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <?php echo $errorMsg; ?>
          </div>
        <?php } ?>
        <form action="" method="POST">
          <div class="form-group">
            <label for="name" style="color:#fff;"><b>Name:</label>
            <input type="text" class="form-control" name="name" placeholder="Enter Name" required="">
          </div>
          <div class="form-group">  
            <label for="username" style="color:#fff;"><b>Username:</label>
            <input type="text" class="form-control" name="username" placeholder="Enter Username" required="">
          </div>
          <div class="form-group">  
            <label for="password" style="color:#fff;"><b>Password:</label>
            <input type="password" class="form-control" name="password" placeholder="Enter Password" required="">
          </div>
          <div class="form-group">  
            <label for="role" style="color:#fff;">Role:</label>
            <select class="form-control" name="role" required="">
              <option value="">Select Role</option>
              <option value="super_admin">Super admin</option>
              <option value="admin">Admin</option>
              <option value="manager">Manager</option>
            </select>
          </div>
          <div class="form-group">
          <p style="color:#fff;">Already have account ?<a href="index.php" style="color:red;"><b> Login</a></p>
            <input type="submit" name="submit" class="btn btn-primary">
          </div>
        </form>
      </div>
  </div>
</div>
</div>
</body>
</html>