<?php
  session_start();
  if (isset($_SESSION['ID'])) {
      header("Location:user-dashboard.php");
      exit();
  }
  // Include database connectivity
    
  include_once('database.php');
  
  if (isset($_POST['submit'])) {
    $errorMsg = "";
			
    $id = mysqli_real_escape_string($con, $_POST['admin_userid']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    
  if (!empty($id) || !empty($password)) {
        $query  = "SELECT * FROM admin_account_user WHERE admin_userid = '$id' AND password = '$password'";
        $result = mysqli_query($con, $query);

        if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_assoc($result);
            $_SESSION['ID'] = $row['admin_userid'];
            $_SESSION['ROLE'] = $row['role'];
            $_SESSION['FNAME'] = $row['firstname'];
            header("Location:user-dashboard.php");
            die();                              
        }else{
          $errorMsg = "No user found on this ID Number!";
        } 
    }else{
      $errorMsg = "ID Number and Password is required!";
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
            <label for="admin_userid" style="color:#fff;"><b> Admin ID Number:</label> 
            <input type="text" class="form-control" name="admin_userid" placeholder="Enter Admin ID Number" >
          </div>
          <div class="form-group">  
            <label for="password" style="color:#fff;"><b>Password:</label> 
            <input type="password" class="form-control" name="password" placeholder="Enter Password">
          </div>
          <div class="form-group">
            <input type="submit" name="submit" class="btn btn-success" style="background-color: #3792cb" value="LOGIN"> 
          </div>
        </form>
      </div>
  </div>
</div>
</div>
</body>
</html>