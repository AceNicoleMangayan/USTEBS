<?php
  session_start();
  if (isset($_SESSION['ID'])) {
      header("Location:dashboard.php");
      exit();
  }
  // Include database connectivity
    
  include_once('database.php');
  
  if (isset($_POST['submit'])) {
    $errorMsg = "";
			
    $id = mysqli_real_escape_string($con, $_POST['id_number']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    
  if (!empty($id) || !empty($password)) {
        $query  = "SELECT * FROM admins WHERE id_number = '$id' AND password = '$password'";
        $result = mysqli_query($con, $query);

        if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_assoc($result);
            $_SESSION['ID'] = $row['id_number'];
            $_SESSION['ROLE'] = $row['role'];
            $_SESSION['NAME'] = $row['name'];
            header("Location:dashboard.php");
            die();                              
        }else{
          $errorMsg = "No user found on this username";
        } 
    }else{
      $errorMsg = "Username and Password is required";
    }
}

?>
<style type="text/css">
  .logo{
    display: block;
    margin-left: auto;
    margin-right: auto;
    width: 45%;
    padding: 70px;

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
  <title>USTEBS ADMINISTRATOR</title>
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
            <label for="id_number" style="color:#fff;"><b>ID Number:</label> 
            <input type="text" class="form-control" name="id_number" placeholder="Enter ID Number" >
          </div>
          <div class="form-group">  
            <label for="password" style="color:#fff;"><b>Password:</label> 
            <input type="password" class="form-control" name="password" placeholder="Enter Password">
          </div>
          <div class="form-group">
            <p style="color:#fff;">Not registered yet ?<a href="register.php" style="color:red;"><b> Register here</a></p>
            <input type="submit" name="submit" class="btn btn-success" style="background-color: #3792cb" value="LOGIN"> 
          </div>
        </form>
      </div>
  </div>
</div>
</div>
</body>
</html>