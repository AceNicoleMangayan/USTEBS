<?php

session_start();
  // Include database connection file
  include_once('database.php');

  if (isset($_POST['update'])) {

    $id = mysqli_real_escape_string($con, $_POST['admin_userid']);
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $fname     = mysqli_real_escape_string($con, $_POST['firstname']);
    $lname     = mysqli_real_escape_string($con, $_POST['lastname']);
    $role     = mysqli_real_escape_string($con, $_POST['role']);
    $query7  = "UPDATE admin_account_user SET firstname='$fname',lastname='$lname',username='$username',password='$password',role='$role' WHERE admin_userid='$id' ";
    $result7 = mysqli_query($con, $query7);
    if ($result7) {
      header("Location:admin-dashboard.php");
      die();
    }else{
      $errorMsg  = "You are not Registred..Please Try again";
    }   
  }

?>

<style type="text/css">
    .nav-link{
	color: #f9f6f6;
	font-size: 14px;
    }	

	.logo{
	width: 120px;
	cursor: pointer;
}
</style>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Update Admin Information</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    </head>
       <body>
	    <nav class="navbar navbar-info sticky-top bg-info flex-md-nowrap p-10">
		<a class="navbar-brand col-sm-3 col-md-2 mr-0" href="" style="color: #5b5757;"><img src="images/logo.webp" class="logo"></a>
	            <ul class="navbar-nav px-3">
			<li class="nav-item text-nowrap">
		    	    <a class="nav-link" href="logout.php">Hi, <?php echo ucwords($_SESSION['FNAME']); ?> <input type="submit" name="submit" class="btn btn-success" value="Log Out"></a>
			</li>
		    </ul>
		</nav>		
		<div class="container-fluid">
		    <div class="row">
			<nav class="col-md-2 d-none d-md-block bg-info sidebar" style="height: 1000px">
		    	    <div class="sidebar-sticky">
			        <ul class="nav flex-column" style="color: #5b5757;">
				    <li class="nav-item">
					<a class="nav-link active" href="">
					<span data-feather="home"></span>
				            Dashboard <span class="sr-only">(current)</span>
							</a>
				    </li>

                    <h6>ADMINISTRATOR</h6>		
				    <li class="nav-item">
					<a class="nav-link" href="">
					    <span data-feather="users"></span>
					    Admin Profile
					</a>
				    </li>
            <li class="nav-item">
					<a class="nav-link" href="admin-approved.php?id=<?php echo ucwords($_SESSION['ID']); ?>">
				    	    <span data-feather="users"></span>
					    Admin Approval
						</a>
				    </li>
            <li class="nav-item">
					<a class="nav-link" href="admin-analysis.php">
				    	    <span data-feather="users"></span>
					    Admin Analysis
						</a>
				    </li>

                    <?php if ($_SESSION['ROLE'] == 'Super Admin') { ?>
					<li class="nav-item">
					<a class="nav-link" href="">
				    	    <span data-feather="users"></span>
					    Admin Lists
						</a>
				    </li>
				<?php } ?>						
			    </ul>
			</div>
		    </nav>
		<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
		<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3">
		    
		</div>
        <div class="card-header">
                        <h4>UPDATE ADMIN 
                            <a href="admin-dashboard.php" class="btn btn-danger float-right">BACK</a>
                        </h4>
                    </div>
		<div class="table-responsive">
		  <table class="table table-striped">
      <?php if (isset($errorMsg)) { ?>
          <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <?php echo $errorMsg; ?>
          </div>
        <?php } ?>

          <?php if ($_SESSION['ROLE'] == "Super Admin") {?>

           <?php
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                $query8 = "SELECT * FROM admin_account_user WHERE admin_userid='$id' ";
                $result8 = mysqli_query($con, $query8);

                $row = mysqli_fetch_array($result8);
                if (mysqli_num_rows($result8) > 0) {
                   foreach($result8 as $query8) {
            ?>
        <form action="" method="POST">
          <div class="form-group">
            <input type="hidden" class="form-control" name="admin_userid" value="<?=$row['admin_userid'];?>">
          </div>
          <div class="form-group">
            <label for="firstname" style="color:#000000;"><b>First Name:</label>
            <input type="text" class="form-control" name="firstname" value="<?=$row['firstname'];?>">
          </div>
          <div class="form-group">
            <label for="lastname" style="color:#000000;"><b>Last Name:</label>
            <input type="text" class="form-control" name="lastname" value="<?=$row['lastname'];?>">
          </div>
          <div class="form-group">  
            <label for="username" style="color:#000000;"><b>Username:</label>
            <input type="text" class="form-control" name="username" value="<?=$row['username'];?>">
          </div>
          <div class="form-group">  
            <label for="password" style="color:#f000000ff;"><b>Password:</label>
            <input type="password" class="form-control" name="password" value="<?=$row['password'];?>">
          </div>
          <div class="form-group">  
            <label for="role" style="color:#000000;">Role:</label>
            <select class="form-control" name="role" required="">
              <option value="">---Select Role---</option>
              <option value="Super Admin" value="<?=$row['role'];?>">Super Admin</option>
              <option value="Regular Admin" value="<?=$row['role'];?>">Regular Admin</option>
            </select>
          </div>
          <div class="form-group">
            <input type="submit" name="update" class="btn btn-primary" value="UPDATE">
          </div>
        </form>
        <?php
             }
        }
        else {

        ?>
        <?php } ?>
        <?php } ?>
        <?php } ?>
		    </table>
		</div>
	    </main>
	</div>
    </div>		
<script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    feather.replace();
</script>			
</body>
</html>